<?php
$bookingUrl = isset($GCO_BASE) ? $GCO_BASE . 'index.php' : 'index.php';
?>
<section class="bg-gco py-20">
  <div class="container">
    <div
      class="card bg-white bg-opacity-10 border border-white border-opacity-25 rounded-4 p-10 text-center mx-auto mw-850px">

      <div class="symbol symbol-70px mx-auto mb-6">
        <span class="symbol-label bg-white bg-opacity-20">
          <i class="ki-duotone ki-heart fs-2x text-white"><span class="path1"></span><span class="path2"></span></i>
        </span>
      </div>

      <h2 class="text-white fw-bolder fs-2x lh-sm mb-4">
        Ready to take the<br><span class="text-white opacity-75">first step?</span>
      </h2>
      <p class="text-white opacity-75 fs-5 mb-8 mw-500px mx-auto">
        Don't wait — your mental health matters. Book your appointment now and take control of your wellbeing today.
      </p>

      <div class="d-flex flex-wrap gap-4 justify-content-center">
        <a href="<?= htmlspecialchars($bookingUrl)?>" class="btn btn-light fw-bold px-8 py-3 text-nowrap text-danger">
          <i class="ki-duotone ki-calendar-2 fs-4 me-2 text-danger"><span class="path1"></span><span
              class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
          Book an Appointment
        </a>
        <a href="https://www.feutech.edu.ph/campus_life/gcu" class="btn btn-outline-light fw-bold px-8 py-3 text-nowrap"
          target="_blank" rel="noopener">
          Learn About GCO
        </a>
      </div>

      <div class="separator separator-dashed border-white border-opacity-25 my-8"></div>

      <div class="d-flex flex-wrap justify-content-center gap-8">
        <div class="d-flex align-items-center gap-3 text-white opacity-75">
          <i class="ki-duotone ki-check-circle fs-3 text-white"><span class="path1"></span><span
              class="path2"></span></i>
          <span class="fs-7 fw-semibold">Free of charge</span>
        </div>
        <div class="d-flex align-items-center gap-3 text-white opacity-75">
          <i class="ki-duotone ki-check-circle fs-3 text-white"><span class="path1"></span><span
              class="path2"></span></i>
          <span class="fs-7 fw-semibold">Confidential sessions</span>
        </div>
        <div class="d-flex align-items-center gap-3 text-white opacity-75">
          <i class="ki-duotone ki-check-circle fs-3 text-white"><span class="path1"></span><span
              class="path2"></span></i>
          <span class="fs-7 fw-semibold">Licensed counselors</span>
        </div>
      </div>

    </div>
  </div>
</section>