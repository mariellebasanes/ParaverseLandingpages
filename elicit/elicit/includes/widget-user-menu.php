<?php if (
    isset($_SESSION['loggedin']) ||
    (isset($_SESSION['ip_loggedin']) && isset($currentUrl) && strpos($currentUrl, '/briefcase/') !== false) ||
    (isset($_SESSION['temp_loggedin']) !== false)
) {
    $ACCOUNT = GET_ACCOUNT_DETAILS($identification);
    $avatarUrl = function_exists('getUserAvatar') ? getUserAvatar($identification, "MD") : '/assets/img/avatar-default.png';
?>
    <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
        <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center" style="width:35px;height:35px;">
                <span class="text-white fw-bold fs-6"><?= strtoupper(substr(DISPLAY_NAME($ACCOUNT), 0, 1)) ?></span>
            </div>
        </div>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
            data-kt-menu="true">
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <div class="symbol symbol-50px me-5">
                        <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                            <span class="text-white fw-bold fs-3"><?= strtoupper(substr(DISPLAY_NAME($ACCOUNT), 0, 1)) ?></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            <?php echo DISPLAY_NAME($ACCOUNT); ?>
                        </div>
                        <span class="fw-semibold text-muted fs-7"><?php echo $identification; ?></span>
                    </div>
                </div>
            </div>

            <div class="separator my-2"></div>
            <div class="menu-item px-5">
                <p class="px-5 mb-0 text-uppercase fs-8 fw-bold text-gray-600">Account</p>
            </div>

            <div class="menu-item px-5">
                <a href="/elicit/" class="menu-link px-5">Elicit Home</a>
            </div>
            <?php if (getUserClassification($identification) === 'Associate'): ?>
            <div class="menu-item px-5">
                <a href="/elicit/admin/events" class="menu-link px-5">My Events</a>
            </div>
            <?php endif; ?>
            <div class="menu-item px-5">
                <a href="/account/admin.php" class="menu-link px-5">Switch to Admin</a>
            </div>
            <div class="menu-item px-5">
                <a href="/account/student1.php" class="menu-link px-5">Switch to Student</a>
            </div>
        </div>
    </div>
<?php } ?>
