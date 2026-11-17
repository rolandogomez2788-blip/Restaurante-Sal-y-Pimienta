<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $fillable = ['categoria_id', 'nombre', 'descripcion', 'precio', 'disponible'];

    protected $casts = [
        'precio' => 'decimal:2',
        'disponible' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
