@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Visualizar Producto
      <span class="widget-heading-icon">
    		<a class="btn-back" title="Regresar">
    		  <i class="fa fa-reply"></i>
    		</a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Codigo:</label>
        <div class="col-md-7">{{ $producto->codigo }}</div>
    </div>

    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Nombre:</label>
        <div class="col-md-7">{{ $producto->nombre }}</div>
    </div>

    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Descripcion:</label>
        <div class="col-md-7">{{ $producto->descripcion }}</div>
    </div>

    </div>
</div>
@stop
