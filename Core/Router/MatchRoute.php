<?php
/**
 * File Name    : MatchRoute.php
 * Author       : Steven O'Driscoll
 * Project      : gwb-original-artwork
 */

namespace Core\Router;

/**
 * Class MatchRoute
 *
 * @package Core\Router
 */
class MatchRoute extends AddRoutes
{
	protected static $url = '';

	/**
	 * We still have to grab the parents constructor.
	 *
	 * MatchRoute constructor.
	 *
	 * @param $url
	 */
	public function __construct($url)
	{
		self::$url = $url;
		parent::__construct();
	}

	/**
	 * setup function, we still need to ask the parent function
	 * for stuff so that has to run first.
	 * But then we're going to run the matchRoute function here.
	 */
	public function setup()
	{
		parent::setup();
	}

	/**
	 * If there is nothing else being asked for
	 * (e.g. http://gwboriginalartwork.com)
	 * then it's going to default to the 'Home/index'
	 * controller/action
	 *
	 * @param $url
	 *
	 * @return bool
	 */
	protected function matchRoute($url)
	{
		$url = ($url === '') ? 'Home/index' : $url;

		foreach ($this->routes as $route => $params)
		{
			if (preg_match($route, $url, $matches))
			{
				foreach ($matches as $key => $match)
				{
					if (is_string($key))
					{
						$params[$key] = $match;
					}
				}

				$this->params = $params;
				return true;
			}
		}
		return false;
	}
}