@extends('BackEnd.layouts.default', ['title' => 'Produits'])

@section('breadcrumb')
  <li class="active">Produits</li>
@endsection
@section('content')
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title"> {{str_plural('Produit', $produits->count())}} </h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-md-12">
          <input type="text" class="form-control" name="" placeholder="Rechercher produits..." id="myInput">
        </div>
      </div>
      <br>
      <div id="table_data">
        @include('BackEnd.produits_data')
      </div>
      <style type="text/css">
        .inline-block{
          display: inline-block;
        }
      </style>
  </div>
              
</div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Créer un produit</h3>
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('produit.store') }}" enctype="multipart/form-data"> 
              {{ csrf_field() }}
          <div class="form-group">
            <label for="prod_name">Nom</label>
            <input id="prod_name" type="text" class="form-control" placeholder="Entrez le nom" name="prod_name" value="" autofocus required>
          </div>
          <div class="form-group">
            <label for="prod_desc">Description</label>
                <textarea id="editor1" class="form-control" name="prod_desc" placeholder="Page Body"></textarea>
          </div>
          <div class="form-group">
            <label>Sélectionner une catégorie</label>
            <select name="cat_id" id="cat_id" class="form-control">
              <option> -- Sélectionner une catégorie -- </option>
              @foreach(App\Models\Categorie::all() as $cData)
              <option value="{{$cData->id}}"> {{$cData->cat_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Stock</label>
            <input type="number" id="prod_stock" class="form-control" name="prod_stock"></input>
          </div>
          <div class="checkbox">
                <label>
                  <input type="checkbox" name="prod_check" id="prod_check"> Publié
                </label>
              </div>
          <div class="form-group">
            <label>Prix (FCFA)</label>
            <input id="prod_price" class="form-control" name="prod_price"></input>
          </div>
          <div class="form-group">
            <label for="prod_img">Image</label>
            <input id="prod_img" type="file" class="form-control" name="prod_img" placeholder="Confirmez le mot de passe" value="">
          </div>
          <input type="submit" name="" class="btn btn-default" value="submit">
        </form>
    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e){
          e.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
          
        });
        function fetch_data(page){
          $.ajax({
            url:"produit/produits_data?page="+page
          }).done(function(data){
            $('#table_data').html(data);
          
          });
            
          
        }
      });
    </script>
@endsection