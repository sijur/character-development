<?php

namespace Core;

/**
 * Details for a single log entry.
 *
 * @author Allan O'Driscoll
 */
class LogEntry {

	private $timestamp;
	private $level;
	private $message;

	function __construct($timestamp, $level, $message) {
		$this->timestamp = $timestamp;
		$this->level = $level;
		$this->message = $message;
	}

	public function getTimestamp() {
		return $this->timestamp;
	}

	public function getLevel() {
		return $this->level;
	}

	public function getMessage() {
		return $this->message;
	}

}
