@extends('layout')
@section('content')

<div class="container flex">
    <div class="container-sub flex-center">
        <div class="container-sub-link flex-link-1">
            @include('sidebar')
        </div>
        <div class="container-sub-link flex-link-2">
            <div class="back-button">
                <a href="{{ route('crud.index') }}">Back</a>
            </div>
            <div class="container-create">
                <div class="container-create-heading"><br>
                    <h1>Basic information about players</h1>
                </div>
                <form action="{{ route('crud.update',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-create-links">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$item->name}}">
                    </div>
                    <div class="container-create-links">
                        <label for="club">Club</label>
                        <input type="text" name="club" value="{{$item->club}}">
                    </div>
                    <div class="container-create-links">
                        <label for="country">Country</label>
                        <input type="text" name="country" value="{{$item->country}}">
                    </div>
                    <div class="container-create-links">
                        <label for="is_retired">Is Retired</label>
                        <Select name="is_retired">
                            <option value="1" {{ $item->is_retired == 1 ? 'Retired' : 'Not Retired' }}>Yes</option>
                            <option value="0" {{ $item->is_retired != 1 ? 'Retired' : 'Not Retired' }}>No</option>
                        </Select>
                    </div>
                    <div class="container-create-links">
                        <label for="">Image</label>
                        <img src="{{ asset('storage/' .$item->image) }}" height="50" width="50">
                        <input type="file" name='image'>
                    </div>
                    <div class="container-create-links">
                        <label for="goal_number">Goal Number</label>
                        <input type="number" value="{{$item->goal_number}}" name="goal_number">
                    </div>
                    <button type="submit" class="btn-submit" style="margin:0px 35px 35px 35px;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection