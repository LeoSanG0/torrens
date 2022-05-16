@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Creación de usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Todos los campos son obligatorios!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">%times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                            {{-- Input for fname --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fname">Nombres</label>
                                    {!! Form::text('fname', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for lname --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="lname">Apellidos</label>
                                    {!! Form::text('lname', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for phone --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for email --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for Status
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="status">Estado</label>
                                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                                </div>
                            </div> --}}
                            {{-- Input for password --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for password --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="confirm-password">Confirmar Contraseña</label>
                                    {!! Form::text('confirm-password', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for Role
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                                </div>
                            </div> --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
