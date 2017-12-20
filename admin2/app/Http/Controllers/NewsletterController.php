<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$newsletter = Newsletter::orderBy('email' ,'asc')->paginate(15);
        $total_newsletter = Newsletter::all()->count();
    	return view('vistas.newsletter')->with('newsletter', $newsletter)->with('total_newsletter',$total_newsletter);
    }
    public function filtrar_newsletter(Request $request)
    {
        $newsletter = Newsletter::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        return view('vistas.newsletter')->with('newsletter', $newsletter);
    }
}
