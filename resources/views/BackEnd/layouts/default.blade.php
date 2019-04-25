
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="icon" href="{{Config::get('app.url')}}:8000/img/icons/sidy.ico">

    <title>Sidy | Admin </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
  </head>

  <body style="background:url('/img/master-admin.jpg');">
    <nav class="navbar navbar-default">
      @include('BackEnd.layouts.partials._nav')
    </nav>

    <header id="header">
      
      @include('BackEnd.layouts.partials._header')
     
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="{{ Request::is('home') ? 'active' : '' }}">@if(!(Request::is('home')))<a href="#">Dashboard |</a>@else Dashboard @endif </li>
          @yield('breadcrumb')
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            @include('BackEnd.layouts.partials._list-group')
          </div>
          <div class="col-md-9">
            
            <!-- Derniers utlisateurs -->
            @yield('content')
            
          </div>
        </div>
      </div>
    </section>

        <!-- Modal -->

    <!--- Add categorie -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Page</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('categorie.store') }}" enctype="multipart/form-data"> 
              {{ csrf_field() }}
          <div class="form-group">
            <label for="cat_name">Nom</label>
            <input id="cat_name" type="text" class="form-control" placeholder="Entrez le nom" name="cat_name" value="" autofocus required>
          </div>
          <div class="form-group">
            <label for="cat_desc">Description</label>
                <textarea id="editor1" class="form-control" name="cat_desc" placeholder="Page Body"></textarea>
          </div>
          <div class="form-group">
            <label for="cat_img">Image</label>
            <input id="cat_img" type="file" class="form-control" name="cat_img" placeholder="Confirmez le mot de passe" value="">
          </div>
          
          </div>
            <div class="modal-footer">
              <input type="submit" name="" class="btn btn-default" value="submit">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
        </form>
            
          
        </div>
      </div>
    </div>
    <!--- Add Produit -->
    <div class="modal fade" id="addPost" tabindex="-1

    0" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Page</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('produit.store') }}" enctype="multipart/form-data"> 
              {{ csrf_field() }}
          <div class="form-group">
            <label for="prod_name">Nom</label>
            <input id="prod_name" type="text" class="form-control" placeholder="Entrez le nom" name="prod_name" value="" autofocus required>
          </div>
          <div class="form-group">
            <label for="prod_desc">Description</label>
                <textarea  id="editor1" class="form-control" name="prod_desc"></textarea>
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
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script>
      CKEDITOR.replace('editor1');
    </script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
    
  </body>
</html>

@yield('script')
