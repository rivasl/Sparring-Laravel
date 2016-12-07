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
					<img src="imgNoticias/{{ $n->urlImg }}" class="img-responsive" alt="Responsive image" style="max-width: 100px;">
				</td>
			</tr>
		@endforeach		
		</tbody>
	@endif
</table>