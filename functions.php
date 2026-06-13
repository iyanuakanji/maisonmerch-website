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

// ─── Maison Merch: One-time DB migration — replace old Amazon shortlink ──────
add_action( 'init', function() {
	if ( get_option( 'mm_amazon_link_fixed_v1' ) === '1' ) {
		return; // Already done — skip on every subsequent request
	}
	global $wpdb;
	$old = 'https://shorturl.at/nRAyn';
	$new = 'https://www.amazon.com/s?me=AYHCG6KQCHSKS';
	// Replace in all posts/pages/templates (covers wp_template, wp_template_part, pages, etc.)
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(post_content, %s, %s)
		 WHERE post_content LIKE %s",
		$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
	) );
	// Replace in postmeta as well
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->postmeta}
		 SET meta_value = REPLACE(meta_value, %s, %s)
		 WHERE meta_value LIKE %s",
		$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
	) );
	update_option( 'mm_amazon_link_fixed_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — trust strip + urgency copy ────────
add_action( 'init', function() {
	if ( get_option( 'mm_copy_update_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$replacements = array(
		// Trust strip
		'Free Shipping Over $75'                                      => 'Amazon-Fulfilled Shipping',
		// Bundle price note (both &nbsp; and plain space variants)
		'&nbsp;·&nbsp; Free shipping over $75'                        => '',
		// Urgency bar
		'THE TOURNAMENT IS COMING, ORDER NOW TO RECEIVE IN TIME!'     => 'FIFA WORLD CUP 2026 KICKS OFF SOON. ORDER NOW &amp; ARRIVE GAME-READY!',
	);
	foreach ( $replacements as $old => $new ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_copy_update_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — urgency bar text v2 ───────────────
add_action( 'init', function() {
	if ( get_option( 'mm_urgency_v2' ) === '1' ) {
		return;
	}
	global $wpdb;
	// Update both the dash variant (from previous migration) and the original
	$old_variants = array(
		'FIFA WORLD CUP 2026 KICKS OFF SOON — ORDER NOW &amp; ARRIVE GAME-READY!',
		'FIFA WORLD CUP 2026 KICKS OFF SOON — ORDER NOW & ARRIVE GAME-READY!',
		'THE TOURNAMENT IS COMING, ORDER NOW TO RECEIVE IN TIME!',
	);
	$new = 'FIFA WORLD CUP 2026 KICKS OFF SOON. ORDER NOW &amp; ARRIVE GAME-READY!';
	foreach ( $old_variants as $old ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_urgency_v2', '1' );
} );

// ─── Maison Merch: One-time DB migration — remove utility bar trust items ─────
add_action( 'init', function() {
	if ( get_option( 'mm_header_trust_removed_v1' ) === '1' ) {
		return;
	}
	global $wpdb;

	// Each string to strip from stored templates (desktop + mobile variations)
	$remove = array(
		'<span><span class="trust-dot"></span> Free shipping over $75 CAD</span>',
		'<span><span class="trust-dot"></span> Free shipping over $75</span>',
		'<span><span class="trust-dot"></span> Ships to 5 countries via Amazon</span>',
		// Also remove the now-empty mobile trust wrapper
		'<div class="mobile-menu-trust">
      <span><span class="trust-dot"></span> Free shipping over $75</span>
      <span><span class="trust-dot"></span> Ships to 5 countries via Amazon</span>
    </div>',
	);

	foreach ( $remove as $str ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, '')
			 WHERE post_content LIKE %s",
			$str, '%' . $wpdb->esc_like( $str ) . '%'
		) );
	}

	update_option( 'mm_header_trust_removed_v1', '1' );
} );

// ─── Maison Merch: Favicon ───────────────────────────────────────────────────
add_action( 'wp_head', function() {
	// Use staging logo on staging, production logo on production
	if ( strpos( home_url(), 'staging' ) !== false ) {
		$logo = home_url( '/wp-content/uploads/2026/04/logo-maison-merch3.png' );
	} else {
		$logo = home_url( '/wp-content/uploads/2026/05/logo-maison-merch3-scaled.png' );
	}
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $logo ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $logo ) . '">' . "\n";
} );

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

// ─── Maison Merch: One-time DB migration — Match Day Bundle availability ──────
add_action( 'init', function() {
	if ( get_option( 'mm_match_day_avail_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$old = '🇺🇸 USA &nbsp;·&nbsp; 🇲🇽 Mexico &nbsp;·&nbsp; 🇧🇷 Brazil &nbsp;·&nbsp; 🇦🇷 Argentina &nbsp;·&nbsp; 🇨🇦 Canada</span>
          </div>

          <!-- Key items preview -->
          <div class="bundle-items">
            <span class="bundle-item-chip">Cap</span>';
	$new = '🇺🇸 USA &nbsp;·&nbsp; 🇨🇦 Canada</span>
          </div>

          <!-- Key items preview -->
          <div class="bundle-items">
            <span class="bundle-item-chip">Cap</span>';
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(post_content, %s, %s)
		 WHERE post_content LIKE %s",
		$old, $new, '%' . $wpdb->esc_like( '🇺🇸 USA &nbsp;·&nbsp; 🇲🇽 Mexico &nbsp;·&nbsp; 🇧🇷 Brazil' ) . '%'
	) );
	update_option( 'mm_match_day_avail_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — update bundle prices ───────────────
add_action( 'init', function() {
	if ( get_option( 'mm_prices_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$replacements = array(
		// Bundle card main prices
		'$35 <span class="bundle-currency">USD</span>'  => '$49.99 <span class="bundle-currency">USD</span>',
		'$55 <span class="bundle-currency">USD</span>'  => '$45.99 <span class="bundle-currency">USD</span>',
		// Bundle card Canada notes
		'🇨🇦 Canada: ~$48 CAD '                         => '🇨🇦 Canada: ~$68 CAD ',
		'🇨🇦 Canada: ~$75 CAD '                         => '🇨🇦 Canada: ~$62 CAD ',
		// Hero card prices
		'<div class="hero-card-price">$35</div>'        => '<div class="hero-card-price">$49.99</div>',
		'<div class="hero-card-price">$55</div>'        => '<div class="hero-card-price">$45.99</div>',
		// Country showcase USD prices
		'country-bundle-price">$35</span>'              => 'country-bundle-price">$49.99</span>',
		'country-bundle-price">$55</span>'              => 'country-bundle-price">$45.99</span>',
		// Country showcase Canada prices
		'country-bundle-price">~$48</span>'             => 'country-bundle-price">~$68</span>',
		'country-bundle-price">~$75</span>'             => 'country-bundle-price">~$62</span>',
	);
	foreach ( $replacements as $old => $new ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_prices_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — remove Match Day from MX/BR/AR cards ─
add_action( 'init', function() {
	if ( get_option( 'mm_country_match_day_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	// Only Mexico, Brazil, and Argentina cards contain "(local currency at checkout)".
	// Use that as a discriminator so we don't touch the USA or Canada cards.
	$old = '<span class="country-currency-note">(local currency at checkout)</span></div>
          <div class="country-bundles">
            <div class="country-bundle-row">
              <span class="country-bundle-name">Match Day Fan Bundle</span>
              <span class="country-bundle-price">$49.99</span>
            </div>
            <div class="country-bundle-row">
              <span class="country-bundle-name">Ultimate Watch Party Kit</span>';
	$new = '<span class="country-currency-note">(local currency at checkout)</span></div>
          <div class="country-bundles">
            <div class="country-bundle-row">
              <span class="country-bundle-name">Ultimate Watch Party Kit</span>';
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(post_content, %s, %s)
		 WHERE post_content LIKE %s",
		$old, $new, '%' . $wpdb->esc_like( '(local currency at checkout)' ) . '%'
	) );
	update_option( 'mm_country_match_day_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — urgency bar "IS LIVE" update ───────
add_action( 'init', function() {
	if ( get_option( 'mm_urgency_live_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$old = 'FIFA WORLD CUP 2026 KICKS OFF SOON. ORDER NOW &amp; ARRIVE GAME-READY!';
	$new = 'FIFA WORLD CUP 2026 IS LIVE. ORDER NOW &amp; ARRIVE GAME-READY!';
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(post_content, %s, %s)
		 WHERE post_content LIKE %s",
		$old, $new, '%' . $wpdb->esc_like( 'KICKS OFF SOON' ) . '%'
	) );
	update_option( 'mm_urgency_live_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — 8-item review fixes (batch v1) ────
add_action( 'init', function() {
	if ( get_option( 'mm_review_fixes_v1' ) === '1' ) {
		return;
	}
	global $wpdb;

	$replacements = [
		// Hero eyebrow badge
		[ 'Summer 2026 Ready', 'World Cup 2026 Live' ],
		// Canada country card button label
		[ 'View on Amazon.ca', 'View on Amazon' ],
		// Pick Your Bundle subtitle
		[
			'Available for USA, Canada, Mexico, Argentina &amp; Brazil &#8212; curated kits built for every occasion, from solo supporters to full group watch parties.',
			'Match Day Fan Bundle ships to USA &amp; Canada. Ultimate Soccer Watch Party Kit ships to all 5 nations &#8212; curated kits built for every occasion.',
		],
		// How to Order Step 1
		[
			'Choose from our Match Day Fan Bundle or Ultimate Soccer Watch Party Kit &#8212; available for USA, Canada, Mexico, Argentina &amp; Brazil.',
			'The Match Day Fan Bundle ships to USA &amp; Canada. The Ultimate Soccer Watch Party Kit ships to all 5 nations &#8212; USA, Canada, Mexico, Brazil &amp; Argentina.',
		],
		// Footer newsletter button
		[ '>Go<', '>Subscribe<' ],
		// Email marketing popup modal title
		[ 'Game Day Is Coming.', 'The World Cup Is Live.' ],
		// FAQ Match Day price
		[ 'The Match Day Fan Bundle ($35)', 'The Match Day Fan Bundle ($49.99)' ],
		// FAQ Watch Party price
		[ 'The Ultimate Soccer Watch Party Kit ($55)', 'The Ultimate Soccer Watch Party Kit ($45.99)' ],
	];

	foreach ( $replacements as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}

	update_option( 'mm_review_fixes_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — Watch Party per-country links ──────
add_action( 'init', function() {
	if ( get_option( 'mm_watch_party_links_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$old_url = 'https://www.amazon.com/s?me=AYHCG6KQCHSKS';

	// Each entry: [ country discriminator string, new Watch Party link ]
	$country_links = [
		[ 'United States</h3>', 'https://a.co/d/0j6trPvZ' ], // USA
		[ 'Canada</h3>',        'https://a.co/d/0fjoFIlB' ], // Canada
		[ 'Mexico</h3>',        'https://a.co/d/0i0dnaEK' ], // Mexico
		[ 'Brazil</h3>',        'https://a.co/d/0hgGkJ5s' ], // Brazil
		[ 'Argentina</h3>',     'https://a.co/d/0aw0s7GP' ], // Argentina
	];

	// Pull all stored homepage/template posts that still have the old generic URL
	$posts = $wpdb->get_results( $wpdb->prepare(
		"SELECT ID, post_content FROM {$wpdb->posts}
		 WHERE post_content LIKE %s
		   AND post_status IN ('publish','auto-draft')
		   AND post_type IN ('wp_template','wp_template_part','page','post')",
		'%' . $wpdb->esc_like( $old_url ) . '%'
	) );

	foreach ( $posts as $post ) {
		$content = $post->post_content;
		foreach ( $country_links as [ $discriminator, $new_url ] ) {
			// Find the country heading, then replace the next occurrence of old_url after it
			$pos = strpos( $content, $discriminator );
			if ( $pos === false ) {
				continue;
			}
			$after = strpos( $content, $old_url, $pos );
			if ( $after === false ) {
				continue;
			}
			$content = substr( $content, 0, $after ) . $new_url . substr( $content, $after + strlen( $old_url ) );
		}
		if ( $content !== $post->post_content ) {
			$wpdb->update( $wpdb->posts, [ 'post_content' => $content ], [ 'ID' => $post->ID ] );
		}
	}

	update_option( 'mm_watch_party_links_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — Match Day per-country links + dual CTAs ─
add_action( 'init', function() {
	if ( get_option( 'mm_match_day_links_v1' ) === '1' ) {
		return;
	}
	global $wpdb;

	$svg = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';

	// USA: replace single Watch Party btn with dual-CTA block
	$usa_old = '<a href="https://a.co/d/0j6trPvZ" target="_blank" rel="noopener noreferrer" class="btn btn-country">
            View on Amazon
            ' . $svg . '
          </a>
        </div>
      </div>

      <!-- Canada -->';
	$usa_new = '<div class="country-ctas">
            <a href="https://a.co/d/03tGeI7S" target="_blank" rel="noopener noreferrer" class="btn btn-country">
              Match Day Bundle
              ' . $svg . '
            </a>
            <a href="https://a.co/d/0j6trPvZ" target="_blank" rel="noopener noreferrer" class="btn btn-country">
              Watch Party Kit
              ' . $svg . '
            </a>
          </div>
        </div>
      </div>

      <!-- Canada -->';

	// Canada: replace single Watch Party btn with dual-CTA block
	$ca_old = '<a href="https://a.co/d/0fjoFIlB" target="_blank" rel="noopener noreferrer" class="btn btn-country">
            View on Amazon
            ' . $svg . '
          </a>
        </div>
      </div>

      <!-- Mexico -->';
	$ca_new = '<div class="country-ctas">
            <a href="https://a.co/d/00Xc3Dor" target="_blank" rel="noopener noreferrer" class="btn btn-country">
              Match Day Bundle
              ' . $svg . '
            </a>
            <a href="https://a.co/d/0fjoFIlB" target="_blank" rel="noopener noreferrer" class="btn btn-country">
              Watch Party Kit
              ' . $svg . '
            </a>
          </div>
        </div>
      </div>

      <!-- Mexico -->';

	$pairs = [ [ $usa_old, $usa_new ], [ $ca_old, $ca_new ] ];

	foreach ( $pairs as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%btn-country%'
		) );
	}

	update_option( 'mm_match_day_links_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — Pick Your Bundle section CTA links ─
add_action( 'init', function() {
	if ( get_option( 'mm_bundle_cta_links_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$old_url = 'https://www.amazon.com/s?me=AYHCG6KQCHSKS';

	// Match Day CTA — discriminator: ~$68 CAD price note unique to Match Day card
	$wpdb->query( $wpdb->prepare(
		"UPDATE {$wpdb->posts}
		 SET post_content = REPLACE(
		   REPLACE(post_content,
		     CONCAT(%s, %s, 'https://www.amazon.com/s?me=AYHCG6KQCHSKS'),
		     CONCAT(%s, %s, 'https://a.co/d/03tGeI7S')
		   ),
		   post_content, post_content
		 )
		 WHERE 1=0",
		'', '', '', ''
	) );

	// Simpler: do two targeted replacements using surrounding unique context
	$pairs = [
		[
			'~$68 CAD </span>' . "\n            </div>\n            " . '<a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS"',
			'~$68 CAD </span>' . "\n            </div>\n            " . '<a href="https://a.co/d/03tGeI7S"',
		],
		[
			'~$62 CAD </span>' . "\n            </div>\n            " . '<a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS"',
			'~$62 CAD </span>' . "\n            </div>\n            " . '<a href="https://a.co/d/0j6trPvZ"',
		],
	];

	foreach ( $pairs as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%bundle-cta%'
		) );
	}

	update_option( 'mm_bundle_cta_links_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — hero section image URLs ────────────
add_action( 'init', function() {
	if ( get_option( 'mm_hero_images_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$replacements = [
		[
			'http://staging.maisonmerch.ca/wp-content/uploads/2026/04/Essential_Bundle.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/USA_Match_Day.jpeg',
		],
		[
			'http://staging.maisonmerch.ca/wp-content/uploads/2026/04/Watch_party.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/USA_Watch_Party.jpeg',
		],
	];
	foreach ( $replacements as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_hero_images_v1', '1' );
} );

// ─── Maison Merch: One-time DB migration — hero image swap v2 ─────────────────
add_action( 'init', function() {
	if ( get_option( 'mm_hero_images_v2' ) === '1' ) {
		return;
	}
	global $wpdb;
	$replacements = [
		[
			'https://maisonmerch.ca/wp-content/uploads/2026/06/USA_Match_Day.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/Match_Day_Canada.png',
		],
		[
			'https://maisonmerch.ca/wp-content/uploads/2026/06/USA_Watch_Party.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/Watch_Party_USA.png',
		],
	];
	foreach ( $replacements as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_hero_images_v2', '1' );
} );

// ─── Maison Merch: One-time DB migration — Pick Your Bundle images ────────────
add_action( 'init', function() {
	if ( get_option( 'mm_bundle_images_v1' ) === '1' ) {
		return;
	}
	global $wpdb;
	$replacements = [
		[
			'http://staging.maisonmerch.ca/wp-content/uploads/2026/04/Essential_Bundle.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/Match_Day_Canada.png',
		],
		[
			'http://staging.maisonmerch.ca/wp-content/uploads/2026/04/Watch_party.jpeg',
			'https://maisonmerch.ca/wp-content/uploads/2026/06/Watch_Party_USA.png',
		],
	];
	foreach ( $replacements as [ $old, $new ] ) {
		$wpdb->query( $wpdb->prepare(
			"UPDATE {$wpdb->posts}
			 SET post_content = REPLACE(post_content, %s, %s)
			 WHERE post_content LIKE %s
			   AND post_status IN ('publish','auto-draft')",
			$old, $new, '%' . $wpdb->esc_like( $old ) . '%'
		) );
	}
	update_option( 'mm_bundle_images_v1', '1' );
} );
