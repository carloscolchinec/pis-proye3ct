@extends('layout.adminlte_admin')

@section('content')

<div class="py-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Empresa</h3>
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('admin.crear-empresa') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name_enterprise" class="form-label">Nombre de la Empresa</label>
                    <input type="text" class="form-control" id="name_enterprise" name="name_enterprise" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" readonly>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="password" name="password" readonly>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('name_enterprise').addEventListener('input', function() {
        generarUsuarioContrasena();
    });



    function generarUsuarioContrasena() {
        var nombreEmpresa = document.getElementById('name_enterprise').value;
        var usuario = generarUsuario(nombreEmpresa);
        var contraseña = generarContrasena();
        document.getElementById('username').value = usuario;
        document.getElementById('password').value = contraseña;
    }

    function generarUsuario(nombre) {
        // Eliminar espacios y convertir a minúsculas
        nombre = nombre.replace(/\s+/g, '_').toLowerCase();
        // Eliminar caracteres especiales
        nombre = nombre.replace(/[^\w\s]/gi, '');
        // Agregar un número aleatorio al final
        var numeroAleatorio = Math.floor(Math.random() * 100);
        nombre += numeroAleatorio;
        return nombre;
    }



    function generarContrasena() {
        var caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
        var contraseña = '';
        for (var i = 0; i < 10; i++) {
            contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        }
        return contraseña;
    }
</script>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush