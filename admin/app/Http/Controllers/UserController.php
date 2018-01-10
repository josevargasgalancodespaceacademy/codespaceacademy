<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
      public function consulta()
    {
        $user = User::orderBy('name' ,'asc')->paginate(15);
        $total_user = User::all()->count();
    	return view('vistas.user')->with('user', $user)->with('total_user', $total_user);
    }
}
