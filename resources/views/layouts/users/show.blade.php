<div style="width: 700px; margin: 25px auto;">
  <div class="container-fluid">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/users">Todos</a></li>
      <li role="presentation"><a href="/users/create">Nuevo</a></li>
    </ul>
  </div>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del usuario</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($user))
           <p>Nombre:  <strong>{{ $user->FullName }}</strong></p>
           <p>Email:   <strong>{{ $user->email    }}</strong></p>
  			   <p>Twitter: <strong>{{ $user->twitter  }}</strong></p>
        @else
          <p>No existe información para éste usuario.</p>
        @endif
        
        <div class="panel panel-success">
            <div class="text-center">
              <h3>Vehículos registrados</h3>
            </div>

            <div class="panel-body">
              <table class="table">
              <thead>
                <tr>
                  <th>Placa</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                </tr>
              </thead>
              <tbody>
                @foreach($vehicles as $vehicle)
                  <tr>
                    <td>{{ $vehicle->plate }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>

          <a href="/users" class="btn btn-default">Regresar</a>
		</div>
	</div>
</div>