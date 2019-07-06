<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class usuariosController extends Controller
{
    //
    public function index()
    {
        $usuarios = \DB::table('persona')->get();
        $status = 'nothing';
        return view('usuarios', compact(['usuarios','status']));
    }

    public function insert(Request $request)
    {
      
        $rut = $request->input('rut');
        $nombre = $request->input('nombre');
        $ap = $request->input('apellidoPaterno');
        $am = $request->input('apellidoMaterno');
        $tipo = $request->input('tipo');

        try { 
            $data = array('rut'=>$rut, 'nombre'=>$nombre, 'apellidoPaterno'=>$ap,'apellidoMaterno'=>$am, 'tipo'=>$tipo);
            \DB::table('persona')->insert($data);

            $usuarios = \DB::table('persona')->get();
            $status = 'success';
            return view('usuarios', compact(['usuarios','status']));

           } catch(QueryException $ex){ 
            $error = 'Problema con insertar nuevo Usuario';
            return view('error', compact('error'));
        }
    }

    public function eliminarUsuario(Request $request)
    {
        try { 
            $rut = $request->input('rutEliminar');
            \DB::table('persona')->where('rut', '=', $rut)->delete();
            $usuarios = \DB::table('persona')->get();
            $status = 'successDelete';
            return view('usuarios', compact(['usuarios','status']));

           } catch(QueryException $ex){ 
            $error = 'Problema con Eliminar un usuario, es probable que el usuario tenga reservas a su nombre';
            return view('error', compact('error'));
        }
    }
}
