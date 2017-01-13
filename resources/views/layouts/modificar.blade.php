@if(session()->has('succces_msg'))
  <div class="alert alert-success" role="alert">{{ session('succces_msg') }}</div>
@endif
@if(session()->has('error_msg'))
  <div class="alert alert-danger" role="alert">{{ session('error_msg') }}</div>
@endif

@if(isset($noticia))
  <form role="form" method="POST" action="{{ route('noticias.update', $noticia->id) }}" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="PUT">
    <input name="nombreImg" type="text" class="hide" value="{{ $noticia->urlImg }}">
    <div class="form-group">
    	{{ csrf_field() }}
      <label for="titulo">Título</label>
      <input type="text" class="form-control" name="titulo" value="{{ $noticia->titulo }}">
      @if($errors->has('titulo'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('titulo') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea type="text" class="form-control" name="descripcion" >{{ $noticia->descripcion }}</textarea>
      @if($errors->has('descripcion'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('descripcion') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="urlImg">File input</label>
      <input type="file" id="urlImg" name="urlImg" value="{{ $noticia->urlImg }}>
      <p class="help-block">Archivo a subir.</p>
    </div>
    <button type="submit" class="btn btn-warning">Modificar</button>
  </form>
@endif
