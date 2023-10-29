<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Materias;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{

    public function index()
    {
        $profesores = Profesor::all();
        return view('profesor.index', compact('profesores'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'identificacion' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'nombre' => 'required',
        ]);

        // return response()->json($request);
    

        $materiaExist = Materias::where('nombre', $request->nombre)->first();
        if (!$materiaExist) {
            $userExist = Profesor::where('identificacion', $request->identificacion)->first();
            if (!$userExist) {
                
                $user = \App\Models\User::factory()->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->identificacion),
                ]);

                $user->assignRole('PROFESOR');

                // $user = User::where('email', '=', $request->email)->first()->select('users.id');
                
                $user = DB::table('users')->where('users.email', '=', $request->email)->first();

                $profesor = Profesor::insert([
                    'user_id' => $user->id,
                    'identificacion' => $request->identificacion,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                ]);

                $profesor = Profesor::where('identificacion', $request->identificacion)->first();

                $materia = Materias::create([
                    'nombre' => $request->nombre,
                    'profesor_id' => $profesor->id,
                ]);

                return redirect()->route('profesores')->with('success', 'Proceso Finalizado Exitosamente');

            }else{

                return redirect()->route('profesores')->with('error', 'Este Docente Se Encuentra Registrado');

            }
        }else{

            return redirect()->route('profesores')->with('error', 'Esta Materia Se Encuentra Registrada');

        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'identificacion' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        // $profesor = Profesor::where('id', '=', $id)->first();

        $user = User::where('id' , '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->identificacion),
        ]);

        $search = User::where('email', '=', $request->email )->first();

        $profesor = Profesor::where('user_id', '=', $search->id)->update([
            'identificacion' => $request->identificacion,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('profesores')->with('success', 'Proceso Finalizado Exitosamente');


    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id' , $id)->delete();
        return redirect()->route('profesores')->with('success', 'Proceso Finalizado Exitosamente');
    }
}
