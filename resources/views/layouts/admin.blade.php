<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') · Sal y Pimienta</title>
    <style>
        :root { --sal:#F3F5F4; --borde:#D8DEDB; --pimienta:#2A2B2E; --chile:#A3281C; --gris:#6B6F72; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, -apple-system, 'Segoe UI', Arial, sans-serif; background: var(--sal); color: var(--pimienta); line-height: 1.5; }
        header { background: var(--pimienta); color: var(--sal); padding: .9rem 5vw; display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap; }
        header strong { font-family: Georgia, serif; font-size: 1.2rem; margin-right: auto; }
        header a { color: var(--sal); text-decoration: none; }
        header a:hover { text-decoration: underline; }
        main { max-width: 900px; margin: 2rem auto; padding: 0 5vw; }
        h1 { font-family: Georgia, serif; font-weight: 400; font-size: 2rem; margin-bottom: 1.25rem; }
        h2 { font-size: 1.1rem; margin: 2rem 0 .75rem; }
        .encabezado { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1rem; }
        .encabezado h1 { margin-bottom: 0; }
        .btn, button.btn { display: inline-block; background: var(--pimienta); color: #fff; border: 0; padding: .6rem 1.2rem; font: inherit; font-weight: 700; text-decoration: none; cursor: pointer; }
        .btn:hover { background: var(--chile); }
        a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible { outline: 3px solid var(--chile); outline-offset: 2px; }
        .aviso { background: #E3F1E6; border-left: 4px solid #2E7D32; padding: .75rem 1rem; margin-bottom: 1rem; }
        .vacio { background: #fff; border: 1px dashed var(--borde); padding: 1.5rem; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { text-align: left; padding: .65rem .8rem; border-bottom: 1px solid var(--borde); vertical-align: middle; }
        th { background: #E8ECEA; font-size: .9rem; }
        .formulario { background: #fff; border: 1px solid var(--borde); padding: 1.5rem; display: grid; gap: 1rem; }
        label { font-weight: 700; display: block; margin-bottom: .25rem; }
        input[type=text], input[type=number], select, textarea { width: 100%; padding: .6rem; border: 1px solid #9AA3A0; font: inherit; background: #fff; }
        .check { display: flex; align-items: center; gap: .5rem; }
        .check label { margin: 0; font-weight: 500; }
        .error { color: var(--chile); font-size: .9rem; display: block; margin-top: .25rem; }
        .acciones { display: flex; align-items: center; gap: 1.25rem; }
        .acciones a, td a { color: var(--chile); }
        .en-linea { display: inline; }
        .enlace { background: none; border: 0; color: var(--chile); font: inherit; cursor: pointer; text-decoration: underline; padding: 0; margin-left: .75rem; }
        .fila-form { display: grid; grid-template-columns: 2fr 1fr auto; gap: 1rem; align-items: end; }
        @media (max-width: 640px) { .fila-form { grid-template-columns: 1fr; } table { font-size: .9rem; } }
    </style>
</head>
<body>
    <header>
        <strong>Sal y Pimienta · Administración</strong>
        <a href="{{ route('inicio') }}">Ver página</a>
        <a href="{{ route('platillos.index') }}">Platillos</a>
        <a href="{{ route('categorias.index') }}">Categorías</a>
    </header>

    <main>
        @if (session('ok'))
            <div class="aviso" role="status">{{ session('ok') }}</div>
        @endif

        @yield('contenido')
    </main>
</body>
</html>
