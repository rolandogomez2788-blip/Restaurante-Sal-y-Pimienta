<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UFT-8">
    <title>Agregar platillo - sal y pimienta</title>
    <style>
        body { background-color: #0a0a0a; color: #EDEDEC; font-family: sans-serif; padding: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #FDFDFC; }
        input { width: 300px; padding: 8px; background: #1b1b1b; border: 1px solid #191414; color: #fff; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #EDEDEC; border: none; cursor: pointer; font-weight: bold; border-radius: 4px; color: #000; }
    </style>
</head>
<body>

    <h1>🥗 Registrar Nuevo Platillo - Sal y Pimienta</h1>
    <form action="{{ route('platillos.guardar') }}" method="POST">
        <!-- Token obligatorio de Laravel para que no dé error 419 -->
        @csrf 
<div class="form-group">
            <label for="nombre">Nombre del platillo:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Ej. Lomo al trapo">
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required placeholder="Ej. 75.00">
        </div>

        <button type="submit">Guardar en Base de Datos</button>
    </form>

</body>