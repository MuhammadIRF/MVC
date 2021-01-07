<?php
/**
 * 
 *	BackEnd For Controller System
 *
 */
$controller = "";
$file = "";
$func = "";
class Controller
{
	public function include_controller()
	{
		global $controller;global $file;global $func;
		include 'App/controller/'.$file.'.php';
		$Controller = new Index();
		$Controller->$func();
	}

	public function get_controller()
	{
		global $controller;global $file;global $func;
		$controller_array = explode(":",$controller);
		$file = $controller_array[0];
		$func = $controller_array[1];
	}
	public function controller_name()
	{
		global $url;global $routes;global $controller;
		$name = "";
		for ($i=0;$i<count($routes);$i++) {
			if ($url[0]==$routes[$i][0]) {
				$name = $routes[$i][1];
				break;
			} else {
				$name = "Error:NotFound";
			}
		}
		$controller = $name;
	}

	function __construct()
	{
		global $controller;global $file;global $func;
		$this->controller_name();
		$this->get_controller();
		$this->include_controller();
	}
}

$Controller = new Controller();