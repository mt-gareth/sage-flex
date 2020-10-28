<?php

namespace Motiontactic\Commands;

class ConsoleRemoveFlexTemplate extends CommandRemove
{
	protected $name = 'remove:flex-template';
	protected $description = 'Remove a Flexible Component Blade';
	protected $type = 'Console command';

	protected function getFileName( $name )
	{
		$name_underscores = $this->from_camel_case( $name, '_' );
		return $name_underscores . ".blade.php";
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/resources/views';
	}
}
