@extends('layout')

@section('content')

<div class="row">
    <!-- Input -->
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Salas <small>  </small></h2>
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
                            <th>Nombre </th>
                            <th>Tipo  </th>
                            <th>Edificio  </th>
                            <th>Capacidad </th>
                            <th>Acciones </th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($salas as $sa)
                        <tr>
                          <form method="POST" action="/eliminarSala">
                          @csrf
                          <input type="hidden" name="refSala"    value="{{$sa->nombre}}">
                          <th scope="row">
                          <label >{{$sa->nombre}}</label>
                          </th>
                            <td>  {{$sa->tipo}}</td>
                            <td>  {{$sa->refEdificio}}</td>
                            <td>  {{$sa->refEdificio}}</td>
                            <th>
                                <button type="submit" class="btn btn-danger btn-xs">x</button>
                            </th>
                          </form>
                        </tr>

                        @endforeach
                      </tbody>  
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Insumos <small>  </small></h2>
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
                            <th>Nombre</th>
                            <th>Tipo </th>
                            <th>Costo </th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($insumos as $in)
                        <tr>
                          <form method="POST" action="/eliminarUsuario">
                          @csrf
                          <th scope="row">
                          <label >{{$in->nombre}}</label>
                          </th>
                            <td>  {{$in->tipo}}</td>
                            <td>  {{$in->costo}}</td>
                            <th>
                                <button type="submit" class="btn btn-danger btn-xs">x</button>
                            </th>
                          </form>
                        </tr>
                        @endforeach
                      </tbody>  
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div >
        <div class="x_panel">
            <div class="x_title">
                <h2>Agregar Sala </h2>
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
                <form class="form-horizontal form-label-left input_mask" method="POST" action="/insertarSala">
                @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nombre Sala  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rut" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Nombre Sala " required="required" type="text">
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Edificio </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" name="edificio">
                            @foreach($edificios as $ed)
                                <option>{{$ed->nombre}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tipo </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" name="tipo">
                                <option>Clases </option>
                                <option>Laboratorio</option>
                                <option>Multiuso</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Capacidad  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rut" class="form-control col-md-7 col-xs-12" placeholder="Capacidad de la sala " name="capacidad" required="required" type="number">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar </button>
                          <button id="send" type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>

    <div >
        <div class="x_panel">
            <div class="x_title">
                <h2>Agregar Insumo </h2>
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
                <form class="form-horizontal form-label-left input_mask" method="POST" action="/insertarInsumo">
                @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nombre Insumo  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rut" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Nombre Insumo" required="required" type="text">
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tipo </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" name="tipo">
                                <option>Campus </option>
                                <option>DTI</option>
                                <option>Casino</option>
                                <option>Gimnasio</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Costo  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rut" class="form-control col-md-7 col-xs-12" placeholder="Costo de insumo" name="costo" required="required" type="number">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar </button>
                          <button id="send" type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
    
</div>




   
@endsection

