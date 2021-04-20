<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ConsoleRemoveFlex extends Command
{
	protected $name = 'remove:flex';
	protected $description = 'Remove a Flexible Component Blade Template';
	protected $type = 'Console command';

	protected function getArguments()
	{
		return [
			[ 'name', InputArgument::REQUIRED, 'The name of the class' ],
		];
	}

	protected function getOptions()
	{
		return [
			[ 'scripts', 'Y', InputOption::VALUE_NONE, 'Also Remove Scripts' ],
		];
	}

	public function handle()
	{
		$name = $this->argument( 'name' );
		$this->info( $name . " yolo!" );
		$this->call( 'remove:flex-controller', [ 'name' => $name ] );
		$this->call( 'remove:flex-style', [ 'name' => $name ] );
		$this->call( 'remove:flex-template', [ 'name' => $name ] );
		if ( $this->option( 'scripts' ) )
			$this->call( 'remove:flex-script', [ 'name' => $name ] );

		return $this->info( $name . " finished!" );
	}

}
