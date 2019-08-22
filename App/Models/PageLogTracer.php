<?php

namespace App\Models;
use Core\Log;

/**
 * Description of PageLogTracer
 *
 * @author Allan O'Driscoll
 */
class PageLogTracer
{
	public function __construct() {}

	public function printLogTrace()
	{
		echo "<table>\n";
		echo "<thead>\n";
		echo "<tr><th align=\"left\">Timestamp</th><th align=\"left\">Level</th><th align=\"left\">Message</th></tr>\n";
		echo "</thead>\n";
		echo "<tbody>\n";
		foreach (Log::getPageLogEntries() as $logEntry)
		{
			$logLevelString = Log::getLevelAsString($logEntry->getLevel());
			echo "<tr class=\"log-tracer-" . strtolower($logLevelString) . "\">\n";
			echo "<td nowrap>" . strftime("[%H:%M:%S]", $logEntry->getTimestamp()) . "</td>\n";
			echo "<td>" . $logLevelString . "</td>\n";
			echo "<td>" . htmlspecialchars($logEntry->getMessage()) . "</td>\n";
			echo "</tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
	}
}