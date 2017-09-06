<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';

$request = array(
	"email" => $_POST['email'],
	"name" => $_POST['name'],
	"telephone" => $_POST['telephone'],
	"company_name" => $_POST['company_name'],
	"company_link" => $_POST ['company_link'],
	"training_request" => $_POST ['training_request'],
	"comment" => $_POST['comment'],
);
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();


$validator = new Validator($request);
$validator->filledIn("name")->length("name", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("telephone")->length("telephone", "<=", 15);
$validator->filledIn("company_name")->length("company_name", "<=", 100);
$validator->filledIn("training_request");
$errors = $validator->getErrors();

$errors = $validator->getErrors();
if ($errors) die(print_r($errors));


$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
$mysql->insertRow("company_contacts",$request);




?>