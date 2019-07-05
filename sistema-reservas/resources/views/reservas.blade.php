@extends('layout')

@section('content')
<div class="x_panel">
                  <div class="x_title">
                    <h2>Reservas <small> en estado pendiente </small></h2>
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
                        </tr>
                      </thead>
                        @foreach($reservas as $re)
                        <tr>
                        <th scope="row">{{$re->id }}</th>
                        <td>{{$re->asignatura }}</td>
                        <td>{{$re->refPersona}}</td>
                        <td>{{$re->estado }}</td>
                        <td>{{$re->fechaSolicitud}}</td>
                        </tr>
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
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($instanciasReservas as $ir)
                        <tr>
                          <th scope="row">{{$ir->refReserva}}</th>
                          <td>{{$ir->refSala}}</td>
                          <td>{{$ir->dia }}</td>
                          <td>{{$ir->bloqueInicial}}</td>
                          <td>{{$ir->bloqueFinal}}</td>
                          <td>{{$ir->fechaInicial}}</td>
                          <td>{{$ir->fechaFinal}}</td>

                          
                        </tr>
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
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Rut Estudiante / Profesor </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control">
                                @foreach($usuarios as $us)
                                <option> {{ $us->rut.' | '.$us->nombre.' '.$us->apellidoPaterno}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Asignatura / Razon </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Numero Reserva  </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control">
                              @foreach($reservas as $re)
                                <option>{{$re->id}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sala </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control">
                            @foreach($salas as $sa)
                                <option>{{$sa->nombre}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Dia </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control">
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
                            <select class="form-control">
                              @foreach($bloques as $bloque)
                                <option>{{$bloque->id}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Bloque Final</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control">
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
                                  <input type="text"  name="reservation" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016" />
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
@endsection

