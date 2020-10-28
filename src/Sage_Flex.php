<?php

namespace Motiontactic;

use Illuminate\Console\Application as Console;

include_once 'commands/CommandMake.php';
include_once 'commands/ConsoleMakeFlex.php';
include_once 'commands/ConsoleMakeFlexController.php';
include_once 'commands/ConsoleMakeFlexStyle.php';
include_once 'commands/ConsoleMakeFlexTemplate.php';
include_once 'commands/ConsoleMakeFlexScript.php';
include_once 'commands/CommandRemove.php';
include_once 'commands/ConsoleRemoveFlex.php';
include_once 'commands/ConsoleRemoveFlexController.php';
include_once 'commands/ConsoleRemoveFlexStyle.php';
include_once 'commands/ConsoleRemoveFlexTemplate.php';
include_once 'commands/ConsoleRemoveFlexScript.php';

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