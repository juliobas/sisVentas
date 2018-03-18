@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Ventas
      <span class="widget-heading-icon">
        <a title="Agregar!" data-toggle="tooltip" href="{{url('/venta/create')}}">
          <i class="fa fa-plus-circle"></i>
        </a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <table class="table table-striped table-bordered table-hover" id="datatable">
        <thead>
            <tr>
              <th>Num Factura</th>
              <th>Cliente</th>
              <th>Fecha Venta</th>
              <th>Total Venta</th>
              <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($ventas as	$venta)
            <tr>
              <td> {{ $venta->id }} </td>
              <td> {{ $venta->cliente->nombre }}</td>
              <td> {{ $venta->fecha }}</td>
              <td> {{ $venta->total }}</td>
              <td>
                <a class="btn btn-xs btn-info glyphicon glyphicon-print" title="Imprimir!" data-toggle="tooltip" href="{{ url('/venta/' .	$venta->id)}}"></a>
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>
@stop
