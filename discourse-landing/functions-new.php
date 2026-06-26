<?php
function HEAD_ESSENTIALS()
{
  global $META_TITLE;
  global $META_DESC;
  global $META_IMAGE;

  $META_TITLE = empty($META_TITLE) ? "Discourse – Academic & Social Communities" : htmlspecialchars(
    $META_TITLE,
    ENT_NOQUOTES
  );
  $META_DESC = empty($META_DESC) ? "A modern community forum platform designed to bring students, educators, and interest groups together. Connect, discuss, and build knowledge." : htmlspecialchars($META_DESC, ENT_QUOTES);
  
  $META_IMAGE = empty($META_IMAGE) ? "https://paraverse.feutech.edu.ph/assets/img/office.jpg" : Sanitizer::url($META_IMAGE);
  $META_LINK = "https://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  global $DISCOURSE_BASE;
  $base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/ParaverseLandingpages/discourse-landing/";

  echo '
<title>' . $META_TITLE . '</title>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="' . $META_DESC . '">

<meta property="og:title" content="' . $META_TITLE . '" />
<meta property="og:url" content="' . $META_LINK . '" />
<meta property="og:image" content="' . $META_IMAGE . '" />
<meta property="og:description" content="' . $META_DESC . '">
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="FEU Tech · Alabang · Diliman Discourse" />

<meta name="twitter:title" content="' . $META_TITLE . '">
<meta name="twitter:description" content="' . $META_DESC . '">
<meta name="twitter:image" content="' . $META_IMAGE . '">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/x-icon" href="' . $base . 'assets/img/favicon.png">
<link rel="manifest" href="' . $base . 'assets/site.webmanifest?v=2">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Discourse">
<link rel="apple-touch-icon" href="' . $base . 'assets/img/logo/icon-paraverse.svg">

<!-- Metronic Global Stylesheets -->
<link rel="stylesheet" href="' . $base . 'assets/plugins/global/plugins.bundle.css">
<link rel="stylesheet" href="' . $base . 'assets/css/style.keenicons.css">
<link rel="stylesheet" href="' . $base . 'assets/css/style.bundle.v2.full.css?version=1.1028">
<link rel="stylesheet" href="' . $base . 'assets/css/fontawesome.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Custom landing page stylesheet -->
<link rel="stylesheet" href="' . $base . 'assets/css/discourse-landing.css?v=' . time() . '">

<!-- jQuery -->
<script src="' . $base . 'assets/js/jquery.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-SR6Q4GLJJH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag(\'js\', new Date());
  gtag(\'config\', \'G-SR6Q4GLJJH\');
</script>
';
}

class Sanitizer {
  public static function url($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
  }
}
