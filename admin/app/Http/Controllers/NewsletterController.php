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
    	$newsletter = Newsletter::orderBy('created_at' ,'desc')->paginate(15);
        $total_newsletter = Newsletter::all()->count();
    	return view('vistas.newsletter')->with('newsletter', $newsletter)->with('total_newsletter',$total_newsletter);
    }
    public function filtrar_newsletter(Request $request)
    {
        $newsletter = Newsletter::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_newsletter = Newsletter::orderBy($request->campo_a_filtrar , $request->orden)->count();
        return view('vistas.newsletter')->with('newsletter', $newsletter)->with('total_newsletter',$total_newsletter);
    }
    public function excel_newsletter()
    {
       
\Excel::create('Newsletter', function($excel) {

    $newsletter = Newsletter::get(['email']);
    $excel->sheet('Newsletter', function($sheet) use($newsletter) {
        $sheet->fromArray($newsletter);
    });

})->export('xlsx');
    return redirect()->route('listado-newsletter');
    }
}
