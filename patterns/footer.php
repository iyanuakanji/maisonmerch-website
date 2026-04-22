<?php
/**
 * Title: Footer
 * Slug: twentytwentyfive/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Maison Merch full footer with nav columns, social links, and newsletter.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */
?>
<!-- wp:html -->
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">

        <div class="footer-brand">
          <div class="footer-logo" style="align-items:flex-start">
            <div class="footer-logo-icon">
              <svg viewBox="0 0 200 215" xmlns="http://www.w3.org/2000/svg">
                <defs><clipPath id="lc-footer"><rect x="12" y="42" width="176" height="162" rx="16"/></clipPath></defs>
                <rect x="12" y="42" width="176" height="162" rx="16" fill="#151E30"/>
                <g clip-path="url(#lc-footer)">
                  <ellipse cx="40"  cy="62"  rx="54" ry="46" fill="#3BAEE8"/>
                  <ellipse cx="162" cy="62"  rx="54" ry="46" fill="#E63946"/>
                  <ellipse cx="24"  cy="132" rx="46" ry="56" fill="#1B5CB0"/>
                  <ellipse cx="68"  cy="210" rx="60" ry="42" fill="#27AE60"/>
                  <ellipse cx="172" cy="206" rx="48" ry="42" fill="#F5C842"/>
                </g>
                <path d="M70,50 C70,20 83,8 100,6 C117,8 130,20 130,50" fill="none" stroke="#151E30" stroke-width="18" stroke-linecap="round"/>
                <text x="100" y="141" font-family="'Arial Black','Impact','Helvetica Neue',sans-serif" font-size="40" font-weight="900" text-anchor="middle" fill="#0D1421" letter-spacing="-0.5">MAISON</text>
                <text x="100" y="182" font-family="'Arial Black','Impact','Helvetica Neue',sans-serif" font-size="40" font-weight="900" text-anchor="middle" fill="#0D1421" letter-spacing="-0.5">MERCH</text>
              </svg>
            </div>
          </div>
          <p class="footer-tagline">
            Where Culture Meets Commerce.<br>
            Where Identity Meets Experience.<br>
            Built for fans. Powered by culture.
          </p>
          <div class="footer-socials">
            <a href="https://www.facebook.com/share/14XqGXHdkKS/" class="social-btn" aria-label="Facebook" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
            </a>
            <a href="https://www.tiktok.com/@maisonmerch" class="social-btn" aria-label="TikTok" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.19 8.19 0 004.84 1.56V6.82a4.85 4.85 0 01-1.07-.13z"/></svg>
            </a>
            <a href="https://www.instagram.com/maisonmerchofficial" class="social-btn" aria-label="Instagram" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
              </svg>
            </a>
            <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS&marketplaceID=ATVPDKIKX0DER" class="social-btn" aria-label="Amazon" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M15.93 17.09c-2.87 2.1-7.03 3.22-10.6 1.71-5.08-2.1-6.29-7.09-3.84-11.12 2.46-4.05 7.75-5.5 12.2-3.4 2.5 1.2 3.98 3.32 4.41 5.73.44 2.4-.17 4.95-2.17 7.08zM21.5 17.5c-.39.45-.94.5-1.46.2-2.05-1.47-2.41-2.15-3.54-3.55-3.38 3.45-5.77 4.49-10.15 4.49-5.15 0-9.16-3.18-9.16-9.55C-2.81 3.36 1.84-.5 8.44-.5c3.64 0 6.84 1.26 9.16 3.77v-3.19h2.73V.5c0 .98.2 1.71.59 2.19l3.07 3.52c.97 1.11 1 2.86.1 4.03C23.17 11.28 22.3 16.54 21.5 17.5z"/></svg>
            </a>
          </div>
        </div>

        <div class="footer-col">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="/shipping-returns">Shipping &amp; Returns</a></li>
            <li><a href="/refund-policy">Refund Policy</a></li>
            <li><a href="/delivery">Delivery</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Menu</h4>
          <ul>
            <li><a href="/terms-and-conditions">Terms &amp; Conditions</a></li>
            <li><a href="/privacy-policy">Privacy Policy</a></li>
            <li><a href="/shop">Shop All</a></li>
            <li><a href="/about-us">About Us</a></li>
          </ul>
        </div>

        <div class="footer-col footer-newsletter">
          <h4>Stay in the Loop</h4>
          <p>Get early access to new drops, exclusive deals, and game-day inspiration.</p>
          <div class="newsletter-form">
            <input class="newsletter-input" type="email" placeholder="Your email address" aria-label="Email address" />
            <button class="newsletter-btn">Go</button>
          </div>
          <div class="footer-trust-chips">
            <div class="trust-chip">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              </svg>
              SSL Secure
            </div>
            <div class="trust-chip">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/>
                <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
              </svg>
              Free Returns
            </div>
            <div class="trust-chip">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                <circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
              </svg>
              Fast Shipping
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="footer-bottom-inner">
        <div class="footer-copy">&copy; <?php echo date('Y'); ?> Maison Merch. All rights reserved.</div>
        <div class="footer-legal">
          <a href="/terms">Terms &amp; Conditions</a>
          <a href="/privacy-policy">Privacy Policy</a>
          <a href="/cookie-policy">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /wp:html -->
