<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ConsolePublishFlex extends Command
{
	protected $name = 'publish:flex';
	protected $description = 'Add in the default files for flex';
	protected $type = 'Console command';
	protected $files;

	public function __construct( Filesystem $files )
	{
		$this->files = $files;
		parent::__construct();
	}

	public function handle()
	{
		$files = [
			'/stubs/flex/publish/FlexComposer.php' => [ 'dir' => '/app/View/Composers', 'file' => 'Flex.php' ],
			'/stubs/flex/publish/AppJS.js'        => [ 'dir' => '/resources/assets/scripts', 'file' => 'app.js' ],
			'/stubs/flex/publish/AppScss.scss'      => [ 'dir' => '/resources/assets/styles', 'file' => 'app.scss' ],
			'/stubs/flex/publish/IndexJs.js'      => [ 'dir' => '/resources/assets/scripts/flex', 'file' => 'index.js' ],
			'/stubs/flex/publish/IndexScss.scss'    => [ 'dir' => '/resources/assets/styles/flex', 'file' => 'index.scss' ],
		];

		foreach ( $files as $stub_file => $new_file ) {
			$stub = file_get_contents( __DIR__ . $stub_file );
			$dir = \get_theme_file_path() . $new_file[ 'dir' ];
			$file = $dir . '/' . $new_file[ 'file' ];
			$this->makeFile( $dir, $file, $stub );
		}
	}

	protected function makeFile( $dir, $file, $stub )
	{
		if ( $this->files->isDirectory( $dir ) ) {
			if ( $this->files->isFile( $file ) ) {
				if ( $this->confirm( 'Do you wish to overwrite ' . $file . '?', true ) ) {
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
