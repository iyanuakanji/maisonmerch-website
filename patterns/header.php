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
<div class="announcement-bar">
  <div class="announcement-bar-inner">
    <span class="announcement-icon">🏆</span>
    FIFA World Cup 2026 is Live &mdash;
    <a href="#bundles">Shop Now &amp; Arrive Game-Ready</a>
  </div>
</div>
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
      <span><span class="trust-dot"></span> 100% eco-friendly products</span>
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
        <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS" target="_blank" rel="noopener noreferrer">Shop</a>
        <a href="#bundles">Bundles</a>
        <a href="/about-us">About Us</a>
        <a href="/faq">FAQ</a>
        <a href="/contact">Contact</a>
      </div>

      <div class="nav-actions">
        <div class="nav-divider"></div>
        <button class="nav-icon-btn" aria-label="Search" id="searchToggle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
        </button>
        <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS" target="_blank" rel="noopener noreferrer" class="btn btn-primary nav-shop-btn">Shop Now</a>
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
    <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS" target="_blank" rel="noopener noreferrer">Shop</a>
    <a href="#bundles">Bundles</a>
    <a href="/about-us">About Us</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact Us</a>
  </nav>
  <div class="mobile-menu-footer">
    <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="width:100%;justify-content:center">Shop Now</a>
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

<!-- Search overlay -->
<div class="search-overlay" id="searchOverlay" aria-hidden="true">
  <div class="search-overlay-inner">
    <form class="search-overlay-form" role="search" method="get" action="/">
      <input
        type="search"
        name="s"
        id="searchInput"
        class="search-overlay-input"
        placeholder="Search the site…"
        autocomplete="off"
        aria-label="Search"
      />
      <button type="submit" class="search-overlay-btn" aria-label="Submit search">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
      </button>
    </form>
    <button class="search-overlay-close" id="searchClose" aria-label="Close search">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
      Close
    </button>
  </div>
</div>

<style>
.search-overlay {
  position: fixed;
  inset: 0;
  background: rgba(6,13,31,.92);
  z-index: 10000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  opacity: 0;
  visibility: hidden;
  transition: opacity .25s ease, visibility .25s ease;
  backdrop-filter: blur(6px);
}
.search-overlay.is-open {
  opacity: 1;
  visibility: visible;
}
.search-overlay-inner {
  width: 100%;
  max-width: 640px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}
.search-overlay-form {
  display: flex;
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 8px 40px rgba(0,0,0,.4);
}
.search-overlay-input {
  flex: 1;
  border: none;
  outline: none;
  padding: 18px 22px;
  font-size: 18px;
  font-family: inherit;
  color: #111;
  background: #fff;
}
.search-overlay-input::placeholder { color: #aaa; }
.search-overlay-btn {
  background: var(--red, #E63946);
  border: none;
  padding: 0 24px;
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: background .15s;
}
.search-overlay-btn:hover { background: #c0303c; }
.search-overlay-close {
  background: none;
  border: 1px solid rgba(255,255,255,.25);
  color: rgba(255,255,255,.7);
  font-size: 13px;
  font-family: inherit;
  padding: 8px 18px;
  border-radius: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: border-color .15s, color .15s;
}
.search-overlay-close:hover {
  border-color: rgba(255,255,255,.6);
  color: #fff;
}
@media (max-width: 480px) {
  .search-overlay-input { font-size: 15px; padding: 15px 16px; }
}
</style>

<script>
(function(){
  var searchToggle  = document.getElementById('searchToggle');
  var searchOverlay = document.getElementById('searchOverlay');
  var searchClose   = document.getElementById('searchClose');
  var searchInput   = document.getElementById('searchInput');

  function openSearch() {
    searchOverlay.classList.add('is-open');
    searchOverlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    setTimeout(function(){ searchInput.focus(); }, 50);
  }
  function closeSearch() {
    searchOverlay.classList.remove('is-open');
    searchOverlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  searchToggle.addEventListener('click', openSearch);
  searchClose.addEventListener('click', closeSearch);
  searchOverlay.addEventListener('click', function(e){
    if (e.target === searchOverlay) closeSearch();
  });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') closeSearch();
  });
})();
</script>
<!-- /wp:html -->
