<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';


$request = $_POST;

$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();
$validator = new Validator($request);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$errors = $validator->getErrors();

$insertData = $request;
$insertData["subscribed"] = 1;

$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysql->checkRowExists("newsletter_subscriptions", array("email" => $request["email"])) > 0) {
	$row = $mysql->getOneDataWithParameters("newsletter_subscriptions", array("email" => $request["email"]));
	if ($row["subscribed"] == 1) {
		$errors["general"] = "Ya estás suscrito al newsletter";
	} else {
		$mysql->editSingleRow("newsletter_subscriptions",array("email" => $request["email"]),array("subscribed" => true));
		echo "OK";
		die;
	}
}


if (!$errors) {
	$mysql->insertRow("newsletter_subscriptions",$insertData);
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>