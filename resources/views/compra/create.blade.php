@extends('template')

@section('title','Crear compra')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Crear Marca</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('compras.index')}}">Marcas</a></li>
        <li class="breadcrumb-item active">Crear compra</li>
    </ol>
</div>
<form action="" method="post">
    @csrf

    <div class="container mt-4">
        <div class="row gy-4">
            <!--compra producto-->
            <div class="col-md-8">
                <div class="text-white bg-primary p-1 text-center">
                    Detalles de la compra
                </div>
                <div class="p-3 border border-3 border-primary">

                </div>
            </div>
            <!--Producto-->
            <div class="col-md-4">
                <div class="text-white bg-success p-1 text-center">
                    Datos generales
                </div>
                <div class="p-3 border border-3 border-success">
                    <div class="row">
                        <label for="proveedore_id" class="form-label">Proveedor:</label>
                        <select name="proveedore_id" id="proveedore_id">
                            @foreach ($proveedores as $item)
                                <option value="{{$item->id}}">{{$item->persona->razon_social}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>

</form>
@endsection

@push('js')

@endpush