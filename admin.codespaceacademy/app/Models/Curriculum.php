<?php

namespace App\Models;

class Curriculum extends BaseModel
{
  	protected $table = 'curriculums';
    public $pageTemplate = 'adminarea/curriculums.twig';
    public $tableTemplate = 'adminarea/partials/curriculums_table.twig';
    public $tableRowTemplate = 'adminarea/partials/curriculums_row.twig';

  	/**
	 * Defines relationship - belongs to one contact
	 * Curriculum::with('contact')->get();
	 *
	 * @return {model} $contact
	 */

  	public function contact()
    {
        return $this->belongsTo('App\Models\Contact','email','email');
    }
}