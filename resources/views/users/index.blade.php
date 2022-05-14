@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <br>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <a class="btn btn-warning" href="{{ route('users.create') }}">Nuevo</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #f56200;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">Nombre completo</th>
                                    <th style="color: #fff;">Teléfono</th>
                                    <th style="color: #fff;">e-mail</th>
                                    <th style="color: #fff;">Estado</th>
                                    <th style="color: #fff;">e-mail</th>
                                    <th style="color: #fff;">Acciones</th>
                                <tbody>
                                </tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td style="display: none;">{{ $user->id }}</td>
                                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $roleName)
                                                    <h5><span class="badge badge-dark">{{ $roleName }}</span></h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ route('users.edit', $user->id) }}">Editar</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </thead>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $users->links() !!}
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('users.destroy')
@section('scripts')
    <script src="{{ asset('js/users/index.js') }}"></script>
@endsection
@endsection
