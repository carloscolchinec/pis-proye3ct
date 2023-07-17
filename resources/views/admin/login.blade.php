@extends('layout.adminlte_template')

@section('content')

<style>
    .card-login-form {
        min-height: 100vh;
        justify-content: center;
        align-items: center;
        display: flex;
    }
</style>

<div class="card-login-form">
    <div class="card card-primary w-25">
        <div class="card-body login-card-body">
            <h1 class="text-center"><strong>NEO</strong>HOYO</h1>
            <p class="login-box-msg">Iniciar sesión como administrador</p>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection