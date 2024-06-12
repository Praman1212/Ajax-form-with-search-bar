@extends('layout')
@section('content')

<div class="container flex">
    <div class="container-sub flex-center">
        <div class="container-sub-link flex-link-1">
            @include('sidebar')
        </div>
        <div class="container-sub-link flex-link-2" style="position: relative;">
            @include('coach.body')
        </div>
    </div>
</div>


@endsection