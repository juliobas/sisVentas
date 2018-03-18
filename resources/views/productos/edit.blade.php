@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Editar Cliente
      <span class="widget-heading-icon">
    		<a class="btn-back" title="Regresar">
    		  <i class="fa fa-reply"></i>
    		</a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <form action="{{ url('producto/' . $producto->id) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}

      <div class="form-group">
        <label for="codigo">Codigo</label>
        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Colocar Codigo" value="{{ $producto->codigo }}">
      </div>
      
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Colocar Nombre" value="{{ $producto->nombre }}">
      </div>

      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Colocar Descripcion" value="{{ $producto->descripcion }}">
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>
@stop
