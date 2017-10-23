<?php

namespace App\Auth;

use App\Models\User;

class Auth
{

	/**
	 * Finds the user from the current session
	 *
	 * @return {model} $user 
	 */

	public function user()
	{
		if (isset($_SESSION['user'])) {
			return User::find($_SESSION['user']);
		}
	}

	/**
	 * Checks a login is present
	 *
	 * @return {bool}  
	 */

	public function check()
	{
		if (isset($_SESSION['user'])) {
			return isset($_SESSION['user']);
		}
	}

	/**
	 * Attempts a login by searching email and verifying password
	 *
	 * @param $mail 
	 * @param $password 
	 *
	 * @return {bool} 
	 */

	public function attempt($email, $password)
	{

		$user = User::where('email' , $email)->first();
		
		if (!$user) {
			return false;
		}

		if (password_verify($password, $user->password)) {
			$_SESSION['user'] = $user->id;
			return true;
		}
		
		return false;
	}

	/**
	 * Logos a user out by unsetting the current session
	 *
	 * @return void
	 */

	public function logout()
	{
		unset($_SESSION['user']);
	}

	/**
	 * Finds a user by email
	 *
	 * @param $mail 
	 * @return void
	 */

	public function find($email)
	{
		return User::where('email' , $email)->first();
	}

	/**
	 * Checks a users reset password tokens
	 *
	 * @param $email 
	 * @param $token 
	 * @param $emailtoken
	 * @return {bool}
	 */

	public function checkResetTokens($email,$token,$emailtoken)
	{

		if ($email !== $emailtoken) return false;

		$user = User::where('email' , $emailtoken)->first();
		
		if (!$user) {
			return false;
		}

		if ($token === $user->forgotten_password_token) {
			return true;
		}
		
		return false;
	}
}