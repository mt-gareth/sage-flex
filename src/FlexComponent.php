<?php

namespace Motiontactic;

use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexComponent
{
	public function fields()
	{
		$fields = $this->builder( $this->name );
		$content_fields = $this->content_fields();
		$settings_fields = $this->settings_fields();

		if ( $content_fields && $settings_fields ) {
			$fields
				->addTab( 'Content' )
				->addFields( $content_fields )
				->addTab( 'Settings' )
				->addFields( $settings_fields );
		} elseif ( $content_fields ) {
			$fields->addFields( $content_fields );
		} elseif ( $settings_fields ) {
			$fields->addFields( $settings_fields );
		}

		return $fields;
	}

	public function builder( $name )
	{
		return new FieldsBuilder( $name );
	}

	public function content_fields()
	{
		return false;
	}

	public function settings_fields()
	{
		return false;
	}

	public function with()
	{
		return false;
	}
}
