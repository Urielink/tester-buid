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
			]
		)
	);

}
add_action( 'init', 'create_block_tester_buid_block_init' );


/**
 * Plugin Name: Gutenberg examples dynamic
 */

function dynamic_render_callback( $block_attributes, $content ) {
    // $recent_posts = wp_get_recent_posts( array(
    //     'numberposts' => 1,
    //     'post_status' => 'publish',
    // ) );
    // if ( count( $recent_posts ) === 0 ) {
    //     return 'No posts';
    // }
    // $post = $recent_posts[ 0 ];
    // $post_id = $post['ID'];
    // return sprintf(
    //     '<a class="wp-block-my-plugin-latest-post" href="%1$s">%2$s</a>',
    //     esc_url( get_permalink( $post_id ) ),
    //     esc_html( get_the_title( $post_id ) )
    // );

	$align = '';
	if ( '' !== $block_attributes['align'] ){
		$align = ' class="align' . $block_attributes['align'] . '"';
	}

	return '<div' . $align . '>' . do_shortcode('[ekiline-carousel type="images" id="611,1045,49,50,52,51"]') . '</div>';
}


/**
 * [ekiline-carousel id="13" amount="10"]
 * [ekiline-carousel type="images" id="611,1045,49,50,52,51"]
 */