<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';


$request = $_POST;

$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();
$validator = new Validator($request);
$validator->filledIn("state");
$errors = $validator->getErrors();


$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if (!$errors) {
    $mysql->editSingleRow("talleres",array("id" => $request["id"]), array("state" => $request["state"]));
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>