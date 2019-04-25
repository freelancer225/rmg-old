<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>catégorie</th>
        
        <th>Images</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="myTable">
     @foreach($produits as $produit)
      <tr>
        <td>{{$produit->prod_name}}</td>
        
        <td>{{$produit->cats->cat_name}}</td>
        <td><img src="{{Config::get('app.url')}}:8000/img/produits/{{$produit->prod_img}}" class="thumbnail" height="40px" width="40px"></td>

        <td>{{$produit->prod_price}}</td>
        <td>{{$produit->prod_stock}}</td>
        <td>
          @if($produit->prod_check == 'on')
            <span class="glyphicon glyphicon-ok" style="color: green"></span>
          @else
            <span class="glyphicon glyphicon-remove" style="color: red"></span>
          @endif
        </td>
        
        <td>
          
          <a href="{{route('produit.edit', $produit->id)}}" class="btn btn-default">Modifier</a>
          {{-- @if( Auth::user()->role == 'admin') --}}
          
          <form action="{{ route('produit.destroy', $produit->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Etes vous sur ?')">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            {{-- @if($user->role !== 'admin') --}}
          <input type="submit" class="btn btn-danger" value="Supprimer"> 
              
        
          {{-- @endif --}}

          </form>
          {{-- @endif --}}
        </td>
      </tr>
      @endforeach 
    </tbody>

  </table>
  {{$produits->links()}}
</div>