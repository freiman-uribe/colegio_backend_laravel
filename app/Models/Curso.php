<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'materia_id'
    ];
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'curso_materia', 'curso_id', 'materia_id');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

}
