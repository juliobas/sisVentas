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
    <form action="{{ url('cliente/' . $cliente->id) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Colocar Nombre" value="{{ $cliente->nombre }}">
      </div>

      <div class="form-group">
        <label for="cedula">Cedula</label>
        <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Colocar Numero de Cedula" value="{{ $cliente->cedula }}">
      </div>

      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Colocar Telefono" value="{{ $cliente->telefono }}">
      </div>

      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Colocar Direccion" value="{{ $cliente->direccion }}">
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
