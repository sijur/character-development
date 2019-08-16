<?php


namespace Library\Core;


class CharacterSettings
{
	public $config;

	public function __construct()
	{
		$this->config = include 'settings.php';
	}

	public function getSetting($setting)
	{
		return $this->config[$setting];
	}

	public function setSetting($setting, $value)
	{
		$this->config[$setting] = $value;
	}
}