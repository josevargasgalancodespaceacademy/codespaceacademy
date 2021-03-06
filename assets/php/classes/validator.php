<?php
/***********************************************************************************************
*
* Functions:

* Validator($requestArray) -- constructor. 
*
* filledIn($field = null) 
*
* length($field, $operator, $length) 
*
* email($field) 
*
* compare($field1, $field2, $caseInsensitive = null) 
*
* lengthBetween($field, $max, $min, $inclusive = false) -
*
* punctuation($field = null) -- returns false if there is punctuation in $field. If argument left blank, checks all fields.
*
* value($field, $operator, $value) -- similar to length(). however, checks an integer field against arguments. Takes "<", ">", "<=", ">=", "="	as operators and an integer as value.
*
* valueBetween($field, $max, $min, $inclusive = false)  -- similar to lengthBetween(). however, checks an integerfield against max and min.
*
* alpha($field = null) -- checks to see if $field contains only alphabetic characters. If argument left blank, checks all fields.
*
* alphaNumeric($field = null) -- checks to see if $field contains only alphanumericcharacters. If argument left blank, checks all fields.
*
* numeric($field = null, (array) $additionalCharacters = null) checks to see if a field only cointains numeric characters and any characters included as additional characters
*
* spanish_id($field, $type) -- type is "dni" or "nie". Checks against the algorithm to see if the id number is valid
*
* date($field, $format) -- checks $field against specified format. acceptable date separators are "/", "-", and "." . day, month, and year are specified as "d", "m", "y". eg. "dd/mm/yyyy" or "mm.yyyy"
*
* Usage:
* //instantiate
* $validator = new Validator($_POST);
* //or
* $validator = new Validator($_REQUEST);
*
* //validate
* $validator->date("dateField", "dd.mm.yyyy");
*
* //get errors as an array
* $errors = $validator->getErrors();																											 
*
* ERROR CODES
* 100 => Field is not filled in
* 101 => Number of characters is incorrect
* 102 => invalid email
* 103 => Inputs fail to match
* 104 => Length not in correct range
* 105 => Punctuated characters in input
* 106 => Value of integer is too short/long
* 107 => Value of integer not in correct range
* 108 => Alphabetic string contains invalid characters
* 109 => Alphanumeric string contains invalid characters
* 110 => Incorrect date format
* 111 => Invalid Spanish identification number
*
****************************************************************************************************/

class Validator {
	
	var $validatorId;
	var $valid = false;
	var $duplicate = false;
	var $errors = array();
	var $request = array();

	var $error_messages = array(
		100 => "Este campo es obligatorio",
		101 => "Número de caracteres incorrecto",
		102 => "Formato de email incorrecto",
		103 => "Los valores introducidos no son iguales",
		104 => "Longitud incorrecta",
		105 => "Punctuated characters in input",
		106 => "El valor es demasiado corto o largo",
		107 => "Valor introducido no es en el rango correcto",
		108 => "Este campo solo puede contener caracteres alfabéticos",
		109 => "Este campo solo puede contener caracteres alfabéticos y numéricos",
		110 => "La fecha no es válida",
		111 => "El número de identificación no es válido",
		112 => "Este campo solo puede contener números",
		113 => "Solo disponible para mayores de 18 años",
	);
	
	
	function __construct ($requestArray) {
		
		$id = uniqid("");
		$id = preg_replace("/[[:alpha:]]/", "", $id);
		$id = strrev($id);
		$id = substr($id, 0, 3);
		if($id{0} == 0){
			$id = strrev($id);
		}
		$this->validatorId = $id;
		$this->request = $requestArray;
	}

