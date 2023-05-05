<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

    public function index(){
         $usuarios = Usuario::paginate(10);
            return view("usuarioindex")->with("usuarios", $usuarios);

     }

     public function create()
    {
        return view("usuariocreate");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
           "nombre" => 'required|string|max:255',
           "correo"  => 'required|string|max:255',
           "telefono"  =>'required|numeric:[0-9]{4}-[0-9]{4}',
           "direccion" => 'required|string|max:255',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->input("nombre");
        $usuario->correo = $request->input("correo");
        $usuario->telefono = $request->input("telefono");
        $usuario->direccion = $request->input("direccion");

        if ($usuario->save() ) {
            return redirect()->route("usuarioindex")->with('mensaje', 'se agrego un nuevo usuario.');
        } else {
            return back();
        };

    }
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view("verusuario")->with("usuario", $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $usuario = Usuario::findOrFail($id);
        return view("editarusuario")->with("usuario", $usuario);

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
        $usuario = Usuario::findOrFail($id);


        $request->validate([
            "nombre" => 'required|string|max:255',
            "correo"  => 'required|string|max:255',
            "telefono"  =>'required|numeric:[0-9]{4}-[0-9]{4}',
            "direccion" => 'required|string|max:255',
        ]);
        $usuario = Usuario::findOrFail($id);

        $usuario->nombre = $request->input("nombre");
        $usuario->correo = $request->input("correo");
        $usuario->telefono = $request->input("telefono");
        $usuario->direccion = $request->input("direccion");


        if ($usuario ->save()){
            return redirect()->route("usuarioindex")->with('mensaje', 'Se actualizó el usuario '. $usuario->titulo);
        } else {
            return back();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Usuario::destroy($id) ) {
            return redirect()->route("usuarioindex")->with('mensaje', 'Se eliminó un usuario');
        } else {
            return back();
        };
    }
}


