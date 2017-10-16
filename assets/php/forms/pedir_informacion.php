<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';


$request = $_POST;
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();

/* Split the array into base data request and request for city and course */
$cityCourseChoice = array();
foreach ($request as $key => $item) {
	if ($key === "city" || strpos($key,"course") !== FALSE) {
		$cityCourseChoice[$key] = $request[$key];
		unset($request[$key]); 
	}
}

$validator = new Validator($request);
$validator->filledIn("name")->alpha("name")->length("name", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("telephone")->numeric("telephone",array(" ","+"))->lengthBetween("telephone", 15, 9, $inclusive = true);
$errors = $validator->getErrors();

/* Deal directly with the city and course selection */
if (!$cityCourseChoice["city"]) {
	$errors["city"] = "Por favor, elige una ciudad";
} else {
	$course = $cityCourseChoice["course-" . $cityCourseChoice["city"]];
	if (!$course) $errors["course-" . $cityCourseChoice["city"]] = "Por favor, elige un curso";
	else {
		$request["city"] = $cityCourseChoice["city"];
		$request["course"] = $cityCourseChoice["course-" . $cityCourseChoice["city"]];
	}
} 

if (!$errors) {
	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("information_requests",$request);
}

if (!$errors)
{
 echo "OK";
$destinatario = "jose.f.vargas@codespaceacademy.com"; 
$asunto = "Prueba email"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Prueba de correo</title> 
</head> 
<body> 
<h1>Hola amigos!</h1> 
<p> 
<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
</p> 
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Jose <info@codespaceacademy.com>\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
}
else echo json_encode($errors);
?>