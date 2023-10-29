<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Profesor extends Model
{
    use HasFactory;

    static $rules = [
        'identificacion' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
    ];

    protected $fillable = [
        'identificacion',
        'telefono' ,
        'direccion',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
