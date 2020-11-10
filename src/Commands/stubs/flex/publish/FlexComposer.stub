<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Flex extends Composer
{
	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
		'flex.*',
	];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with()
	{
		return $this->fields();
	}

	/**
	 * Returns the site name.
	 *
	 * @return array|bool
	 */
	public function fields()
	{
		$flex = \Motiontactic\Flex::getInstance();
		$name = explode( '.', $this->view->name() )[ 1 ];
		$this_section = false;
		foreach ( $flex->sections as $section ) {
			if ( $section->name == $name ) {
				$this_section = $section;
				break;
			}
		}
		if ( !$this_section ) return [];

		$with = $this_section->with();
		if ( !$with ) return [];

		$fields = [];

		foreach ( $with as $field_name ) {
			$fields[ $field_name ] = get_sub_field( $field_name );
		}

		return $fields;
	}
}
