<?php

namespace Motiontactic;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Flex
{
	private static $instance = null;
	public $name = 'flexible_sections';
	public $sections = [];
	public $flex;

	public function __construct()
	{
		$this->load_flexible_component_classes();
		$this->build_flexible_components();
		add_action( 'acf/init', [ $this, 'build' ] );
	}

	public function load_flexible_component_classes()
	{
		$files = glob( \get_template_directory() . '/app/View/Flex/*.php' );
		foreach ( $files as $file ) {
			require_once $file;
			$section_name = basename( $file, '.php' );
			$class = 'App\View\Flex\\' . $section_name;
			if ( class_exists( $class ) ) {
				$this->sections[ $section_name ] = new $class;
			}
		}
	}

	public function build_flexible_components()
	{
		$this->flex = new FieldsBuilder( $this->name );
		$this->flex->addFlexibleContent( $this->name, [
			'button_label' => 'Add Section',
		] );

		foreach ( $this->sections as $section ) {
			$this->flex->getField( $this->name )->addLayout( $section->fields() );
		}
	}

	public function build()
	{
		$this->flex = apply_filters( 'mt_flexible_component_before_build', $this->flex );
		\acf_add_local_field_group( $this->flex->build() );
	}

	public function from_camel_case( $input )
	{
		preg_match_all( '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches );
		$ret = $matches[ 0 ];
		foreach ( $ret as &$match ) {
			$match = $match == strtoupper( $match ) ? strtolower( $match ) : lcfirst( $match );
		}
		return implode( '_', $ret );
	}

	public static function getInstance()
	{
		if ( self::$instance == null ) {
			self::$instance = new Flex();
		}

		return self::$instance;
	}
}