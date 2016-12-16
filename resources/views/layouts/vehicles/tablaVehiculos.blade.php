<div name ="tablavehiculos" style="width: 450px; margin: 50px auto;">
	
	<div class="container-fluid">
    	<ul class="nav nav-tabs">
    	  <li role="presentation" class="active"><a href="/vehicles">Todos</a></li>
    	  <li role="presentation"><a href="/vehicles/create">Nuevo</a></li>
    	</ul>
    </div>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de vehículos</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($vehicles as $vehicle)
						<tr>
							<td>{{ $vehicle->brand }}</td>
							<td>{{ $vehicle->model }}</td>
							<td>
								<a href="/vehicles/show/{{ $vehicle->id }}"><span class="label label-info">Ver</span></a>
								<a href="/vehicles/edit/{{ $vehicle->id }}"><span class="label label-success">Editar</span></a>
								<a href="{{ url('/vehicles/destroy',$vehicle->id) }}"><span class="label label-danger">Eliminar</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
  		</div>
  	</div>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</div>
