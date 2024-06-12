<div class="container-body" id="player_info_table">
    <div class="container-add-button">
        <a href="{{ route('crud.create') }}" class="add_player">Add Player</a>
    </div>
    <div class="search-bar ">
        <input type="text" name="search" id="search" placeholder="Search Here..">
    </div>


    <div class="container-body-content">

        <table>
            <thead>
                <tr>
                    <th style="padding: 0 20px;">SNs</th>
                    <th style="padding: 0 60px;">Name</th>
                    <th style="padding: 0 60px;">Club</th>
                    <th style="padding: 0 60px;">Country</th>
                    <th style="padding: 0 20px;">Is_Retired</th>
                    <th style="padding: 0 60px;">Image</th>
                    <th style="padding: 0 20px;">Total Goals</th>
                    <th style="padding: 0 100px;">Actions</th>
                </tr>
            </thead>
            <tbody class="allData">
               

                @foreach($items as $item)

               </tr>
                <tr >
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->club}}</td>
                    <td>{{$item->country}}</td>
                    <td>{{$item->is_retired == 1 ? "Retired" : "Active Player"}}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Player image" width="120" height="70">

                    </td>
                    <td>{{$item->goal_number}}</td>
                    <td class="container-buttons">

                        <form method="POST" action="{{ route('crud.destroy',$item->id) }}" enctype="multipart/form-data" class="player-delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                        <a href="{{ route('crud.edit',$item->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('crud.show',$item->id) }}" class="btn btn-warning">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tbody class="searchData">
            </tbody>
        </table>
    </div>
</div>

<script>


    $('#search').on('keyup',function(event){
        event.preventDefault();

        let data = $(this).val();
        if(data){
            $('.allData').hide();
            $('.searchData').show();
        }
        else{
            $('.allData').show();
            $('.searchData').hide();
        }
        let url = "{{ route('search') }}"

        $.ajax({
            type: 'get',
            url : url, 
            data: {'search': data},
            success: function(response){
                $('.searchData').html(response); 
            }
        })
    });



    //Delete
    $('.player-delete-form').on('submit', function(event) {
        // debugger;
        console.log('Deleted player_1');
        event.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let id = form.data('id');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),

            success: function(response) {
                // debugger
                $('#player_info_table').empty();
                $('#player_info_table').append(response.data);
                console.log('created, player_1');
            },
            error: function(response) {
                // debugger
                console.log('Error');
            }
        })
    });

    // Show page
    $('.btn-warning').on('click', function(e) {
        // debugger;
        console.log('Button is clicked');
        e.preventDefault();
        let button = $(this);
        let url = button.attr('href')

        $.ajax({
            type: 'GET',
            url: url,
            data: button.serialize(),

            success: function(response) {
                if (response.url) {
                    history.pushState(null, '', response.url)
                }
                console.log('Button is inside response');
                $('.container').empty();
                $('.container').append(response.data);
            },
            error: function() {
                console.log('not okay');
            }
        });
    });






</script>