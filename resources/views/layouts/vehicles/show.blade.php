
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del vehículo</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($vehicle))
    			<p>
    				Marca: <strong>{{ $vehicle->brand }}</strong>
    			</p>
    			<p>
    				Modelo: <strong>{{ $vehicle->model }}</strong>
    			</p>
          @else
          <p>
            No existe información para éste vehículo.
          </p>
        @endif
        <a href="/vehicles" class="btn btn-default">Regresar</a>
		  </div>
	</div>

