<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\User;

class EstudianteController extends Controller
{

    public function index()
    {
        if (Auth::user()->hasRole('PROFESOR')) {
            $profesor = DB::table('profesors')->where('user_id', '=', Auth::user()->id)->first();
            // $estudiantes = Estudiante::all();
            $estudiantes  =  DB::table('estudiantes')
            ->join('users', 'estudiantes.user_id', '=', 'users.id')
            ->join('cursos', 'estudiantes.curso_id', '=', 'cursos.id')
            ->where('cursos.profesor_id', '=', $profesor->id)
            ->select('estudiantes.id', 'users.name as estudiante', 'estudiantes.identificacion', 'users.email as correo')
            ->get();
            $cursos = Curso::all();
            return view('estudiante.index', compact('estudiantes', 'cursos'));
        }else{

$estudiantes = Estudiante::all();
$cursos = Curso::all();
            return view('estudiante.index', compact('estudiantes', 'cursos'));
        }


    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'identificacion' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'curso_id' => 'required',

        ]);

        // return response()->json($request);

        $estudianteExist = Estudiante::where('identificacion', '=',$request->identificacion)->first();
        if (!$estudianteExist){
            $user = User::where('email', '=', $request->email)->first();
            if (!$user) {
                $user = \App\Models\User::factory()->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->identificacion),
                ]);
                $user->assignRole('ESTUDIANTE');
                $user = DB::table('users')->where('users.email', '=', $request->email)->first();

                $estudiante = Estudiante::insert([
                    'user_id' => $user->id,
                    'curso_id' => $request->curso_id,
                    'identificacion' => $request->identificacion,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return redirect()->route('estudiantes')->with('success', 'Proceso Finalizado Exitosamente');
            }else{
                return redirect()->route('estudiantes')->with('error', 'Este Usuarios Esta Registrado');
            }
        }else{
            return redirect()->route('estudiantes')->with('error', 'Este Estudiante Se Encuentra Registrado');
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
            'curso_id' => 'required',

        ]);

        $user = User::where('id' , '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->identificacion),
        ]);

        $search = User::where('email', '=', $request->email )->first();


        $estudiante = Estudiante::where('id', '=', $search->id)->update([
            'curso_id' => $request->curso_id,
            'identificacion' => $request->identificacion,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('estudiantes')->with('success', 'Proceso Finalizado Exitosamente');


    }


    public function destroy($id)
    {
        $user = DB::table('users')->where('id' , $id)->delete();
        return redirect()->route('profesores')->with('success', 'Proceso Finalizado Exitosamente');
    }
}
