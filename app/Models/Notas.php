<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estudiante;
use App\Models\Materias;
class Notas extends Model
{
    use HasFactory;

    static $rules = [
        'materia_id' => 'required',
        'estudiante_id' => 'required',
        'primera_nota' => 'required',
        'segunda_nota' => 'required',
        'tercera_nota' => 'required',
        'observaciones'=> 'required',
    ];

    protected $fillable = [
        'estudiante_id',
        'materia_id',
        'primera_nota',
        'segunda_nota' ,
        'tercera_nota',
        'observaciones',
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class, 'estudiante_id','id');
    }

    public function materia(){
        return $this->belongsTo(Materias::class, 'materia_id','id');
    }


}
