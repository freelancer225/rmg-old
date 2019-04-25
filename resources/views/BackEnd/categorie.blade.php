@extends('BackEnd.layouts.default', ['title' => 'Catégorie'])

@section('breadcrumb')
  <li class="active">Catégorie</li>
@endsection

@section('content')
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title">{{str_plural('Catégorie', $categories->count())}}</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-md-12">
          <input type="text" class="form-control" name="" placeholder="Rechercher catégorie..." id="myInput">
        </div>
      </div>
      <br>
      <div id="table_data">
        @include('BackEnd.categories_data')
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
      <h3 class="panel-title">Créer une catégorie</h3>
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('categorie.store') }}" enctype="multipart/form-data"> 
              {{ csrf_field() }}
          <div class="form-group">
            <label for="cat_name">Nom</label>
            <input id="cat_name" type="text" class="form-control" placeholder="Entrez le nom" name="cat_name" value="" required>
          </div>
          <div class="form-group">
            <label for="cat_desc">Description</label>
                <textarea id="editor1" class="form-control" name="cat_desc" placeholder="Page Body"></textarea>
          </div>
          <div class="form-group">
            <label for="cat_img">Image</label>
            <input id="cat_img" type="file" class="form-control" name="cat_img" placeholder="Confirmez le mot de passe" value="">
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
          fetchCat_data(page);
          
        });
        function fetchCat_data(page){
          $.ajax({
            url:"categorie/categories_data?page="+page
          }).done(function(data){
            $('#table_data').html(data);
          
          });
            
          
        }
      });
    </script>
@endsection
