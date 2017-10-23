<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class User extends Model
{

	protected $fillable = [
		'name', 
		'email', 
		'password',
		'forgotten_password_token'
	];

	protected $hidden = array('password');

	/**
     * Hashes and updates a users password
	 *
     * @param {string} $password
     * @return void
     */

	public function setPassword($password)
	{
		$this->update([
			'password' => password_hash($password, PASSWORD_DEFAULT)
		]);
	}

	/**
     * Hashes and creates a user forgotten password token from a timestamp
	 *
     * @return void
     */

	public function setForgottenPasswordToken()
	{
		$date = new \DateTime();
		$hash = password_hash($date->getTimestamp(), PASSWORD_DEFAULT);
		$this->update([
			'forgotten_password_token' => password_hash($date->getTimestamp(), PASSWORD_DEFAULT)
		]);
	}

	/**
     * Nulls the forgotten password token
	 *
     * @return void
     */

	public function resetForgottenPasswordToken()
	{
		$this->update([
			'forgotten_password_token' => null
		]);
	}

	/*
     * Relationship - one user has one role
     */

	public function role()
    {
        return $this->hasOne('App\Models\Role','id','role_id');
    }

    /**
     * Gets the role of this user
     *
     * @return {array} roles
     */

    public function getRole()
    {
        return $this->role->toArray();
    }

    /**
     * Gets the permissions of this user through their role
     *
     * @return {array} roles
     */

    public function getPermissions()
    {
        return $this->role->getPermissions();
    }

	/**
     * Find if a user has a specific permission
	 *
	 * @param  {string} permission 
     * @return {boolean} 
     */

	public function hasPermission($permission)
	{
		return in_array($permission, array_pluck($this->getPermissions(),'name'));
	}

}