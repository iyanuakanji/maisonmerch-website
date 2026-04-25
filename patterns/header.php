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
      <a href="/" class="nav-logo" aria-label="Maison Merch — Home">
        <img src="https://staging.maisonmerch.ca/wp-content/uploads/2026/04/logo-maison-merch3.png"
             alt="" class="nav-logo-img" width="56" height="60" loading="eager">
      </a>

      <div class="nav-links">
        <a href="https://shorturl.at/nRAyn" target="_blank" rel="noopener noreferrer">Shop</a>
        <a href="#bundles">Bundles</a>
        <a href="/about-us">About Us</a>
        <a href="/faq">FAQ</a>
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
        <a href="https://shorturl.at/nRAyn" target="_blank" rel="noopener noreferrer" class="btn btn-primary nav-shop-btn">Shop Now</a>
        <!-- Hamburger — mobile only -->
        <button class="nav-hamburger" aria-label="Open menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile menu drawer -->
<div class="mobile-menu" id="mobileMenu" aria-hidden="true">
  <div class="mobile-menu-header">
    <a href="/" class="nav-logo" aria-label="Maison Merch">
      <img src="https://staging.maisonmerch.ca/wp-content/uploads/2026/04/logo-maison-merch3.png"
           alt="" class="nav-logo-img" width="44" height="48" loading="eager">
    </a>
    <button class="mobile-menu-close" aria-label="Close menu">&times;</button>
  </div>
  <nav class="mobile-menu-nav">
    <a href="https://shorturl.at/nRAyn" target="_blank" rel="noopener noreferrer">Shop</a>
    <a href="#bundles">Bundles</a>
    <a href="/about-us">About Us</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact Us</a>
  </nav>
  <div class="mobile-menu-footer">
    <a href="https://shorturl.at/nRAyn" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="width:100%;justify-content:center">Shop Now</a>
    <div class="mobile-menu-trust">
      <span><span class="trust-dot"></span> Free shipping over $75</span>
      <span><span class="trust-dot"></span> Ships Canada &amp; USA</span>
    </div>
  </div>
</div>
<div class="mobile-menu-overlay" id="mobileOverlay"></div>

<script>
(function(){
  const toggle = document.querySelector('.nav-hamburger');
  const close  = document.querySelector('.mobile-menu-close');
  const menu   = document.getElementById('mobileMenu');
  const overlay= document.getElementById('mobileOverlay');
  function open(){
    menu.classList.add('is-open');
    overlay.classList.add('is-open');
    toggle.setAttribute('aria-expanded','true');
    document.body.style.overflow='hidden';
  }
  function shut(){
    menu.classList.remove('is-open');
    overlay.classList.remove('is-open');
    toggle.setAttribute('aria-expanded','false');
    document.body.style.overflow='';
  }
  toggle.addEventListener('click', open);
  close.addEventListener('click', shut);
  overlay.addEventListener('click', shut);
  menu.querySelectorAll('a').forEach(a => a.addEventListener('click', shut));
})();
</script>
<!-- /wp:html -->
