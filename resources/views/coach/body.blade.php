<div class="coach-form-information">
    @include('coach.partial-form')
    <div class="container-body-content">
        <table>
            <thead>
                <tr>
                    <th style="padding: 0 20px;">SN</th>
                    <th style="padding: 0 60px;">Name</th>
                    <th style="padding: 0 60px;">Club</th>
                    <th style="padding: 0 60px;">Country</th>
                    <th style="padding: 0 20px;">Is_Retired</th>
                    <th style="padding: 0 60px;">Image</th>
                    <th style="padding: 0 20px;">Total Trophy</th>
                    <th style="padding: 0 100px;">Actions</th>
                </tr>
            </thead>
            <tbody class="coach-info-table">

                @foreach($items as $item)

                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->club}}</td>
                    <td>{{$item->country}}</td>
                    <td>{{$item->is_retired == 1 ? "Retired" : "Active Player"}}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Player image" width="120" height="70">

                    </td>
                    <td>{{$item->trophy_number}}</td>
                    <td class="container-buttons">

                        <form method="POST" action="{{ route('crud.destroy',$item->id) }}" enctype="multipart/form-data" class="player-delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" style="background: red;">Delete</button>
                        </form>
                        <a href="{{ route('crud.edit',$item->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('crud.show',$item->id) }}" class="btn btn-warning">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>




<script src="{{ asset('js/script.js') }}">
</script>