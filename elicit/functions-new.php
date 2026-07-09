<?php
session_name('mbg');
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// ── MySQL Database Connection (XAMPP) ──
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'elicit';

$ELICIT = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($ELICIT->connect_error) {
    die("Database connection failed: " . $ELICIT->connect_error);
}
$ELICIT->set_charset('utf8mb4');

$EDITH = $ELICIT; // Same connection — accounts table lives in elicit DB for local dev

// Compatibility variables for SSP DataTables
$DB_SERVER   = $DB_HOST;
$DB_USERNAME = $DB_USER;
$DB_PASSWORD = $DB_PASS;
$DB_NAME_ELICIT = $DB_NAME;
$DB_NAME_EDITH  = $DB_NAME;
$DB_ELICIT   = $DB_NAME;

// Define Identification Global
$identification = isset($_SESSION['identification']) ? $_SESSION['identification'] : null;

// Helper Class for Sanitization
class Sanitizer {
  public static function url($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
  }
}

// Core Auth Functions
function IS_LOGGED_IN($uri) {
  if (!isset($_SESSION['temp_loggedin']) || $_SESSION['temp_loggedin'] !== true) {
    header("Location: /account/admin.php");
    exit();
  }
}

function DIRECT_ACCESS_BLOCKED() {
  if (!defined('MBG')) {
    die("Direct access blocked.");
  }
}

function GET_ACCOUNT_DETAILS($id) {
  global $ELICIT;
  $stmt = $ELICIT->prepare("SELECT * FROM accounts WHERE identification = ?");
  if (!$stmt) return ["display_name" => "User", "avatar_md" => ""];
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_assoc();
  $stmt->close();
  return $result ?: ["display_name" => "User", "avatar_md" => ""];
}

function DISPLAY_NAME($account) {
  return $account['display_name'] ?? 'User';
}

function getUserClassification($id) {
  global $ELICIT;
  if (!$id) return 'Student';
  $stmt = $ELICIT->prepare("SELECT role FROM accounts WHERE identification = ?");
  if (!$stmt) return 'Student';
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_assoc();
  $stmt->close();
  if ($result && $result['role'] === 'admin') {
    return 'Associate';
  }
  return 'Student';
}

function respondWithError($message) {
  header('Content-Type: application/json');
  echo json_encode(['status' => 'error', 'message' => $message]);
  exit();
}

function getUserAvatar($id, $size = "MD") {
  return '/assets/img/avatar-default.png';
}

// Asset Base Path
$BASE_PATH = "";

function HEAD_ESSENTIALS()
{
  global $META_TITLE;
  global $META_DESC;
  global $META_IMAGE;
  global $identification;
  global $BASE_PATH;

  $META_TITLE = empty($META_TITLE) ? "Educational Innovation and Technology Hub" : htmlspecialchars(
    $META_TITLE,
    ENT_NOQUOTES
  );
  $META_IMAGE = empty($META_IMAGE) ? $BASE_PATH . "/assets/img/office.jpg" : Sanitizer::url($META_IMAGE);
  $META_LINK = "http://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  $maintenance = isset($_SESSION['loggedins'])
    ? "
<script>
  $(document).ready(function () {
    var alertBox = $('<div class=\"alert bg-light-danger fw-semibold text-center fs-5 py-7 px-lg-20\"></div>')
      .html(`
                        <div class=\"app-container container-xxl\">
                            Some features may be temporarily unavailable as we complete recent updates.
                            We are working to restore full functionality as quickly as possible.
                            If you encounter any errors or issues,
                            <a href='javascript:void(0);' id='reportLink' style='text-decoration:underline; color:blue;'>report here</a>.
                            Thank you for your patience! ❤️
                        </div>
                    `);

    $('.app-wrapper').prepend(alertBox);

    $(document).on('click', '#reportLink', function () {
      $('#open-modal-feedback')[0].click();
      $('[feedback=\"report\"]')[0].click();
    });
  });
</script>
" : null;

  echo '
<title>' . $META_TITLE . '</title>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="' . $META_DESC . '">

<meta property="og:title" content="' . $META_TITLE . '" />
<meta property="og:url" content="' . $META_LINK . '" />
<meta property="og:image" content="' . $META_IMAGE . '" />
<meta property="og:description" content="' . $META_DESC . '">
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="Educational Innovation and Technology Hub" />

<meta name="twitter:title" content="' . $META_TITLE . '">
<meta name="twitter:description" content="' . $META_DESC . '">
<meta name="twitter:image" content="' . $META_IMAGE . '">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/x-icon" href="' . $BASE_PATH . '/assets/img/favicon.png">

<link rel="stylesheet" href="' . $BASE_PATH . '/assets/plugins/global/plugins.bundle.css">
<link rel="stylesheet" href="' . $BASE_PATH . '/assets/css/style.keenicons.css">
<link rel="stylesheet" href="' . $BASE_PATH . '/assets/css/style.bundle.v2.full.css">

<script src="' . $BASE_PATH . '/assets/js/jquery.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&Libre+Franklin:wght@400;600;800&family=News+Cycle:wght@700&display=swap"
  rel="stylesheet">
' . $maintenance;
}
