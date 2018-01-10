<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculums;


class CurriculumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
        $curriculums = Curriculums::orderBy('name' ,'asc')->paginate(15);
        $total_curriculums = Curriculums::all()->count();
    	return view('vistas.curriculums')->with('curriculums', $curriculums)->with('total_curriculums', $total_curriculums);
    }
    public function filtrar_curriculums(Request $request)
    {
        $curriculums = Curriculums::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_curriculums = Curriculums::orderBy($request->campo_a_filtrar , $request->orden)->count();
        return view('vistas.curriculums')->with('curriculums', $curriculums)->with('total_curriculums', $total_curriculums);
    }
    public function detalle($id)
    {
    	$detalle_curriculum = Curriculums::find($id);
    	return view('vistas.detalle-curriculum')->with('detalle_curriculum', $detalle_curriculum);
    }
    public function editar()
    {
    }
}

