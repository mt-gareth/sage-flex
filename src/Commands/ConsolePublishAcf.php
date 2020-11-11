<?php

namespace Motiontactic\Commands;

class ConsolePublishAcf extends CommandPublish
{
	protected $name = 'publish:acf';
	protected $description = 'Add ACF To mu-plugins';
	protected $type = 'Console command';
	protected $publish_files = [
		'/stubs/mt/publish/mu-plugins/site.php'           => [ 'dir' => '/mu-plugins', 'file' => 'site.php', 'root' => WP_CONTENT_DIR ],
		'/stubs/mt/publish/mu-plugins/site/composer.json' => [ 'dir' => '/mu-plugins/site', 'file' => 'composer.json', 'root' => WP_CONTENT_DIR ],
	];

	public function handle()
	{
		$this->add_files();
		echo exec( 'cd ../../mu-plugins/site && composer install' );
	}
}
