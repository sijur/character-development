<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 5:47 PM
 */

namespace Core;

/**
 * The main (parent) Router class.  we're just going to
 * put into memory the routes, and the parameters here.
 *
 * Class Router
 * @package Core
 */
class Router
{
	public function __construct() {}

	protected $routes = [];

	protected $params = [];
}