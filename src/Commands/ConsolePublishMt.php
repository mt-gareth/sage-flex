<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;

class ConsolePublishMt extends Command
{
	protected $name = 'publish:mt {--force}';
	protected $description = 'Setup a new site the MT way';
	protected $type = 'Console command';

	public function handle()
	{
		$force = $this->option('force') ? ' --force' : '';
		$this->call( 'publish:flex' . $force);
		$this->call( 'publish:base-files' . $force);
		$this->call( 'publish:acf' . $force);
		return $this->info( "Setup finished!" );
	}

}
