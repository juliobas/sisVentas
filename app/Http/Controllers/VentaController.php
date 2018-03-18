<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use App\Cliente;
use App\Producto;
use PDF;
class VentaController extends Controller
{
  /**
   * Metodo para buscar las ventas existentes y mostrarlo en una tabla
   * y mostrar los botones para Crear nueva venta
   *
   */
    public function index()
    {
        return View("ventas.index", ['ventas' => Venta::has('cliente')->get()]);
    }

    /**
     *
     * Metodo que genera la vista para crear ventas
     *
     */
    public function create()
    {
        return View("ventas.create", ['clientes' => Cliente::all(), 'productos' => Producto::all()]);
    }

    /**
     *
     *
     * Metodo Para Guardar una venta con su detalle en Base de datos
     * Recibe datos del formulario
     * Params: $request
     */
    public function store(Request $request)
    {
        $count = count($request->producto_id);

        $venta = new Venta;
        $venta->cliente_id = $request->cliente_id;
        $venta->total = $request->total;
        $venta->impuesto = $request->impuesto;
        $venta->subtotal = $request->subtotal_venta;
        $venta->fecha = $request->fecha;
        $venta->save();

        for($i=0;$i<$count;$i++){
          $detalle_venta = new DetalleVenta;
          $detalle_venta->venta_id = $venta->id;
          $detalle_venta->producto_id = $request->producto_id[$i];
          $detalle_venta->cantidad = $request->cantidad[$i];
          $detalle_venta->precio = $request->precio[$i];
          $detalle_venta->subtotal = $request->subtotal[$i];
          $detalle_venta->save();
        }



        return redirect()->action('VentaController@index');
    }

    /**
     *
     *
     *
     * Metodo para generar e imprimir factura de venta
     * Recibe el id de la venta para buscar en base de datos
     * Params: $id
     */
    public function show($id)
    {
      $venta = Venta::findOrFail($id);
      //$detalle_venta = Venta::findOrFail($id);

      $pdf = PDF::loadView('ventas.show', ['venta' => $venta]);
      return $pdf->download('factura.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
