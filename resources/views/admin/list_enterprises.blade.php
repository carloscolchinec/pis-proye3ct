@extends('layout.adminlte_admin')

@section('content')

<div class="py-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Usuarios</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.agregar-empresa') }}" class="btn btn-primary">Crear nuevo negocio</a>
            </div>
            <table id="users-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Negocio</th>
                        <th>Fecha de Creación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se iteran los usuarios para mostrarlos en la tabla -->
                    @foreach ($usersEnterprises as $user)
                    <tr>
                        <td>{{ $user->enterprise_id }}</td>
                        <td>{{ $user->name_enterprise }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal{{ $user->enterprise_id }}">Ver Usuario y Contraseña</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modales para mostrar el usuario y contraseña -->
            @foreach ($usersEnterprises as $user)
            <div class="modal fade" id="userModal{{ $user->enterprise_id }}" tabindex="-1" aria-labelledby="userModal{{ $user->enterprise_id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModal{{ $user->enterprise_id }}Label">Usuario y Contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Usuario:</strong> {{ $user->username }}</p>
                            <p><strong>Contraseña:</strong> {{ $user->password }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
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
        $('#users-table').DataTable();
    });
</script>
@endpush