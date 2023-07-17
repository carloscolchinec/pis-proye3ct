@extends('layout.adminlte_enterprise')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Clientes</h3>
    </div>
    <div class="card-body">
        <table id="clients-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Dirección</th>
                    <th>Fecha de Nacimiento</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nombre }}</td>
                    <td>{{ $client->apellido }}</td>
                    <td>{{ $client->cedula }}</td>
                    <td>{{ $client->telefono }}</td>
                    <td>{{ $client->correo_electronico }}</td>
                    <td>{{ $client->direccion }}</td>
                    <td>{{ $client->fecha_nacimiento }}</td>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#clients-table').DataTable();
});
</script>
@endpush
