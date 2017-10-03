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
$validator->filledIn("surnames")->alpha("surnames")->length("surnames", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("date_of_birth")->date("date_of_birth","dd-mm-yyyy", $checkLegalAge = true);
$validator->filledIn("telephone")->numeric("telephone",array(" ","+"))->length("telephone", "<=", 15);
$validator->filledIn("city")->alpha("city")->length("city", "<=", 100);
$validator->filledIn(array("type_identification","number_identification"))->length($request["type_identification"], "<=", 10)->spanish_id("number_identification",$request["type_identification"]);

$errors = $validator->getErrors();

$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysql->checkRowExists("promotion_entries", array(
	"email" => $request["email"],
	"number_identification" => $request["number_identification"],
)) > 0) $errors["number_identification"] = "Usuario ya registrado";


if (!$errors) {
	$request["date_of_birth"] = $mysql->checkAndPrepareDateString($request["date_of_birth"],'d-m-Y');
	$mysql->insertRow("promotion_entries",$request);
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>