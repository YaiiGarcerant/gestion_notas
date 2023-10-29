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
        'user_id' => 'required',
        'curso_id' => 'required',
        'identificacion' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
    ];

    protected $fillable = [
        'user_id',
        'curso_id',
        'identificacion',
        'telefono' ,
        'direccion',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id','id');
    }


}
