<?php
namespace Core;
use AltoRouter, Exception;

/**
 * Router
 *
 * @property AltoRouter route
 * @property array match
 */
class Router {

	/**
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->route = new AltoRouter();
		$this->route->setBasePath($_ENV['APP_PATH_RELATIVE']);
		$this->route->addMatchTypes([ 'char' => '[0-9A-Za-z_-]++' ]);
		$this->route->addRoutes($this->map());
		$this->match = $this->route->match();
	}

	/**
	 * route map
	 *
	 * @return array
	 */
	private function map()
	{
	  if (file_exists(__PATH__.'/./user/route.php'))
    {
      return require __PATH__.'/./user/route.php';
    }
	  else
    {
      return require __PATH__.'/./resource/route.php';
    }
	}

}
