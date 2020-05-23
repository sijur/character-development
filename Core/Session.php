<?php

namespace Core;


class Session
{
	public function __construct() {}

	public function setup( $action, $key = '', $value = '' )
	{
		switch ( $action )
		{
			case 'start':
			case 'create':
				$this->createSession();
				break;
			case 'set':
			case 'add':
				$this->addSessionVariable( $key, $value );
				break;
			case 'unset':
				self::unsetSessionVariable( $key );
				break;
			case 'destroy':
				self::sessionDestruction();
				break;
		}
	}

	protected function createSession()
	{
		if ( self::exists() == 1 )
		{
			$this->sessionConstruction();
		}
	}

	protected function sessionConstruction()
	{
		session_start();
	}

	protected static function unsetSessionVariable( $key )
	{
		unset( $_SESSION[ $key ] );
	}

	protected static function sessionDestruction()
	{
		session_destroy();
	}

	protected function addSessionVariable( $key, $value )
	{
		if ( $this->exists() !== 2 || session_id() !== $_COOKIE[ 'PHPSESSID' ] )
		{
			return;
		}

		$_SESSION[ $key ] = $value;
	}

	protected static function exists()
	{
		return session_status();
	}
}