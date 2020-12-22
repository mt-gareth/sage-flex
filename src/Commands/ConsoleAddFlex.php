<?php

namespace Motiontactic\Commands;

use Illuminate\Console\Command;

class ConsoleAddFlex extends Command
{
	protected $name = 'add:flex {flex} {post_id}';
	protected $description = 'Add Flex to a post';
	protected $type = 'Console command';

	public function handle()
	{
		$flex = $this->argument( 'flex' );
		$flex_under = $this->from_camel_case( $flex );
		$post_id = $this->argument( 'post_id' );
		$field_name = 'flexible_sections';
		$current_flex = get_field( $field_name, $post_id );
		$current_flex[] = [ 'acf_fc_layout' => $flex_under ];
		update_field( $field_name, $current_flex, $post_id );
	}

	public function from_camel_case( $input, $glue = '_' )
	{
		preg_match_all( '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches );
		$ret = $matches[ 0 ];
		foreach ( $ret as &$match ) {
			$match = $match == strtoupper( $match ) ? strtolower( $match ) : lcfirst( $match );
		}
		return implode( $glue, $ret );
	}
}
