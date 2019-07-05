<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    //
    public function index()
    {
        $reservas= \DB::table('reserva')->get();
        $instanciasReservas = \DB::table('instanciaReserva')->get();
        $usuarios = \DB::table('persona')->get();
        $salas = \DB::table('sala')->get();
        $bloques = \DB::table('bloque')->get();
        return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));
    }
}
