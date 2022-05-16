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
                        <br>
                        <div class="table-responsive">
                            <br>
                            <table id="table_user" class="table table-striped mt-2">
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('users.destroy')
    @section('scripts')
        <script src="/js/users/index.js"></script>
    @endsection
@endsection 



