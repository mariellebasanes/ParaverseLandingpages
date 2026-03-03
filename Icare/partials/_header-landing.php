<?php
$ICARE_BASE = defined('ICARE_BASE') ? ICARE_BASE : '/Icare/Icare';
$ICARE_HOME = isset($ICARE_HOME) ? $ICARE_HOME : $ICARE_BASE . '/';
?>
<!-- Custom variables -->
<link rel="stylesheet" href="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/custom-palette.css">
<style>
  /* Premium Header transition */
  #kt_app_header { transition: background-color 0.3s ease, box-shadow 0.3s ease; }
</style>
<div id="kt_app_header" class="app-header bg-white shadow-sm" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
    <div class="app-navbar flex-shrink-0">
      <a href="<?php echo htmlspecialchars($ICARE_HOME); ?>" class="d-flex align-items-center" onclick="typeof KTApp !== 'undefined' && KTApp.showPageLoading && KTApp.showPageLoading()">
        <h1 class="mb-0 d-flex align-items-center gap-2">
          <img src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/Logo.svg" alt="iCare" class="h-30px">
          <span class="fw-bolder fs-3 text-icare-green">iCare</span>
        </h1>
      </a>
    </div>
    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">
      <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
        <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
          <div class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <a href="#services" class="menu-link text-hover-primary"><span class="menu-title">Services</span></a>
          </div>
          <div class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <a href="#feedback" class="menu-link text-hover-primary"><span class="menu-title">Feedback</span></a>
          </div>
          <div class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <a href="#faq" class="menu-link text-hover-primary"><span class="menu-title">FAQ</span></a>
          </div>
          <div class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <a href="https://www.feutech.edu.ph/campus_life/gcu" target="_blank" rel="noopener" class="menu-link py-3"><span class="menu-title">GCU</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
