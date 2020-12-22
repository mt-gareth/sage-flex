<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ConsolePublishMt extends Command
{
	protected $name = 'publish:mt';
	protected $description = 'Setup a new site the MT way';
	protected $type = 'Console command';

	protected function getOptions()
	{
		return [
			[ 'force', 'F', InputOption::VALUE_NONE, 'Force Filer Overwrite' ],
		];
	}

	public function handle()
	{
		$force = $this->option('force') ? ['--force' => true ]: [];
		$this->call( 'publish:flex', $force);
		$this->call( 'publish:base-files', $force);
		$this->call( 'publish:acf', $force);
		return $this->info( "Setup finished!" );
	}

}
