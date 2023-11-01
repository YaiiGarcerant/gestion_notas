<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;

class Materias extends Model
{
    use HasFactory;

    static $rules = [
        'nombre' => 'required|string', 
        'profesor_id' => 'required',
    ];

    protected $fillable = [
        'nombre',
        'profesor_id',
    ];

    public function profesor(){
        return $this->belongsTo(Profesor::class, 'profesor_id','id');
    }


}
