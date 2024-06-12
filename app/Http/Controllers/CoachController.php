<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Coach::all();
        return view('coach.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('coach.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'club',
            'country',
            'is_retired',
            'image',
            'trophy_number'
        ]);
        Coach::create($data);
        
        $items = Coach::all();
        $partialView = view('coach.body',['items'=> $items])->render();
        return response()->json([
            'data' => $partialView,
            'url' => route('coach.index')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
