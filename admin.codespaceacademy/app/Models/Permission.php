<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    /* 
     * Pivot relationship - a permission in included in various roles
     */

    public function roles()
    {
        return $this->hasManyThrough(
            'App\Models\Role', // Final Table
            'App\Models\RolePermissions', // Pivot Table
            'permission_id', // Foreign key on pivot table
            'id', // Foreign key on final table
            'id', // Local key on This table
            'role_id' // Local key on pivot table
        );
    }

    /**
     * Gets the roles that have this permission
     *
     * @return {array} roles
     */

    public function getRoles()
    {
        return $this->roles->toArray();
    }



}