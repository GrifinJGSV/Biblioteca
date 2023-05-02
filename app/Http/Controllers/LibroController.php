<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {

    public function index(){
        $libros = Libro::paginate(10);
        return view("libroindex")->with("libros", $libros);

    }
    public function create()
    {
        return view("librocreate");
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
           "titulo" => 'required',
           "autor"  => 'required',
           "editorial"  => 'required',
           "anio" => 'required|numeric|min:0|max:2023',
           "cantidad_disponible" => 'required|numeric|min:0|max|999',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->input("titulo");
        $libro->autor = $request->input("autor");
        $libro->editorial = $request->input("editorial");
        $libro->anio = $request->input("anio");
        $libro->cantidad_disponible = $request->input("cantidad_disponible");

        if ($libro->save() ) {
            return redirect()->route("libroindext")->with('mensaje', 'se agrego un nuevo libro.');
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
        $libro = Libro::findOrFail($id);
        return view("verlibro")->with("libro", $libro);
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


        $libro = Libro::findOrFail($id);
        return view("editarlibro")->with("libro", $libro);

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
        $libro = Libro::findOrFail($id);


        $request->validate([
            "titulo" => 'required|alpha',
            "autor"  => 'required|alpha',
            "editorial"  => 'required|alpha',
            "anio" => 'required|numeric|min:0|max:2023',
            "cantidad_disponible" => 'required|numeric|min:0|max|999',
        ]);
        $libro = Libro::findOrFail($id);

        $libro->titulo = $request->input("titulo");
        $libro->autor = $request->input("autor");
        $libro->editorial = $request->input("editorial");
        $libro->anio = $request->input("anio");
        $libro->cantidad_disponible = $request->input("cantidad_disponible");


        if ($libro ->save()){
            return redirect()->route("libroindext")->with('mensaje', 'Se actualizó el libro '. $libro->titulo);
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

        if (Libro::destroy($id) ) {
            return redirect()->route("libroindext")->with('mensaje', 'Se eliminó un libro');
        } else {
            return back();
        };
    }
}

