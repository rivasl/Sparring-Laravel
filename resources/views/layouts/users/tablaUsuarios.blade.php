<div name ="tablausuarios" style="width: 700px; margin: 25px auto;">
	
	<div class="container-fluid">
    	<ul class="nav nav-tabs">
    	  <li role="presentation" class="active"><a href="/users">Todos</a></li>
    	  <li role="presentation"><a href="/users/create">Nuevo</a></li>
    	</ul>
    </div>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de usuarios</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Twitter</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->FullName }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->twitter }}</td>
							<td>
								<a href="/users/{{ $user->id }}"><span class="label label-info">Ver</span></a>
								<a href="/users/edit/{{ $user->id }}"><span class="label label-success">Editar</span></a>
								<a href="{{ url('/users/destroy',$user->id) }}"><span class="label label-danger">Eliminar</span></a>
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
