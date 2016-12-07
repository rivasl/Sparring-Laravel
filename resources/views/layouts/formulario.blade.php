@if (session()->has('succces_msg'))
  <div class="alert alert-success" role="alert">{{ session('succces_msg') }}</div>
@endif
@if (session()->has('error_msg'))
  <div class="alert alert-danger" role="alert">{{ session('error_msg') }}</div>
@endif


<form role='form' method="POST" action="{{url('noticias')}}" enctype="multipart/form-data">
  <div class="form-group">
  	{{ csrf_field() }}
    <label for="titulo">Título</label>
    <input type="text" class="form-control" name="titulo" placeholder="título">
    
    @if($errors->has('titulo'))
      <span>{{ $errors->first('titulo') }}</span>
    @endif

  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" placeholder="descripcion"></textarea>

    @if($errors->has('descripcion'))
      <span>{{ $errors->first('descripcion') }}</span>
    @endif

  </div>
  <div class="form-group">
    <label for="urlImg">File input</label>
    <input type="file" id="urlImg" name="urlImg">
    <p class="help-block">Archivo a subir.</p>
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
