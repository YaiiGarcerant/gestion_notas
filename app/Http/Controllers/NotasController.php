<?php

namespace App\Http\Controllers;


use App\Models\Notas;
use Illuminate\Http\Request;

use App\Models\Materias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{

    public function index()
    {
        if(Auth::user()->hasRole('PROFESOR')){

            // $notas = Notas::all();
            //consultas el id del profesor usando el id del usuario
            $profesor = DB::table('profesors')->where('user_id', '=', Auth::user()->id)->first();

            $estudiantes = DB::table('estudiantes')
                ->join('users', 'estudiantes.user_id', '=', 'users.id')
                ->join('cursos', 'estudiantes.curso_id', '=', 'cursos.id')
                ->join('notas', 'estudiantes.id', '=', 'notas.estudiante_id')
                ->where('cursos.profesor_id', '=', $profesor->id)
                ->select('users.name as estudiante', 'estudiantes.id', 'notas.*')
                ->get();

            $materias = Materias::where('profesor_id', '=', $profesor->id)->select('materias.id')->get();
            return view('notas.index', compact('estudiantes', 'materias'));

        }else if(Auth::user()->hasRole('ESTUDIANTE')){

            $estudiante = DB::table('estudiantes')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
            $notas = DB::table('notas')
            ->join('estudiantes', 'notas.estudiante_id', '=', 'estudiantes.id')
            ->join('materias', 'notas.materia_id', '=', 'materias.id')
            ->where('notas.estudiante_id', '=', $estudiante->id)
            ->select('materias.nombre as materia', 'notas.*')
            ->get();
            return view('notas.index', compact('notas'));
        }

    }


    public function store(Request $request)
    {
        request()->validate(Notas::$rules);

        // return response()->json($request);

        $notaExist = Notas::where('estudiante_id', '=', $request->estudiante)->first();

        if (!$notaExist) {
            // Acceder a los valores numéricos
            $primeraNota =  intval($request->primera_nota);
            $segundaNota = intval($request->segunda_nota);
            $terceraNota = intval($request->tercera_nota);

            $definitiva = ($primeraNota + $segundaNota + $terceraNota) / 3;

            $notas = Notas::insert([
                'estudiante_id' => $request->estudiante_id,
                'materia_id' => $request->materia_id,
                'primera_nota' => $request->primera_nota,
                'segunda_nota' => $request->segunda_nota,
                'tercera_nota' => $request->tercera_nota,
                'definitiva' => $definitiva,
                'observaciones' => $request->observaciones,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('notas')->with('success', 'Proceso Finalizado Exitosamente');
        } else {
            return redirect()->route('notas')->with('error', 'Este Estudiantes Esta Calificado');
        }
    }


    public function update(Request $request, $id)
    {

        request()->validate(Notas::$rules);

        $primeraNota =  intval($request->primera_nota);
        $segundaNota = intval($request->segunda_nota);
        $terceraNota = intval($request->tercera_nota);

        $definitiva = $primeraNota + $segundaNota + $terceraNota;

        $notas = Notas::where('id', '=', $id)->update([
            'estudiante_id' => $request->estudiante_id,
            'materia_id' => $request->materia_id,
            'primera_nota' => $request->primera_nota,
            'segunda_nota' => $request->segunda_nota,
            'tercera_nota' => $request->tercera_nota,
            'definitiva' => $definitiva,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('notas')->with('success', 'Proceso Finalizado Exitosamente');
    }


    public function destroy($id)
    {
        $nota = Notas::where('id', $id)->delete();
        return redirect()->route('notas')->with('success', 'Proceso Finalizado Exitosamente');
    }




    public function indexRanking()
    {

        if(Auth::user()->hasRole('ADMINISTRADOR GENERAL')){
            // curso -> nombre -> puntuacion 
            $notas = DB::table('notas')
            ->join('estudiantes', 'notas.estudiantes_id', '=', 'estudiantes.id')
            ->join('')
            ->get();
            return view('ranking.index', compact(''));

        }else{

            // nombre -> puntuacion 

        }
        
    }
}
