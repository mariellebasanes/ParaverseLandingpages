<?php
$assetsBase = isset($GCO_BASE) ? $GCO_BASE . 'assets' : 'assets';
$services = [
  ['title' => 'Interview', 'desc' => "For gathering information that allows the counselor to learn about the student's needs and current state.", 'icon' => 'ki-messages', 'paths' => 5],
  ['title' => 'Psychological Test Administration', 'desc' => 'Professional psychological assessments to better understand your strengths, challenges, and learning style.', 'icon' => 'ki-notepad-bookmark', 'paths' => 6],
  ['title' => 'Consultation', 'desc' => 'One-on-one sessions to discuss academic, personal, or career-related concerns in a confidential setting.', 'icon' => 'ki-profile-circle', 'paths' => 3],
  ['title' => 'Counseling', 'desc' => 'Ongoing support and guidance to help you navigate challenges and develop healthy coping strategies.', 'icon' => 'ki-heart', 'paths' => 2],
];
?>
<section id="services" class="bg-white pt-0 pb-20 position-relative overflow-hidden" style="z-index: 0;">
  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0" style="z-index: 0; pointer-events: none;">
    <!-- Top Left Blob -->
    <div class="position-absolute bg-primary rounded-circle blur-3 justify-content-center align-items-center"
      style="width: 25vw; height: 25vw; top: -5vw; left: -10vw; opacity: 0.05; filter: blur(60px); mix-blend-mode: multiply;">
    </div>
    <!-- Bottom Right Blob -->
    <div class="position-absolute bg-danger rounded-circle blur-3"
      style="width: 30vw; height: 30vw; bottom: -10vw; right: -10vw; opacity: 0.05; filter: blur(60px); mix-blend-mode: multiply;">
    </div>
  </div>

  <div class="container-xxl position-relative" style="z-index: 1;">

    <!-- Header -->
    <div class="text-center mb-12">
      <span
        class="badge badge-light-danger border border-danger border-opacity-25 fs-8 ls-2 text-uppercase fw-bolder py-3 px-6 mb-5 rounded-pill d-inline-block">Our
        Services</span>
      <h2 class="fw-bolder fs-2x text-gray-600 mb-4">Choose the right service for you
      </h2>
      <p class="fs-6 mb-0 mw-550px mx-auto text-gray-600">
        If you need more info, please check out the
        <a href="https://www.feutech.edu.ph/campus_life/gcu" class="fw-semibold text-danger" target="_blank"
          rel="noopener">Guidance and Counseling Office</a> page.
      </p>
    </div>

    <!-- Service cards grid — in one row -->
    <div class="row g-5 row-cols-1 row-cols-md-2 row-cols-xl-4">
      <?php foreach ($services as $s): ?>
      <div class="col">
        <div class="card border-0 h-100 shadow-sm border-top border-4 border-danger">
          <div class="card-body p-7">
            <!-- Icon above text to fit nicely in 4 columns -->
            <div class="symbol symbol-50px mb-5">
              <span class="symbol-label rounded-3 bg-light-danger">
                <i class="ki-duotone <?= $s['icon']?> fs-2x text-danger">
                  <?php for ($p = 1; $p <= $s['paths']; $p++): ?><span class="path<?= $p?>"></span>
                  <?php
  endfor; ?>
                </i>
              </span>
            </div>
            <h3 class="fw-bold fs-3 mb-3 text-gray-600">
              <?= htmlspecialchars($s['title'])?>
            </h3>
            <p class="text-gray-600 mb-0" style="font-size: 13px !important;">
              <?= htmlspecialchars($s['desc'])?>
            </p>
          </div>
        </div>
      </div>
      <?php
endforeach; ?>
    </div>

  </div>
</section>