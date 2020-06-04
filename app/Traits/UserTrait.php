<?php

namespace App\Traits;

use App\Role;


trait UserTrait
{
    public function roles()
    {
    	return $this->morphToMany(Role::class, 'roleable');
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    public function addRole(Role $role)
    {
    	return $this->roles()->save($role);
    }

    public function verifyAndAddRole(array $params)
    {
    	foreach ($params as $value) {
    		if ($value != null) {
    			$role = Role::find($value);

    			if ($role) {
    				$this->addRole($role);
    			}
    		}
    	}

    	return true;
    }

    public function currentRoles()
    {
    	return $this->roles->pluck('id')->toArray();
    }
}
