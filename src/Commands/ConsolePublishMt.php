<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;

class ConsolePublishMt extends Command
{
	protected $name = 'publish:mt';
	protected $description = 'Setup a new site the MT way';
	protected $type = 'Console command';

	public function handle()
	{
		$this->call( 'publish:flex');
		$this->call( 'publish:base-files');
		$this->call( 'publish:acf');
		return $this->info( "Setup finished!" );
	}

}
