@extends('layouts.admin')
@section('titulo', 'Editar platillo')

@section('contenido')
    <h1>Editar platillo</h1>

    <form class="formulario" method="POST" action="{{ route('platillos.update', $platillo) }}">
        @csrf
        @method('PUT')
        @include('platillos._form')
        <div class="acciones">
            <button class="btn" type="submit">Guardar cambios</button>
            <a href="{{ route('platillos.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
