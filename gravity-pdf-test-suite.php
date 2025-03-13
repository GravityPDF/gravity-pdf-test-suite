<?php

/**
 * Plugin Name:     Gravity PDF Test Suite
 * Description:     Imports Gravity Forms test data for automated testing and stubs Gravity PDF functionality for easier testing
 * Author:          Gravity PDF
 * Author URI:      https://gravitypdf.com
 * Version:         0.2
 */

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2025, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

foreach( glob( __DIR__ . '/src/*.php' ) as $filename ) {
	require_once $filename;
}
