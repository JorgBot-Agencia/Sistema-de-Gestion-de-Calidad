@extends('layouts.app2')

@section('content')
<div class="container" style="background: #f1f1f2">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">
                    <img style="max-width: 230px; margin-top: 1em;" src="img/logoprocar.png">
                    <h3 style="font-weight: 600; color: #480012; text-transform: uppercase; margin-top: 1.5em;" >Sistema Int. Gestión</h3>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="proceso_id" class="col-md-4 control-label">Proceso</label>

                            <div class="col-md-6">
                                <select id="proceso_id" class="form-control" name="proceso_id" >
                                    @foreach($procesos as $proceso)
                                    <option value="{{$proceso->id}}">{{$proceso->nombre}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>


                          <div class="form-group">
                            <label for="proceso_id" class="col-md-4 control-label">Sub proceso</label>

                            <div class="col-md-6">
                                <select id="subproceso_id" class="form-control" name="subproceso_id" >
                                    @foreach($subprocesos as $subproceso)
                                    <option data-proceso="{{$subproceso->proceso_id}}" value="{{$subproceso->id}}">{{$subproceso->nombre}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="proceso_id" class="col-md-4 control-label">Privilegios</label>

                            <div class="col-md-6">
                                <select id="privilegios" class="form-control" name="privilegios" >
                                   
                                    <option value="1">Visualizar Indicadores</option>
                                    <option value="2">Visualizar y Rehistrar Indicadores</option>
                                    <option value="3">Visualizar y Rehistrar Indicadores y Usuarios</option>
                                    <option value="4">Administrador</option>
                                </select>
                                
                            </div>
                        </div>
            
            



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn" style="background: #a50029; color:#fff">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
