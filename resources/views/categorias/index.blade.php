@extends('layouts.admin')
@section('titulo', 'Categorías')

@section('contenido')
    <h1>Categorías</h1>

    <form class="formulario" method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="fila-form">
            <div>
                <label for="nombre">Nombre de la categoría</label>
                <input type="text" id="nombre" name="nombre" maxlength="60" required value="{{ old('nombre') }}">
                @error('nombre') <small class="error">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="orden">Orden en el menú</label>
                <input type="number" id="orden" name="orden" min="0" max="999" value="{{ old('orden', 0) }}">
                @error('orden') <small class="error">{{ $message }}</small> @enderror
            </div>
            <button class="btn" type="submit">Agregar</button>
        </div>
    </form>

    <h2>Categorías guardadas</h2>

    @if ($categorias->isEmpty())
        <p class="vacio">Aún no hay categorías. Agrega la primera con el formulario de arriba.</p>
    @else
        <table>
            <thead>
                <tr><th>Orden</th><th>Nombre</th><th>Platillos</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->orden }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->platillos_count }}</td>
                        <td>
                            <form class="en-linea" method="POST" action="{{ route('categorias.destroy', $categoria) }}"
                                  onsubmit="return confirm('Se borrarán también los platillos de esta categoría. ¿Continuar?')">
                                @csrf
                                @method('DELETE')
                                <button class="enlace" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
