<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sal y Pimienta · Restaurante</title>
    <meta name="description" content="Sal y Pimienta: cocina de casa, hecha al momento.">

    {{-- Tipografías (si no hay internet, se usan las de respaldo) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;700&family=Young+Serif&display=swap" rel="stylesheet">

    <style>
        :root {
            --sal: #F3F5F4;
            --sal-borde: #D8DEDB;
            --blanco-sal: #FFFFFF;
            --pimienta: #2A2B2E;
            --pimienta-claro: #3C3E43;
            --chile: #A3281C;
            --gris: #6B6F72;
            --display: 'Young Serif', Georgia, 'Times New Roman', serif;
            --texto: 'Figtree', system-ui, -apple-system, 'Segoe UI', Arial, sans-serif;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }
        body { font-family: var(--texto); color: var(--pimienta); background: var(--sal); line-height: 1.6; }
        a { color: inherit; }
        a:focus-visible, .btn:focus-visible { outline: 3px solid var(--chile); outline-offset: 3px; }
        ul { list-style: none; }

        /* ---------- Barra superior ---------- */
        .barra { display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;
                 padding: 1rem 5vw; background: var(--sal); border-bottom: 1px solid var(--sal-borde); }
        .marca { font-family: var(--display); font-size: 1.3rem; text-decoration: none; }
        .barra nav { display: flex; gap: 1.5rem; }
        .barra nav a { text-decoration: none; font-weight: 500; padding: .25rem 0; border-bottom: 2px solid transparent; }
        .barra nav a:hover { border-bottom-color: var(--chile); }

        /* ---------- Portada dividida: sal / pimienta ---------- */
        .portada { position: relative; display: grid; grid-template-columns: 1fr 1fr; min-height: 75vh; }
        .mitad { display: flex; flex-direction: column; justify-content: flex-end; gap: 1.25rem; padding: 4rem 5vw 3.5rem; }
        .mitad h1, .mitad .palabra { font-family: var(--display); font-weight: 400; line-height: 1; font-size: clamp(2.8rem, 9vw, 7.5rem); }
        .mitad p { font-size: 1.15rem; max-width: 26ch; }
        .sal { background: var(--blanco-sal); color: var(--pimienta); }
        .pimienta { background: var(--pimienta); color: var(--sal); align-items: flex-end; text-align: right; }
        .y { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
             width: 4.5rem; height: 4.5rem; border-radius: 50%; background: var(--chile); color: #fff;
             display: grid; place-items: center; font-family: var(--display); font-size: 2.2rem; font-style: italic; }
        .btn { display: inline-block; padding: .8rem 1.5rem; font-weight: 700; text-decoration: none; border: 2px solid currentColor; }
        .sal .btn { background: var(--pimienta); color: var(--sal); border-color: var(--pimienta); }
        .sal .btn:hover { background: var(--chile); border-color: var(--chile); }
        .pimienta .btn:hover { background: var(--sal); color: var(--pimienta); }

        /* ---------- Secciones ---------- */
        section { padding: 5rem 5vw; }
        .contenedor { max-width: 1000px; margin: 0 auto; }
        h2 { font-family: var(--display); font-weight: 400; font-size: clamp(2rem, 5vw, 3rem); line-height: 1.1; margin-bottom: 2.5rem; }

        /* Menú */
        .menu-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem 4rem; }
        .categoria h3 { font-size: 1.1rem; color: var(--chile); padding-bottom: .5rem; border-bottom: 2px solid var(--pimienta); margin-bottom: 1.25rem; }
        .categoria li { margin-bottom: 1.1rem; }
        .fila { display: flex; align-items: baseline; gap: .6rem; }
        .nombre { font-weight: 700; }
        .puntos { flex: 1; border-bottom: 2px dotted var(--sal-borde); transform: translateY(-.25rem); }
        .precio { font-weight: 700; }
        .desc { color: var(--gris); font-size: .95rem; max-width: 40ch; }

        /* Nosotros */
        .nosotros { background: var(--pimienta); color: var(--sal); }
        .nosotros .contenedor { display: grid; grid-template-columns: 1fr 1.2fr; gap: 3rem; align-items: start; }
        .nosotros h2 { margin-bottom: 0; }
        .nosotros p { font-size: 1.1rem; max-width: 55ch; }
        .nosotros p + p { margin-top: 1rem; }

        /* Visítanos */
        .visita-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; }
        .visita-grid h3 { font-size: 1.1rem; color: var(--chile); margin-bottom: 1rem; }
        .horarios li { display: flex; justify-content: space-between; max-width: 22rem; padding: .4rem 0; border-bottom: 1px solid var(--sal-borde); }
        .contacto p { margin-bottom: .5rem; }
        .contacto a { font-weight: 700; }

        footer { padding: 1.5rem 5vw; background: var(--pimienta); color: var(--sal-borde); text-align: center; font-size: .9rem; border-top: 1px solid var(--pimienta-claro); }

        /* ---------- Celulares ---------- */
        @media (max-width: 760px) {
            .portada, .menu-grid, .nosotros .contenedor, .visita-grid { grid-template-columns: 1fr; }
            .mitad { min-height: 38vh; padding: 3rem 6vw 2.5rem; }
            .pimienta { align-items: flex-start; text-align: left; }
            .y { width: 3.5rem; height: 3.5rem; font-size: 1.8rem; }
            section { padding: 3.5rem 6vw; }
        }
    </style>
</head>
<body>

    <header class="barra">
        <a class="marca" href="/">Sal y Pimienta</a>
        <nav aria-label="Principal">
            <a href="#menu">Menú</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#visitanos">Visítanos</a>
            <a href="{{ route('platillos.index') }}">Administrar</a>
            {{-- Cuando tengas la ruta del formulario, agrega aquí: <a href="/crear-platillo">Agregar platillo</a> --}}
        </nav>
    </header>

    <main>
        {{-- ================= PORTADA ================= --}}
        <div class="portada">
            <div class="mitad sal">
                <h1>Sal</h1>
                <p>Cocina de casa, hecha al momento.</p>
                <div><a class="btn" href="#menu">Ver el menú</a></div>
            </div>
            <div class="mitad pimienta">
                <span class="palabra" aria-hidden="true">Pimienta</span>
                <p>Sazón guatemalteca, con carácter.</p>
                <div><a class="btn" href="#visitanos">Reservar mesa</a></div>
            </div>
            <div class="y" aria-hidden="true">y</div>
        </div>

        {{-- ================= MENÚ (se administra en /platillos) ================= --}}
        <section id="menu">
            <div class="contenedor">
                <h2>Nuestro menú</h2>
                <div class="menu-grid">
                    @forelse ($categorias as $categoria)
                        @if ($categoria->platillos->isNotEmpty())
                            <div class="categoria">
                                <h3>{{ $categoria->nombre }}</h3>
                                <ul>
                                    @foreach ($categoria->platillos as $platillo)
                                        <li>
                                            <div class="fila"><span class="nombre">{{ $platillo->nombre }}</span><i class="puntos"></i><span class="precio">Q{{ number_format($platillo->precio, 2) }}</span></div>
                                            @if ($platillo->descripcion)
                                                <p class="desc">{{ $platillo->descripcion }}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @empty
                        <p>El menú estará disponible pronto.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- ================= NOSOTROS (EDITA EL TEXTO) ================= --}}
        <section id="nosotros" class="nosotros">
            <div class="contenedor">
                <h2>Sobre nosotros</h2>
                <div>
                    <p>En Sal y Pimienta cocinamos lo básico bien hecho: buen producto, el punto justo de sal y una pizca de pimienta.</p>
                    <p>Cada platillo se prepara al momento y se sirve como en casa.</p>
                </div>
            </div>
        </section>

        {{-- ================= VISÍTANOS (EDITA HORARIOS Y DATOS) ================= --}}
        <section id="visitanos">
            <div class="contenedor visita-grid">
                <div>
                    <h2>Visítanos</h2>
                    <h3>Horarios</h3>
                    <ul class="horarios">
                        <li><span>Lunes a viernes</span><span>11:00 a 21:00</span></li>
                        <li><span>Sábado</span><span>11:00 a 22:00</span></li>
                        <li><span>Domingo</span><span>11:00 a 18:00</span></li>
                    </ul>
                </div>
                <div class="contacto">
                    <h3>Contacto</h3>
                    <p>Dirección: escribe aquí la dirección del restaurante.</p>
                    <p>Teléfono: <a href="tel:00000000">0000-0000</a></p>
                    <p>Correo: <a href="mailto:contacto@salypimienta.com">contacto@salypimienta.com</a></p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        © {{ date('Y') }} Sal y Pimienta. Todos los derechos reservados.
    </footer>

</body>
</html>
