<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'curso_id'
    ];

    public function cursos()
    {
        return $this->belongsTo(Curso::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
