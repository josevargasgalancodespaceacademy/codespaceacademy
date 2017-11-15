<?php

require_once '../../assets/php/classes/mysql.php'; 
require_once '../../assets/php/classes/validator.php';
require_once '../../assets/php/classes/sanitizer.php';
require_once '../../assets/php/config.php';


$request = $_POST;
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();

$validator = new Validator($request);
$validator->filledIn("name")->alpha("name")->length("name", "<=", 100);
$validator->filledIn("city")->alpha("city")->length("city", "<=", 100);
$validator->filledIn("business")->alpha("business")->length("business", "<=", 100);
$validator->filledIn("offer_type")->length("offer_type", "<=", 50);
$validator->filledIn("min_experience")->length("min_experience", "<=", 25);
$validator->filledIn("min_studies")->length("min_estudies", "<=", 50);
$validator->filledIn("salary")->length("salary", "<=", 15)->numeric("salary","€");
$validator->filledIn("min_requirements");
$validator->filledIn("num_vacant")->length("num_vacant", "<=", 10)->numeric("num_vacant");
$validator->filledIn("industry_type")->length("industry_type", "<=", 100);
$validator->filledIn("offer_short_description")->length("offer_short_description", "<=", 120);
$validator->filledIn("offer_description");
$errors = $validator->getErrors();
$contenido = "<html><body><h1>Datos</h1></body></html>";

if (!$errors) {
	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("work_offers",$request);
	mkdir('/var/www/codespaceacademy/curriculums/ofertas-externas/'.$request["name"].'-'.$request['city'].'-'.$request['business'], 0777, true);
	file_put_contents('/var/www/codespaceacademy/es/ofertas-externas/'.$request["name"].'-'.$request['city'].'-'.$request['business'].'.php', $contenido);
}

if (!$errors) echo "OK";
else echo json_encode($errors);