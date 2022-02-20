<?php

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Import test data into the database
 *
 * @since 0.1
 */
$import = static function() {
	if ( ! class_exists( GFAPI::class ) || ! class_exists( GPDFAPI::class ) ) {
		return;
	}

	if ( get_option( 'freshinstall', false ) === false ) {
		return;
	}

	/* Import the same sample form 6 times with an entry and create PDF for form #3, #4 and #6 */
	$form = json_decode( file_get_contents( __DIR__ . '/json/sample-form.json' ), true );
	for ( $i = 1; $i <= 6; $i++ ) {
		$form['title'] = "Sample $i";
		$form_id       = GFAPI::add_form( $form );

		if ( ! is_wp_error( $form ) ) {
			GFAPI::add_entry(
				[
					'ip'      => '20.130.10.5',
					'form_id' => $form_id,
					1         => 'value',
					'2.3'     => 'First',
					'2.6'     => 'Last',
					3         => 'name@example.com',
				]
			);
		}

		/* Add a PDF for form 3 / 4 */
		if ( in_array( $i, [ 3, 4 ], true ) ) {
			GPDFAPI::add_pdf(
				$form_id,
				[
					'name'     => 'Sample',
					'template' => 'zadani',
					'filename' => 'Sample',
					'font'     => 'dejavusans',
					'format'   => 'standard',
					'security' => 'no',
				]
			);
		}

		/* Add 2 PDFs for form 6 */
		if ( $i === 6 ) {
			GPDFAPI::add_pdf(
				$form_id,
				[
					'name'     => 'Sample',
					'template' => 'zadani',
					'filename' => 'Sample',
					'font'     => 'dejavusans',
					'format'   => 'standard',
					'security' => 'no',
				]
			);

			GPDFAPI::add_pdf(
				$form_id,
				[
					'name'     => 'Sample 2',
					'template' => 'rubix',
					'filename' => 'Sample',
					'font'     => 'dejavusans',
					'format'   => 'standard',
					'security' => 'no',
				]
			);
		}
	}

	GFSettings::enable_logging();
	update_option( 'gform_pending_installation', false );
	delete_option( 'freshinstall' );
};

add_action( 'init', $import, 1000 );
