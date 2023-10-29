<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Curso;
class Estudiante extends Model
{
    use HasFactory;
    
    static $rules = [
        'identificacion' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'curso_id' => 'required',
    ];

    protected $fillable = [
        'identificacion',
        'telefono' ,
        'direccion',
        'curso_id' => 'required',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id','id');
    }


}
