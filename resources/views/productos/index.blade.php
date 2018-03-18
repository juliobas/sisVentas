@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Productos
      <span class="widget-heading-icon">
        <a title="Agregar!" data-toggle="tooltip" href="{{url('/producto/create')}}">
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
              <th>Descripcion</th>
              <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($productos as	$producto)
            <tr>
              <td> {{ $producto->codigo }} </td>
              <td> {{ $producto->nombre }}</td>
              <td> {{ $producto->descripcion }}</td>
              <td>
                <a class="btn btn-xs btn-info glyphicon glyphicon-search" title="Ver!" data-toggle="tooltip" href="{{ url('/producto/' .	$producto->id)}}"></a>
                <a class="btn btn-xs btn-warning glyphicon glyphicon-pencil" title="Editar!" data-toggle="tooltip" href="{{ url('/producto/' . $producto->id . '/edit/' )}}"></a>
                <form action="{{action('ProductoController@destroy',	$producto->id)}}" method="POST"	style="display:inline">
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
