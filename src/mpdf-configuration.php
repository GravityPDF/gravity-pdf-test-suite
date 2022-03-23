<?php

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2022, Blue Liquid Designs
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

		'curlCaCertificate'  => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
		'curlFollowLocation' => true,

		'allow_output_buffering' => true,
		'autoLangToFont'         => false,
		'useSubstitutions'       => false,
		'ignore_invalid_utf8'    => true,
		'setAutoTopMargin'       => 'stretch',
		'setAutoBottomMargin'    => 'stretch',
		'enableImports'          => true,
		'use_kwt'                => true,
		'keepColumns'            => true,
		'biDirectional'          => true,
		'showWatermarkText'      => true,
		'showWatermarkImage'     => true,
	];
};

add_filter( 'gfpdf_mpdf_class_config', $config );

add_filter( 'gfpdf_font_location', function( $path ) {
	return __DIR__ . '/fonts/';
} );