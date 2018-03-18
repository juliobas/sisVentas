<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
  /**
   * Metodo para buscar los productos y mostrarlo en una tabla
   * y mostrar los botones para Crear, ver, borrar y editar
   *
   */
    public function index()
    {
        return View("productos.index", ['productos' => Producto::all()]);
    }

    /**
     *
     * Metodo que genera la vista para crear productos
     *
     */
    public function create()
    {
        return View("productos.create");
    }

    /**
     *
     *
     * Metodo Para Guardar un producto en Base de datos
     * Recibe datos del formulario
     * Params: $request
     */
    public function store(Request $request)
    {
      $producto = new Producto;
      $producto->codigo = $request->input('codigo');
      $producto->nombre = $request->input('nombre');
      $producto->descripcion = $request->input('descripcion');
      if($producto->save());
          return redirect()->action('ProductoController@index');
    }

    /**
    * Metodo Para mostrar los datos de un producto
    * Recibe el id del producto para buscar en base de datos
    * Params: $id
     */
    public function show($id)
    {

        return View('productos.show', ['producto' => Producto::findOrFail($id)]);
    }

    /**
    * Metodo Para buscar los datos de un producto y generar la vista de
    * formulario para editar el registro
    * Recibe el id del producto para buscar en base de datos
    * Params: $id
     */
    public function edit($id)
    {
        return view('productos.edit',	['producto' => Producto::findOrFail($id)]);
    }

    /**
     *
     * Metodo que actualiza un cliente en la base de datos
     * recibe como parametro los datos del formulario y el
     * id del producto a modificar
     * Params $request, $id
     */
    public function update(Request $request, $id)
    {
      $producto = Producto::findOrFail($id);
      $producto->codigo = $request->input('codigo');
      $producto->nombre = $request->input('nombre');
      $producto->descripcion = $request->input('descripcion');

      if($producto->save());
          return redirect()->action('ProductoController@index');
    }

    /**
     *
     * Funcion que busca un producto en base de datos y si lo encuentra
     * lo elimina de base de dato, recibe como parametro el id del producto
     * Params: $id
     */
    public function destroy($id)
    {
      $producto = Producto::findOrFail($id);
      if($producto->delete());
          return redirect()->action('ProductoController@index');
    }
}
