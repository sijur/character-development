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
		$dbInfo = new DatabaseSettings();
		$db = $dbInfo->setup();

		$conn = mysqli_connect($db->host, $db->dbUser, $db->password, $db->dbName, '3306');

		$sql = "
				SELECT
					user_name AS 'user',
				    first_name,
				    concat(first_name, ' ', last_name) AS 'full_name',
				    bio,
				    email_address,
				    is_dm,
				    dm_id,
				    is_player,
				    player_id
				    
				FROM
				    users
				WHERE
				      id = $this->id;
		      ";

		return mysqli_query($conn, $sql);
	}
}