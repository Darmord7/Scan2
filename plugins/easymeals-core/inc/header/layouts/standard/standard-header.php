<?php

class StandardHeader extends EasyMealsCoreHeader {
	private static $instance;

	public function __construct() {
		$this->set_slug( 'standard' );
		$this->search_layout         = 'covers-header';
		$this->default_header_height = 100;

		add_filter( 'body_class', array( $this, 'add_body_classes' ) );

		parent::__construct();
	}

	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function add_body_classes( $classes ) {

		return $classes;
	}
}