<?php
define('MBG', TRUE);

// Use local Icare when /sample/ is not available
$sample_functions = $_SERVER['DOCUMENT_ROOT'] . '/sample/functions-new.php';
if (is_file($sample_functions)) {
  include $sample_functions;
} else {
  require_once realpath(__DIR__ . '/../../functions-new.php');
}

$ICARE_ROOT = realpath(__DIR__ . '/../..');
$sample_partials = $_SERVER['DOCUMENT_ROOT'] . '/sample/partials';
$partials_dir = is_dir($sample_partials) ? $sample_partials : $ICARE_ROOT . '/partials';
// Asset base: when using local Icare, path to Icare folder (3 levels up from admin/pages/index.php)
$assets_base = is_dir($sample_partials) ? '' : rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
if ($assets_base === '' || $assets_base === '.') {
  $assets_base = '/Icare/Icare';
}

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Management";
$META_DESC = "Create and edit information";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="<?php echo htmlspecialchars($assets_base); ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo htmlspecialchars($assets_base); ?>/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="false" data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" class="app-default">
  <?php
  $page_loader = $partials_dir . '/_page-loader.php';
  if (is_file($page_loader)) {
    include $page_loader;
  }
  ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include $partials_dir . '/_header.php'; ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                  <?php include("index-inc-table.php"); ?>
                </div>
              </div>
            </main>
          </div>
          <?php include $partials_dir . '/_footer.php'; ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  $scrolltop = $partials_dir . '/_scrolltop.php';
  if (is_file($scrolltop)) {
    include $scrolltop;
  }
  ?>
</body>

</html>
