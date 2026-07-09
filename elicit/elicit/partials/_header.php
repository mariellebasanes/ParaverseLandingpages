<div id="kt_app_header" class="app-header bg-white" data-kt-sticky="true"
	data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
	data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

	<div class="app-container container-fluid d-none justify-content-start align-items-center position-absolute h-100 bg-white"
		style="z-index: 999;">
		<div id="search-box"></div>
	</div>

	<div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
		id="kt_app_header_container">

		<div class="app-navbar flex-shrink-0">
			<?php include(__DIR__ . '/..' . '/includes/widget-applications-browser.php'); ?>
			<a href="<?= $BASE_PATH ?>" class="d-flex align-items-center">
				<h1 class="mb-0">
					<img src="<?= $BASE_PATH ?>/assets/img/logo/logo-elicit.svg" class="h-30px">
					<span class="d-none">Elicit</span>
				</h1>
			</a>
		</div>

		<div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">

			<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
				data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
				data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
				data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
				data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
				data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
				<div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
					id="kt_app_header_menu" data-kt-menu="true">

					<?php if (getUserClassification($identification) === 'Associate'): ?>
						<div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
							<a href="<?= $BASE_PATH ?>/elicit/admin/events" onclick="KTApp.showPageLoading()"
								class="menu-link text-hover-info">
								<span class="menu-title">My Events</span>
							</a>
						</div>
					<?php else: ?>
						<div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
							<a href="<?= $BASE_PATH ?>/elicit/" onclick="KTApp.showPageLoading()" class="menu-link text-hover-info">
								<span class="menu-title">Join Event</span>
							</a>
						</div>
					<?php endif; ?>

				</div>
			</div>

			<div class="app-navbar flex-shrink-0">
				<?php
				include(__DIR__ . '/..' . '/includes/widget-app-item-search.php');
				include(__DIR__ . '/..' . '/includes/widget-app-item-notifications.php');
				include(__DIR__ . '/..' . '/includes/widget-user-menu.php');
				include(__DIR__ . '/..' . '/includes/widget-app-item-login.php');
				include(__DIR__ . '/..' . '/includes/widget-app-item-hamburger.php');
				?>
			</div>

		</div>

	</div>
</div>