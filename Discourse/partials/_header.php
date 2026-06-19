<?php
$base    = "/Discourse/";
$app_url = "/Discourse/";

// Expose expected base variables for standard widgets
$GCO_BASE = "/Discourse/";
$ICARE_BASE = "/Discourse/";
$DISCOURSE_BASE = "/Discourse/";
?>
<style>
/* Header */
.app-header {
  background: rgba(255,255,255,0.95) !important;
  backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(0,0,0,0.06);
  transition: box-shadow 0.3s ease;
}
.app-header-minimize .app-header {
  box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}
.dl-nav-link {
  color: #4b5563 !important;
  font-weight: 500;
  font-size: 0.87rem;
  padding: 0.45rem 0.85rem;
  border-radius: 6px;
  transition: color 0.18s, background 0.18s;
}
.dl-nav-link:hover {
  color: #2D6A4F !important;
  background: rgba(45,106,79,0.06);
}
.dl-logo-text {
  font-family: 'Outfit', sans-serif;
  font-weight: 900;
  font-size: 1.35rem;
  color: #1e293b;
  letter-spacing: -0.3px;
}
.dl-logo-text .dot { color: #fbc501; }
</style>

<div id="kt_app_header" class="app-header bg-white"
  data-kt-sticky="true"
  data-kt-sticky-activate="{default: true, lg: true}"
  data-kt-sticky-name="app-header-minimize"
  data-kt-sticky-offset="{default: '100px', lg: '0'}"
  data-kt-sticky-animation="false">

  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">

    <!-- Logo & Applications Browser -->
    <div class="app-navbar flex-shrink-0 align-items-center">
      <?php
      $widget_browser = $_SERVER['DOCUMENT_ROOT'] . '/includes/widget-applications-browser.php';
      if (file_exists($widget_browser)) {
          include($widget_browser);
      }
      ?>
      <a href="<?php echo htmlspecialchars($base); ?>" class="d-flex align-items-center gap-3"
         onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
        <img src="<?php echo htmlspecialchars($base); ?>assets/images/Discourse-logo.png"
             alt="Discourse Logo" class="h-40px">
        <span class="dl-logo-text d-none d-sm-inline">Discourse<span class="dot">.</span></span>
      </a>
    </div>

    <!-- Nav + CTA -->
    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">

      <!-- Nav menu -->
      <div class="app-header-menu app-header-mobile-drawer align-items-stretch"
        data-kt-drawer="true" data-kt-drawer-name="app-header-menu"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
        data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_app_header_menu_toggle"
        data-kt-swapper="true"
        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">

        <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold gap-1 gap-lg-2"
          id="kt_app_header_menu" data-kt-menu="true">
          <div class="menu-item align-items-center">
            <a href="#about" class="dl-nav-link menu-link"><span class="menu-title">Features</span></a>
          </div>
          <div class="menu-item align-items-center">
            <a href="#info" class="dl-nav-link menu-link"><span class="menu-title">How It Works</span></a>
          </div>
          <div class="menu-item align-items-center">
            <a href="#hashtags" class="dl-nav-link menu-link"><span class="menu-title">Hashtags</span></a>
          </div>
          <div class="menu-item align-items-center">
            <a href="#communities" class="dl-nav-link menu-link"><span class="menu-title">Communities</span></a>
          </div>
          <div class="menu-item align-items-center">
            <a href="#posts" class="dl-nav-link menu-link"><span class="menu-title">Feed</span></a>
          </div>
        </div>
      </div>

      <!-- Right Navbar including CTA & widgets -->
      <div class="app-navbar flex-shrink-0 align-items-center ms-3">
        <a href="<?php echo htmlspecialchars($app_url); ?>"
           class="btn btn-sm fw-bold rounded-pill px-6 py-3 d-flex align-items-center gap-2 me-2"
           style="background:#0b3220; color:#fff; font-size:0.85rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          Go to Forum <i class="bi bi-arrow-right"></i>
        </a>

        <?php
        $user_menu = $_SERVER['DOCUMENT_ROOT'] . '/includes/widget-user-menu.php';
        $app_item_login = $_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-login.php';
        $app_item_hamburger = $_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-hamburger.php';
        
        if (file_exists($user_menu)) {
            include($user_menu);
        }
        if (file_exists($app_item_login)) {
            include($app_item_login);
        }
        if (file_exists($app_item_hamburger)) {
            include($app_item_hamburger);
        } else {
            // Fallback mobile toggle for local preview
            echo '
            <button class="btn btn-icon btn-active-color-primary w-35px h-35px d-lg-none ms-2"
              id="kt_app_header_menu_toggle">
              <i class="bi bi-list fs-1 text-gray-700"></i>
            </button>';
        }
        ?>
      </div>

    </div>
  </div>
</div>

