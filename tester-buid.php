<?php
/**
 * Plugin Name:     Tester Buid
 * Description:     Example block written with ESNext standard and JSX support – build step required.
 * Version:         0.1.0
 * Author:          The WordPress Contributors
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     tester-buid
 *
 * @package         create-block
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function create_block_tester_buid_block_init() {
	$dir = __DIR__;

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "create-block/tester-buid" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'create-block-tester-buid-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);

	wp_set_script_translations( 'create-block-tester-buid-block-editor', 'tester-buid' );

	$editor_css = 'build/index.css';
	wp_register_style(
		'create-block-tester-buid-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'create-block-tester-buid-block',
		plugins_url( $style_css, __FILE__ ),
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type(
		'create-block/tester-buid',
		array(
			'apiVersion' => 2,
			'editor_script' => 'create-block-tester-buid-block-editor',
			'editor_style'  => 'create-block-tester-buid-block-editor',
			'style'         => 'create-block-tester-buid-block',
			'render_callback' => 'dynamic_render_callback',
			'attributes' => [
				// toolbar
				'align' => [
					'type' => 'string',
					'default' => '',
				],
				// panel
				'ChooseType' => [
					'type' => 'string',
					'default' => 'posts',
				],
				'SetIds' => [
					'type' => 'array', // multiples valores seleccionados.
					'default' => '',
				],
				'SetAmount' => [
					'type' => 'number',
					'default' => 3,
				],
				'SetOrderBy' => [
					'type' => 'string',
					'default' => 'date',
				],
				'SetColumns' => [
					'type' => 'number',
					'default' => 1,
				],
				'FindBlock' => [
					'type' => 'string',
					'default' => 'none',
				],
				'AllowMixed' => [
					'type' => 'boolean',
					'default' => false,
				],
				'AddControls' => [
					'type' => 'boolean',
					'default' => true,
				],
				'AddIndicators' => [
					'type' => 'boolean',
					'default' => true,
				],
				'SetAuto' => [
					'type' => 'boolean',
					'default' => true,
				],
				'SetTime' => [
					'type' => 'number',
					'default' => '5000',
				],
				'SetAnimation' => [
					'type' => 'string',
					'default' => '',
				],
			]
		)
	);

}
add_action( 'init', 'create_block_tester_buid_block_init' );


/**
 * Plugin Name: Gutenberg examples dynamic
 */

function dynamic_render_callback( $block_attributes, $content ) {

	$carousel_args  = '';

	if ( 'posts' !== $block_attributes['ChooseType'] ){
		$carousel_args  .= 'type="' . $block_attributes['ChooseType'] . '" ';
	}

	if ( $block_attributes['SetIds'] ) {
		$array_to_string = implode( ",", $block_attributes['SetIds'] );
		$carousel_args  .= 'id="' . $array_to_string . '" ';
	}

	if ( '3' !==  $block_attributes['SetAmount'] && 'posts' === $block_attributes['ChooseType'] ){
		$carousel_args .= 'amount="' . $block_attributes['SetAmount'] . '" ';
	}

	if ( 'date' !== $block_attributes['SetOrderBy'] && 'posts' === $block_attributes['ChooseType'] ) {
		$carousel_args .= 'orderby="' . $block_attributes['SetOrderBy'] . '" ';
	}

	if ( 'none' !== $block_attributes['FindBlock'] && 'posts' === $block_attributes['ChooseType'] ){
		$carousel_args .= 'block="' . $block_attributes['FindBlock'] . '" ';
	}

	if ( 'none' !== $block_attributes['FindBlock'] && false !== $block_attributes['AllowMixed'] && 'posts' === $block_attributes['ChooseType'] ){
		$carousel_args .= 'mixed="true" ';
	}

	if ( 1 !== $block_attributes['SetColumns'] ){
		$carousel_args .= 'columns="' . $block_attributes['SetColumns'] . '" '; // fix en editor.
	}
	if ( false === $block_attributes['AddControls'] ){
		$carousel_args .= 'control="false" ';
	}
	if ( false === $block_attributes['AddIndicators'] ){
		$carousel_args .= 'indicators="false" ';
	}
	if ( false === $block_attributes['SetAuto'] ){
		$carousel_args .= 'auto="false" ';
	}
	if ( '5000' !== $block_attributes['SetTime'] ){
		$carousel_args .= 'time="' . $block_attributes['SetTime'] . '" ';
	}
	if ( '' !== $block_attributes['SetAnimation'] ){
		$carousel_args .= 'animation="' . $block_attributes['SetAnimation'] . '" ';
	}

	$align = '';
	if ( '' !== $block_attributes['align'] ){
		$align = ' class="align' . $block_attributes['align'] . '"';
	}

	$carousel = '<div' . $align . '>' . do_shortcode('[ekiline-carousel ' . $carousel_args . ']') . '</div>';
	// $carousel .= '<p>' . $align . '&nbsp; ' . $carousel_args . '</p>';
	return $carousel;

	// return '<div' . $align . '>' . do_shortcode('[ekiline-carousel type="images" id="611,1045,49,50,52,51"]') . '</div>';
}


/**
 * [ekiline-carousel id="13" amount="10"]
 * [ekiline-carousel type="images" id="611,1045,49,50,52,51"]
 */