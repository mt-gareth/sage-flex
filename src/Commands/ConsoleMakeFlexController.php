<?php

namespace Motiontactic\Commands;

class ConsoleMakeFlexController extends CommandMake
{
	protected $name = 'make:flex-controller';
	protected $description = 'Make a Flexible Component Controller';
	protected $type = 'Console command';

	protected function getStub()
	{
		$template = $this->argument( 'template' );
		return __DIR__ . "/stubs/flex/templates/$template/Controller.php";
	}

	protected function getFileName( $name )
	{
		return $name . ".php";
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/app/View';
	}

	protected function getSubfolder()
	{
		return '/Flex';
	}
}
