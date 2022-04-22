<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Modulo encargado de la pagina principal y la informacion
        $datosUser['users'] = Usuario::paginate(5);
        return view("user.index", $datosUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Modulo que carga la vista de la Creaccion 
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion de los campos
        $campos=[
            'usuario'=>'required|string|max:20',
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'tipiId'=>'required|string|max:5',
            'nId'=>'required|string|max:30',
            'FechaNacimiento'=>'required|string|max:15',
            'password'=>'required|string|max:100'
        ];

        $mensaje = [
            'request'=>'El attributo es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        // Modulo encargado de recibir y guardar los datos en la base de datos
        $datosUser = request()->except('_token');
        Usuario::insert($datosUser);
        return redirect('user')->with('mensaje', 'Usuario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Modulo que permite capturar la informacion a editar
        $datosUser=Usuario::findOrFail($id);
        // $datosUser['password'] = Crypt::decrypt();
        return view("user.edit", compact("datosUser"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Modulo que permite actualizar la informacion en la base de datos
        $datosUser = request()->except(['_token', '_method']);
        Usuario::where('id','=', $id)->update($datosUser);

        $user=Usuario::findOrFail($id);
        return redirect('user')->with('mensaje','Usuario fue editado'); 
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Modulo Encargado de eliminar los registros de la base de datos
        Usuario::destroy($id);
        return redirect('user')->with('mensaje','Usuario Borrado');
    }
}
