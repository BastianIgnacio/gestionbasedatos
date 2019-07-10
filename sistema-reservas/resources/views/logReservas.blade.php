@extends('layout')

@section('content')
<div class="row">
    <!-- Input -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reservas Eliminadas<small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                            </ul>
                        </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asignatura  </th>
                            <th>Estado </th>
                            <th>Persona  </th>
                            <th>Fecha solicitud </th>
                            <th>Fecha Eliminacion </th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($reservasEliminadas as $re)
                        <tr>
                          
                          <th scope="row">
                          <label >{{$re->id}}</label>
                          </th>
                            <td>  {{$re->asignatura}}</td>
                            <td>  {{$re->estado}}</td>
                            <td>  {{$re->refPersona}}</td>
                            <td>  {{$re->fechaSolicitud}}</td>
                            <td>  {{$re->time}}</td>
                        </tr>

                        @endforeach
                      </tbody>  
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Instancias Reservas Eliminadas <small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                            </ul>
                        </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Reserva</th>
                            <th>Dia </th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Bloque Inicial</th>
                            <th>Bloque Final</th>
                            <th>Sala</th>
                            <th>Fecha Eliminacion</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($instanciasEliminadas as $ri)
                        <tr>
                         
                          <th scope="row">
                          <label >{{$ri->refReserva}}</label>
                          </th>
                            <td>  {{$ri->dia}}</td>
                            <td>  {{$ri->fechaInicial}}</td>
                            <td>  {{$ri->fechaFinal}}</td>
                            <td>  {{$ri->bloqueInicial}}</td>
                            <td>  {{$ri->bloqueFinal}}</td>
                            <td>  {{$ri->refSala}}</td>
                            <td>  {{$ri->time}}</td>
                        </tr>
                        @endforeach
                      </tbody>  
                </table>
            </div>
        </div>
    </div>
</div>





   
@endsection