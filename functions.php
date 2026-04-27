<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues the theme stylesheet on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues the theme stylesheet on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		$suffix = SCRIPT_DEBUG ? '' : '.min';
		$src    = 'style' . $suffix . '.css';

		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( $src ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_style_add_data(
			'twentytwentyfive-style',
			'path',
			get_parent_theme_file_path( $src )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Enqueues Maison Merch Google Fonts and custom stylesheet.
if ( ! function_exists( 'maisonmerch_enqueue_assets' ) ) :
	function maisonmerch_enqueue_assets() {
		wp_enqueue_style(
			'maisonmerch-fonts',
			'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;800;900&display=swap',
			array(),
			null
		);
		wp_enqueue_style(
			'maisonmerch-custom',
			get_parent_theme_file_uri( 'assets/css/maison-merch.css' ),
			array( 'maisonmerch-fonts', 'twentytwentyfive-style' ),
			filemtime( get_parent_theme_file_path( 'assets/css/maison-merch.css' ) )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'maisonmerch_enqueue_assets' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

// ─── Maison Merch: Override document title ───────────────────────────────────
add_filter( 'document_title_parts', function( $title ) {
	$title['site'] = 'Maison Merch';
	if ( is_front_page() ) {
		$title['title'] = 'Built for Fans | Cultural Fan Merchandise';
		unset( $title['tagline'] );
	}
	// Fix capitalisation for pages created with lowercase titles
	$slug_titles = [
		'contact'            => 'Contact Us',
		'faq'                => 'FAQ',
		'shipping-returns'   => 'Shipping & Returns',
		'refund-policy'      => 'Refund Policy',
		'terms-and-conditions' => 'Terms & Conditions',
		'privacy-policy'     => 'Privacy Policy',
		'cookie-policy'      => 'Cookie Policy',
		'about-us'           => 'About Us',
	];
	$post = get_queried_object();
	if ( $post && isset( $post->post_name ) && isset( $slug_titles[ $post->post_name ] ) ) {
		$title['title'] = $slug_titles[ $post->post_name ];
	}
	return $title;
}, 20 );

// ─── Maison Merch: Auto-create required pages if missing ─────────────────────
add_action( 'init', function() {
	$pages = [
		[ 'title' => 'Shipping & Returns',   'slug' => 'shipping-returns'   ],
		[ 'title' => 'Refund Policy',         'slug' => 'refund-policy'      ],
		[ 'title' => 'Terms & Conditions',    'slug' => 'terms-and-conditions'],
		[ 'title' => 'Privacy Policy',        'slug' => 'privacy-policy'     ],
		[ 'title' => 'Cookie Policy',         'slug' => 'cookie-policy'      ],
	];
	$flushed = false;
	foreach ( $pages as $page ) {
		// Check any status including draft — look for slug match across all statuses
		$existing = get_posts( [
			'name'        => $page['slug'],
			'post_type'   => 'page',
			'post_status' => [ 'publish', 'draft', 'pending', 'private', 'auto-draft' ],
			'numberposts' => 1,
		] );
		if ( empty( $existing ) ) {
			wp_insert_post( [
				'post_title'  => $page['title'],
				'post_name'   => $page['slug'],
				'post_status' => 'publish',
				'post_type'   => 'page',
				'post_author' => 1,
			] );
			$flushed = true;
		} elseif ( $existing[0]->post_status !== 'publish' ) {
			// Page exists but isn't published — publish it
			wp_update_post( [
				'ID'          => $existing[0]->ID,
				'post_status' => 'publish',
				'post_name'   => $page['slug'],
			] );
			$flushed = true;
		}
	}
	if ( $flushed ) {
		flush_rewrite_rules();
	}
} );
