<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 6:01 PM
 */

namespace Core;


abstract class Controller
{
	/**
	 * Parameters from the matched route
	 *
	 * @var array
	 */
	protected $route_params = [];

	/**
	 * Controller constructor.
	 *
	 * @param $route_params
	 *
	 * @return void
	 */
	public function __construct($route_params)
	{
		$this->route_params = $route_params;
	}

	/**
	 * So I call an action method e.g. index and I need it to add
	 * the suffix of 'Action' to it.  That way I can utilize the
	 * action method in the controller.
	 * @param $name
	 * @param $args
	 *
	 * @throws \Exception
	 */
	public function __call($name, $args)
	{
		// add the suffix of 'Action' to the action that is being called.
		$method = $name . 'Action';

		if (method_exists($this, $method))
		{
			/**
			 * now that we know the method exists let's do something.
			 * I want to check to see if a before method has run.
			 * if it has and it's return false then stop.
			 */
			if ($this->before() !== false)
			{
				// call the header method before the call_user_func_array()
				$this->header();

				// call the method e.g. 'indexAction'
				call_user_func_array([$this, $method], $args);

				// call footer method after the call_user_func_array()
				$this->footer();

				// call a method to be done after the call_user_func_array()
				$this->after();

			}
		} else {
			throw new \Exception("Method $method not found in controller " . get_class($this), 404);
		}
	}

	abstract protected function getTitle();

	protected function header()
	{
		View::render('Header/header.php', [
			'title' => $this->getTitle()
		]);
	}

	protected function footer()
	{
		View::render('Footer/footer.php');
	}

	protected function before() {}

	protected function after() {}
}