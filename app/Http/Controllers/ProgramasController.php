<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{

    public function index()
    {
        $programas = Programas::all();
        return view('programa.index', compact('programas'));
    }

    public function store(Request $request)
    {
        request()->validate(Programas::$rules);
        $programas = Programas::where('nombre', $request->nombre)->first();
        if (!$programas) {
           $programas = Programas::create($request->all());
           return redirect()->route('programas')->with('success', 'Programa Creado Exitosamente');
        }else{
            return redirect()->route('programas')->with('error', 'El programa Ya Existe');
        }
    }

    public function update(Request $request, $id)
    {
        request()->validate(Programas::$rules);

        $programas = Programas::where('nombre', $request->nombre)->first();
        if (!$programas) {
            $programas = Programas::where('id', $id)
            ->update([
                'nombre' => $request->nombre,
            ]);
           return redirect()->route('programas')->with('success', 'Programa Creado Exitosamente');
        }else{
            return redirect()->route('programas')->with('error', 'Este programa ya existe');
        }
    }

    public function destroy($id)
    {
        $programas = Programas::where('id', $id)->delete();
        return redirect()->route('programas')->with('success', 'Programa Eliminado Exitosamente');

    }
}
