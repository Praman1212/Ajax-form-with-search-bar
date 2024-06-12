<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Models\Crud;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Facade;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Crud::all();
        return view('index', compact('items'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(StorePlayerRequest $request)
    {
        $data = $request->validated();


        if ($request->hasFile('image')) {
            $image = $request->File('image');
            $hashedName = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();
            $imagePath = $image->storeAs('upload/logo', $hashedName, 'public');
            $data['image'] = $imagePath;
        };

        Crud::create($data);
        $items = Crud::all();

        $partialView = view('body', ['items' => $items])->render();
        return response()->json(
            [
                'data' => $partialView,
                'url' => route('crud.index')
            ]
        );
    }

    public function show(string $id)
    {
        $item = Crud::find($id);
        $partialView = view('show', ['item' => $item])->render();
        return response()->json(
            [
                'data' => $partialView,
                'url' =>  route('crud.show', $item->id)
            ]
        );
    }

    public function edit(string $id)
    {
        $item = Crud::find($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name',
            'club',
            'country',
            'is_retired',
            'goal_number',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->File('image');
            $hashedName = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();
            $imagePath = $image->storeAs('upload/logo', $hashedName, 'public');
            $data['image'] = $imagePath;
        }

        $items = Crud::find($id)->update($data);
        return redirect()->route('crud.index')->with('message', session('Information update successfully'));
    }

    public function destroy(string $id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();

        $items = Crud::all();

        $partialView = view('body', ['items' => $items])->render();

        return response()->json(
            [
                'data' => $partialView,
                'url' => route('crud.index')
            ]
        );
    }
    public function search(Request $request)
    {
        $output = '';
        $search = Crud::where('id', 'Like', '%' . $request->search . '%')
            ->orWhere('name', 'Like', '%' . $request->search . '%')
            ->orWhere('club', 'Like', '%' . $request->search . '%')
            ->orWhere('country', 'Like', '%' . $request->search . '%')
            ->orWhere('is_retired', 'Like', '%' . $request->search . '%')
            ->orWhere('image', 'Like', '%' . $request->search . '%')
            ->orWhere('goal_number', 'Like', '%' . $request->search . '%')
            ->get();

        foreach ($search as $search) {
            $status = $search->is_retired ? 'Retired' : 'Not retired';
            $imagePath = $search->image ? $search->image : 'path/to/placeholder.jpg';


            $output .=
                '<tr>
                    <td>' . $search->id . '</td>
                    <td> ' . $search->name . '</td>
                    <td> ' . $search->club . '</td>
                    <td> ' . $search->country . '</td>
                    <td>' . $status . '</td>
                    <td><img src="' . $imagePath . '" style="width:100px;height:auto;"></td>
                    <td> ' . $search->goal_number . '</td>
                    

                </tr>';
        }

        return response($output);
    }
}
