<div class="list-group">
  <a href="index.html" class="list-group-item active main-color-bg">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
  </a>
  <a href="{{ route('produit.index')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
    {{str_plural('Produit', (App\Models\Produit::all()->count()))}}
      <span class="badge">
      {{(App\Models\Produit::all()->count())}} 
  </span> 
  </a>
  <a href=" {{ route('categorie.index')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
    
      {{str_plural('Categorie', (App\Models\Categorie::all()->count()))}}
      <span class="badge">
      {{(App\Models\Categorie::all()->count())}} 
   
  </a>
  <a href="{{url('admin/settings')}}" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Paramètres</a>
</div>