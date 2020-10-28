<?php

namespace Motiontactic\Commands;

class ConsoleMakeFlexStyle extends CommandMake
{
	protected $name = 'make:flex-style';
	protected $description = 'Make a Flexible Component Scss';
	protected $type = 'Console command';

	protected function getStub()
	{
		$template = $this->argument( 'template' );
		return __DIR__ . "/stubs/flex/templates/$template/Style.stub";
	}

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
		if ( !$this->files->isFile( $index_path ) ) $this->makeIndexScss( $index_dir, $index_path );

		$name = $this->argument( 'name' );
		$name_dashes = $this->from_camel_case( $name, '-' );

		$index_scss = file_get_contents( $index_path );
		$import = "@import '$name_dashes';";

		if ( strpos( $index_scss, $import ) !== false ) return $this->error( 'Index.scss contains Import already' );

		$index_scss = str_replace( '//importsAboveHere', $import . PHP_EOL . '//importsAboveHere', $index_scss );
		$this->files->replace( $index_path, $index_scss );
		return $this->info( 'Index.scss updated' );
	}

	protected function makeIndexScss( $dir, $file )
	{
		$stub = file_get_contents( __DIR__ . '/stubs/flex/IndexScss.stub' );
		$this->makeFile( $dir, $file, $stub );
		return $this->error( 'add "@import \'flex/index\';" to app.scss' );
	}
}
