<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //especisifca que campos NO se pueden agregar masivamente

    public function estudiante(){
        return $this->hasMany(Estudiante::class,'id');
        //una carrera tiene muchos estudiantes
    }

    public function division(){
        return $this->belongsTo(Divisione::class,'id_division');
        //una carrera pertenece a una Division
    }

}
