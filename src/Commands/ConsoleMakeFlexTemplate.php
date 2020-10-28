<?php

namespace Motiontactic\Commands;

class ConsoleMakeFlexTemplate extends CommandMake
{
	protected $name = 'make:flex-template';
	protected $description = 'Make a Flexible Component Blade';
	protected $type = 'Console command';

	protected function getStub()
	{
		$template = $this->argument( 'template' );
		return __DIR__ . "/stubs/flex/templates/$template/Template.stub";
	}

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
