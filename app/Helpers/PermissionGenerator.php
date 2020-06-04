<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Permission;
use App\Role;

class PermissionGenerator
{

	protected $actions = ['browse', 'read', 'edit', 'add', 'delete'];

	protected $defaultRole = 'administrator';

	protected $format = [];


	public function generate($str)
	{
		return $this->formatText($str)->fabricateAndAuthenticate();
	}

	public function verifyAndGenerate($old, $str)
	{
		if ($old !== $str) {
            $this->formatText($old)->deleteIfExists();
            return $this->generate($str);	
		}

		return false;
	}

    protected function formatText($str)
    {
    	foreach ($this->actions as $action) {
    		$phrase = ucfirst($action) . " " . $str;
    		$this->addFormat($phrase);
    	}

    	return $this;
    }

    protected function addFormat($str)
    {
    	$this->format[] = $str;

    	return $this;
    }

    protected function deleteIfExists()
    {
    	foreach ($this->format as $data) {
    		$permission = $this->getPermission($data);
    		if ($permission) {
    			$this->detachAuthentication($permission);
    			$permission->delete();	
    		}
    	}

    	return $this;
    }

    protected function fabricateAndAuthenticate()
    {
    	foreach ($this->format as $data) {
    		$permission = $this->storeData($data);
    		$this->authenticateAdministrator($permission);
    	}

    	return $this;
    }

    protected function storeData($data)
    {
    	return Permission::create([
    		'key' => Str::slug($data),
    		'name' => $data,
    	]);
    }

    protected function authenticateAdministrator(Permission $permission)
    {
    	return $this->getRole($this->defaultRole)->grantPermission($permission);
    }

    protected function detachAuthentication(Permission $permission)
    {
    	return $this->getRole($this->defaultRole)->permissions()->detach($permission);
    }

    protected function getPermission($label)
    {
    	return Permission::where('label', $label)->first();
    }

    protected function getRole($role)
    {
    	return Role::where('label', $role)->first();
    }
}

