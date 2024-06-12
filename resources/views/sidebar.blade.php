<div class="container side-bar">
    <div class="side-bar-content">
        <div class="side-bar-heading">
            <h1 style="color:white;">Player Details</h1>
        </div>
        <hr class="line" style="margin-left: 35px;">
        <div class="side-bar-links">
            <a href="{{ route('crud.index') }}">Home</a>
        </div>
        <hr class="line" style="margin-left: 35px;">
        <div class="side-bar-links">
            <a href="{{ route('crud.create') }}">Add Player Details</a>
        </div>
        <hr class="line" style="margin-left: 35px;">
        <div class="side-bar-links">
           <a href="{{ route('coach.index') }}" class="coach-index">Add Coach Details</a>
        </div>
        <hr class="line" style="margin-left: 35px;">
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>