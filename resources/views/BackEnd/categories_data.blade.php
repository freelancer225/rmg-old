<div class="table-responsive"> 
  <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Images</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="myTable">
       @foreach($categories as $categorie)
        <tr>
          <td>{{$categorie->cat_name}}</td>
          <td>{!!$categorie->cat_desc!!}</td>
          <td><img src="{{Config::get('app.url')}}:8000/img/categories/{{$categorie->cat_img}}" class="thumbnail" height="45px" width="45px"></td>
          <td>
            <a href="{{route('categorie.edit', $categorie->id)}}" class="btn btn-default">Modifier</a>
            {{-- @if( Auth::user()->role == 'admin') --}}
            <form action="{{ route('categorie.destroy', $categorie->id) }}" method="POST" class="inline-block">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              {{-- @if($user->role !== 'admin') --}}
            <button type="submit" class="btn btn-danger" data-placement="top" title="Delete">
                Supprimer
            </button>
            {{-- @endif --}}

            </form>
            {{-- @endif --}}
          </td>
        </tr>
       @endforeach 
      </tbody>
    </table>
    {{$categories->links()}}
</div>