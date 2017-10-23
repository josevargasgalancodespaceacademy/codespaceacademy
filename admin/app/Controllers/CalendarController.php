<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use Illuminate\Database\Capsule\Manager as DB;
use App\Auth\Auth as Auth;
use Faker\Factory as Faker;

class CalendarController extends Controller
{

	/**
	 * Shows the initial calendar load view of a page
	 *
	 * @param  $request http request
	 * @param  $response
	 * @param  $args (page = routing)
	 *
	 * @return $response twig view with parameters
	 */

	public function showCalendarView($request, $response, $args)
	{
		$events = $this->getCalendarEvents();
		$permissions = json_encode(array_column(Auth::User()->getPermissions(),'name'));
		return $this->view->render($response, 'templates/calendar.twig', ['events' => $events, 'permissions' => $permissions]);
	}


	public function getCalendarEvents()
	{
		$faker = Faker::create();
		$noEvents = rand(1,20);
		$events = array();

		for ($x = 0; $x <= $noEvents; $x++) 
			$events[] = array(
				"title" => $faker->sentence($nbWords = 3, $variableNbWords = true),
				"start" => date("Y-m-d",rand(time() - 2592000,time() + 2592000)),
 			);

		return json_encode($events);
	}

	public function getCalendarEvent($request, $response)
	{
		$faker = Faker::create();
		$event = array(
			"title" => $faker->sentence($nbWords = 2, $variableNbWords = true),
			"description" => $faker->text($maxNbChars = 250),
			"location" => $faker->streetAddress() . ", " . $faker->city(),
		);

		$noAttendees = rand(1,10);
		$attendees = array();
		for ($x = 0; $x <= $noAttendees; $x++) 
			$attendees[] = array(
				"name" => $faker->name(),
 			);


		return $this->view->render($response, 'templates/calendarModal.twig', ['event' => $event, 'attendees' => $attendees]);
	}


}