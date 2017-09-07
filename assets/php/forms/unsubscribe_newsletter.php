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


$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if (!$mysql->checkRowExists("newsletter_subscriptions", array("email" => $request["email"])) > 0) $errors["general"] = "No hay suscripcion con este correo";

if (!$errors) {
	$row = $mysql->getOneDataWithParameters("newsletter_subscriptions",array("email" => $request["email"]));
	if ((int) $row["subscribed"] === 0) $errors["general"] = "Ya has cancelado su suscripcion";
	else $mysql->editSingleRow("newsletter_subscriptions",array("email" => $request["email"]), array('subscribed' => 0, "comment_unsubscribe" => $request["comment_unsubscribe"]));
}
echo json_encode($errors);


?>