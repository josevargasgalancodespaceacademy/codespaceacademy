<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

	/**
	 * Mutator - converts all created attrubtes to european dd-mm-yyyy
	 *
	 * @return {date} date in format dd-mm-yyyy
	 */

	public function getCreatedAttribute($value)
    {
        return date("d-m-Y",strtotime($value));
    }

    /**
	 * Mutator - converts all date of births attrubtes to european dd-mm-yyyy
	 *
	 * @return {date} date in format dd-mm-yyyy
	 */

    public function getDateOfBirthAttribute($value)
    {
        return date("d-m-Y",strtotime($value));
    }

}