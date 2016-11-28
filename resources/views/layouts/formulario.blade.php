<form role='form' method="POST" action="{{url('noticias')}}">
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
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="form-group">
    <label for="urlImg">Imagen</label>
    <input type="text" class="form-control" name="imagen" placeholder="imagen"></input>
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
