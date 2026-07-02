<?php
define('MBG', TRUE);

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$DISCOURSE_BASE = (substr(rtrim($uri, '/'), -9) === 'index.php' ? dirname($uri) . '/' : rtrim($uri, '/') . '/');
if ($DISCOURSE_BASE === '/' || $DISCOURSE_BASE === '') {
  $DISCOURSE_BASE = '/discourse-landing/';
}

include(__DIR__ . '/functions-new.php');

$META_TITLE = "Discourse – Your School's Community Hub | FEU Tech · Alabang · Diliman";
$META_DESC  = "Connect with peers, join communities, share resources, and grow together with the FEU Tech, Alabang, and Diliman Discourse platform.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
</head>

<body id="kt_app_body" data-kt-app-layout="light-header" class="app-default">

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

      <!-- Header -->
      <?php include(__DIR__ . "/partials/_header.php"); ?>

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="flex-column-fluid">
                <?php
                // Section order matches reference screenshot:
                // 1. Hero (dark green)
                include(__DIR__ . "/pages/index-inc-hero.php");
                // 2. Features / About (white)
                include(__DIR__ . "/pages/index-inc-about.php");
                // 4. Hashtags (light green tint)
                include(__DIR__ . "/pages/index-inc-hashtags.php");
                // 5. Communities (white)
                include(__DIR__ . "/pages/index-inc-communities.php");
                // 6. Posts + Sidebar (light gray)
                include(__DIR__ . "/pages/index-inc-posts.php");
                // 7. Rewards & Gamification (white)
                include(__DIR__ . "/pages/index-inc-badges.php");
                // 8. CTA (dark green)
                include(__DIR__ . "/pages/index-inc-cta.php");
                ?>
              </div>
            </main>
          </div>

          <!-- Footer -->
          <?php include(__DIR__ . "/partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll-to-Top -->
  <?php include(__DIR__ . "/partials/_scrolltop.php"); ?>

  <!-- Metronic JS -->
  <script src="<?php echo htmlspecialchars($DISCOURSE_BASE); ?>assets/plugins/global/plugins.bundle.js"></script>
  <script src="<?php echo htmlspecialchars($DISCOURSE_BASE); ?>assets/js/scripts.bundle.v2.01.js"></script>

  <script>
    window.addEventListener("DOMContentLoaded", function () {
      document.documentElement.removeAttribute("data-bs-theme");
      setTimeout(function () { document.documentElement.removeAttribute("data-bs-theme"); }, 100);

      // Scroll-reveal: animate elements with .dl-reveal when they enter the viewport
      if ('IntersectionObserver' in window) {
        var revealEls = document.querySelectorAll('.dl-reveal');
        var revealObserver = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              revealObserver.unobserve(entry.target);
            }
          });
        }, { threshold: 0.12 });
        revealEls.forEach(function (el) { revealObserver.observe(el); });
      } else {
        // Fallback: show all immediately
        document.querySelectorAll('.dl-reveal').forEach(function (el) {
          el.classList.add('visible');
        });
      }
    });
  </script>
</body>
</html>
