@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Creación de tareas</h3>
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

                            {!! Form::open(['route' => 'tasks.store', 'method' => 'POST']) !!}
                            {{-- Input for task description --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            {{-- Input for task status --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="status">Estado</label>
                                    {!! Form::select('status', ['Aceptada' => 'Aceptada','En curso' => 'En curso','En revisión' => 'En revisión', 'Finalizada' => 'Finalizada','Rechazada' => 'Rechazada'],null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="assigned_to">Asignar a:</label>
                                    {!! Form::select('assigned_to', $users, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>


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
