<div style="width: 700px; margin: 25px auto;">
  <div class="container-fluid">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/users">Todos</a></li>
      <li role="presentation"><a href="/users/create">Nuevo</a></li>
    </ul>
  </div>

  <div class="panel panel-success">
      <div class="panel-heading">
        <h4>Editar usuario</h4>
      </div>
      <div class="panel-body">
        @if (!empty($user))
          <form method="post" action="/users/{{ $user->id }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <p><input value="{{ $user->first_name }}" type="text" name="first_name" placeholder="Nombre" class="form-control" required></p>
            <p><input value="{{ $user->last_name }}" type="text" name="last_name" placeholder="Apellido" class="form-control" required></p>
            <p><input value="{{ $user->email }}" type="text" name="email" placeholder="Email" class="form-control" required></p>
            <p><input value="{{ $user->twitter }}" type="text" name="twitter" placeholder="Twitter" class="form-control" required></p>
            <input type="submit" value="Guardar" class="btn btn-success">
          @else
            <p>No existe información para éste usuario.</p>
        @endif
        <a href="/users" class="btn btn-default">Regresar</a>
      </form>
    </div>
  </div>

  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</div>