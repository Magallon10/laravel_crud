<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Proyecto extends Model
{
    /** @use HasFactory<\Database\Factories\ProyectoFactory> */
    use HasFactory;
    public $fillable=["titulo","horas_previstas","fecha_inicio"];

    public function alumno(){
        return $this->hasMany(Alumno::class);
    }

}
