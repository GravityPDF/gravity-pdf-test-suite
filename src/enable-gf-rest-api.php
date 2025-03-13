<?php

add_action( 'init', function () {
	global $gf_webapi;
	$gf_webapi = GFWebAPI::get_instance();
	$gf_webapi->update_plugin_settings( [ 'enabled' => '1', 'version' => 'v2' ] );
}, 1001 );