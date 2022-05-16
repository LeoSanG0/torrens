@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tareas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                                <a class="btn btn-warning" style="color: azure" href="{{ route('tasks.create') }}">Nuevo</a>

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #f56200">
                                    <th style="color:#fff">Descripción</th>
                                    <th style="color:#fff">Estado</th>
                                    <th style="color:#fff">Asignada a</th>
                                    <th style="color:#fff">Creada por</th>
                                    <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->status }}</td>                                            
                                            <td>{{ $task->assignedTo->fullname }}</td>
                                            <td>{{ $task->ownerTask->fullname }}</td>
                                            <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('tasks.edit', $task->id) }}">Editar</a>

                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $tasks->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
