<?php

namespace App\View\Flex;

use Motiontactic\FlexComponent;

class FlexNameCap extends FlexComponent
{
	public $name = 'FlexNameUnderscores';

	public function content_fields()
	{
		$fields = $this->builder( $this->name );
		$fields
			->addWysiwyg( 'hero_content' );

		return $fields;
	}

	public function settings_fields()
	{
		$fields = $this->builder( $this->name );
		$fields
			->addSelect( 'hero_type', [ 'choices' => [
				'type1'   => 'Hero 1',
				'type2'    => 'Hero 2',
			] ] );
		return $fields;
	}

	public function with()
	{
		return [
			'hero_content',
			'hero_type'
		];
	}
}
