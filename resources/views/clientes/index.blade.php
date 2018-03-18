@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Clientes
      <span class="widget-heading-icon">
        <a title="Agregar!" data-toggle="tooltip" href="{{url('/cliente/create')}}">
          <i class="fa fa-plus-circle"></i>
        </a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <table class="table table-striped table-bordered table-hover" id="datatable">
        <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Cedula</th>
              <th>Telefono</th>
              <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($clientes as	$cliente)
            <tr>
              <td> {{ $cliente->id }} </td>
              <td> {{ $cliente->nombre }}</td>
              <td> {{ $cliente->cedula }}</td>
              <td> {{ $cliente->telefono }}</td>
              <td>
                <a class="btn btn-xs btn-info glyphicon glyphicon-search" title="Ver!" data-toggle="tooltip" href="{{ url('/cliente/' .	$cliente->id)}}"></a>
                <a class="btn btn-xs btn-warning glyphicon glyphicon-pencil" title="Editar!" data-toggle="tooltip" href="{{ url('/cliente/' . $cliente->id . '/edit/' )}}"></a>
                <form action="{{action('ClienteController@destroy',	$cliente->id)}}" method="POST"	style="display:inline">
          				{{	method_field('DELETE')	}}
          				{{	csrf_field()	}}
          				<button	type="submit"	class="btn btn-xs btn-danger glyphicon glyphicon-trash"	style="display:inline"></button>
          			</form>
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>
@stop
