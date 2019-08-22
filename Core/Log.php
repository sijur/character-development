<?php
/**
 * User: Allan O'Driscoll
 * Date: 8/03/2018
 */

namespace Core;

use App\Config;


/**
 * Simple and lightweight application logging interface.
 *
 * Usage and Examples:
 *
 * <b>Set the active log level filter</b>
 *
 * Log::setLogLevelFilter(Log::DEBUG);
 *
 * <b>Log messages at different log levels.</b>
 *
 * Log::info("This is an informative log message");
 * Log::error("This is a critical log message");
 *
 * <b>Do some extra testing if debug logging is enabled.</b>
 *
 * if (Log::isDebug()) {
 *     perform_extra_test_for_debugging();
 *     Log::debug("If Spock were here, he’d say that I was an irrational,
 *          illogical human being for writing a logger like this... Sounds like fun!");
 * }
 *
 * <b>Log message with additional context parameters.</b>
 *
 * Log::trace('About::indexAction()', ['dir' => __DIR__, 'namespace' => __NAMESPACE__]);
 */
class Log
{
	/**
	 * TRACE log level. Used for VERY verbose debug messages. Should be used
	 * for debugging only as it could impact performance in production.
	 */
	const TRACE = 10;

	/**
	 * DEBUG log level. Used for verbose debug messages. Should be used
	 * for debugging only as it could impact performance in production.
	 */
	const DEBUG = 20;

	/**
	 * INFO log level. Used for informative runtime messages. Messages at this
	 * level an above are safe for production.
	 */
	const INFO = 30;

	/**
	 * WARN log level. A warning message that should be brought to the attention
	 * of the administration. The system is still functioning but may lead to
	 * an impaired condition if action is not taken.
	 */
	const WARN = 50;

	/**
	 * ERROR log level. A critical log message regarding impaired functionality.
	 * An application function has failed but the system as a whole is still
	 * operational. Action must be taken to repair the broken functionality.
	 */
	const ERROR = 60;

	/**
	 * FATAL log level. The application is not functioning. Used for extreme
	 * conditions that affect the entire application. For example "Out of disk space"
	 * or "Unable to connect to database."
	 */
	const FATAL = 70;

	/**
	 * Internal log level map.
	 * @var array A map of internal log level values to strings. Used for formatting
	 * log messages.
	 */
	private static $logLevels = [
			self::TRACE => 'TRACE',
			self::DEBUG => 'DEBUG',
			self::INFO  => 'INFO',
			self::WARN  => 'WARN',
			self::ERROR => 'ERROR',
			self::FATAL => 'FATAL',
	];

	/**
	 * @var Integer The current log level used for filtering.
	 */
	private static $logLevelFilter = self::INFO;

	/**
	 *
	 * @var array a list of log entries for the page request.
	 */
	private static $pageLogEntries = array();

	/**
	 * Set the global log level for future messages. Messages logged at a level
	 * less than this value will be filtered.
	 *
	 * @param boolean $logLevel the new global log level.
	 */
	public static function setLogLevelFilter($logLevel)
	{
		self::$logLevelFilter = $logLevel;
	}

	/**
	 * Get the printable string value for the given log level.
	 * @param Integer $logLevel integer value to convert to a string.
	 * @return String String representation of the given log level.
	 */
	public static function getLevelAsString($logLevel)
	{
		// TODO: Normailze level
		return self::$logLevels[$logLevel];
	}

	/**
	 * Log a message at the given log level. Note that the message may be filtered
	 * if the log level filter is greater than the specified log level. Current
	 * date and log file are automatically prepended to the beginning of the
	 * logged message.
	 *
	 * @param Integer $logLevel the log level of the message to be logged. Must
	 * be one of TRACE, DEBUG, INFO, WARN, ERROR and FATAL.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	private static function logMessage($logLevel, $message, $params)
	{
		if ($logLevel >= self::$logLevelFilter)
		{
			$timestamp = time();
			$level = self::$logLevels[$logLevel];
			$log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';

			$formattedMessage = $message;
			if ($params != null)
			{
				foreach ($params as $key => $value)
				{
					$formattedParam = $key . '=' . print_r($value, TRUE);
					$formattedMessage = $formattedMessage . ', ' . $formattedParam;
				}
			}

			if (Config::SHOW_PAGE_TRACER)
			{
				$logEntry = new LogEntry($timestamp, $logLevel, $formattedMessage);
				array_push(self::$pageLogEntries, $logEntry);
			}

			error_log(strftime("[%Y-%m-%d %H:%M:%S %Z]") . ' [' . $level . '] ' . $formattedMessage . "\n", 3, $log);
		}
	}

	/**
	 * Log a message at TRACE level. Note that the message may be filtered if
	 * the log level filter is greater than TRACE.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function trace($message, $params = [])
	{
		self::logMessage(self::TRACE, $message, $params);
	}

	/**
	 * Log a message at DEBUG level. Note that the message may be filtered if
	 * the log level filter is greater than DEBUG.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function debug($message, $params = [])
	{
		self::logMessage(self::DEBUG, $message, $params);
	}

	/**
	 * Log a message at INFO level. Note that the message may be filtered if
	 * the log level filter is greater than INFO.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function info($message, $params = [])
	{
		self::logMessage(self::INFO, $message, $params);
	}

	/**
	 * Log a message at WARN level. Note that the message may be filtered if
	 * the log level filter is greater than WARN.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function warn($message, $params = [])
	{
		self::logMessage(self::WARN, $message, $params);
	}

	/**
	 * Log a message at ERROR level. Note that the message may be filtered if
	 * the log level filter is greater than ERROR.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function error($message, $params = [])
	{
		self::logMessage(self::ERROR, $message, $params);
	}

	/**
	 * Log a message at FATAL level. Note that the message may be filtered if
	 * the log level filter is greater than FATAL.
	 *
	 * @param String $message the message to be logged
	 *
	 * @param Array $params an optional associative array containing addition
	 * parameters to be logged. If specified these parameters will be formatted
	 * in a readable format and appended to the end of the message.
	 */
	public static function fatal($message, $params = [])
	{
		self::logMessage(self::FATAL, $message, $params);
	}

	/**
	 * @return boolean TRUE if TRACE level debugging is enabled.
	 */
	public static function isTrace()
	{
		return self::TRACE >= self::$logLevelFilter  ? TRUE : FALSE;
	}

	/**
	 * @return boolean TRUE if DEBUG level debugging is enabled.
	 */
	public static function isDebug()
	{
		return  self::DEBUG >= self::$logLevelFilter ? TRUE : FALSE;
	}

	/**
	 * @return boolean TRUE if INFO level debugging is enabled.
	 */
	public static function isInfo()
	{
		return self::INFO >= self::$logLevelFilter  ? TRUE : FALSE;
	}

	/**
	 * @return boolean TRUE if WARN level debugging is enabled.
	 */
	public static function isWarn()
	{
		return self::WARN >= self::$logLevelFilter  ? TRUE : FALSE;
	}

	/**
	 * @return boolean TRUE if ERROR level debugging is enabled.
	 */
	public static function isError()
	{
		return self::ERROR >= self::$logLevelFilter  ? TRUE : FALSE;
	}

	/**
	 * @return boolean TRUE if FATAL level debugging is enabled.
	 */
	public static function isFatal()
	{
		return self::FATAL >= self::$logLevelFilter  ? TRUE : FALSE;
	}

	/**
	 * @return array a list of log entries created during the page execution
	 */
	public static function getPageLogEntries()
	{
		return self::$pageLogEntries;
	}


}
