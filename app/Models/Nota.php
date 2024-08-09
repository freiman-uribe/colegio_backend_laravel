<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'materia_id',
        'descripcion',
        'nota'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function cursos()
    {
        return $this->belongsTo(Curso::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
