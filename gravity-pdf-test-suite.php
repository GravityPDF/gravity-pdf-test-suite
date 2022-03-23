<?php

/**
 * Plugin Name:     Gravity PDF Test Suite
 * Description:     Imports Gravity Forms test data for automated testing and stubs Gravity PDF functionality for easier testing
 * Author:          Gravity PDF
 * Author URI:      https://gravitypdf.com
 * Version:         0.1
 */

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include __DIR__ . '/src/register-fake-addon.php';
include __DIR__ . '/src/mpdf-configuration.php';
include __DIR__ . '/src/stub-remote-requests.php';
include __DIR__ . '/src/import-data.php';
include __DIR__ . '/src/disable-gf-logging-message.php';
