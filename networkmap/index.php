<?php

define('MBG', TRUE);
include(__DIR__ . '/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "NetworkMap - Visualize Your Curriculum";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link rel="stylesheet" href="/networkmap/assets/css/networkmap-design.css?v=<?php echo time(); ?>">
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true"
  data-kt-app-layout="light-header" class="app-default">
  <?php include("partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include("partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-content flex-column-fluid">
                <?php
                include(__DIR__ . "/pages/hero.php");
                include(__DIR__ . "/pages/features.php");
                include(__DIR__ . "/pages/curriculum-preview.php");
                include(__DIR__ . "/pages/about.php");
                include(__DIR__ . "/pages/bento-features.php");
                include(__DIR__ . "/pages/faq.php");
                include(__DIR__ . "/pages/cta.php");
                ?>
              </div>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>

  <script src="/networkmap/assets/js/curriculum-interactions.js?v=<?php echo time(); ?>"></script>
  <script>
    // Force remove loading screen
    function removeLoader() {
      document.body.removeAttribute('data-kt-app-page-loading');
      document.body.removeAttribute('data-kt-app-page-loading-enabled');
      var loader = document.querySelector('.page-loader');
      if (loader) {
        loader.style.opacity = '0';
        setTimeout(function() {
          loader.style.display = 'none';
        }, 500);
      }
    }

    // Attempt to remove it via multiple triggers
    window.addEventListener('DOMContentLoaded', function() {
      setTimeout(removeLoader, 1500); // Quick attempt
    });
    
    window.addEventListener('load', function() {
      removeLoader(); // Final attempt
    });

    // Safeguard timeout
    setTimeout(removeLoader, 5000);
  </script>
</body>

</html>
