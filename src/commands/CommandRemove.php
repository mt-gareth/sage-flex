<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class CommandRemove extends Command
{
	protected $name = 'remove:flex-script';
	protected $description = 'Make a Flexible Component Script';
	protected $type = 'Console command';
	protected $files;

	public function __construct( Filesystem $files )
	{
		$this->files = $files;
		parent::__construct();
	}

	protected function getFileName( $name )
	{
		$name_dashes = $this->from_camel_case( $name, '-' );
		return $name_dashes . ".js";
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
		];
	}

	public function handle()
	{
		$name = $this->argument( 'name' );

		if ( $name === '' || is_null( $name ) || empty( $name ) ) {
			return $this->error( 'Composer Name Invalid..!' );
		}

		$file = $this->getFileName( $name );
		$path = $this->getPath();

		$dir = $path . $this->getSubfolder();
		$file = $dir . '/' . $file;

		if ( !unlink( $file ) ) {
			return $this->error( $file . ' Error - was not removed' );
		}
		return $this->info( "$file Removed!" );
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
