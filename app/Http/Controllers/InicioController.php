<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class InicioController extends Controller
{
    // Página pública: muestra el menú leyendo la base de datos
    public function index()
    {
        $categorias = Categoria::with(['platillos' => function ($q) {
            $q->where('disponible', true)->orderBy('nombre');
        }])->orderBy('orden')->orderBy('nombre')->get();

        return view('welcome', compact('categorias'));
    }
}
