<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Permission extends Model
{
	protected $guarded = [''];

    public function roles()
    {
    	return $this->morphedByMany(Role::class, 'permissionable');
    }
}
