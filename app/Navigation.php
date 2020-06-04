<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{

    protected $fillable = ['menu_id', 'name', 'label', 'icon_class', 'url', 'route', 'parent_id', 'section', 'order', 'active'];

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

    public function menu()
    {
    	return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function parent()
    {
    	return $this->belongsTo(Navigation::class, 'parent_id')->where('parent_id', '!=', 0);
    }

    public function children()
    {
    	return $this->hasMany(Navigation::class, 'parent_id')->where('parent_id', 0);
    }

    public function hasChildren()
    {
        return $this->children->count() > 0 ? true : false;
    }
}
