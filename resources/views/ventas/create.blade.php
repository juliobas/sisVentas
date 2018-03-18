@extends('layouts.app')
@section('content')
<div class="panel panel-primary ventana">
  <div class="panel-heading">
    <h2 class="panel-title">
      Nueva Venta
      <span class="widget-heading-icon">
    		<a class="btn-back" title="Regresar">
    		  <i class="fa fa-reply"></i>
    		</a>
    	</span>
    </h2>

  </div>
  <div class="panel-body">
    <form action="{{ url('venta') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select class="form-control" name="cliente_id">
              @foreach($clientes as $cliente)
                <<option value="{{ $cliente->id }}"> {{ $cliente->nombre }} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="iva">Impuesto</label>
            <input type="text" name="iva" id="iva" class="form-control" placeholder="Colocar Impuesto" maxlength="2">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control" value="{{ date('Y-m-d') }}" readonly>
          </div>
        </div>
      </div>


      <div class="panel panel-primary">
        <div class="panel panel-heading">
          <h5>Detalle de Venta</h5>
        </div>
        <div class="pane-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="auxproducto">Producto</label>
                <select class="form-control" name="auxproducto" id="auxproducto">
                  @foreach($productos as $producto)
                    <<option value="{{ $producto->id }}"> {{ $producto->nombre }} </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="auxcantidad">Cantidad</label>
                <input type="text" name="auxcantidad" id="auxcantidad" class="form-control" placeholder="Colocar Cantidad">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="auxprecio_unitario">Precio Unitario</label>
                <input type="text" name="auxprecio_unitario" id="auxprecio_unitario" class="form-control" placeholder="Colocar Precio">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <button type="button" id="btn-add" class="btn btn-primary">Agregar</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-striped table-bordered table-hover" id="detalles">
                  <thead style="background-color: #6a5acd">
                      <tr>
                        <th>Acciones</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>SubTotal</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Sub Total</th>
                      <th><h4 id="sub_total">BsF. 0.00</h4></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total Impuesto</th>
                      <th><h4 id="total_iva">BsF. 0.00</h4></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total</th>
                      <th><h4 id="total_venta">BsF. 0.00</h4></th>
                    </tr>
                  </tfoot>

                  <tbody>

                  </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>

      <input type="hidden" name="total" id="total">
      <input type="hidden" name="impuesto" id="impuesto">
      <input type="hidden" name="subtotal_venta" id="subtotal_venta">
      <div class="form-group text-center">
        <button id="guardar" type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>
@push('scripts')
<script>
  $(document).ready(function(){
    $('#btn-add').on('click', function(){
      agregarDetalle();
    });

    $('#detalles').on('click', '#btn-del', function() {
      eliminar($(this).data("count"));
    });

    $("#guardar").hide();
  });

  var total = 0; //Total Venta
  var sub_total = 0; //Sub total Venta
  var total_iva = 0; //Total Impuesto
  var count = 0; //contador de filas en tabla
  var subtotal = []; // arreglo con subtotal de cada producto
  var subtotal_iva = []; // sub total impuesto

  //Funcion que limpia los datos de agregar detalle
  function limpiar(){
    $("#auxcantidad").val("");
    $("#auxprecio_unitario").val("");
  }

  //Funcion para evaluar y verificar el total de la tabla y ocultar el
  //boton de guardar en caso de que el total sea blanco o 0
  function evaluar(){
    if(total>0){
      $("#guardar").show();
    }else{
      $("#guardar").hide();
    }
  }

  //Funcion que agrega el detalle de venta a la tabla
  function agregarDetalle(){
    producto_id = $("#auxproducto").val();
    producto = $("#auxproducto option:selected").text();
    cantidad = $("#auxcantidad").val();
    impuesto = $("#iva").val();
    precio_unitario = $("#auxprecio_unitario").val();

    if(cantidad!="" && cantidad>0 && precio_unitario!=""){
      subtotal[count] = (cantidad*precio_unitario);
      subtotal_iva[count] = (subtotal[count] * impuesto) / 100;
      total_iva = total_iva + subtotal_iva[count];
      total = total + subtotal_iva[count] + subtotal[count];
      sub_total = sub_total + subtotal[count];

      var fila = '<tr class="selected" id="fila' + count +'"><td> <button id="btn-del" data-count="'+ count +'" type="button" class="btn btn-xs btn-danger glyphicon glyphicon-trash"></button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio_unitario+'"></td><td><input type="hidden" name="subtotal[]" value="'+subtotal[count]+'">'+subtotal[count]+'</td></tr>'
      count++;
      limpiar();
      $("#sub_total").html("BsF. " + sub_total);
      $("#total_venta").html("BsF. " + total);
      $("#total_iva").html("BsF. " + total_iva);
      $("#total").val(total);
      $("#impuesto").val(total_iva);
      $("#subtotal_venta").val(sub_total);
      evaluar();
      $("#detalles").append(fila);
    }
  }

  //Funcion que elimina un indice de la tabla, recibe el indice
  function eliminar(indice){
    sub_total = sub_total - subtotal[indice];
    total =  total - subtotal_iva[indice] - subtotal[indice];
    total_iva =  total_iva - subtotal_iva[indice];
    $("#sub_total").html("BsF. " + sub_total);
    $("#total_iva").html("BsF. " + total_iva);
    $("#total_venta").html("BsF. " + total);
    $("#impuesto").val(total_iva);
    $("#total").val(total);
    $("#fila" + indice).remove();
    evaluar();
  }

</script>
@endpush
@endsection
