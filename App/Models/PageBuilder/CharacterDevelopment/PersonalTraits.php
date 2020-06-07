<?php


namespace App\Models\PageBuilder\CharacterDevelopment;


use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;

class PersonalTraits extends PageBuilder implements SectionInterface
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCharacterSheetLine()
	{
		$html = new HtmlElementCreator();

		$characterLine = [ 'Background: ', 'Gender: ' ];
		$content = '';

		foreach ( $characterLine as $c )
		{
			$content .= $html->column( 'title', $c );
			$content .= $html->column( 'content', '' );
		}

		return $html->row( $content );
	}

	public function setup()
	{
		$msg = $this->backgroundFormContainerSection();
		$msg .= $this->genderChoiceContainerSection();

		return $msg;
	}

	protected function backgroundFormContainerSection()
	{
		$html = new HtmlElementCreator();

		$content = $this->radioButtonContainers(['acolyte', 'charlatan', 'criminal', 'entertainer', 'folk hero', 'guild artisan', 'hermit', 'noble', 'outlander', 'sage', 'sailor', 'soldier', 'urchin'], 'background');
		$msg = $html->fieldset('backgroundMainSelection', 'Main Background Selection', $content);

		return $msg;
	}

	protected function genderChoiceContainerSection()
	{
		$html = new HtmlElementCreator();

		$content = $this->radioButtonContainers(['male', 'female'], 'gender');
		$msg = $html->fieldset('genderMainSelection', 'Gender Selection', $content);

		return $msg;
	}
}