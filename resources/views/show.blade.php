@extends('layout')
@section('content')


<div class="container flex">
    <div class="container-sub flex-center">
        <div class="container-sub-link flex-link-1">
            @include('sidebar')
        </div>
        <div class="container-sub-link flex-link-2">
            <div class="back-button">
                <a href="{{ route('crud.index') }}" class="back-to-index">Back</a>
            </div>
            <div class="container-create">
                <div class="container-create-heading"><br>
                    <h1>Basic information about players</h1>
                </div>
                <div class="container-create-links">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $item->name }}" readonly>
                </div>
                <div class="container-create-links">
                    <label for="club">Club</label>
                    <input type="text" name="club" value="{{ $item->club }}" readonly>
                </div>
                <div class="container-create-links">
                    <label for="country">Country</label>
                    <input type="text" name="country" value="{{ $item->country }}" readonly>
                </div>
                <div class="container-create-links">
                    <label for="is_retired">Is Retired</label>
                    <input type="text" value="{{ $item->is_retired == 1 ? 'Retired' : 'Not Retired' }}" readonly>
                </div>
                <div class="container-create-links">
                    <label for="image">Image</label>
                    <img src="{{ asset('storage/' .$item->image) }}" height="50" width="50">
                </div>
                <div class="container-create-links">
                    <label for="">Goal Number</label>
                    <input type="number" value="{{ $item->goal_number }}" name="goal_number" readonly>
                </div>

                <div class="container-create-buttons">
                    <a href="">
                        <form action="{{ route('crud.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </a>
                    <a href="{{ route('crud.edit',$item->id) }}" class="btn btn-success">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection