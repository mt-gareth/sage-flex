<?php

namespace Motiontactic\Commands;

class ConsoleRemoveFlexStyle extends CommandRemove
{
	protected $name = 'remove:flex-style';
	protected $description = 'Remove a Flexible Component Scss';
	protected $type = 'Console command';

	protected function getFileName( $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		return $name_dashes . ".scss";
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/resources/assets/styles';
	}

	public function handle()
	{
		parent::handle();
		$this->updateIndexScss();
	}

	protected function updateIndexScss()
	{

		$index_dir = \get_theme_file_path() . '/resources/assets/styles/flex/';
		$index_path = $index_dir . 'index.scss';
		if ( !$this->files->isFile( $index_path ) ) return $this->info( 'Index.scss was not there' );

		$name = $this->argument( 'name' );
		$name_dashes = $this->from_camel_case( $name, '-' );

		$index_scss = file_get_contents( $index_path );
		$import = "@import '$name_dashes';";

		$index_scss = str_replace( $import . PHP_EOL, '', $index_scss );

		$this->files->replace( $index_path, $index_scss );
		return $this->info( 'Index.scss updated' );
	}

}
