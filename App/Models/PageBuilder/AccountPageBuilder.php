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

	public function userSection($fullName, $userName, $emailAddress, $bio)
	{
		$html = new HtmlElementCreator();

		$content = $html->basicDiv( 'section-title', 'User Information' );
		$content .= $this->tableElement( $fullName, $userName, $emailAddress, $bio );

		$msg = $html->section( $content );
		self::render( $msg );
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