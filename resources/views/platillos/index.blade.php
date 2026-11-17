@extends('layouts.admin')
@section('titulo', 'Platillos')

@section('contenido')
    <div class="encabezado">
        <h1>Platillos</h1>
        <a class="btn" href="{{ route('platillos.create') }}">Nuevo platillo</a>
    </div>

    @if ($platillos->isEmpty())
        <p class="vacio">Aún no hay platillos. Crea el primero con «Nuevo platillo».</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($platillos as $platillo)
                    <tr>
                        <td>{{ $platillo->nombre }}</td>
                        <td>{{ $platillo->categoria->nombre }}</td>
                        <td>Q{{ number_format($platillo->precio, 2) }}</td>
                        <td>{{ $platillo->disponible ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('platillos.edit', $platillo) }}">Editar</a>
                            <form class="en-linea" method="POST" action="{{ route('platillos.destroy', $platillo) }}"
                                  onsubmit="return confirm('¿Borrar este platillo?')">
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
