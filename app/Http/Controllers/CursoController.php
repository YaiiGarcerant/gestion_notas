<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

use App\Models\Programas;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{

    public function index()
    {
        $cursos = Curso::all();
        $programas = Programas::all();
        $profesores = DB::table('profesors')
            ->join('users', 'profesors.user_id', '=', 'users.id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 2)
            ->select('users.name', 'profesors.id')
            ->get();
        return view('curso.index', compact('cursos', 'programas', 'profesores'));
    }

    public function store(Request $request)
    {
        request()->validate(Curso::$rules);
        $validate = Curso::where('profesor_id', $request->profesor_id)->first();
        if (!$validate) {
            $validate = Curso::where('nombre', $request->nombre)->first();
            if (!$validate) {
                $cursos = Curso::create($request->all());
                return redirect()->route('cursos')->with('success', 'Curso Creado Exitosamente');
            } else {
                return redirect()->route('cursos')->with('error', 'Este curso ya existe');
            }
        } else {
            return redirect()->route('cursos')->with('error', 'Este Profesor Ya Tiene Asignacion');
        }
    }

    public function update(Request $request, $id)
    {
        request()->validate(Curso::$rules);

        $curso = Curso::where('id', $id)->update([
            'nombre' => $request->nombre,
            'profesor_id' => $request->profesor_id,
            'programa_id' => $request->programa_id,
        ]);
        return redirect()->route('cursos')->with('success', 'Curso Creado Exitosamente');
    }


    public function destroy($id)
    {
       $curso = Curso::where('id', $id)->delete();
        return redirect()->route('cursos')->with('success', 'Curso Creado Exitosamente');

    }
}
