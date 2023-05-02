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
}
