<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ConsoleMakeFlex extends Command
{
	protected $name = 'make:flex';
	protected $description = 'Make a Flexible Component Blade Template';
	protected $type = 'Console command';

	protected $template_options = [
		'default',
		'hero',
	];

	protected function getArguments()
	{
		return [
			[ 'name', InputArgument::REQUIRED, 'The name of the class' ],
			[ 'template', InputArgument::OPTIONAL, 'The name of the template', 'default' ],
		];
	}

	protected function getOptions()
	{
		return [
			[ 'no-scripts', 'N', InputOption::VALUE_NONE, 'Do Not Create Scripts' ],
		];
	}

	public function handle()
	{
		$name = $this->argument( 'name' );
		$template = $this->argument( 'template' );
		if ( !in_array( $template, $this->template_options ) ) return $this->error( $template . " is not a valid Template" );

		$this->call( 'make:flex-controller', [ 'name' => $name, 'template' => $template ] );
		$this->call( 'make:flex-style', [ 'name' => $name, 'template' => $template ] );
		$this->call( 'make:flex-template', [ 'name' => $name, 'template' => $template ] );
		if ( !$this->option( 'no-scripts' ) )
			$this->call( 'make:flex-script', [ 'name' => $name, 'template' => $template ] );
		return $this->info( $name . " finished!" );
	}

}
