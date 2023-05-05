<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Usuario;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PrestamoController extends Controller
{
    public function index(){
        $prestamos = Prestamo::paginate(10);

        return view('prestamoindex')->with("prestamos", $prestamos->load('libro', 'usuario' ));
    }

    public function create() {
        $libros = Libro::all();
        $usuarios = Usuario::all();
        return view("prestamocreate",[
        'libros' => $libros,
        'usuarios' => $usuarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           "fecha_solicitud" => 'required',
           "fecha_prestamo"  => 'required',
           "fecha_devolucion"  => 'required',
           "libro_id" => 'required',
           "usuario_id" => 'required',
        ]);

        $prestamo = new prestamo();
        $prestamo->fecha_solicitud = $request->input("fecha_solicitud");
        $prestamo->fecha_prestamo = $request->input("fecha_prestamo");
        $prestamo->fecha_devolucion = $request->input("fecha_devolucion");
        $prestamo->libro_id = $request->input("libro_id");
        $prestamo->usuario_id = $request->input("usuario_id");

        if ($prestamo->save() ) {
            return redirect()->route("prestamoindex")->with('mensaje', 'se agrego un nuevo prestamo');
        } else {
            return back();
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view("verprestamo")->with("prestamo", $prestamo);
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
        $prestamo = Prestamo::findOrFail($id);
        return view("prestamocreate")->with("prestamo", $prestamo);
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
        $prestamo = Prestamo::findOrFail($id);


        $request->validate([
            "fecha_solicitud" => 'required',
           "fecha_prestamo"  => 'required',
           "fecha_devolucion"  => 'required',
           "libro_id" => 'required',
           "usuario_id" => 'required',
        ]);
        $prestamo = Prestamo::findOrFail($id);

        $prestamo->fecha_solicitud = $request->input("fecha_solicitud");
        $prestamo->fecha_prestamo = $request->input("fecha_prestamo");
        $prestamo->fecha_devolucion = $request->input("fecha_devolucion");
        $prestamo->libro_id = $request->input("libro_id");
        $prestamo->usuario_id = $request->input("usuario_id");


        if ($prestamo ->save()){
            return redirect()->route("prestamoindex")->with('mensaje', 'Se actualizó un prestamo '. $prestamo->fecha_solicitud);
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
    public function destroy($id) {

        if (Prestamo::destroy($id) > 0 ) {
            return redirect()->route("prestamoindex")->with('mensaje', 'Se cancelo un prestamo');
        } else {
            return back();
        };
    }
}


