<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;

class LoginPageBuilder extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
	}

	public function loginContainer()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerContent();
		$msg = $html->basicDiv('loginContainer', $content);

		self::render($msg);
	}

	protected function loginContainerContent()
	{
		$html = new HtmlElementCreator();
		$msg = $html->headerEle('2', 'Login');
		$msg .= $this->loginContainerForm();
		$msg .= $html->basicLink('#', 'bottom-link left', 'Sign up');
		$msg .= $html->basicLink('#', 'bottom-link right', 'Forgot Password');

		return $msg;
	}

	protected function loginContainerForm()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerFormContent();
		$msg = $html->basicForm('loginFormContainer', 'loginForm', '/verify/index', $content);
		return $msg;
	}

	protected function loginContainerFormContent()
	{
		$html = new HtmlElementCreator();

		$msg = $html->input('text', 'userName', 'mainLabel', 'mainInput', 'UserName:');
		$msg .= $html->input('password', 'password', 'mainLabel', 'mainInput', 'Password:');
		$msg .= $html->button('loginButton', 'mainBtn', 'Login');

		return $msg;
	}
}