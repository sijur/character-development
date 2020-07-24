<?php
/**
 * File Name    : Dispatch.php
 * Author       : Steven O'Driscoll
 * Project      : gwb-original-artwork
 */

namespace Core\Router;

use Core\Strings\Strings;

/**
 * First file to be called from the index.php to route to files.
 *
 * Class Dispatch
 * @package Core\Router
 */
class Dispatch extends MatchRoute
{
	/**
	 * I know, I know, it's a constructor.
	 *
	 * Dispatch constructor.
	 *
	 * @param $url
	 */
	public function __construct($url)
	{
		parent::__construct($url);
	}

    /**
     * We're just setting things up here.
     * The setup function that is in the parent is the
     * MatchRoute class's setup function.
     *
     * @throws \Exception
     */
	public function setup()
	{
		parent::setup();
		$this->dispatch(self::$url);
	}

	/**
	 * Okay, this is the main part of this file.
	 * This function is what finds converts filename's to things
	 * that it can work with and then calls them.
	 *
	 * @param $url
	 *
	 * @throws \Exception
	 */
	private function dispatch($url)
	{
        $strings = new Strings();
		/*
		 * This is us taking the url and removing the query string.
		 */
		$url = $strings::removeQueryStringVariables($url);

		/*
		 * Okay, the matchRoute function is in the MatchRoute class.  You
		 * can go there to find out what it does.
		 */
		if ($this->matchRoute($url))
		{
			/*
			 * we're grabbing the controller from the params saved in the
			 * Router class so we can work with it here.
			 */
			$controller = $this->params['controller'];

			/*
			 * gotta instantiate the Strings class so that we can work with
			 * the strings.
			 */

			$controller = $strings::convertToPascalCase($controller);

			/*
			 * Since our autoloader requires the namespace, we have to add that in here.
			 */
			$controller = $this->getNamespace() . $controller;

			/*
			 * Okay, so if the class exists we need to do stuff with it.
			 * Otherwise we're going to have to throw an exception.
			 */
			if (class_exists($controller))
			{
				/*
				 * Okay, remember that controller up there that we got,
				 * well we also need the action.  The action is the function
				 * that we're going to run inside the file that we're calling
				 *
				 * (e.g. index, or maybe a bio... or whatever we want)
				 */
				$controller_object = new $controller($this->params);

				/*
				 * okay, so if no action is specified we're going to use the index action.
				 * then we're going to convert it to something that we can use.
				 */
				$action = (isset($this->params['action'])) ? $this->params['action'] : 'index';
				$action = $strings::convertToCamelCase($action);

				if (preg_match('/action$/i', $action) === 0)
				{
					$controller_object->$action();
				}
				else
				{
					throw new \Exception("Method $action (in controller $controller) not found", 404);
				}
			}
			else
			{
				throw new \Exception("Controller class $controller not found", 404);
			}
		}
		else
		{
			throw new \Exception('No route matched.', 404);
		}
	}
}