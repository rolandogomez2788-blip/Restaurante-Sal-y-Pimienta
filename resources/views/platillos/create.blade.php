@extends('layouts.admin')
@section('titulo', 'Nuevo platillo')

@section('contenido')
    <h1>Nuevo platillo</h1>

    @if ($categorias->isEmpty())
        <p class="vacio">Primero crea una categoría (por ejemplo, «Entradas»).
            <a href="{{ route('categorias.index') }}">Ir a categorías</a></p>
    @else
        <form class="formulario" method="POST" action="{{ route('platillos.store') }}">
            @csrf
            @include('platillos._form')
            <div class="acciones">
                <button class="btn" type="submit">Guardar platillo</button>
                <a href="{{ route('platillos.index') }}">Cancelar</a>
            </div>
        </form>
    @endif
@endsection
