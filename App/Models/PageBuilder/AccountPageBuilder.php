<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use \App\Models\PageBuilder;


class AccountPageBuilder extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
	}

	public function mainContainerAccountCreation( $user )
	{
		$html = new HtmlElementCreator();

		$msg = $this->h4( 'loginTitle', $user[ 'first_name' ] );
		$content = $this->leftSideBar();
		$content .= $this->accountContainer( $user );
		$content .= $this->rightSideBar();

		$msg .= $html->basicDiv( 'mainContainer accountPage', $content );

		self::render( $msg );
	}

	protected function accountContainer( $user )
	{
		$html = new HtmlElementCreator();

		$class = 'accountContainer middleContainer margin5PercentSide';
		$content = $this->accountContentSections( $user );
		return $html->basicDiv( $class, $content );
	}

	protected function accountContentSections( $user )
	{
		$html = new HtmlElementCreator();

		$content = $this->userSection(
			$user[ 'full_name' ],
			$user[ 'user' ],
			$user[ 'email_address' ],
			$user[ 'bio' ]
		);

		$innerSection = $html->basicDiv( 'section-title', 'Games' );
		$content .= $html->section( $innerSection );

		return $content;
	}

	protected function userSection($fullName, $userName, $emailAddress, $bio)
	{
		$html = new HtmlElementCreator();

		$content = $html->basicDiv( 'section-title', 'User Information' );
		$content .= $this->tableElement( $fullName, $userName, $emailAddress, $bio );

		return $html->section( $content );

	}

	protected function tableElement( $fullName, $userName, $emailAddress, $bio )
	{
		$html = new HtmlElementCreator();

		$tableContent = $this->userSectionRow( 'Name:', $fullName );
		$tableContent .= $this->userSectionRow( 'User Name:', $userName );
		$tableContent .= $this->userSectionRow( 'Email:', $emailAddress );
		$tableContent .= $this->userSectionRow( 'Bio:', $bio );

		return $html->table( $tableContent );

	}

	protected function userSectionRow( $text, $value )
	{
		$html = new HtmlElementCreator();
		$content = $html->column( 'first', '', $text );
		$content .= $html->column( 'second', 'valueColumn', $value );
		return $html->row( $content );
	}

}