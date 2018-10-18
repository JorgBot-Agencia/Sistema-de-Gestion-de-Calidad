@extends('layouts.app2')

@section('content')
<div class="container" style="background: #f1f1f2">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="background: #ffe6e6; border-color: #ffdee6;">

                <div class="panel-heading" style="text-align: center;">
                    <img style="max-width: 230px; margin-top: 1em;" src="img/logoprocar.png">
                    <h3 style="font-weight: 600; color: #480012; text-transform: uppercase; margin-top: 1.5em;" >Sistema Int. Gestión</h3>
                </div>

                <div class="panel-body" style="padding: 25px;">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="input-group" >
                        <div  class="input-group-addon">

                       <span style="font-size: 22px; width: 25px" class="glyphicon glyphicon-envelope" ></span>
                        </div>
                     <input id="email" type="email" placeholder="E-mail Procar" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    </div>
                      @if ($errors->has('email'))
                                                            <span class="help-block" style="background: none">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                </div>




             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group" >
                        <div  class="input-group-addon">

                       <span style="font-size: 22px; width: 25px" class="glyphicon glyphicon-asterisk" ></span>
                        </div>
                     <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" required>

                    </div>
                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>


                        <div class="form-group">
                            <div style="text-align: center;">
                                <div class="checkbox">
                                    <label style="color: #000">
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="text-align: center;">
                                <button type="submit" class="btn col-md-6 col-md-offset-3" style="background: #a50029; color:#fff">
                                    Inciar Sesión
                                </button>

                                <a style="display: none" class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
