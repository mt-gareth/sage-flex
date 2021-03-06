<?php

namespace Motiontactic\Commands;

use Symfony\Component\Console\Input\InputOption;

class ConsolePublishBaseFiles extends CommandPublish
{
	protected $name = 'publish:base-files';
	protected function getOptions()
	{
		return [
			[ 'force', 'F', InputOption::VALUE_NONE, 'Force Filer Overwrite' ],
		];
	}
	protected $description = 'Add in the default files for Motion Tactic';
	protected $type = 'Console command';
	protected $publish_files = [
		'/stubs/mt/publish/scripts/common/index.js'          => [ 'dir' => '/resources/assets/scripts/common', 'file' => 'index.js' ],
		'/stubs/mt/publish/scripts/common/responsive-bgs.js' => [ 'dir' => '/resources/assets/scripts/common', 'file' => 'responsive-bgs.js' ],

		'/stubs/mt/publish/styles/common/fonts.scss'             => [ 'dir' => '/resources/assets/styles/common', 'file' => 'fonts.scss' ],
		'/stubs/mt/publish/styles/common/global.scss'            => [ 'dir' => '/resources/assets/styles/common', 'file' => 'global.scss' ],
		'/stubs/mt/publish/styles/common/grid.scss'              => [ 'dir' => '/resources/assets/styles/common', 'file' => 'grid.scss' ],
		'/stubs/mt/publish/styles/common/index.scss'             => [ 'dir' => '/resources/assets/styles/common', 'file' => 'index.scss' ],
		'/stubs/mt/publish/styles/common/mixins.scss'            => [ 'dir' => '/resources/assets/styles/common', 'file' => 'mixins.scss' ],
		'/stubs/mt/publish/styles/common/spacing-modifiers.scss' => [ 'dir' => '/resources/assets/styles/common', 'file' => 'spacing-modifiers.scss' ],
		'/stubs/mt/publish/styles/common/variables.scss'         => [ 'dir' => '/resources/assets/styles/common', 'file' => 'variables.scss' ],

		'/stubs/mt/publish/views/partials/bg.blade.php'           => [ 'dir' => '/resources/views/partials', 'file' => 'bg.blade.php' ],
		'/stubs/mt/publish/views/partials/content-page.blade.php' => [ 'dir' => '/resources/views/partials', 'file' => 'content-page.blade.php' ],
	];
}
