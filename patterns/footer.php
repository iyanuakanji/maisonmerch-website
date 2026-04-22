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
              <img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/logo.svg' ) ); ?>"
                   alt="Maison Merch" width="80" height="86" loading="lazy">
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
            <a href="https://www.amazon.com/s?me=AYHCG6KQCHSKS&marketplaceID=ATVPDKIKX0DER" class="social-btn social-btn--amazon" aria-label="Amazon" target="_blank" rel="noopener">
              <!-- Amazon brand icon — Simple Icons standard path (amazon 'a' + smile arrow) -->
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-hidden="true">
                <path d="M13.958 10.09c0 1.232.029 2.256-.591 3.351-.502.891-1.301 1.438-2.186 1.438-1.214 0-1.922-.924-1.922-2.292 0-2.692 2.415-3.182 4.7-3.182v.685zm3.186 7.705c-.209.189-.512.201-.745.074-1.052-.872-1.238-1.276-1.814-2.106-1.734 1.767-2.962 2.297-5.209 2.297-2.66 0-4.731-1.642-4.731-4.927 0-2.565 1.391-4.309 3.37-5.164 1.715-.754 4.11-.891 5.942-1.099v-.41c0-.753.06-1.642-.384-2.294-.385-.578-1.124-.816-1.774-.816-1.206 0-2.284.619-2.547 1.903-.054.285-.261.567-.549.582l-3.061-.333c-.259-.056-.548-.266-.472-.66C5.308 2.875 8.219 2 10.797 2c1.414 0 3.26.376 4.376 1.445 1.415 1.326 1.279 3.091 1.279 5.015v4.542c0 1.365.567 1.966 1.102 2.704.187.262.227.576-.01.769-.596.499-1.656 1.423-2.239 1.942l-.161-.622zM21.897 19.512c-2.986 2.22-7.326 3.4-11.057 3.4-5.23 0-9.94-1.934-13.501-5.151-.28-.253-.03-.599.307-.402 3.845 2.237 8.597 3.583 13.501 3.583 3.312 0 6.953-.687 10.304-2.112.506-.214.931.333.446.682zm1.308-1.487c-.42-.542-2.796-.256-3.862-.129-.324.04-.374-.242-.082-.447 1.891-1.332 4.992-.948 5.354-.501.362.446-.094 3.551-1.873 5.032-.272.228-.532.107-.411-.196.4-1.002 1.297-3.218.874-3.759z"/>
              </svg>
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
