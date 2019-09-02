<?php
namespace App\Models;

use App\DatabaseSettings;

class LoginScript
{
	private $username;
	private $password;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function setup()
	{
		$this->resetLoginError();
		$newPass = $this->encryptPassword();
		return $this->getUserInformation($this->username, $newPass);

	}

	protected function resetLoginError()
	{
		session_start();
		$_SESSION['loginError'] = false;
	}

	protected function encryptPassword()
	{
		return sha1($this->password);
	}

	protected function getUserInformation($user, $pass)
	{
		$dbInfo = new DatabaseSettings();
		$db = $dbInfo->setup();
		$conn = mysqli_connect($db->host, $db->dbUser, $db->password, $db->dbName, '3306');

		$user = stripslashes($user);
		$pass = stripslashes($pass);

		$user = mysqli_real_escape_string($conn, $user);
		$pass = mysqli_real_escape_string($conn, $pass);

		$sql = "SELECT * FROM users WHERE user_name = '$user' AND password = '$pass'";

		return mysqli_query($conn, $sql);
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}