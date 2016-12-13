
<table class="table table-hover">
	@if(isset($noticias))
		<thead>
			<th>Título</th>
			<th>Descripción</th>
			<th>Imagen</th>
		</thead>
		<tbody>
		@foreach($noticias as $n)
			<tr>
				<td>{{ $n->titulo }}</td>
				<td>{{ $n->descripcion }}</td>
				<td>
					<img src="imgNoticias/{{ $n->urlImg }}" class="img-responsive" alt="Responsive image" style="max-width: 50px;">
				</td>
				<td>
					<a href="noticias/{{ $n->id }}/edit" class="btn btn-warning btn-xs">Modificar</a>
					<a href="noticias/{{ $n->id }}" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
			</tr>
		@endforeach		
		</tbody>
	@endif
</table>