<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class PasswordController extends Controller
{
	/**
	 * Shows the change password screen
	 *
	 * @param  $request http request
	 * @return $response twig view change password screen
	 */

	public function getChangePassword($request, $response)
	{
		return $this->view->render($response, 'auth/password/change.twig');
	}

	/**
	 * Deals with post request of change password.
	 *
	 * @param  $request http request
	 * @return $response twig view, redirects to same page with error, or dashboard depending on success
	 */

	public function postChangePassword($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'password_old' => v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
			'password' => v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.password.change'));
		}

		$this->auth->user()->setPassword($request->getParam('password'));

		$this->flash->addMessage('success', 'Your password has been updated');
		return $response->withRedirect($this->router->pathFor('home'));
	}

	/**
	 * Shows the forgotten password page
	 *
	 * @param  $request http request
	 * @return $response twig view with forgotten password page
	 */

	public function getForgottenPassword($request, $response)
	{
		return $this->view->render($response, 'auth/password/forgotten.twig');
	}

	/**
	 * Deals with post request of sending a forgotten password link
	 *
	 * @param  $request http request
	 * @param  $response
	 *
	 * @return twig view
	 */

	public function postForgottenPassword($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->emailExists(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.password.forgottenpassword'));
		}

		$user = $this->auth->find($request->getParam('email'));
		$user->setForgottenPasswordToken();
		$this->auth->find($request->getParam('email'))->setForgottenPasswordToken();
	
		// Need to send the email link to the user here
		// http://localhost/admin.codespaceacademy/public/auth/password/reset?token=$2y$10$bcTntLqcO/ExzSFCaCCGrOzR8sFgqDhN.Zo0qDerkPhT2mLdP6vMq&emailtoken=davidfisher24@gmail.com
		
		return $this->view->render($response, 'auth/password/resetlinksent.twig', ['email' => $request->getParam('email')]);
	}

	/**
	 * Shows the 
	 *
	 * @param  $request http request
	 * @return $response twig view with forgotten password page
	 */

	public function getResetPassword($request, $response)
	{


		$baseUri = $request->getUri()->getBasePath();
		$token = $request->getQueryParams()["token"];
		$emailtoken = $request->getQueryParams()["emailtoken"];
		return $this->view->render($response, 'auth/password/reset.twig', ['emailtoken' => $emailtoken, 'token' => $token]);
	}

	/**
	 * Deals with setting a new password after reset link
	 * @param  $request http request
	 * @return $response twig view, redirects to same page with error, or dashboard depending on success
	 */

	public function postResetPassword($request, $response)
	{

		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->emailExists(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.password.reset',[], array('token' => $request->getParam('token'), 'emailtoken' => $request->getParam('emailtoken'))));
		}

		$auth = $this->auth->checkResetTokens(
			$request->getParam('email'),
			$request->getParam('token'),
			$request->getParam('emailtoken')
		);

		if (!$auth) {
			$this->flash->addMessage('error', 'Could not verify your details.');
			return $response->withRedirect($this->router->pathFor('auth.password.reset',[], array('token' => $request->getParam('token'), 'emailtoken' => $request->getParam('emailtoken'))));
		}

		$user = $this->auth->find($request->getParam('emailtoken'));
		$user->setPassword($request->getParam('password'));
		$user->resetForgottenPasswordToken();


		$this->flash->addMessage('success', 'Your password has been updated');
		return $response->withRedirect($this->router->pathFor('home'));
	}

}