<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/card-flip-puzzle/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Welcome to Edith";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link rel="stylesheet" href="assets/vars_win-feu-tech.css">
  <link rel="stylesheet" href="assets/style_win-feu-tech.css">
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include("partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include("partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">
<div class="win-5-x-5-puzzle-card-game-design">
    <div class="app">
      <div class="header">
        <div class="container">
          <div class="logo-mark">
            <img class="paraverse-logo" src="assets/paraverse-logo0.svg" />
          </div>
          <div class="container2">
            <div class="paragraph">
              <div class="paraverse">PARAVERSE</div>
            </div>
            <div class="paragraph2">
              <div class="puzzle-card-game">PUZZLE CARD GAME</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container3">
        <div class="heading-1">
          <div class="flip-the-card">FLIP THE CARD</div>
        </div>
        <div class="paragraph3">
          <div class="all-cards-start-face-down-choose-your-grid">
            All cards start face‑down · Choose your grid
          </div>
        </div>
      </div>
      <div class="container4">
        <div class="button">
          <div class="_3-3">3 × 3</div>
        </div>
        <div class="button2">
          <div class="_4-4">4 × 4</div>
        </div>
        <div class="button3">
          <div class="_5-5">5 × 5</div>
        </div>
      </div>
      <div class="container-margin">
        <div class="container5">
          <div class="container6">
            <div class="text">
              <div class="grid-size">GRID SIZE</div>
            </div>
            <div class="text">
              <div class="_5-52">5 × 5</div>
            </div>
          </div>
          <div class="container6">
            <div class="text">
              <div class="total-cards">TOTAL CARDS</div>
            </div>
            <div class="text">
              <div class="_25">25</div>
            </div>
          </div>
          <div class="container6">
            <div class="text">
              <div class="status">STATUS</div>
            </div>
            <div class="text">
              <div class="face-down">FACE DOWN</div>
            </div>
          </div>
        </div>
      </div>
      <div class="_5-x-5-landscape">
        <div class="cards">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo2" src="assets/paraverse-logo1.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards2">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo3" src="assets/paraverse-logo2.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards3">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo4" src="assets/paraverse-logo3.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards4">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo5" src="assets/paraverse-logo4.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards5">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo6" src="assets/paraverse-logo5.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards6">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo7" src="assets/paraverse-logo6.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards7">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo8" src="assets/paraverse-logo7.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards8">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo9" src="assets/paraverse-logo8.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards9">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo10" src="assets/paraverse-logo9.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards10">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo11" src="assets/paraverse-logo10.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards11">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo12" src="assets/paraverse-logo11.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards12">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo13" src="assets/paraverse-logo12.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards13">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo14" src="assets/paraverse-logo13.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards14">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo15" src="assets/paraverse-logo14.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards15">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo16" src="assets/paraverse-logo15.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards16">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo17" src="assets/paraverse-logo16.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards17">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo18" src="assets/paraverse-logo17.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards18">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo19" src="assets/paraverse-logo18.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards19">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo20" src="assets/paraverse-logo19.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards20">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo21" src="assets/paraverse-logo20.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards21">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo22" src="assets/paraverse-logo21.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards22">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo23" src="assets/paraverse-logo22.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards23">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo24" src="assets/paraverse-logo23.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards24">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo25" src="assets/paraverse-logo24.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards25">
          <div class="card-back">
            <div class="container7"></div>
            <div class="container8"></div>
            <div class="container9"></div>
            <div class="container10"></div>
            <div class="container11"></div>
            <div class="container12"></div>
            <div class="container13">
              <img class="paraverse-logo26" src="assets/paraverse-logo25.svg" />
            </div>
            <div class="container14">
              <div class="container15">
                <div class="paraverse2">PARAVERSE</div>
              </div>
              <div class="container16">
                <div class="div">??????</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-modal">
        <div class="container17">
          <div class="container18">
            <div class="container19"></div>
            <div class="container20"></div>
            <div class="container21"></div>
            <div class="container22"></div>
            <div class="container23"></div>
            <div class="div2">⭐</div>
            <div class="container24"></div>
            <div class="trivia">Trivia!</div>
            <div class="ano-ang-pambansang-bulaklak-ng-pilipinas">
              Ano ang pambansang bulaklak ng Pilipinas?
            </div>
          </div>
          <div class="button4">
            <div class="close">✕ CLOSE</div>
          </div>
        </div>
      </div>
    </div>
  </div>
              </div>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>
</body>

</html>
