@extends('BackEnd.layouts.default', ['title' => 'Dashboard'])

@section('content')
<div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Vue d'ensemble</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 0</h2>
                    <h4>Utilisateurs</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{(App\Models\Categorie::all()->count())}}</h2>
                    <h4>{{str_plural('Categorie', (App\Models\Categorie::all()->count()))}}</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{(App\Models\Produit::all()->count())}}</h2>
                    <h4>{{str_plural('Produit', (App\Models\Produit::all()->count()))}}</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 0</h2>
                    <h4>Commandes</h4>
                  </div>
                </div>
              </div>
            </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Tous les administrateurs</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <input type="text" class="form-control" name="" placeholder="Filter Posts..." id="myInput">
        </div>
      </div>
      <br>
      <table class="table table-striped table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody id="myTable">
        @foreach($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          <td>
            @if( Auth::user()->role == 'admin')
            <form action="{{ route('otherUser.destroy', $user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              @if($user->role !== 'admin')
            <button type="submit" class="btn btn-danger" data-placement="top" title="Delete">
                Supprimer
            </button>
            @endif

            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
@endsection