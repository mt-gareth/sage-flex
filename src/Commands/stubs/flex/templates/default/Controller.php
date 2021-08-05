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
			->addTrueFalse( 'hide_section', [
				'ui'          => 1,
			] )
			->addSelect( 'layout', [ 'choices' => [
				'layout1'   => 'Layout 1',
				'layout2'    => 'Layout 2',
			] ] );
		return $fields;
	}

	public function with()
	{
		return [
			'content',
			'layout'
		];
	}
}
