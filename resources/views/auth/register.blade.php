@extends('layouts.auth_app')
@section('title')
    Register
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Register</h4></div>

        <div class="card-body pt-1">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">Nombres</label><span
                                    class="text-danger">*</span>
                            <input id="fname" type="text"
                                   class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                   name="fname"
                                   tabindex="1" placeholder="Ingresa tus nombres" value="{{ old('fname') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('fname') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lname">Apellidos</label><span
                                    class="text-danger">*</span>
                            <input id="lname" type="text"
                                   class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                   name="lname"
                                   tabindex="1" placeholder="Ingresa tus apellidos" value="{{ old('lname') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('lname') }}
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Teléfono</label><span
                                    class="text-danger">*</span>
                            <input id="phone" type="phone"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                   placeholder="Ingrese su numero telefonico" name="phone" tabindex="1"
                                   value="{{ old('phone') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label><span
                                    class="text-danger">*</span>
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="Ingresa tu e-mail" name="email" tabindex="1"
                                   value="{{ old('email') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña
                                :</label><span
                                    class="text-danger">*</span>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                   placeholder="Ingresa tu contraseña" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation"
                                   class="control-label">Confirma tu contraseña</label><span
                                    class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirma tu contraseña"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                   name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Already have an account ? <a
                href="{{ route('login') }}">SignIn</a>
    </div>
@endsection
