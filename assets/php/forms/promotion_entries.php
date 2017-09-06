<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';

$request = array(
	"name" => $_POST['name'],
	"surnames" => $_POST['surnames'],
	"email" => $_POST['email'],
	"telephone" => $_POST['telephone'],
	"date_of_birth" => $_POST['date_of_birth'],
	"type_identification" => $_POST['type_identification'],
	"number_identification" => $_POST['number_identification'],
	"city" => $_POST['city'],
	"comment" => $_POST['comment'],
);
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();

$validator = new Validator($request);
$validator->filledIn("name")->length("name", "<=", 100);
$validator->filledIn("surnames")->length("surnames", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("date_of_birth")->date("date_of_birth","yyyy/mm/dd");
$validator->filledIn("telephone")->length("telephone", "<=", 15);
$validator->filledIn("city")->length("city", "<=", 100);
$validator->filledIn(array("type_identification","number_identification"))->length($request["type_identification"], "<=", 10)->spanish_id("number_identification",$request["type_identification"]);

$errors = $validator->getErrors();
if ($errors) die(print_r($errors));

$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysql->checkRowExists("promotion_entries", array(
	"email" => $request["email"],
	"number_identification" => $request["number_identification"],
)) > 0) die(print_r("Already exists"));

$mysql->insertRow("promotion_entries",$request);


?>