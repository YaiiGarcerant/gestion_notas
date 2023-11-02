<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

use App\Models\Profesor;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materias::all();
        $profesores = Profesor::all();
        return view('materia.index', compact('materias', 'profesores'));
    }


    public function update(Request $request, $id)
    {
        request()->validate(Materias::$rules);

        $materiaExist = DB::table('materias')
            ->where('profesor_id', $request->profesor_id)
            ->where('id', '!=', $id)
            ->exists();

        if (!$materiaExist) {
            $materia = Materias::where('id', $id)->update([
                'nombre' => $request->nombre,
                'profesor_id' => $request->profesor_id,
            ]);
            return redirect()->route('materias')->with('success', 'Proceso Finalizado Exitosamente');
        } else {
            return redirect()->route('profesores')->with('error', 'Esta Materia Registrada');
        }
    }


    public function destroy($id)
    {
        $materia = Materias::find($id)->delete();
        return redirect()->route('materias')->with('success', 'Proceso Finalizado Exitosamente');

    }
}
