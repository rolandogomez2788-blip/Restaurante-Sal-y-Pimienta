<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('platillos')
            ->orderBy('orden')->orderBy('nombre')->get();

        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:60|unique:categorias,nombre',
            'orden'  => 'nullable|integer|min:0|max:999',
        ]);
        $datos['orden'] = $datos['orden'] ?? 0;

        Categoria::create($datos);

        return redirect()->route('categorias.index')->with('ok', 'Categoría guardada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete(); // también borra sus platillos (cascadeOnDelete)

        return redirect()->route('categorias.index')->with('ok', 'Categoría borrada.');
    }
}
