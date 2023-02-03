<?php

class CenteredReverseHeader extends EasyMealsCoreHeader {
	private static $instance;
	
	public function __construct() {
		$this->set_slug( 'centered-reverse' );
		$this->search_layout         = 'covers-header';
		$this->default_header_height = 150;
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}