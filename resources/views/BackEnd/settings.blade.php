@extends('BackEnd.layouts.default', ['title' => 'Paramètres'])

@section('breadcrumb')
  <li class="active">Paramètres</li>
@endsection

@section('content')
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title">Paramètres</h3>
  </div>
  <div class="panel-body">
  <div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" >Profile</a></li>
      @if( Auth::user()->role == 'admin')
      <li role="presentation"><a href="#addUsers" aria-controls="addUsers" role="tab" data-toggle="tab">Ajouter utilisateurs</a></li>
      @endif
      
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" style="margin-top: 20px;">
      <div role="tabpanel" class="tab-pane fade in active" id="profile">
        <div class="row">
          <div class="col-md-12">
          <form class="general">
            <div class="row">
              <div class="col-md-4">
                <label>Nom: </label>
              </div>
              <div class="col-md-4">
                <span class="left"> {{ Auth::user()->name }}</span>
              </div>
              <div class="col-md-4 text-right">
                <a href="" class="btn btn-info" disabled>Modifier</a>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-md-4">
                <label>Email:</label>
              </div>
              <div class="col-md-4">
                <span class="left"> {{ Auth::user()->email }}</span>
              </div>
              <div class="col-md-4 text-right">
                <a href="" class="btn btn-info" disabled>Modifier</a>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-md-4">
                <label>Mot de passe:</label>
              </div>
              <div class="col-md-4">
                <span class="left">********</span>
              </div>
              <div class="col-md-4 text-right">
                <a href="" class="btn btn-info" disabled>Modifier</a>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-md-4">
                <label>Role: </label>
              </div>
              <div class="col-md-4">
                <span class="left"> Super Admin</span>
              </div>
              <div class="col-md-4 text-right">
                <a href="" class="btn btn-info" disabled>Modifier</a>
              </div>
            </div><hr>
            
          </form>
          </div>
        </div>

      </div>
      <div role="tabpanel" class="tab-pane fade" id="addUsers">
        <form method="POST" action="{{ route('otherUser.store') }}"> 
              {{ csrf_field() }}
          <div class="form-group">
            <label>Nom</label>
            <input id="name" type="text" class="form-control" placeholder="Entrez le nom" name="name" value="" autofocus required>
          </div>
          <div class="form-group">
            <label>Email de connexion</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Entrez une adresse de connexion" value="" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Entrez un mot de passe" value="">
          </div>
          <div class="form-group">
            <label>Confirmation</label>
            <input id="password-confirm" type="password" class="form-control" name="password-confirm" placeholder="Confirmez le mot de passe" value="">
          </div>
          <div class="form-group">
            <select name="role" class="form-control">
              <option value="">Role</option>
              <option value="admin"> Admin</option>
              <option value="moderateur"> Modérateur</option>
              
            </select>
          </div>
          <input type="submit" name="" class="btn btn-default" value="submit">
        </form>
      </div>
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