<?php

namespace Motiontactic;

use Illuminate\Console\Application as Console;

class Sage_Flex
{
	function __construct()
	{
		if ( !function_exists( 'get_template_directory' ) ) return;
		$commands = [
			'Motiontactic\Commands\ConsoleMakeFlexController',
			'Motiontactic\Commands\ConsoleMakeFlexStyle',
			'Motiontactic\Commands\ConsoleMakeFlexTemplate',
			'Motiontactic\Commands\ConsoleMakeFlexScript',
			'Motiontactic\Commands\ConsoleMakeFlex',
			'Motiontactic\Commands\ConsoleRemoveFlexController',
			'Motiontactic\Commands\ConsoleRemoveFlexStyle',
			'Motiontactic\Commands\ConsoleRemoveFlexTemplate',
			'Motiontactic\Commands\ConsoleRemoveFlexScript',
			'Motiontactic\Commands\ConsoleRemoveFlex',
		];

		Console::starting( function ( $console ) use ( $commands ) {
			foreach ( $commands as $command ) {
				$console->resolve( $command );
			}
		} );

		new Flex();
	}
}

new Sage_Flex();