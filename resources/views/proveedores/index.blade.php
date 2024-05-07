@extends('template')

@section('title', 'Proveedores')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Proveedores</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Proveedores</li>
    </ol>
    
    <!-- Botón para añadir un nuevo proveedor -->
    <div class="mb-4">
        <a href="{{ route('proveedores.create') }}">
            <button type="button" class="btn btn-primary">Añadir nuevo proveedor</button>
        </a>
    </div>

    <!-- Tabla para mostrar la lista de proveedores -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla Proveedores
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Razón Social</th>
                        <th>Dirección</th>
                        <th>Tipo de Persona</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iterar sobre los proveedores y mostrar la información -->
                    @foreach ($proveedores as $proveedore)
                        <tr>
                            <td>{{ $proveedore->persona->razon_social }}</td>
                            <td>{{ $proveedore->persona->direccion }}</td>
                            <td>{{ $proveedore->persona->tipo_persona }}</td>
                            <td>{{ $proveedore->persona->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <!-- Enlace para editar el proveedor -->
                                <a href="{{ route('proveedores.edit', ['proveedore' => $proveedore->id]) }}" class="btn btn-warning">Editar</a>
                                <!-- Formulario para eliminar el proveedor -->
                                <form action="{{ route('proveedores.destroy', ['proveedore' => $proveedore->id]) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <!-- Enlace al archivo JavaScript para la funcionalidad de DataTables -->
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush
