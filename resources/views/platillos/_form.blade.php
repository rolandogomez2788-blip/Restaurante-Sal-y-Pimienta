<div>
    <label for="categoria_id">Categoría</label>
    <select id="categoria_id" name="categoria_id" required>
        <option value="">Elige una categoría</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" @selected(old('categoria_id', $platillo->categoria_id) == $categoria->id)>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
    @error('categoria_id') <small class="error">{{ $message }}</small> @enderror
</div>

<div>
    <label for="nombre">Nombre del platillo</label>
    <input type="text" id="nombre" name="nombre" maxlength="100" required value="{{ old('nombre', $platillo->nombre) }}">
    @error('nombre') <small class="error">{{ $message }}</small> @enderror
</div>

<div>
    <label for="descripcion">Descripción (opcional)</label>
    <textarea id="descripcion" name="descripcion" rows="3" maxlength="255">{{ old('descripcion', $platillo->descripcion) }}</textarea>
    @error('descripcion') <small class="error">{{ $message }}</small> @enderror
</div>

<div>
    <label for="precio">Precio (Q)</label>
    <input type="number" id="precio" name="precio" step="0.01" min="0" required value="{{ old('precio', $platillo->precio) }}">
    @error('precio') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="check">
    <input type="checkbox" id="disponible" name="disponible" value="1"
           {{ (old() ? old('disponible') : $platillo->disponible) ? 'checked' : '' }}>
    <label for="disponible">Disponible en el menú</label>
</div>
