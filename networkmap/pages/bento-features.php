<?php
// bento-features.php
?>
<?php
// bento-features.php
?>
<section id="bento-features" class="section-padding position-relative overflow-hidden bg-primary">
  <!-- Decorative uneven blobs (light overlay for dark blue background) -->
  <div class="position-absolute" style="top: 5%; right: -5%; width: 45vw; height: 45vw; max-width: 550px; max-height: 550px; background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%); border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; z-index: 0; pointer-events: none; transform: rotate(-10deg);"></div>
  <div class="position-absolute" style="bottom: 5%; left: -5%; width: 30vw; height: 30vw; max-width: 350px; max-height: 350px; background: linear-gradient(135deg, rgba(255, 255, 255, 0.06) 0%, rgba(255, 255, 255, 0.01) 100%); border-radius: 60% 40% 30% 70% / 50% 60% 50% 40%; z-index: 0; pointer-events: none; transform: rotate(15deg);"></div>
  
  <div class="container container-xxl position-relative" style="z-index: 1;">
    <!-- Header -->
    <div class="text-center mb-15">
      <div class="d-inline-flex align-items-center py-2 px-4 bg-white bg-opacity-10 rounded-pill mb-5 text-uppercase fw-bold border border-white border-opacity-25" style="font-size: 0.85rem; color: #ffffff; letter-spacing: 1px;">
        <i class="ki-duotone ki-stop fs-5 me-2 text-white"><span class="path1"></span><span class="path2"></span></i>
        Integrated Applications
      </div>
      <h2 class="fs-2x fs-md-3x fw-bolder text-white mb-4"><span class="opacity-50">Access Different</span> Applications</h2>
      <p class="fs-4 text-white opacity-75 mw-700px mx-auto fw-medium">
        Access integrated applications in one place
      </p>
    </div>

    <!-- Bento Grid -->
    <div class="row g-5">
      <!-- Left Column (Access Map) -->
      <div class="col-lg-4 d-flex">
        <div class="card w-100 flex-column d-flex bg-white rounded-4 shadow-sm border-0 hover-elevate-up transition-all overflow-hidden group">
          <div class="card-body p-8 d-flex flex-column h-100">
            <h3 class="fs-1 fw-bolder mb-6 text-primary">Access Map</h3>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center mb-6 bg-light rounded-4 p-5 position-relative overflow-hidden">
              <img src="/networkmap/assets/img/icons/Access_Map.jpg" class="w-100 h-auto rounded position-relative z-index-1 shadow-sm transition-all" alt="Access Map" style="mix-blend-mode: multiply; transform: scale(1.05);">
            </div>
            <p class="text-gray-600 fs-5 fw-medium mb-0">View all connected Learning Maps </p>
          </div>
        </div>
      </div>

      <!-- Right Section (Video Courseware, Eventually, Arcadia) -->
      <div class="col-lg-8 d-flex flex-column">
        <!-- Top Row: Video Courseware -->
        <div class="card w-100 bg-white rounded-4 mb-5 shadow-sm border-0 hover-elevate-up transition-all overflow-hidden">
          <div class="card-body p-8 d-flex flex-row align-items-center justify-content-between h-100">
            <div class="w-50 pe-6">
              <h3 class="fs-1 fw-bolder mb-4 text-primary">Video<br>Courseware</h3>
              <p class="text-gray-600 fs-5 fw-medium mb-0">View video courseware and learn new skills via Mflix</p>
            </div>
            <div class="w-50 text-end position-relative">
              <img src="/networkmap/assets/img/icons/educational-video.png" class="h-175px w-auto object-fit-contain position-relative z-index-1 transition-all" alt="Video Courseware" style="transform: scale(1.1);">
            </div>
          </div>
        </div>

        <!-- Bottom Row: Eventually, Arcadia -->
        <div class="row g-5 flex-grow-1">
          <!-- Eventually -->
          <div class="col-md-6 d-flex">
            <div class="card w-100 bg-white rounded-4 d-flex flex-column text-center shadow-sm border-0 hover-elevate-up transition-all overflow-hidden">
              <div class="card-body p-8 d-flex flex-column justify-content-center align-items-center h-100">
                <img src="/networkmap/assets/img/icons/calendar.png" class="h-80px w-auto mb-6" alt="Calendar">
                <h3 class="fs-1 fw-bolder mb-4 text-primary">Eventually</h3>
                <p class="text-gray-600 fs-5 fw-medium mb-0">Mark your calendar with any events and tutorials to attend</p>
              </div>
            </div>
          </div>
          <!-- Arcadia -->
          <div class="col-md-6 d-flex">
            <div class="card w-100 bg-white rounded-4 d-flex flex-column text-start shadow-sm border-0 hover-elevate-up transition-all position-relative overflow-hidden">
              <div class="card-body p-8 d-flex flex-column justify-content-between h-100 position-relative z-index-1">
                <div>
                  <h3 class="fs-1 fw-bolder mb-4 text-primary">Arcadia</h3>
                  <p class="text-gray-600 fs-5 fw-medium mb-6">Access your gained badges and certificates here</p>
                </div>
                <div class="text-end mt-auto">
                  <img src="/networkmap/assets/img/icons/medal.png" class="h-90px w-auto" alt="Medal">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Row: iCare, Gco Connect -->
    <div class="row g-5 mt-0">
      <div class="col-lg-8 d-flex">
        <div class="card w-100 bg-white rounded-4 d-flex flex-row overflow-hidden shadow-sm border-0 hover-elevate-up transition-all">
          <div class="card-body p-8 d-flex flex-column justify-content-center w-50">
            <h3 class="fs-1 fw-bolder mb-4 text-primary">iCare</h3>
            <p class="text-gray-600 fs-5 fw-medium mb-0">Seek academic assistance with iCare</p>
          </div>
          <div class="w-50 position-relative d-flex align-items-end justify-content-end">
            <img src="/networkmap/assets/img/icons/tutoring.png" class="h-200px w-auto pe-6" alt="iCare" style="margin-bottom: -15px;">
          </div>
        </div>
      </div>
      <div class="col-lg-4 d-flex">
        <div class="card w-100 bg-white rounded-4 shadow-sm border-0 hover-elevate-up transition-all position-relative overflow-hidden">
          <div class="card-body p-8 d-flex flex-column justify-content-between h-100">
            <div>
              <h3 class="fs-1 fw-bolder mb-4 text-primary">Gco<br>Connect</h3>
              <p class="text-gray-600 fs-5 fw-medium mb-6">Burned out? Seek support here</p>
            </div>
            <div class="text-end mt-auto position-relative">
              <img src="/networkmap/assets/img/icons/psychiatrist.png" class="h-100px w-auto position-relative z-index-1" alt="Gco Connect">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
