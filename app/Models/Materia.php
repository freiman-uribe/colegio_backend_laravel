<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
        // return $this->belongsToMany(Curso::class, 'curso_materia', 'materia_id', 'curso_id')
        //          ->withPivot('curso_id', 'materia_id')
        //          ->withTimestamps();
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
