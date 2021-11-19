<?php

use GFPDF\Helper\Helper_Logger;
use GFPDF\Helper\Helper_Notices;
use GFPDF\Helper\Helper_Singleton;

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Register a fake addon with Gravity PDF
 *
 * @since 0.1
 */
$addon = static function() {
	if ( ! class_exists( 'GFForms' ) || ! class_exists( 'GPDFAPI' ) ) {
		return;
	}

	include __DIR__ . '/Add_On_Bootstrap.php';

	$name = 'Gravity PDF Example Plugin';
	$slug = 'gravity-pdf-example-plugin';

	$plugin = new GFPDF\Add_On_Bootstrap(
		$slug,
		$name,
		'Gravity PDF',
		'1.0',
		'',
		GPDFAPI::get_data_class(),
		GPDFAPI::get_options_class(),
		new Helper_Singleton(),
		new Helper_Logger( $slug, $name ),
		new Helper_Notices()
	);

	$plugin->set_edd_download_id( '' );
	$plugin->set_addon_documentation_slug( '' );
	$plugin->init();
};

add_action( 'init', $addon );