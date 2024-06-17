<?php
/**
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package jewellery
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses theme_header_style()
 */
function theme_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'lei_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'ffffff',
				'width'              => 1170,
				'height'             => 100,
				'flex-height'        => true,
				'wp-head-callback'   => 'theme_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'theme_custom_header_setup' );

if ( ! function_exists( 'theme_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see theme_custom_header_setup().
	 */
	function theme_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
	}
endif;


function get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0];
}