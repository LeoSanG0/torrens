@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                        <div class="card-blok">
                                            <h5>Usuarios</h5>
                                            @php
                                                use App\Models\User;
                                                $cant_users = User::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_users }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/users" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-blok">
                                            <h5>Tareas</h5>
                                            @php
                                                use App\Models\Task;
                                                $cant_tasks = Task::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-list f-left"></i><span>{{ $cant_tasks }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/tasks" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
