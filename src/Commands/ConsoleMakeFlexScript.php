<?php

namespace Motiontactic\Commands;

class ConsoleMakeFlexScript extends CommandMake
{
	protected $name = 'make:flex-script';
	protected $description = 'Make a Flexible Component Script';
	protected $type = 'Console command';

	protected function getStub()
	{
		$template = $this->argument( 'template' );
		return __DIR__ . "/stubs/flex/templates/$template/Script.js";
	}

	protected function getFileName( $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		return $name_dashes . ".js";
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/resources/assets/scripts';
	}

	public function handle()
	{
		parent::handle();
		$this->updateIndexJs();
	}

	protected function updateIndexJs()
	{
		$index_dir = \get_theme_file_path() . '/resources/assets/scripts/flex/';
		$index_path = $index_dir . 'index.js';
		if ( !$this->files->isFile( $index_path ) ) $this->makeIndexJs( $index_dir, $index_path );

		$name = $this->argument( 'name' );
		$name_dashes = $this->from_camel_case( $name, '-' );

		$index_js = file_get_contents( $index_path );
		$import = "import $name from './$name_dashes';";
		$init = "$name.init();";

		if ( strpos( $index_js, $import ) !== false ) return $this->error( 'Index.js contains Import already' );

		$index_js = str_replace( '//importsAboveHere', $import . PHP_EOL . '//importsAboveHere', $index_js );
		$index_js = str_replace( '//initAboveHere', $init . PHP_EOL . '        //initAboveHere', $index_js );
		$this->files->replace( $index_path, $index_js );
		return $this->info( 'Index.js updated' );
	}

	protected function makeIndexJs( $dir, $file )
	{
		$stub = file_get_contents( __DIR__ . '/stubs/flex/publish/IndexJs.js' );
		$this->makeFile( $dir, $file, $stub );
		return $this->error( 'add "import Flex from \'./flex\';" and "Flex.init();" to app.js' );
	}
}
