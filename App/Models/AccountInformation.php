<?php


namespace App\Models;


use App\DatabaseSettings;

class AccountInformation
{
	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setup()
	{
		return $this->getUserInformation();
	}

	private function getUserInformation()
	{
        $pdo = new DatabaseObject();
        return $pdo->getUserInfo( $this->id );
	}
}