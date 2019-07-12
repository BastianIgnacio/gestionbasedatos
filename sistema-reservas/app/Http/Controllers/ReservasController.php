<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function insertReserva(Request $request)
    {
        $reservador = $request->input('reservador');
        $array = explode(" ", $reservador);


        $rutReservador = head($array);
        $asignatura = $request->input('asignatura');
        $fecha = Carbon::now();
        $estado = 'Pendiente';

        try { 
            $data = array('asignatura'=>$asignatura, 'refPersona'=>$rutReservador, 'estado'=>$estado,'fechaSolicitud'=>$fecha);
            \DB::table('reserva')->insert($data);


            $reservas= \DB::table('reserva')->get();
            $instanciasReservas = \DB::table('instanciaReserva')->get();
            $usuarios = \DB::table('persona')->get();
            $salas = \DB::table('sala')->get();
            $bloques = \DB::table('bloque')->get();
            return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));

           } catch(QueryException $ex){ 
            $error = 'Problema con insertar nueva Reserva';
            return view('error', compact('error'));
        }
    }

    public function insertInstanciaReserva(Request $request)
    {
        $refReserva = $request->input('reserva');
        $dia = $request->input('dia');
        $refSala = $request->input('sala');
        $bloqueInicial = $request->input('bloqueInicio');
        $bloqueFinal = $request->input('bloqueFinal');
        
        $fecha = $request->input('fecha');
        $array = explode(" ", $fecha);
        $fechaInicial = head($array);
        $fechaFinal = last($array);

        try { 
            $data = array('refReserva'=>$refReserva, 'refSala'=>$refSala, 'dia'=>$dia, 'bloqueInicial'=>$bloqueInicial, 'bloqueFinal'=>$bloqueFinal, 'fechaInicial'=>$fechaInicial, 'fechaFinal'=>$fechaFinal);
            \DB::table('instanciaReserva')->insert($data);


            $reservas= \DB::table('reserva')->get();
            $instanciasReservas = \DB::table('instanciaReserva')->get();
            $usuarios = \DB::table('persona')->get();
            $salas = \DB::table('sala')->get();
            $bloques = \DB::table('bloque')->get();
            return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));

           } catch(\Illuminate\Database\QueryException $ex){ 
            
            $error = 'Problema con insertar nueva Instancia Reserva';
            return view('error', compact('error'));
          }
    }

    public function eliminarReserva(Request $request)
    {
        try { 
            $reservaEliminar = $request->input('reservaEliminar');
            $rut = $request->input('rutEliminar');
            \DB::table('reserva')->where('id', '=', $reservaEliminar)->delete();

            $reservas= \DB::table('reserva')->get();
            $instanciasReservas = \DB::table('instanciaReserva')->get();
            $usuarios = \DB::table('persona')->get();
            $salas = \DB::table('sala')->get();
            $bloques = \DB::table('bloque')->get();
            return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));

           } catch(QueryException $ex){ 
            $error = 'Problema con Eliminar una Reserva';
            return view('error', compact('error'));
        }
    }

    public function eliminarInstanciaReserva(Request $request)
    {
        try { 

            $refReserva = $request->input('refReserva');
            $refSala = $request->input('refSala');
            $dia = $request->input('dia');
            $bloqueInicial = $request->input('bloqueInicial');
            $bloqueFinal = $request->input('bloqueFinal');
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            \DB::table('instanciaReserva')->where('fechaInicial', '=', $fechaInicial)->where('fechaFinal','=',$fechaFinal)->where('dia','=',$dia)->where('refReserva','=',$refReserva)->
            where('refSala','=',$refSala)->where('bloqueInicial','=',$bloqueInicial)->where('bloqueFinal','=',$bloqueFinal)->delete();

            $reservas= \DB::table('reserva')->get();
            $instanciasReservas = \DB::table('instanciaReserva')->get();
            $usuarios = \DB::table('persona')->get();
            $salas = \DB::table('sala')->get();
            $bloques = \DB::table('bloque')->get();
            return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));

           } catch(QueryException $ex){ 
            $error = 'Problema con eliminar ';
            return view('error', compact('error'));
        }
    }

    public function indexLogReservas()
    {
        $reservasEliminadas= \DB::table('logReserva')->get();
        $instanciasEliminadas = \DB::table('logInstanciaReserva')->get();

        return view('logReservas', compact(['reservasEliminadas','instanciasEliminadas']));
    }

    public function aprobarReserva(Request $request)
    {
        $refReserva = $request->input('refReserva');
        $array = explode(" ", $refReserva);
        $reserva = last($array);

        \DB::table('reserva')
        ->where('id', $reserva)
        ->update(['estado' => 'Aprobada']);

        $reservas= \DB::table('reserva')->get();
        $instanciasReservas = \DB::table('instanciaReserva')->get();
        $usuarios = \DB::table('persona')->get();
        $salas = \DB::table('sala')->get();
        $bloques = \DB::table('bloque')->get();
        return view('reservas', compact(['reservas','instanciasReservas','usuarios','salas','bloques']));

    }
}