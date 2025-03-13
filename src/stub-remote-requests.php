<?php

/**
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2025, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Stub Gravity PDF license checks
 *
 * @param $return
 * @param $req
 * @param $url
 *
 * @return array|mixed
 *
 * @since 0.1
 */
$stub = static function( $return, $req, $url ) {
	/* Handle valid and invalid license responses */
	if ( isset( $req['body']['edd_action'] ) && $req['body']['edd_action'] === 'activate_license' ) {
		if ( $req['body']['license'] === '123456789' ) {
			return [
				'headers'  => [],
				'body'     => '{"success":false,"error":"missing"}',
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
				'cookies'  => [],
				'filename' => '',
			];
		}

		if ( $req['body']['license'] === '987654321' ) {
			return [
				'headers'  => [],
				'body'     => '{"success":true}',
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
				'cookies'  => [],
				'filename' => '',
			];
		}
	}

	/* Handle License Deactivation */
	if ( isset( $req['body']['edd_action'] ) && $req['body']['edd_action'] === 'deactivate_license' ) {
		return [
			'headers'  => [],
			'body'     => '{"license":"deactivated"}',
			'response' => [
				'code'    => 200,
				'message' => 'OK',
			],
			'cookies'  => [],
			'filename' => '',
		];
	}

	/* Handle Core Font Installer */
	if ( strpos( $url, '/GravityPDF/mpdf-core-fonts/master/' ) !== false ) {
		/* Throw error */
		if ( substr( $url, -4 ) === '.txt' ) {
			return [
				'headers'  => [],
				'body'     => '',
				'response' => [ 'code' => 404 ],
				'cookies'  => [],
				'filename' => '',
			];
		} else {
			return [
				'headers'  => [],
				'body'     => '',
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
				'cookies'  => [],
				'filename' => '',
			];
		}

		$counter++;
	}

	return $return;
};

add_filter( 'pre_http_request', $stub, 10, 3 );
