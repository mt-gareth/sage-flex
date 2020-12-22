<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CommandPublish extends Command
{
	protected $name = 'publish:flex';
	protected $description = 'Add in the default files for flex';
	protected $type = 'Console command';
	protected $files;
	protected $publish_files = [];

	public function __construct( Filesystem $files )
	{
		$this->files = $files;
		parent::__construct();
	}

	public function handle()
	{
		$this->add_files();
	}

	protected function add_files()
	{
		foreach ( $this->publish_files as $stub_file => $new_file ) {
			$stub = file_get_contents( __DIR__ . $stub_file );
			$root = array_key_exists('root', $new_file) ? $new_file[ 'root' ] : \get_theme_file_path();
			$dir = $root . $new_file[ 'dir' ];
			$file = $dir . '/' . $new_file[ 'file' ];
			$this->makeFile( $dir, $file, $stub );
		}
	}

	protected function makeFile( $dir, $file, $stub )
	{
		if ( $this->files->isDirectory( $dir ) ) {
			if ( $this->files->isFile( $file ) ) {
				if ( $this->option('force') || $this->confirm( 'Do you wish to overwrite ' . $file . '?', true ) ) {
					$this->files->replace( $file, $stub );
					return $this->info( "$file overwritten!" );
				} else {
					return $this->error( $file . ' File Already exists!' );
				}
			}
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

}
