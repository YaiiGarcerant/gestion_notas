<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Programas;

class Curso extends Model
{
    use HasFactory;

    static $rules = [
        'nombre' => 'required|string', 
        'profesor_id' => 'required',
        'programa_id' => 'required',
    ];

    protected $fillable = [
        'nombre',
        'profesor_id',
        'programa_id',
    ];

    public function programas(){
        return $this->hasOne(Programas::class, 'id','programa_id');
    }

    public function profesor(){
        return $this->hasOne(Profesor::class, 'id','profesor_id');
    }
}
