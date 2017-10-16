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
	/*$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("information_requests",$request);*/
$mail = "Prueba de mensaje";
//Titulo
$titulo = "PRUEBA DE TITULO";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Codespace < jose.f.vargas@codespaceacademy.com >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail("jose.f.vargas@codespaceacademy.com",$titulo,$mail,$headers);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}
}

if (!$errors) echo "OK";
else echo json_encode($errors);


?>