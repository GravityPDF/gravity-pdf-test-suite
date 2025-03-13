<?php

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2025, Blue Liquid Designs
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
	return array_merge( $config, [
		'tempDir'  => sys_get_temp_dir(),
		'fontDir'  => __DIR__ . '/fonts/',
		'fontdata' => [
			"dejavusanscondensed" => [
				'R'          => "DejaVuSansCondensed.ttf",
				'useOTL'     => 0xff,
				'useKashida' => 75,
			],
		],

		'backupSubsFont' => [],
		'backupSIPFont'  => '',
		'BMPonly'        => [ 'dejavusanscondensed' ],
	] );
};

add_filter( 'gfpdf_mpdf_class_config', $config );

add_filter( 'gfpdf_font_location', function( $path ) {
	return __DIR__ . '/fonts/';
} );
