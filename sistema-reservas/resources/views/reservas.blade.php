@extends('layout')

@section('content')
<div class="x_panel">
                  <div class="x_title">
                    <h2>Reservas </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Asignatura / Razon </th>
                          <th>Persona </th>
                          <th>Estado </th>
                          <th>Fecha Solicitud</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                        @foreach($reservas as $re)
                        <form method="POST" action="/eliminarReserva">
                        @csrf
                        <tr>
                          <th scope="row">{{$re->id }}</th>
                          <input type="hidden" name="reservaEliminar" value="{{$re->id}}">
                          <td>{{$re->asignatura }}</td>
                          <td>{{$re->refPersona}}</td>
                          <td>{{$re->estado }}</td>
                          <td>{{$re->fechaSolicitud}}</td>
                          <th>
                            <button type="submit" class="btn btn-danger btn-xs">x</button>
                          </th>
                          </tr>
                        </form>
                        @endforeach
                    </table>
                  </div>
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reservas <small> Instancias  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Ref Reserva </th>
                          <th>Sala </th>
                          <th>Dia </th>
                          <th>Bloque Inicial </th>
                          <th>Bloque Final </th>
                          <th>Fecha Inicial </th>
                          <th>Fecha Final </th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($instanciasReservas as $ir)
                        <form method="POST" action="/eliminarInstanciaReserva">
                        @csrf
                        <input type="hidden" name="refReserva"    value="{{$ir->refReserva}}">
                        <input type="hidden" name="refSala"       value="{{$ir->refSala}}">
                        <input type="hidden" name="dia"           value="{{$ir->dia}}">
                        <input type="hidden" name="bloqueInicial" value="{{$ir->bloqueInicial}}">
                        <input type="hidden" name="bloqueFinal"   value="{{$ir->bloqueFinal}}">
                        <input type="hidden" name="fechaInicial"  value="{{$ir->fechaInicial}}">
                        <input type="hidden" name="fechaFinal"    value="{{$ir->fechaFinal}}">
                        <tr>
                          <th scope="row">{{$ir->refReserva}}</th>
                          <td>{{$ir->refSala}}</td>
                          <td>{{$ir->dia }}</td>
                          <td>{{$ir->bloqueInicial}}</td>
                          <td>{{$ir->bloqueFinal}}</td>
                          <td>{{$ir->fechaInicial}}</td>
                          <td>{{$ir->fechaFinal}}</td>
                          <th>
                            <button type="submit" class="btn btn-danger btn-xs">x</button>
                          </th>
                        </tr>
                        </form>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                    <h2>Ingresar Nueva Reserva </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li>
                            <a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="POST" action="/reservas">
                    @csrf
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"> Rut Estudiante / Profesor </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="reservador">
                                @foreach($usuarios as $us)
                                <option> {{ $us->rut.' | '.$us->nombre.' '.$us->apellidoPaterno}}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Asignatura / Razon </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="first-name" required="required"  name="asignatura" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-primary">Cancelar </button>
						                <button class="btn btn-primary" type="reset">Limpiar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                

                <div class="x_panel">
                    <div class="x_title">
                    <h2>Ingresar Nueva Instancia Reserva </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li>
                            <a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="POST" action="/insertarInstaciaReserva">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Numero Reserva  </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="reserva" >
                              @foreach($reservas as $re)
                                <option>{{$re->id}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sala </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="sala">
                            @foreach($salas as $sa)
                                <option>{{$sa->nombre}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Dia </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="dia">
                                <option> Lunes </option>
                                <option> Martes </option>
                                <option> Miercoles </option>
                                <option> Jueves </option>
                                <option> Viernes </option>
                                <option> Sabado </option>
                                <option> Domingo </option>

                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Bloque Inicio </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="bloqueInicio">
                              @foreach($bloques as $bloque)
                                <option>{{$bloque->id}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Bloque Final</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="bloqueFinal" >
                               @foreach($bloques as $bloque)
                                <option>{{$bloque->id}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fecha </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text"  name="fecha" id="reservation" class="form-control" value="01/01/2019 - 01/25/2019" />
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary">Cancelar </button>
						                <button class="btn btn-primary" type="reset">Limpiar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Aprobar Reserva</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" method="POST" action="/aprobarReserva">
                    @csrf

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"> Reserva </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="refReserva">
                        @foreach($reservas as $reserva)
                          @if($reserva->estado == 'Pendiente')
                            <option>{{$reserva->asignatura." || ID: ".$reserva->id}}</option>
                          @endif
                        @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-primary">Cancelar </button>
                              <button type="submit" class="btn btn-success">Aprobar</button>
                            </div>
                        </div>




                    </form>
                  </div>
                </div>
@endsection

