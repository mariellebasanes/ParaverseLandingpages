<?php
/**
 * iCare Landing Page - structure and assets follow sample folder.
 */
define('MBG', TRUE);

// Detect assets base path from filesystem so CSS/JS/images load in any folder (e.g. iCare-Landing-Page/Icare/)
$doc_root = rtrim(str_replace('\\', '/', (string)$_SERVER['DOCUMENT_ROOT']), '/');
$icare_dir = rtrim(str_replace('\\', '/', __DIR__), '/');
if ($doc_root !== '' && strpos($icare_dir, $doc_root) === 0) {
  $base_path = substr($icare_dir, strlen($doc_root));
  define('ICARE_BASE', $base_path === '' ? '' : $base_path);
}
else {
  $script_dir = dirname((string)$_SERVER['SCRIPT_NAME']);
  $script_dir = $script_dir === '/' || $script_dir === '\\' ? '' : rtrim(str_replace('\\', '/', $script_dir), '/');
  define('ICARE_BASE', $script_dir);
}

$icare_root = __DIR__;
if (!is_file($icare_root . '/functions-new.php')) {
  $icare_root = dirname(__DIR__) . '/Icare';
}
$functions_path = is_file($icare_root . '/functions-new.php') ? $icare_root . '/functions-new.php' : $_SERVER['DOCUMENT_ROOT'] . '/Icare/sample/functions-new.php';
if (!is_file($functions_path)) {
  $functions_path = $_SERVER['DOCUMENT_ROOT'] . '/sample/functions-new.php';
}
if (!is_file($functions_path)) {
  header('Content-Type: text/plain; charset=utf-8');
  die('iCare: functions-new.php not found.');
}
require_once $functions_path;

$META_TITLE = "iCare - Academic Support at FEU Tech";
$META_DESC = "Free tutoring, study groups, and academic support for FEU Tech students. Your study buddy awaits!";
$ICARE_HOME = (ICARE_BASE === '' ? '/' : ICARE_BASE . '/');
$ICARE_PARTIALS = $icare_root . '/partials';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="<?php echo htmlspecialchars(ICARE_BASE); ?>/assets/css/custom-geometric.css" rel="stylesheet" type="text/css" />
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" data-kt-app-layout="light-header" class="app-default">
  <?php include $ICARE_PARTIALS . '/_page-loader.php'; ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include $ICARE_PARTIALS . '/_header-landing.php'; ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <?php include $ICARE_PARTIALS . '/_index-v2-hero.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-about.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-services.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-directory.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-events.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-testimonials.php'; ?>
              <?php include $ICARE_PARTIALS . '/_index-v2-cta.php'; ?>
            </main>
          </div>
          <?php include $ICARE_PARTIALS . '/_footer-landing.php'; ?>
        </div>
      </div>
    </div>
  </div>
  <?php include $ICARE_PARTIALS . '/_scrolltop.php'; ?>
  <script src="<?php echo htmlspecialchars(ICARE_BASE); ?>/assets/plugins/global/plugins.bundle.js"></script>
  <script src="<?php echo htmlspecialchars(ICARE_BASE); ?>/assets/js/scripts.bundle.v2.01.js"></script>
</body>
</html>
