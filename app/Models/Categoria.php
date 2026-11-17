<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'orden'];

    public function platillos()
    {
        return $this->hasMany(Platillo::class);
    }
}
