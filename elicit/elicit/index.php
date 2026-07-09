<?php

define('MBG', TRUE);
include(__DIR__ . '/../functions-new.php');
include(__DIR__ . '/..' . '/elicit/functions.elicit.php');

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Welcome to Elicit";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="<?php echo $BASE_PATH; ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo $BASE_PATH; ?>/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include(__DIR__ . '/..' . '/elicit/partials/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include(__DIR__ . '/..' . '/elicit/partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid justify-content-center bg-primary-subtle">
            <main class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
              <div class="app-container container-xxl d-flex justify-content-center">
                <div class="card w-md-500px shadow-sm border-0 rounded-4">
                  <div class="card-body p-10 p-lg-15">
                    <div class="text-center mb-10">
                      <img alt="Illustration" src="<?php echo $BASE_PATH; ?>/assets/svg/digital-learning.svg" class="h-150px mb-5" />
                      <h1 class="text-dark fw-bolder mb-3 fs-2x">Join Session</h1>
                      <div class="text-gray-500 fw-semibold fs-5">Enter your event code below to participate</div>
                    </div>

                    <div class="d-flex flex-column mb-8">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Event Code</label>
                      <div class="input-group input-group-solid input-group-lg border border-primary border-hover rounded-3">
                        <span class="input-group-text bg-transparent border-0 pe-0">
                          <i class="ki-duotone ki-hashtag fs-1 text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                          </i>
                        </span>
                        <input type="text" class="form-control form-control-solid bg-transparent border-0 fs-2 fw-bold py-4 text-uppercase" id="event-code" placeholder="ENTER CODE">
                      </div>
                    </div>

                    <div class="d-grid mb-10">
                      <button type="button" id="search-button" class="btn btn-lg btn-primary fw-bold py-4 fs-4 rounded-3">
                        <span class="indicator-label">Join Session <i class="ki-duotone ki-arrow-right fs-2 ms-2"><span class="path1"></span><span class="path2"></span></i></span>
                      </button>
                    </div>

                    <div class="text-center mt-auto">
                      <div class="text-gray-600 fs-7">
                        By joining, you accept our <a href="#" class="text-primary fw-bold text-hover-primary">Acceptable Use Policy</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </main>
          </div>
          <?php include(__DIR__ . '/..' . '/elicit/partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    (function () {
      const input = document.getElementById('event-code');
      const button = document.getElementById('search-button');

      function goToEvent() {
        const code = input.value.trim().toUpperCase();
        if (code === '') {
          toastr.warning('Please enter an event code');
          return;
        }
        window.location.href = `<?= $BASE_PATH ?>/elicit/event/${code}`;
      }

      button.addEventListener('click', goToEvent);
      input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
          e.preventDefault();
          goToEvent();
        }
      });
      input.focus();
    })();
  </script>

  <script>
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
    window.addEventListener('load', removeLoader);
    setTimeout(removeLoader, 3000); // Safeguard
  </script>
  <?php include(__DIR__ . '/..' . '/elicit/partials/_scrolltop.php'); ?>
</body>

</html>
