@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Visualizar Cliente
      <span class="widget-heading-icon">
    		<a class="btn-back" title="Regresar">
    		  <i class="fa fa-reply"></i>
    		</a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Nombre:</label>
        <div class="col-md-7">{{ $cliente->nombre }}</div>
    </div>

    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Cedula:</label>
        <div class="col-md-7">{{ $cliente->cedula }}</div>
    </div>

    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Telefono:</label>
        <div class="col-md-7">{{ $cliente->telefono }}</div>
    </div>

    <div class="col-md-offset-4 col-md-8">
        <label class="col-md-3 control-label">Direccion:</label>
        <div class="col-md-7">{{ $cliente->direccion }}</div>
    </div>

  </div>
</div>
@stop
