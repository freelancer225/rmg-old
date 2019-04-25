<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard<small> Manage your site</small></h1>
    </div>
    @if(Request::is('home'))
    <div class="col-md-2">
      <div class="dropdown create">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Créer un contenu
          <span class="caret"></span>
        </button>
        
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a type="button" data-toggle="modal" data-target="#addPage">Créer une categorie</a></li>
          <li><a type="button" data-toggle="modal" data-target="#addPost">Créer un produitt</a></li>
          
        </ul>

      </div>
    </div>
    @endif
  </div>
</div>