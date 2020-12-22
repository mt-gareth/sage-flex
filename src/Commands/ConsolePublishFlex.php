<?php

namespace Motiontactic\Commands;

class ConsolePublishFlex extends CommandPublish
{
	protected $name = 'publish:flex';
	protected $description = 'Add in the default files for flex';
	protected $type = 'Console command';
	protected $publish_files = [
		'/stubs/flex/publish/FlexComposer.php' => [ 'dir' => '/app/View/Composers', 'file' => 'Flex.php' ],
		'/stubs/flex/publish/AppJS.js'         => [ 'dir' => '/resources/assets/scripts', 'file' => 'app.js' ],
		'/stubs/flex/publish/AppScss.scss'     => [ 'dir' => '/resources/assets/styles', 'file' => 'app.scss' ],
		'/stubs/flex/publish/IndexJs.js'       => [ 'dir' => '/resources/assets/scripts/flex', 'file' => 'index.js' ],
		'/stubs/flex/publish/IndexScss.scss'   => [ 'dir' => '/resources/assets/styles/flex', 'file' => 'index.scss' ],
		'/stubs/flex/publish/Filters.php'   => [ 'dir' => '/app', 'file' => 'filters.php' ],
	];
}
