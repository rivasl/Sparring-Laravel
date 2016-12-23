<div name ="crearUsuarios" style="width: 700px; margin: 25px auto;">
	<div class="container-fluid">
    	<ul class="nav nav-tabs">
    	  <li role="presentation"><a href="/users">Todos</a></li>
    	  <li role="presentation" class="active"><a href="/users/create">Nuevo</a></li>
    	</ul>
    </div>
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo usuario</h4>
  		</div>
  		<div class="panel-body">
  			<form method="post" action="/users">
  				{{ csrf_field() }}
				<p><input type="text" name="first_name" placeholder="Nombre" class="form-control" required></p>
				<p><input type="text" name="last_name" placeholder="Apellido" class="form-control" required></p>
				<p><input type="text" name="email" placeholder="Email" class="form-control" required></p>
				<p><input type="text" name="twitter" placeholder="Twitter" class="form-control" required></p>
				<p><input type="text" name="password" placeholder="Password" class="form-cPntrol" required></p>
				<!-- <p><input type="submit" value="Guardar" class="btn btn-success"></p> -->
				<p><button type="submit" class="btn btn-success">Guardar</button></p>
			</form>
		</div>
	</div>
	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</div>