@extends('BackEnd.layouts.default', ['title' => 'Modifier une Categorie'])

@section('content')
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title"> Modifier une Categorie </h3>
  </div>
  <div class="panel-body">
    <form method="POST" action="{{ route('categorie.update', $categories->id) }}" enctype="multipart/form-data"> 
        {{csrf_field()}}
      {{ method_field('PUT') }}

      <div class="form-group">
        <input type="hidden" name="id" class="form-control" value="{{$categories->id}}">
      </div>
      <div class="form-group">
        <label for="cat_name">Nom</label>
        <input id="cat_name" type="text" class="form-control" placeholder="Entrez le nom" name="cat_name" value="{{$categories->cat_name}}" autofocus required>
      </div>
      <div class="form-group">
        <label for="cat_desc">Description</label>
            <textarea id="editor1" class="form-control" name="cat_desc">{{$categories->cat_desc}}</textarea>
      </div>
      
      <div class="form-group">
        <label for="cat_img">Image</label>
        <div class="row">
          <div class="col-md-6">
            <input type="" name="old_img" class="form-control" value="{{$categories->cat_img}}">
          </div>
          <div class="col-md-6">
            <img src="{{Config::get('app.url')}}:8000/img/{{$categories->cat_img}}" height="30px" width="30px">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <input id="cat_img" type="file" class="form-control" name="cat_img" placeholder="Confirmez le mot de passe" value="">
          </div>
        </div>
      </div>
      <input type="submit" name="" class="btn btn-default" value="submit">
      <a href="{{route('categorie.index')}} " class="btn btn-danger">Annuler</a>
    </form>
    
  </div>
              
</div>

@endsection