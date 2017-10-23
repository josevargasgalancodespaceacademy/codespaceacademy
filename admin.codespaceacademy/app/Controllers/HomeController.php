<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

use App\Models\Role;
use App\Models\Permission;
use App\Auth\Auth as Auth;

class HomeController extends Controller
{

	/**
	 * Shows the main home (login or dashboard)
	 *
	 * @param  $request http request
	 * @return $response twig view
	 */

	public function index($request, $response)
	{
		return $this->view->render($response, 'home.twig');
	}
}