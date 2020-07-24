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

    /**
     * Since we know that the namespace is going to follow
     * the folder structure, we have to add that part into
     * the namespace.
     *
     * @return string
     */
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params))
        {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}