@extends('BackEnd.layouts.default', ['title' => 'Modifier un produit'])

@section('content')
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title"> Modifier un produit </h3>
  </div>
  <div class="panel-body">
    <form method="POST" action="{{ route('produit.update', $produits->id) }}" enctype="multipart/form-data"> 
        {{csrf_field()}}
      {{ method_field('PUT') }}

      <div class="form-group">
        <label for="prod_name">Nom</label>
        <input id="prod_name" type="text" name="prod_name" class="form-control" placeholder="Entrez le nom" name="prod_name" value="{{$produits->prod_name}}" autofocus required>
      </div>
      <div class="form-group">
        <label for="prod_desc">Description</label>
            <textarea id="editor1" class="form-control" name="prod_desc">{{$produits->prod_desc}}</textarea>
      </div>
      <div class="form-group">
        <label for="cat_id">Sélectionner une catégorie</label>
        <select name="cat_id" id="cat_id" class="form-control">
          <option> -- Sélectionner une catégorie -- </option>
          @if($produits->cats->id)
            <option selected="selected" value="{{$produits->cats->id}}">{{$produits->cats->cat_name}}</option>
            @foreach(App\Models\Categorie::all() as $cProduit)
              <option value="{{$cProduit->id}}"> {{$cProduit->cat_name}}</option>
            @endforeach
          @endif
        </select>
      </div>
      <div class="form-group">
        <label for="prod_stock">Stock</label>
        <input type="number" id="prod_stock" class="form-control" name="prod_stock" value="{{$produits->prod_stock}}" placeholder="Entrez le stock"></input>
      </div>
      <div class="checkbox">
        <label>
           @if($produits->prod_check == Null)
           <input type="checkbox" name="prod_check" id="prod_check"> Publié
         @else
         <input type="checkbox" name="prod_check" id="prod_check" checked="checked"> Publié
          
          @endif
          
        </label>
      </div>
      <div class="form-group">
        <label for="prod_price">Prix (FCFA)</label>
        <input id="prod_price" class="form-control" name="prod_price" value="{{$produits->prod_price}}" ></input>
      </div>
      <div class="form-group">
        <label for="prod_img">Image</label>
        <input id="prod_img" type="file" class="form-control" name="prod_img" placeholder="Confirmez le mot de passe" value="">
      </div>
      <input type="submit" name="" class="btn btn-default" value="submit">
      <a href="{{route('produit.index')}} " class="btn btn-danger">Annuler</a>
    </form>
    
  </div>
              
</div>

@endsection