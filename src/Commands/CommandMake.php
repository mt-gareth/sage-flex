<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class CommandMake extends Command
{
	protected $name = 'make:flex-script';
	protected $description = 'Make a Flexible Component Script';
	protected $type = 'Console command';
	protected $files;

	public function __construct( Filesystem $files )
	{
		$this->files = $files;
		parent::__construct();
	}

	protected function getStub()
	{
		return __DIR__ . '/stubs/flex/Script.js';
	}

	protected function getFileName( $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		return $name_dashes . ".js";
	}

	protected function updateStub( $stub, $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		$name_underscores = $this->from_camel_case( $name, '_' );
		$stub = str_replace( 'FlexNameDashes', $name_dashes, $stub );
		$stub = str_replace( 'FlexNameUnderscores', $name_underscores, $stub );
		$stub = str_replace( 'FlexNameCap', $name, $stub );
		return $stub;
	}

	protected function getPath()
	{
		return \get_theme_file_path() . '/resources/assets/styles';
	}

	protected function getSubfolder()
	{
		return '/flex';
	}

	protected function getArguments()
	{
		return [
			[ 'name', InputArgument::REQUIRED, 'The name of the class' ],
			[ 'template', InputArgument::OPTIONAL, 'The name of the template', 'default' ],
		];
	}

	public function handle()
	{
		$name = $this->argument( 'name' );

		if ( $name === '' || is_null( $name ) || empty( $name ) ) {
			return $this->error( 'Composer Name Invalid..!' );
		}

		$stub = file_get_contents( $this->getStub() );
		$stub = $this->updateStub( $stub, $name );

		$file = $this->getFileName( $name );
		$path = $this->getPath();

		$dir = $path . $this->getSubfolder();
		$file = $dir . '/' . $file;
		$this->makeFile($dir, $file, $stub);
	}

	protected function makeFile($dir, $file, $stub)
	{
		if ( $this->files->isDirectory( $dir ) ) {
			if ( $this->files->isFile( $file ) )
				return $this->error( $file . ' File Already exists!' );

			if ( !$this->files->put( $file, $stub ) )
				return $this->error( 'Something went wrong!' );
			$this->info( "$file generated!" );
		} else {
			$this->files->makeDirectory( $dir, 0777, true, true );

			if ( !$this->files->put( $file, $stub ) )
				return $this->error( 'Something went wrong!' );
			$this->info( "$file generated!" );
		}
	}

	public function from_camel_case( $input, $glue = '_' )
	{
		preg_match_all( '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches );
		$ret = $matches[ 0 ];
		foreach ( $ret as &$match ) {
			$match = $match == strtoupper( $match ) ? strtolower( $match ) : lcfirst( $match );
		}
		return implode( $glue, $ret );
	}

}
