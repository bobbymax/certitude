<?php

namespace App\Helpers;

class Breadcrumb
{
    protected $currentUrl;

	protected $actions = ['create', 'show', 'edit'];

	protected $action;

	public function __construct($url)
	{
		$this->currentUrl = $url;
	}

	public function rollout()
	{
		return $this->getComponents($this->parse());
	}

	protected function parse()
	{
		$current = $this->splitUrl();


		$protocol = array_shift($current);
		$space = array_shift($current);
		$currentUrl = array_shift($current);
		$components = $current;

		return $components;
	}

	protected function splitUrl() 
	{
		return explode("/", $this->currentUrl);
	}

	protected function getComponents(array $params)
	{
		$prefix = array_shift($params);
		$entity = array_shift($params);
		$action = $this->getAction($params);
		$value = $this->getValue($action, $params);

		return compact('prefix', 'entity', 'action', 'value');
	}

	protected function getValue($element, &$array)
	{
		$index = array_search($element, $array);
	    if($index !== false){
	        unset($array[$index]);
	    }

	    return $array;
	}

	protected function getAction(array $params)
	{
		foreach ($this->actions as $value) {
			if (in_array($value, $params)) {
				$this->action = $value;

				break;
			}
		}

		return $this->action;
	}
}

