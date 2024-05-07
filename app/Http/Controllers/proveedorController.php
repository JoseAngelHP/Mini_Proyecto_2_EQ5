<?php

namespace App\Http\Controllers;
use App\Models\Persona;

use Illuminate\Http\Request;
use App\Models\Proveedore;

class proveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedore::with('persona')->get();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('proveedores.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $proveedor = Proveedore::create($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente');
    }

    public function edit(Proveedore $proveedor)
    {
        $personas = Persona::all();
        return view('proveedores.edit', compact('proveedor', 'personas'));
    }

    public function update(Request $request, Proveedore $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Proveedore $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
