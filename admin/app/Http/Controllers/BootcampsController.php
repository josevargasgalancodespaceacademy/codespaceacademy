<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bootcamps;
use App\Subjects;

class BootcampsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
