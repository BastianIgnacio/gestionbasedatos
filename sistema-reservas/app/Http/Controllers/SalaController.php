<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaController extends Controller
{
    //
    public function index()
    {
        $salas = \DB::table('sala')->get();
        $insumos = \DB::table('insumo')->get();
        $edificios = \DB::table('edificio')->get();
        $status = 'nothing';
        return view('salas', compact(['salas','edificios','insumos','status']));
    }

    public function insertarSala(Request $request)
    {
        $nombre = $request->input('nombre');
        $edificio = $request->input('edificio');
        $tipo = $request->input('tipo');
        $capacidad = $request->input('capacidad');

        
        try { 
            $data = array('nombre'=>$nombre, 'refEdificio'=>$edificio, 'tipo'=>$tipo, 'capacidad'=>$capacidad);
            \DB::table('sala')->insert($data);

            $salas = \DB::table('sala')->get();
            $insumos = \DB::table('insumo')->get();
            $edificios = \DB::table('edificio')->get();
            $status = 'insert';
            return view('salas', compact(['salas','edificios','insumos','status']));

           }catch (Exception $e){
            $error = 'Problema con insertar la sala';
            return view('error', compact('error'));
        }
        
    }

    public function insertarInsumo(Request $request)
    {
        $nombre = $request->input('nombre');
        $tipo = $request->input('tipo');
        $costo = $request->input('costo');
        try 
        { 
            $data = array('nombre'=>$nombre,'tipo'=>$tipo,'costo'=>$costo);
            \DB::table('insumo')->insert($data);

            $salas = \DB::table('sala')->get();
            $insumos = \DB::table('insumo')->get();
            $edificios = \DB::table('edificio')->get();
            $status = 'insert';
            return view('salas', compact(['salas','edificios','insumos','status']));

           }catch (Exception $e)
           {
            $error = 'Problema con insertar insumo la sala';
            return view('error', compact('error'));
        }
    }

    public function eliminarSala(Request $request)
    {
        $nombre = $request->input('refSala');
        try 
        { 
            \DB::table('sala')->where('nombre', '=', $nombre)->delete();

            $salas = \DB::table('sala')->get();
            $insumos = \DB::table('insumo')->get();
            $edificios = \DB::table('edificio')->get();
            $status = 'nothing';
            return view('salas', compact(['salas','edificios','insumos','status']));


           }catch(\Illuminate\Database\QueryException $ex){ 
            
            $error = 'No es posible eliminar la sala, existen reservas pendientes';
            return view('error', compact('error'));
            // Note any method of class PDOException can be called on $ex.
          }
    }

}

