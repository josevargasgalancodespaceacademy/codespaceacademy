<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*
     * Relationship - has many users
     */

    public function users()
    {
        return $this->hasMany('App\Models\User','role_id','id');
    }

    /* 
     * Get permissions for a role
     */

    public function permissions()
    {
        return $this->hasManyThrough(
            'App\Models\Permission', // Final Table
            'App\Models\RolePermissions', // Pivot Table
            'role_id', // Foreign key on pivot table
            'id', // Foreign key on final table
            'id', // Local key on This table
            'permission_id' // Local key on pivot table
        );
    }

    /**
     * Gets the permissions for this role
     *
     * @return {array} roles
     */

    public function getPermissions()
    {
        return $this->permissions->toArray();
    }

    /**
     * Gets the users that have this role
     *
     * @return {array} users
     */

    public function getUsers()
    {
        return $this->users->toArray();
    }


}