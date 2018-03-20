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
$validator->filledIn("telephone")->numeric("telephone",array(" ","+"))->lengthBetween("telephone", 15, 9, $inclusive = true);
$errors = $validator->getErrors();

	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysql->checkRowExists("information_phone_number", array(
	"telephone" => $request["telephone"],
)) > 0) $errors["telephone"] = "Este número de teléfono ya ha solicitado una petición";
	
if (!$errors) {
	$mysql->insertRow("information_phone_number",$request);
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>