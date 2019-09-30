<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 5:50 PM
 */

namespace Core;

use App;

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

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
			echo "<p>Stack trace:<pre>" . self::getExceptionTraceAsString($exception) . "</pre></p>";
			echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
		}
		else
		{
			$dir = realpath(dirname(__DIR__) . '/public/logs/');
			$log = $dir . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
			ini_set('error_log', $log);
			$message = "Uncaught exception: '" . get_class($exception) . "'";
			$message .= " with message '" . $exception->getMessage() . "'";
			$message .= "\nStack trace: " . $exception->getExceptionTraceAsString($exception);
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

	protected static function getExceptionTraceAsString($exception)
	{
		$error = NULL;
		$count = 0;
		foreach ($exception->getTrace() as $frame)
		{
			$args = NULL;
			if (isset($frame['args']))
			{
				$args = array();
				foreach ($frame['args'] as $arg)
				{
					if (is_string($arg))
					{
						$args[] = "'" . $arg . "'";
					}
					elseif (is_array($arg))
					{
						$args[] = "Array";
					}
					elseif (is_null($arg))
					{
						$args[] = 'NULL';
					}
					elseif (is_bool($arg))
					{
						$args[] = ($arg) ? "true" : "false";
					}
					elseif (is_object($arg))
					{
						$args[] = get_class($arg);
					}
					elseif (is_resource($arg))
					{
						$args[] = get_resource_type($arg);
					}
					else
					{
						$args[] = $arg;
					}
				}
				$args = join(", ", $args);
			}
			$current_file = "[internal function]";
			if(isset($frame['file']))
			{
				$current_file = $frame['file'];
			}
			$current_line = "";
			if(isset($frame['line']))
			{
				$current_line = $frame['line'];
			}
			$error .= sprintf( "#%s %s(%s): %s(%s)\n",
				$count,
				$current_file,
				$current_line,
				$frame['function'],
				$args );
			$count++;
		}
		return $error;
	}
}