	// Setes text in place of codes for the error messages
	function construct_error_messages() {
		$errors = array();
		foreach ($this->errors as $key => $error) {
			if (is_array($error)) $errors[$key] = $this->error_messages[$error[0]]; 
			else $errors[$key] = $this->error_messages[$error];
			
		}
		$this->errors = $errors;
	}

	
	//check if a field or fields are filled in 
	//ERROR: 100
	function filledIn($field = null) {
		if(is_array($field)) {
			foreach ($field as $key => $value){
				if(array_key_exists($value, $this->request) && $this->request[$value] != "") {
				} elseif($this->request[$value] === 0) {
				} else {
					$this->setError($value, 100);
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 100) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} elseif ($field == null){ 
			foreach ($this->request as $key => $value) {
				if(array_key_exists($value, $this->request) && $this->request[$value] != "") {
				} elseif($this->request[$value] === 0) {
				} else {
					$this->setError($value, 100);
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 100) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		}  else {
			if(array_key_exists($field, $this->request) && $this->request[$field] != "") {
				return $this;
			} else {

				$this->setError($field, 100);
				return $this;
			}
		}
	}
	
	//field 
	//operator <, >, =, <=, and >= 
	// length
	function length($field, $operator, $length) {
		switch($operator) {
			case "<":
				if(strlen(trim($this->request[$field])) < $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
				break;
			case ">":
				if(strlen(trim($this->request[$field])) > $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
				break;
			case "=":			
				if(strlen(trim($this->request[$field])) == $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
				break;
			case "<=":
				if(strlen(trim($this->request[$field])) <= $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
				break;
			case ">=":
				if(strlen(trim($this->request[$field])) >= $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
				break;
			default:
				if(strlen(trim($this->request[$field])) < $length) {
					return $this;
				} else {
					$this->setError($field, 101);
					return $this;
				}
		}
	}
	
	//valid email address
	function email($field) {
		$address = trim($this->request[$field]);
		if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $address)){
			return $this;
		}	else {

			$this->setError($field, 102);
			return $this;
		}
	}
	
	//check to see if two fields are equal
	function compare($field1, $field2, $caseInsensitive = false) {
		if($caseInsensitive) {
			if (strcmp(strtolower($this->request[$field1]), strtolower($this->request[$field2])) == 0) {
				return $this;
			} else {
				$this->setError($field1."|".$field2, 103);
				return $this;
			}
		} else {
			if (strcmp($this->request[$field1], $this->request[$field2]) == 0) {
				return $this;
			} else {
				$this->setError($field1."|".$field2, 103);
				return $this;
			}
		}
	}
	
	//check to see if the length of a field is between two numbers
	function lengthBetween($field, $max, $min, $inclusive = false){
		if(!$inclusive){
			if(strlen(trim($this->request[$field])) < $max && strlen(trim($this->request[$field])) > $min) {
				return $this;
			} else {
				$this->setError($field, 104);
				return $this;
			}
		} else {
			if(strlen(trim($this->request[$field])) <= $max && strlen(trim($this->request[$field])) >= $min) {
				return $this;
			} else {
				$this->setError($field, 104);
				return $this;
			}			
		}
	}
	
	//check to see if there is punctuation
	function punctuation($field = null) {
		if(is_array($field)) {
			foreach ($field as $key => $value){
				if(preg_match("/[[:punct:]]/", $this->request[$value])) {
					$this->setError($value, 105);
				} 
			}
			foreach ($this->errors as $key => $value){
				if($value == 105) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} elseif ($field == null){ 
			foreach ($this->request as $key => $value) {
				if(preg_match("/[[:punct:]]/", $value)) {
					$this->setError($key, 105);
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 105) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} else {
			if(preg_match("/[[:punct:]]/", $this->request[$field])) {
				$this->setError($field, 105);
				return $this;
			} else {
				return $this;
			}
		}
	}
	
	//number value functions takes 
	//operator <, >, =, <=, and >= as operators
	function value($field, $operator, $length) {
		switch($operator) {
			case "<":
				if($this->request[$field] < $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
				break;
			case ">":
				if($this->request[$field] > $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
				break;
			case "=":			
				if($this->request[$field] == $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
				break;
			case "<=":
				if($this->request[$field] <= $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
				break;
			case ">=":
				if($this->request[$field] >= $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
				break;
			default:
				if($this->request[$field] < $length) {
					return $this;
				} else {
					$this->setError($field, 106);
					return $this;
				}
		}		
	}
	
	//check if a number value is between $max and $min
	function valueBetween($field, $max, $min, $inclusive = false){
		if(!$inclusive){
			if($this->request[$field] < $max && $this->request[$field] > $min) {
				return $this;
			} else {
				$this->setError($field, 107);
				return $this;
			}
		} else {
			if($this->request[$field] <= $max && $this->request[$field] >= $min) {
				return $this;
			} else {
				$this->setError($field, 107);
				return $this;
			}			
		}
	}
	
	//check if a field contains only alphabetic characters
	function alpha($field = null) {
		if(is_array($field)) {
			foreach ($field as $key => $value){
				$strlen = strlen($this->request[$value]);
				if($strlen > 0) {
					if(!preg_match('~^[\p{L}\p{Z}]+$~u', $this->request[$value])) {
						$this->setError($value, 108);
					} 
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 108) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} elseif ($field == null) { 
			foreach ($this->request as $key => $value) {
				$strlen = strlen($value);
				if($strlen > 0) {
					if(!preg_match('~^[\p{L}\p{Z}]+$~u', $value)) {
						$this->setError($key, 108);
					}
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 108) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} else {
			$strlen = strlen($this->request[$field]);
			if($strlen > 0) {
				if(preg_match('~^[\p{L}\p{Z}]+$~u', $this->request[$field])) {
					return $this;
				} else {
					$this->setError($field, 108);
					return $this;
				}
			} else {
				return $this;
			}
		}
	}

	// check if a field contains 
	// $additionalCharacters is array of characters to add to the regex
	function numeric($field = null, $additionalCharacters = null) {
		$regex = "/^[0-9";
		if ($additionalCharacters) {
			foreach($additionalCharacters as $character) {
				$regex .= $character;
			}
		}
		$regex .= "]+$/";

		if(is_array($field)) {
			foreach ($field as $key => $value){
				$strlen = strlen($this->request[$value]);
				if($strlen > 0) {
					if(preg_match($regex, $this->request[$value])) {
						$this->setError($value, 112);
					} 
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 112) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} elseif ($field == null) { 
			foreach ($this->request as $key => $value) {
				$strlen = strlen($value);
				if($strlen > 0) {
					if(preg_match($regex, $value)) {
						$this->setError($key, 112);
					}
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 112) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} else {
			$strlen = strlen($this->request[$field]);
			if($strlen > 0) {
				if(preg_match($regex, $this->request[$field])) {
					return $this;
				} else {
					$this->setError($field, 112);
					return $this;
				}
			} else {
				return $this;
			}
		}
	}
	
	//check if a field contains only alphanumeric characters
	function alphaNumeric($field = null) {
		if(is_array($field)) {
			foreach ($field as $key => $value){
				$strlen = strlen($this->request[$value]);
				if($strlen > 0) {
					if(!preg_match('~^[\p{L}\p{Z}\p{N}]+$~u', $this->request[$value])) {
						$this->setError($value, 109);
					} 
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 109) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} elseif ($field == null) { 
			foreach ($this->request as $key => $value) {
				$strlen = strlen($value);
				if($strlen > 0) {
					if(!preg_match("~^[\p{L}\p{Z}\p{N}]+$~u", $value)) {
						$this->setError($key, 109);
					}
				}
			}
			foreach ($this->errors as $key => $value){
				if($value == 109) {
					$this->valid = false;
				}
			}
			if($this->valid) {
				$this->resetValid();
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} else {
			$strlen = strlen($this->request[$field]);
			if($strlen > 0) {
				if(preg_match("~^[\p{L}\p{Z}\p{N}]+$~u", $this->request[$field])) {
					return $this;
				} else {
					$this->setError($field, 109);
					return $this;
				}
			} else {
				return $this;
			}
		}
	}

	//check if spanish dni or nie number are valid
	//needs to be passed the field  of the number and the type
	//types are "dni" or "nie". Nie is converted
	//ERROR: 111
	function spanish_id($field,$type) {
		$id = trim($this->request[$field]);
		$id = str_replace("-","",$id);  
		$id = str_ireplace(" ","",$id);  
		if ($type === "NIE" || $type === "nie") $id = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $id);	

		$number = intval(substr($id,0,strlen($id)-1));  
		if (!is_int($number)) {  
			$this->setError($field, 111);
			return $this;
		}  

		$letter = substr($id,-1);  
		if (!is_string($letter)) {  
			$this->setError($field, 111);
			return $this;
		}  
		$checksum = substr ("TRWAGMYFPDXBNJZSQVHLCKE", $number%23, 1);  

		if (strtolower($checksum) == strtolower($letter)) {  
			 return $this;
		}  
		else {  
			$this->setError($field, 111);
			return $this;
		} 
	}

	//check if field is a date by specified format
	//acceptable separators are "/" "." "-" 
	//acceptable formats use "m" for month, "d" for day, "y" for year
	//eg: date("date", "mm.dd.yyyy") will match a field called "date" containing 01-12.01-31.nnnn where n is any real number
	//ERROR: 110
	function date($field, $format, $checkLegalAge = false) {
		$month = false;
		$day = false;
		$year = false;
		$monthPos = null;
		$dayPos = null;
		$yearPos = null;
		$monthNum = null;
		$dayNum = null;
		$yearNum = null;
		$separator = null;
		$separatorCount = null;
		$fieldSeparatorCount = null;
		$formatArray = array();
		$dateArray = array();
		
		//determine the separator
		if(strstr($format, "-")) {
			$separator = "-";
			$this->valid = true;
		} elseif (strstr($format, ".")) {
			$separator = ".";
			$this->valid = true;
		} elseif (strstr($format, "/")) {
			$separator = "/";
			$this->valid = true;
		}	else {
			$this->valid = false;
		}
		if($this->valid){
			//determine the number of separators in $format and $field
			$separatorCount = substr_count($format, $separator);
			$fieldSeparatorCount = substr_count($this->request[$field], $separator);
			
			//if number of separators in $format and $field don't match return false
			if(!strstr($this->request[$field], $separator) || $fieldSeparatorCount != $separatorCount) {
				$this->valid = false;
			} else {
				$this->valid = true;
			}
		}

		
		if($this->valid) {
			//explode $format into $formatArray and get the index of the day, month, and year
			//then get the number of occurances of either m, d, or y
			$formatArray = explode($separator, $format);
			for($i = 0; $i < sizeof($formatArray); $i++) {
				if(strstr($formatArray[$i], "m")) {
					$monthPos = $i;
					$monthNum = substr_count($formatArray[$i], "m");
				} elseif (strstr($formatArray[$i], "d")) {
					$dayPos = $i;
					$dayNum = substr_count($formatArray[$i], "d");					
				} elseif (strstr($formatArray[$i], "y")) {
					$yearPos = $i;
					$yearNum = substr_count($formatArray[$i], "y");
				} else {
					$this->valid = false;
				}
			}

			//set whether $format uses day, month, year
			if($monthNum) {
				$month = true;
			} else {
				$month = false;
			}
			if($dayNum) {
				$day = true;
			} else {
				$day = false;
			}
			if($yearNum) {
				$year = true;
			} else {
				$year = false;
			}
			
			//explode date field into $dateArray
			//check if the monthNum, dayNum, and yearNum match appropriately to the $dateArray
			$dateArray = explode($separator, $this->request[$field]);	
			if($month) {
				if(!preg_match('/^[0-9]*$/', $dateArray[$monthPos]) || $dateArray[$monthPos] > 12) {
					$this->valid = false;
				}
			}
			if($day) {
				if(!preg_match('/^[0-9]*$/', $dateArray[$dayPos])  || $dateArray[$dayPos] > 31) {
					$this->valid = false;
				}
			}
			if($year) {
				if (!preg_match('/^[0-9]*$/', $dateArray[$yearPos]) ) {
					$this->valid = false;
				}
			}
		} 

		if ($this->valid) {
			// Check the legal age if it has been requested
			if ($checkLegalAge && !$this->checkAbove18($dateArray,$yearPos,$monthPos,$dayPos)) {
				$this->resetValid();
				$this->setError($field, 113);
				return $this;
			} else {
				$this->resetValid();
				return $this;
			}
		} else {
			$this->resetValid();
			$this->setError($field, 110);
			return $this;
		}
	}

	// Used with the function above to check above 18 years
	function checkAbove18($dateArray, $yearPos,$monthPos,$dayPos){
		$birthDay = $dateArray[$dayPos]; 
		$birthMonth = $dateArray[$monthPos]; 
		$birthYear = $dateArray[$yearPos];
		if (date('Y') - $birthYear > 18) { 
			return true; 
		} else {
			if (date('Y') - $birthYear === 18) { 
				if (date('m') - $birthMonth > 0) { 
					return true; 
				} else {
					if (date('m') - $birthMonth === 0) {
						if (date('d') - $birthDay >= 0) { 
							return true; 
						}
					}
				}
			}
		  }
		  return false;
	}
	
	//set errors here
	function setError($field, $error) {
		if(!key_exists($field, $this->errors) || $this->errors[$field] !== $error && !is_array($this->errors[$field])) {
			$tmpArray = array($field => $error);
			$this->errors = array_merge_recursive($this->errors, $tmpArray);	
			return $this;		
		} elseif(is_array($this->errors[$field])) {
			foreach ($this->errors[$field] as $value) {
				if($value == $error) {
					$this->duplicate = true;
				} else {
					$this->duplicate = false;	
				}
			}
			if(!$this->duplicate){
				$tmpArray = array($field => $error);
				$this->errors = array_merge_recursive($this->errors, $tmpArray);					
			}
		} else {
			$this->duplicate = false;
		}
	}
	
	//get validation errors
	function getErrors() {
		$this->construct_error_messages();
		return $this->errors;
	}
	
	//get the validator id
	function getId() {
		return $this->validatorId;
	}
	
	//resets $valid to false
	function resetValid() {
		$this->valid = false;
	}
}
?>