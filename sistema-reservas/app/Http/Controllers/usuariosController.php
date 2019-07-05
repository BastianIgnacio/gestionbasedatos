<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuariosController extends Controller
{
    //
    public function index()
    {
        $usuarios = \DB::table('persona')->get();
        return view('usuarios', compact('usuarios'));
    }

    public function insert(Request $request)
    {
      
        $rut = $request->input('rut');
        $nombre = $request->input('nombre');
        $ap = $request->input('apellidoPaterno');
        $am = $request->input('apellidoMaterno');
        $tipo = $request->input('tipo');

        $data = array('rut'=>$rut, 'nombre'=>$nombre, 'apellidoPaterno'=>$ap,'apellidoMaterno'=>$am, 'tipo'=>$tipo);
        \DB::table('persona')->insert($data);

        $usuarios = \DB::table('persona')->get();
        return view('usuarios', compact('usuarios'));


        
    }
}