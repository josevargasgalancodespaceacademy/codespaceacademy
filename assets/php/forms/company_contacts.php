<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';

$request = $_POST;
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();



$validator = new Validator($request);
$validator->filledIn("name")->alpha("name")->length("name", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("telephone")->numeric("telephone",array(" ","+"))->lengthBetween("telephone", 15, 9, $inclusive = true);
$validator->filledIn("company_name")->length("company_name", "<=", 100);
$validator->filledIn("training_request");
$errors = $validator->getErrors();


if (!$errors) {
	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("company_contacts",$request);
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>