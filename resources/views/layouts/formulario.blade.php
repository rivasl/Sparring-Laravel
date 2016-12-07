<form role='form' method="POST" action="{{url('noticias')}}" enctype="multipart/form-data">
  <div class="form-group">
  	{{ csrf_field() }}
    <label for="titulo">Título</label>
    <input type="text" class="form-control" name="titulo" placeholder="título">
    
    @if($errors->has('titulo'))
      <span style="color:red;"> {{ $errors->first('titulo') }}</span>
    @endif

  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" placeholder="descripcion"></textarea>

    @if($errors->has('descripcion'))
      <span style="color:red;"> {{ $errors->first('descripcion') }}</span>
    @endif

  </div>
  <div class="form-group">
    <label for="urlImg">File input</label>
    <input type="file" id="urlImg" name="urlImg">
    <p class="help-block">Archivo a subir.</p>
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
