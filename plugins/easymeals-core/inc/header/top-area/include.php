<?php

include_once EASYMEALS_CORE_INC_PATH . '/header/top-area/top-area.php';
include_once EASYMEALS_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( EASYMEALS_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}