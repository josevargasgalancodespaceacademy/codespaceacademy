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
    	$curriculums = Curriculums::all('id' ,'name', 'email', 'telephone', 'website', 'linkedin', 'route_curriculum_pdf', 'created_at');
    	return view('vistas.curriculums')->with('curriculums', $curriculums);
    }
    public function detalle($id)
    {
    	$detalle_curriculum = Curriculums::find($id);
    	return view('vistas.detalle-curriculum')->with('detalle_curriculum', $detalle_curriculum);
    }
}

