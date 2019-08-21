<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 5:50 PM
 */

namespace Core;

use App;


class Error
{
	/**
	 * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
	 *
	 * @param int    $level   Error level
	 * @param string $message Error message
	 * @param string $file    Filename the error was raised in
	 * @param int    $line    Line number in the file
	 *
	 * @throws \ErrorException
	 */
	public static function errorHandler($level, $message, $file, $line)
	{
		if (error_reporting() !== 0)
		{
			// to keep the @ operator working
			throw new \ErrorException($message, 0, $level, $file, $line);
		}
	}

	/**
	 * Exception handler.
	 *
	 * @param Exception $exception The exception
	 *
	 * @return void
	 */
	public static function exceptionHandler($exception)
	{
		// Code is 404 (not found) or 500 (general error)
		$code = $exception->getCode();
		if ($code != 404)
		{
			$code = 500;
		}
		http_response_code($code);

		if (App\Config::SHOW_ERRORS)
		{
			echo "<h1>Fatal error</h1>";
			echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
			echo "<p>Message: '" . $exception->getMessage() . "'</p>";
			echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
			echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
		}
		else
		{
			$dir = realpath(dirname(__DIR__) . '/public/logs/');
			$log = $dir . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
			var_dump($log);
			ini_set('error_log', $log);
			$message = "Uncaught exception: '" . get_class($exception) . "'";
			$message .= " with message '" . $exception->getMessage() . "'";
			$message .= "\nStack trace: " . $exception->getTraceAsString();
			$message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

			error_log($message);

			if ($code === 404)
			{
				View::render('404.php', [
						'title' => 'Not Found'
				]);
			}
			else
			{
				View::render('500.php', [
						'title' => 'Something went wrong.'
				]);
			}

		}
	}
}