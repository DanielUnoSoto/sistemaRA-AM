@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="codsis" class="col-md-4 control-label">Codigo SIS</label>

                            <div class="col-md-6">
                                <input id="codsis" type="text" class="form-control" name="codsis" value="{{ old('codsis') }}" required autofocus>

                                @if ($errors->has('codsis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codsis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Tipo Usuario</label>

                            <div class="col-md-6">
                                <select id="password-confirm"  class="form-control" name="tipoUsuario" required>
                                    <option selected>Selecsion el tipo de usuario</option>
                                        {{-- @foreach($usuarios as $key => $usuario)
                                            <option>
                                                {{ $usuario}}
                                            </option>
                                        @endforeach --}}
                                        <option value="1">Docente</option>
                                        <option value="2">Auxiliar Docencia</option>
                                        <option value="3">Jefe-Departamento</option>
                                </select>
                            </div>
                        </div> -->

                    <!-- {{-- <div class="form-group">
                            <label for="tipoUsuario" class="col-md-4 control-label">Tipo de Usuario</label>

                            <div class="col-md-6">
                                <select id="tipoUsuaario" type="text" class="form-control" name="tipoUsuario" value="{{ old('TipoUsuario') }}" required autofocus>

                                @if ($errors->has('tipoUsuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipoUsuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}} -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
