<?php
/**
 * Plugin Name:     Schedule Revisions
 * Plugin URI:      https://github.com/Aurorum/schedule-revisions-block
 * Description:     Control when content (or revisions) appear or disappear in your posts through a new Gutenberg block.
 * Version:         0.1.0
 * Author:          Aurorum
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     schedule-revisions
 *
 * @package         schedule-revisions
 */

function schedule_revisions_schedule_revisions_block_block_init() {
	$dir = dirname( __FILE__ );

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "schedule-revisions/schedule-revisions-block" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'schedule-revisions-schedule-revisions-block-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);

	$editor_css = 'build/index.css';
	wp_register_style(
		'schedule-revisions-schedule-revisions-block-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	register_block_type( 'schedule-revisions/schedule-revisions-block', array(
		'editor_script' => 'schedule-revisions-schedule-revisions-block-block-editor',
		'editor_style'  => 'schedule-revisions-schedule-revisions-block-block-editor',
		'style'         => 'schedule-revisions-schedule-revisions-block-block',
		'render_callback' =>  'render_schedule_revisions_block',
	) );
}
add_action( 'init', 'schedule_revisions_schedule_revisions_block_block_init' );

function render_schedule_revisions_block($attr, $content = '') {
	$date   = isset( $attr['date'] ) ? $attr['date'] : 0;
	$time   = $date - ( strtotime( current_time( 'mysql' ) ) * 1000 );
	$option = isset( $attr['radioOption'] ) ? $attr['radioOption'] : 'displayBlock';
	if ( ( $date === 0 && $option === 'displayBlock'  ) || ( $time < 0 && $option === 'displayBlock' ) || ( $time > 0 && $option === 'hideBlock' ) ) {
		return $content;
	}
}
