<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;
class AuthController extends Controller
{

	/**
	 * Logs the user out and returns the home page
	 *
	 * @param  $request http request
	 * @return $response twig view with main home page (on login setting)
	 */

	public function getSignOut($request, $response)
	{
		$this->auth->logout();
		$this->flash->addMessage('error', 'You have been signed out');
		return $response->withRedirect($this->router->pathFor('home'));
	}
	
	/**
	 * Shows the newsletter subsrcibers page 
	 * NOT CURRENTLY USED
	 *
	 * @param  $request http request
	 * @return $response twig view with the login page
	 */

	public function getSignIn($request, $response)
	{
		return $this->view->render($response, 'auth/signin.twig');
	}

	/**
	 * Posts a login requests, verifies, and redirects
	 *
	 * @param  $request http request
	 * @return $response twig view with either dashboard for successful login, or redirect to home with error
	 */

	public function postSignIn($request, $response)
	{
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (!$auth) {
			$this->flash->addMessage('error', 'Could not sign you in with those details');
			//return $response->withRedirect($this->router->pathFor('auth.signin'));
			return $response->withRedirect($this->router->pathFor('home'));
		}
		
		$this->flash->addMessage('success', 'Successfully signed in');
		return $response->withRedirect($this->router->pathFor('home'));
	}

	/**
	 * Posts a login requests, verifies, and redirects
	 * NOT CURRENTLY USED
	 *
	 * @param  $request http request
	 * @return $response twig view with the login page
	*/

	public function getSignUp($request, $response)
	{
		return $this->view->render($response, 'auth/signup.twig');
	}

	/**
	 * Creates a user on submitting the sign up page
	 * NOT CURRENTLY USED
	 *
	 * @param  $request http request
	 * @return $response twig view with either dashboard for successful login, or redirect to home with error
	*/

	public function postSignUp($request, $response)
	{

		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
			'name' => v::notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
		]);

		$this->flash->addMessage('info', 'You have been signed up');

		$this->auth->attempt($user->email, $request->getParam('password'));

		return $response->withRedirect($this->router->pathFor('home'));
	}

}