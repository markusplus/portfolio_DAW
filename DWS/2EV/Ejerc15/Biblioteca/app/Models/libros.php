<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;
    public function autor {
        return $this->belongsTo(Autor::class);
    }

    public function prestamos {
        return $this->hasMany(Prestamo::class);
    }
}
