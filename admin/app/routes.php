<?php

use App\Middelware\AuthMiddelware;
use App\Middelware\GuestMiddelware;

$app->get('/', 'HomeController:index')->setName('home');

// when a user is signed in
$app->group('', function(){
	// signup routes
	$this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$this->post('/auth/signup', 'AuthController:postSignUp');

	// signin routes
	$this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
	$this->post('/auth/signin', 'AuthController:postSignIn');

	// forgotten password routes
	$this->get('/auth/password/forgottenpassword', 'PasswordController:getForgottenPassword')->setName('auth.password.forgottenpassword');
	$this->post('/auth/password/sendresetlink', 'PasswordController:postForgottenPassword')->setName('auth.password.sendresetlink');

	// new password routes
	$this->get('/auth/password/reset', 'PasswordController:getResetPassword')->setName('auth.password.reset');
	$this->post('/auth/password/reset', 'PasswordController:postResetPassword');
})->add(new GuestMiddelware($container));

// when the user isn't signed in
$app->group('', function(){
	// signout
	$this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

	// change password
	$this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$this->post('/auth/password/change', 'PasswordController:postChangePassword');

	// User administraion area
	$this->get('/admindataview/{page}', 'AdminAreaController:showAdminInitialView')->setName('admindataview');
	
	// User inline editing
	$this->post('/admineditdata', 'AdminAreaController:adminEditData');
	$this->post('/adminupdatedata', 'AdminAreaController:adminUpdateData');
	$this->post('/admindeletedata', 'AdminAreaController:adminDeleteData');
	$this->post('/adminpaginatedata', 'AdminAreaController:refreshPaginateTable');

})->add(new AuthMiddelware($container));

$app->group('/calendar', function(){
	$this->get('', 'CalendarController:showCalendarView')->setName('calendar');
	$this->get('/getEvents', 'CalendarController:getCalendarEvents')->setName('calendarEvents');
	$this->get('/getEvent', 'CalendarController:getCalendarEvent')->setName('calendarEvent');
})->add(new AuthMiddelware($container));



