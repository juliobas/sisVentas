<h4>Factura: {{$venta->id}}</h4>
<h4>Fecha: {{$venta->fecha}}</h4>
<h4>Datos del Cliente</h4>
<h4>Cedula: {{$venta->cliente->cedula}}</h4>
<h4>Nombre: {{$venta->cliente->nombre}}</h4>
<h4>Telefono: {{$venta->cliente->telefono}}</h4>
<h4>Direccion: {{$venta->cliente->direccion}}</h4>

<table>
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio Unitario</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    @foreach($venta->detalle_ventas as $detalle_venta)
      <tr>
        <td>{{ $detalle_venta->producto_id }}</td>
        <td>{{ $detalle_venta->producto->nombre }}</td>
        <td>{{ $detalle_venta->cantidad }}</td>
        <td>{{ $detalle_venta->precio }}</td>
        <td>{{ $detalle_venta->subtotal }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th>SubTotal</th>
      <th>{{$venta->subtotal}}</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th>Iva</th>
      <th>{{$venta->impuesto}}</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th>Total</th>
      <th>{{$venta->total}}</th>
    </tr>
  </tfoot>
</table>
