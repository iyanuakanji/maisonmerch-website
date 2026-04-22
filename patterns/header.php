<?php
/**
 * Title: Header
 * Slug: twentytwentyfive/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Maison Merch sticky navy header with site title and navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"tagName":"header","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<header class="wp-block-group alignfull">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"22px","letterSpacing":"0.05em","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /-->

			<!-- wp:navigation {"overlayBackgroundColor":"contrast","overlayTextColor":"base","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"},"style":{"typography":{"fontSize":"13px","letterSpacing":"0.06em","textTransform":"uppercase","fontWeight":"600"}}} -->
				<!-- wp:navigation-link {"label":"Shop","url":"/shop"} /-->
				<!-- wp:navigation-link {"label":"Collections","url":"/product-category/collections"} /-->
				<!-- wp:navigation-link {"label":"About","url":"/about"} /-->
				<!-- wp:navigation-link {"label":"Contact","url":"/contact"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->
