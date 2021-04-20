<?php

namespace Motiontactic\Commands;

class ConsoleRemoveFlexScript extends CommandRemove
{
	protected $name = 'remove:flex-script';
	protected $description = 'Remove a Flexible Component Script';
	protected $type = 'Console command';

	protected function getFileName( $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		return $name_dashes . ".js";
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/resources/scripts';
	}

	public function handle()
	{
		parent::handle();
		$this->updateIndexJs();
	}

	protected function updateIndexJs()
	{
		$index_dir = \get_theme_file_path() . '/resources/scripts/flex/';
		$index_path = $index_dir . 'index.js';
		if ( !$this->files->isFile( $index_path ) ) return $this->info( 'Index.js was not there' );

		$name = $this->argument( 'name' );
		$name_dashes = $this->from_camel_case( $name, '-' );

		$index_js = file_get_contents( $index_path );
		$import = "import $name from './$name_dashes';";
		$init = "$name.init();";

		$index_js = str_replace( $import . PHP_EOL, '', $index_js );
		$index_js = str_replace( $init . PHP_EOL . '        ', '', $index_js );
		$this->files->replace( $index_path, $index_js );
		return $this->info( 'Index.js updated' );
	}

}
