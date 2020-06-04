<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{

    protected $guarded = [''];

    protected $ranking = ['basic', 'power', 'global', 'enterprise'];

    public function getRouteKeyName()
    {
        return 'label';
    }

    public function permissions()
    {
    	return $this->morphToMany(Permission::class, 'permissionable');
    }

    public function grantPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function users()
    {
    	return $this->morphedByMany(User::class, 'roleable');
    }

    public function menus()
    {
    	return $this->morphedByMany(Menu::class, 'roleable');
    }

    public function navigations()
    {
    	return $this->morphedByMany(Navigation::class, 'roleable');
    }

    public function getRanking()
    {
        return $this->ranking;
    }
}
