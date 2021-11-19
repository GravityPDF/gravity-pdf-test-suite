<?php

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Use the core fonts for Gravity PDF
 *
 * @param array $config
 *
 * @return array
 *
 * @since 0.1
 */
$config = static function( $config ) {
	return [
		'mode'    => 'c',
		'tempDir' => sys_get_temp_dir(),
	];
};

add_filter( 'gfpdf_mpdf_class_config', $config );
