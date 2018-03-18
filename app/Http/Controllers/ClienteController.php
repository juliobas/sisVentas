<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Metodo para buscar los clientes y mostrarlo en una tabla
     * y mostrar los botones para Crear, ver, borrar y editar
     *
     */
    public function index()
    {
        return View("clientes.index", ['clientes' => Cliente::all()]);
    }

    /**
     *
     * Metodo que genera la vista para crear clientes
     *
     */
    public function create()
    {
        return View("clientes.create");
    }

    /**
     *
     *
     * Metodo Para Guardar un cliente en Base de datos
     * Recibe datos del formulario
     * Params: $request
     */
    public function store(Request $request)
    {
      $cliente = new Cliente;
      $cliente->nombre = $request->input('nombre');
      $cliente->cedula = $request->input('cedula');
      $cliente->telefono = $request->input('telefono');
      $cliente->direccion = $request->input('direccion');
      if($cliente->save());
          return redirect()->action('ClienteController@index');
    }

    /**
    * Metodo Para mostrar los datos de un cliente
    * Recibe el id del cliente para buscar en base de datos
    * Params: $id
     */
    public function show($id)
    {

        return View('clientes.show', ['cliente' => Cliente::findOrFail($id)]);
    }

    /**
    * Metodo Para buscar los datos de un cliente y generar la vista de
    * formulario para editar el registro
    * Recibe el id del cliente para buscar en base de datos
    * Params: $id
     */
    public function edit($id)
    {
        return view('clientes.edit',	['cliente' => Cliente::findOrFail($id)]);
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
      $cliente = Cliente::findOrFail($id);
      $cliente->nombre = $request->input('nombre');
      $cliente->cedula = $request->input('cedula');
      $cliente->telefono = $request->input('telefono');
      $cliente->direccion = $request->input('direccion');
      if($cliente->save());
          return redirect()->action('ClienteController@index');
    }

    /**
     *
     * Funcion que busca un cliente en base de datos y si lo encuentra
     * lo elimina de base de dato, recibe como parametro el id del cliente
     * Params: $id
     */
    public function destroy($id)
    {
      $cliente = Cliente::findOrFail($id);
      if($cliente->delete());
          return redirect()->action('ClienteController@index');
    }
}
