<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    private function reglas(): array
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'nombre'       => 'required|string|max:100',
            'descripcion'  => 'nullable|string|max:255',
            'precio'       => 'required|numeric|min:0|max:99999',
        ];
    }

    public function index()
    {
        $platillos = Platillo::with('categoria')
            ->orderBy('categoria_id')->orderBy('nombre')->get();

        return view('platillos.index', compact('platillos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $platillo = new Platillo(['disponible' => true]);

        return view('platillos.create', compact('categorias', 'platillo'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());
        $datos['disponible'] = $request->boolean('disponible');

        Platillo::create($datos);

        return redirect()->route('platillos.index')->with('ok', 'Platillo guardado.');
    }

    public function edit(Platillo $platillo)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('platillos.edit', compact('categorias', 'platillo'));
    }

    public function update(Request $request, Platillo $platillo)
    {
        $datos = $request->validate($this->reglas());
        $datos['disponible'] = $request->boolean('disponible');

        $platillo->update($datos);

        return redirect()->route('platillos.index')->with('ok', 'Platillo actualizado.');
    }

    public function destroy(Platillo $platillo)
    {
        $platillo->delete();

        return redirect()->route('platillos.index')->with('ok', 'Platillo borrado.');
    }
}
