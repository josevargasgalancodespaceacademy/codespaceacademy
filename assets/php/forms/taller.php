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
$validator->filledIn(array("type_identification","number_identification"))->length($request["type_identification"], "<=", 10)->spanish_id("number_identification",$request["type_identification"]);
$validator->filledIn("telephone")->numeric("telephone",array(" ","+"))->lengthBetween("telephone", 15, 9, $inclusive = true);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$errors = $validator->getErrors();

$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysql->checkRowExists("talleres", array(
	"email" => $request["email"],
	"number_identification" => $request["number_identification"],
)) > 0) $errors["number_identification"] = "Usuario ya registrado";

if (!$errors) {
	$mysql->insertRow("talleres",$request);
}

if (!$errors) echo "OK";
else echo json_encode($errors);

?>