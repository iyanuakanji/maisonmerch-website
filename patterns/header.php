<?php
/**
 * Title: Header
 * Slug: twentytwentyfive/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Maison Merch header — utility bar + sticky nav.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */
?>
<!-- wp:html -->
<div class="utility-bar">
  <div class="container">
    <div class="utility-contacts">
      <a href="tel:+13435002866">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8a19.79 19.79 0 01-3.07-8.63A2 2 0 012 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"/>
        </svg>
        +1 (343) 500-2866
      </a>
      <a href="mailto:info@maisonmerch.ca">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
        </svg>
        info@maisonmerch.ca
      </a>
    </div>
    <div class="utility-trust">
      <span><span class="trust-dot"></span> Free shipping over $75 CAD</span>
      <span><span class="trust-dot"></span> 100% eco-friendly products</span>
      <span><span class="trust-dot"></span> Ships Canada &amp; USA</span>
    </div>
  </div>
</div>

<nav class="nav">
  <div class="container">
    <div class="nav-inner">
      <a href="/" class="nav-logo">
        <div class="nav-logo-icon">
          <svg viewBox="0 0 200 215" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <clipPath id="lc-nav">
                <rect x="12" y="42" width="176" height="162" rx="16"/>
              </clipPath>
            </defs>
            <rect x="12" y="42" width="176" height="162" rx="16" fill="#151E30"/>
            <g clip-path="url(#lc-nav)">
              <ellipse cx="40"  cy="62"  rx="54" ry="46" fill="#3BAEE8"/>
              <ellipse cx="162" cy="62"  rx="54" ry="46" fill="#E63946"/>
              <ellipse cx="24"  cy="132" rx="46" ry="56" fill="#1B5CB0"/>
              <ellipse cx="68"  cy="210" rx="60" ry="42" fill="#27AE60"/>
              <ellipse cx="172" cy="206" rx="48" ry="42" fill="#F5C842"/>
            </g>
            <path d="M70,50 C70,20 83,8 100,6 C117,8 130,20 130,50"
                  fill="none" stroke="#151E30" stroke-width="18" stroke-linecap="round"/>
            <text x="100" y="141" font-family="'Arial Black','Impact','Helvetica Neue',sans-serif"
                  font-size="40" font-weight="900" text-anchor="middle" fill="#0D1421" letter-spacing="-0.5">MAISON</text>
            <text x="100" y="182" font-family="'Arial Black','Impact','Helvetica Neue',sans-serif"
                  font-size="40" font-weight="900" text-anchor="middle" fill="#0D1421" letter-spacing="-0.5">MERCH</text>
          </svg>
        </div>
      </a>

      <div class="nav-links">
        <a href="/shop">Shop</a>
        <a href="#bundles">Bundles</a>
        <a href="#brand-story">Our Story</a>
        <a href="/contact">Contact</a>
      </div>

      <div class="nav-actions">
        <div class="nav-divider"></div>
        <button class="nav-icon-btn" aria-label="Search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
        </button>
        <button class="nav-icon-btn" aria-label="Shopping cart">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/>
          </svg>
        </button>
        <a href="/shop" class="btn btn-primary nav-shop-btn">Shop Now</a>
      </div>
    </div>
  </div>
</nav>
<!-- /wp:html -->
