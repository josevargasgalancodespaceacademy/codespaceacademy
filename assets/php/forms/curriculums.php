<?php

require_once '../classes/mysql.php'; 
require_once '../classes/validator.php';
require_once '../classes/sanitizer.php';
require_once '../config.php';

$request = $_POST;

if(isset($_FILES['curriculum'])){
	$file_upload_errors= array();
	$file_name = $_FILES['curriculum']['name']; 
	$file_size = $_FILES['curriculum']['size']; 
	$file_tmp = $_FILES['curriculum']['tmp_name']; 
	$file_type = $_FILES['curriculum']['type']; 

	if($file_type !== 'application/pdf'){
		$file_upload_errors[] = "La extension no esta permitidio. Por favor, escoge un pdf.";
	}

	if($file_size > 5242880){
		$file_upload_errors[] = 'Tamaño tiene que ser menos de 5MB';
	}


	if(empty($file_upload_errors) == true){
		$folder = "../../../curriculums/";
		$time = date("Y-m-d");
		$saved_file = $folder . $time . "-" . $file_name;
		move_uploaded_file($file_tmp,$saved_file);
		$request["route_curriculum_pdf"] = $file_name;
	}else{
		die(print_r($file_upload_errors));
	}
}


$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();

$validator = new Validator($request);
$validator->filledIn("name")->length("name", "<=", 100);
$validator->filledIn("email")->length("email", "<=", 100)->email("email");
$validator->filledIn("telephone")->length("telephone", "<=", 15);

$errors = array_merge($validator->getErrors(),$file_upload_errors);

if (!$errors) {
	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("curriculums",$request);
}

echo json_encode($errors);



?>