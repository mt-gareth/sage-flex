<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

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

	public function handle()
	{
		$name = $this->argument( 'name' );
		$this->info( $name . " yolo!" );
		$this->call( 'remove:flex-controller', [ 'name' => $name ] );
		$this->call( 'remove:flex-style', [ 'name' => $name ] );
		$this->call( 'remove:flex-template', [ 'name' => $name ] );
		$this->call( 'remove:flex-script', [ 'name' => $name ] );

		return $this->info( $name . " finished!" );
	}

}
