@extends('template')

@section('title', 'Crear marca')

@push('css')
<style>
    #descripcion {
        resize: none;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Crear Proveedor</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
        <li class="breadcrumb-item active">Crear Proveedor</li>
    </ol>

    <div class="card">
        <form action="{{ route('proveedores.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="row g-4">
                    <!-- Campo para seleccionar la persona asociada al proveedor -->
                    <div class="col-md-6">
                        <label for="persona_id" class="form-label">Selecciona la persona:</label>
                        <select name="persona_id" id="persona_id" class="form-select">
                            <option value="" selected disabled>Selecciona una persona</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">{{ $persona->razon_social }}</option>
                            @endforeach
                        </select>
                        @error('persona_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

@endpush
