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
    	$newsletter = Newsletter::all('id', 'email', 'created_at');
    	$newsletter = Newsletter::paginate(15);
    	return view('vistas.newsletter')->with('newsletter', $newsletter);
    }
}
