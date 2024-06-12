@extends('layout')
@section('content')

<style>
    .error-message {
        transform: translate(210px, 0px);
    }
</style>

<div class="container flex">
    <div class="container-sub flex-center">
        <div class="container-sub-link flex-link-1">
            @include('sidebar')
        </div>
        @if ($errors->any())
        <div class="error-messages" style="float: right;background:blue;">
            <ul>
                @foreach ($errors->all() as $error)
                <span class="error" style="color: red;background:gray;padding:12px">{{ $error }}</span>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-sub-link flex-link-2 partial_view">
            <div class="back-button">
                <a href="{{ route('crud.index') }}">Back</a>
            </div>
            <div class="container-create">

                <div class="container-create-heading"><br>
                    <h1>Basic information about players</h1>
                </div>
                <form method="POST" action="{{route('crud.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="container-create-links">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter the name of player.">

                    </div>

                    <div class="error-message">
                        <span class="text-danger" id="nameError" style="color: red;"></span>

                    </div>

                    <div class="container-create-links">
                        <label for="club">Club</label>
                        <input type="text" name="club" placeholder="Enter the name of club.">
                    </div>
                    <div class="error-message">
                        <span class="text-danger" id="clubError" style="color: red;"></span>
                    </div>


                    <div class="container-create-links">
                        <label for="country">Country</label>
                        <input type="text" name="country" placeholder="Enter the name of country.">
                    </div>

                    <div class="error-message">
                        <span class="text-danger" id="countryError" style="color: red;"></span>
                    </div>

                    <div class="container-create-links">
                        <label for="is_retired">Is Retired</label>
                        <Select name="is_retired">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </Select>
                    </div>
                    <div class="error-message">
                        <span class="text-danger" id="is_retiredError" style="color: red;"></span>
                    </div>
                    <!-- <div class="container-create-links">
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div> -->
                    <div class="container-create-links">
                        <label for="">Goal Number</label>
                        <input type="number" value="" name="goal_number">
                    </div>
                    <div class="error-message">
                        <span class="text-danger" id="goal_numberError" style="color: red;"></span>
                    </div>
                    <button type="submit" class="btn-submit" style="margin:0px 35px 35px 35px;">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Display Validation Errors -->


<script>
    $('#myForm').on('submit', function(event) {
        // debugger;
        // console.log('created, player');
        event.preventDefault();
        let form = $("#myForm");
        let url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),

            success: function(response) {

                if (response.url) {
                    // Change the URL without reloading
                    history.pushState(null, '', response.url);
                }
                $('.partial_view').empty();
                $('.partial_view').append(response.data);
            },
            error: function(data) {
                if (data.status == 422) {
                    // $('.text-danger').text('');
                    let errors = data.responseJSON.errors;
                    console.log(errors);

                    $.each(errors, function(key, value) {
                        console.log('This is key = ' +key); 
                        console.log('This is value = ' +value );                       
                        $('#' + key + 'Error').text(value[0]);
                    });                   
                }
            }
        });
    });
</script>

@endsection