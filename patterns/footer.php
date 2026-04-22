<?php
/**
 * Title: Footer
 * Slug: twentytwentyfive/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Maison Merch footer with navy background, nav columns and copyright.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"tagName":"footer","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
<footer class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide">

			<!-- Top section: logo + nav columns -->
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
			<div class="wp-block-group">

				<!-- Brand column -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:site-title {"level":2,"style":{"typography":{"fontSize":"20px","letterSpacing":"0.05em","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /-->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
					<p class="has-base-color" style="font-size:0.85rem">Premium custom merch, made for your brand.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- Nav columns -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
				<div class="wp-block-group">

					<!-- Shop column -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"0.8rem","letterSpacing":"0.1em","textTransform":"uppercase","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
						<h4 class="wp-block-heading has-base-color" style="font-size:0.8rem;letter-spacing:0.1em;text-transform:uppercase">Shop</h4>
						<!-- /wp:heading -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"},"style":{"typography":{"fontSize":"0.9rem"}}} -->
							<!-- wp:navigation-link {"label":"All Products","url":"/shop"} /-->
							<!-- wp:navigation-link {"label":"T-Shirts","url":"/product-category/t-shirts"} /-->
							<!-- wp:navigation-link {"label":"Hoodies","url":"/product-category/hoodies"} /-->
							<!-- wp:navigation-link {"label":"Hats","url":"/product-category/hats"} /-->
							<!-- wp:navigation-link {"label":"Accessories","url":"/product-category/accessories"} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:group -->

					<!-- Company column -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"0.8rem","letterSpacing":"0.1em","textTransform":"uppercase","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
						<h4 class="wp-block-heading has-base-color" style="font-size:0.8rem;letter-spacing:0.1em;text-transform:uppercase">Company</h4>
						<!-- /wp:heading -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"},"style":{"typography":{"fontSize":"0.9rem"}}} -->
							<!-- wp:navigation-link {"label":"About Us","url":"/about"} /-->
							<!-- wp:navigation-link {"label":"How It Works","url":"/how-it-works"} /-->
							<!-- wp:navigation-link {"label":"Contact","url":"/contact"} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:group -->

					<!-- Support column -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"0.8rem","letterSpacing":"0.1em","textTransform":"uppercase","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
						<h4 class="wp-block-heading has-base-color" style="font-size:0.8rem;letter-spacing:0.1em;text-transform:uppercase">Support</h4>
						<!-- /wp:heading -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"},"style":{"typography":{"fontSize":"0.9rem"}}} -->
							<!-- wp:navigation-link {"label":"FAQ","url":"/faq"} /-->
							<!-- wp:navigation-link {"label":"Shipping & Returns","url":"/shipping-returns"} /-->
							<!-- wp:navigation-link {"label":"Size Guide","url":"/size-guide"} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- Divider -->
			<!-- wp:separator {"style":{"color":{"background":"rgba(255,255,255,0.1)"}}} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:rgba(255,255,255,0.1);color:rgba(255,255,255,0.1)"/>
			<!-- /wp:separator -->

			<!-- Bottom bar: copyright -->
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"}},"textColor":"base"} -->
				<p class="has-base-color" style="font-size:0.85rem;opacity:0.5"><?php echo esc_html( '© ' . date( 'Y' ) . ' Maison Merch. All rights reserved.' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"}},"textColor":"base"} -->
				<p class="has-base-color" style="font-size:0.85rem;opacity:0.5">maisonmerch.ca</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->
