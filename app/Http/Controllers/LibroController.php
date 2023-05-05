<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {

   public function index(){
        $libros = Libro::paginate(10);
        return view("libroindex")->with("libros", $libros);

    }

    public function create()  {
        return view("librocreate");
    }

    public function store(Request $request)
    {

        $request->validate([
           "titulo" => 'required|string|max:255',
           "autor"  => 'required|string|max:255',
           "editorial"  => 'required|string|max:255',
           "anio" => 'required|numeric',
           "cantidad_disponible" => 'required|numeric|min:0|max: 999',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->input("titulo");
        $libro->autor = $request->input("autor");
        $libro->editorial = $request->input("editorial");
        $libro->anio = $request->input("anio");
        $libro->cantidad_disponible = $request->input("cantidad_disponible");

        if ($libro->save() ) {
            return redirect()->route("libroindex")->with('mensaje', 'se agrego un nuevo libro.');
        } else {
            return back();
        };

    }
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view("verlibro")->with("libro", $libro);
    }
    public function edit($id)
    {

        $libro = Libro::findOrFail($id);
        return view("editarlibro")->with("libro", $libro);
    }

    public function update(Request $request, $id)
    {
        //
        $libro = Libro::findOrFail($id);


        $request->validate([
            "titulo" => 'required|string|max:255',
            "autor"  => 'required|string|max:255',
            "editorial"  => 'required|string|max:255',
            "anio" => 'required|numeric',
            "cantidad_disponible" => 'required|numeric|min:0|max: 999',
        ]);
        $libro = Libro::findOrFail($id);

        $libro->titulo = $request->input("titulo");
        $libro->autor = $request->input("autor");
        $libro->editorial = $request->input("editorial");
        $libro->anio = $request->input("anio");
        $libro->cantidad_disponible = $request->input("cantidad_disponible");


        if ($libro ->save()){
            return redirect()->route("libroindex")->with('mensaje', 'Se actualizó el libro '.
             $libro->titulo);
        } else {
            return back();
        };
    }

    public function destroy($id) {

       Libro::destroy($id);
       return redirect()->route("libroindex")->with('mensaje', 'libro eliminado exitosamente');
         return back();
    
    }
}



