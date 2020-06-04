<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public function getRouteKeyName()
	{
		return 'label';
	}

    public function roles()
    {
    	return $this->morphToMany(Role::class, 'roleable');
    }

    public function currentRoles()
    {
        return $this->roles->pluck('id')->toArray();
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

    public function items()
    {
    	return $this->hasMany(Navigation::class);
    }
}
