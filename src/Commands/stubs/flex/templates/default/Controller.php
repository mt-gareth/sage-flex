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
			->addWysiwyg( 'content' );

		return $fields;
	}

	public function settings_fields()
	{
		$fields = $this->builder( $this->name );
		$fields
			->addSelect( 'type', [ 'choices' => [
				'type1'   => 'Type 1',
				'type2'    => 'Type 2',
			] ] );
		return $fields;
	}

	public function with()
	{
		return [
			'content',
			'type'
		];
	}
}
