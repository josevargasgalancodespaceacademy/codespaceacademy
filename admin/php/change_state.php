<?php

require_once '../../assets/php/classes/mysql.php'; 
require_once '../../assets/php/classes/validator.php';
require_once '../../assets/php/classes/sanitizer.php';
require_once '../../assets/php/config.php';


$request = $_POST;

$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();
$validator = new Validator($request);
$validator->filledIn("state");
$errors = $validator->getErrors();


$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if (!$errors) {
    $mysql->editSingleRow("talleres",array("id" => $request["id"]), array("state" => $request["state"], "updated_at" => date('Y-m-d G:i:s')));
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>