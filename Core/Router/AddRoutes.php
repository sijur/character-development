<?php
/**
 * File Name    : AddRoutes.php
 * Author       : Steven O'Driscoll
 * Project      : gwb-original-artwork
 */

namespace Core\Router;

use Core;

/**
 * Class AddRoutes
 * @package Core\Router
 */
class AddRoutes extends Core\Router
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Hey we're finally at the point where we don't need
	 * the parents setup function to run... yay!
	 * We do need to run the addRoutes function though.
	 */
	public function setup()
	{
		$this->addRoutes();
	}

	/**
	 * We're going to add the Routes.
	 */
	private function addRoutes()
	{
		$this->add('{controller}');
		$this->add('{controller}/{action}');
//		$this->add('{controller}/{action}/{id:\d+}');
	}

	/**
	 * So, this is where we add all the regular expression stuff
	 * so that we can match the other routes.
	 * (e.g. /about-me/)
	 *
	 * @param       $route
	 * @param array $params
	 */
	private function add($route, $params = [])
	{
		$route = self::convertRoute($route);
		$route = self::convertVariables($route);
		$route = self::convertVariablesRegExpressions($route);
		$route = self::convertVariablesWithIds($route);
		$route = self::addDelimiters($route);

		$this->routes[$route] = $params;
	}

	/**
	 * Convert the route to a regular expression: escape forward slashes
	 *
	 * @param $route
	 *
	 * @return null|string|string[]
	 */
	private static function convertRoute($route)
	{
		return preg_replace('/\//', '\\/', $route);
	}

	/**
	 * Convert variables e.g. {controller}
	 *
	 * @param $route
	 *
	 * @return null|string|string[]
	 */
	private static function convertVariables($route)
	{
		return preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
	}

	/**
	 * Convert variables with custom regular expressions e.g. {id:\d+}
	 *
	 * @param $route
	 *
	 * @return null|string|string[]
	 */
	private static function convertVariablesRegExpressions($route)
	{
		return preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
	}

	/**
	 * convert variables with custom regular expressions.
	 *
	 * @param $route
	 *
	 * @return null|string|string[]
	 */
	private static function convertVariablesWithIds($route)
	{
		// convert variables with custom regular expressions.
		return preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
	}

	/**
	 * Add start and end delimiters, and case insensitive flag
	 *
	 * @param $route
	 *
	 * @return string
	 */
	private static function addDelimiters($route)
	{
		return '/^' . $route . '$/i';
	}
}