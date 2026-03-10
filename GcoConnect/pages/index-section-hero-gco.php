<?php
$assetsBase = isset($GCO_BASE) ? $GCO_BASE . 'assets' : 'assets';
?>
<section class="bg-white overflow-hidden position-relative" style="z-index: 0;">

  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden" style="z-index: 0; pointer-events: none;">
    <!-- Top right blob -->
    <div class="position-absolute bg-primary rounded-circle blur-3 justify-content-center align-items-center"
      style="width: 30vw; height: 30vw; top: -5vw; right: -15vw; opacity: 0.05; filter: blur(60px); mix-blend-mode: multiply;">
    </div>
    <!-- Bottom left blob -->
    <div class="position-absolute bg-danger rounded-circle blur-3"
      style="width: 25vw; height: 25vw; bottom: 0; left: -10vw; opacity: 0.05; filter: blur(60px); mix-blend-mode: multiply;">
    </div>
  </div>

  <!-- Uneven background design icons -->
  <img src="<?php echo htmlspecialchars($assetsBase); ?>/img/bg-assets/flower.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; right: 5%; opacity: 0.15; pointer-events: none; width: 220px; transform: rotate(-15deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($assetsBase); ?>/img/bg-assets/brain.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; left: 5%; opacity: 0.15; pointer-events: none; width: 250px; transform: rotate(20deg); z-index: 0;"
    alt="">
  <div class="container-xxl pt-20 pb-0 position-relative" style="z-index: 1;">
    <div class="row align-items-center gy-10">

      <!-- Text content -->
      <div class="col-lg-6 pe-lg-10">
        <span
          class="badge badge-light-danger border border-danger border-opacity-25 fs-8 ls-2 text-uppercase fw-bolder py-3 px-5 mb-6 rounded-1">
          Student Counseling &amp; Support
        </span>
        <h1 class="text-dark fw-bolder fs-3x fs-lg-4x lh-sm mb-6">
          <span class="text-gray-700 opacity-75">Your Mental Health</span><br>
          <span class="text-primary">Matters</span>
        </h1>
        <p class="text-gray-600 fs-4 mb-10 mw-500px">
          The Guidance and Counseling Office (GCO) supports students’ emotional, social, and psychological well-being
          through innovative programs and services. It provides a safe and confidential space where students can openly
          discuss personal, academic, or career concerns.
        </p>
        <div class="d-flex flex-wrap gap-4 mb-10">
          <a href="#services" class="btn btn-primary d-inline-flex align-items-center gap-2
                    rounded-1 px-8 py-4 fw-bolder fs-6
                    text-decoration-none shadow-sm hover-elevate-up">
            <i class="ki-duotone ki-calendar-2 fs-4 text-white">
              <span class="path1"></span><span class="path2"></span>
              <span class="path3"></span><span class="path4"></span><span class="path5"></span>
            </i>
            Schedule a Session
          </a>
          <a href="#how-it-works" class="btn btn-light-primary d-inline-flex align-items-center gap-2 rounded-1 px-8 py-4
                    fw-bolder fs-6 text-decoration-none hover-elevate-up">
            Learn More
            <i class="ki-duotone ki-arrow-right fs-4 text-primary">
              <span class="path1"></span><span class="path2"></span>
            </i>
          </a>
        </div>

        <div
          class="d-inline-flex align-items-center gap-4 bg-white border border-gray-200 rounded-1 px-6 py-3 shadow-sm mt-2">
          <div class="d-flex gap-2">
            <div class="symbol symbol-40px symbol-circle">
              <span class="symbol-label bg-primary text-white fw-bold fs-7">1K+</span>
            </div>
            <div class="symbol symbol-40px symbol-circle">
              <span class="symbol-label bg-light-danger text-danger">
                <i class="ki-duotone ki-heart fs-5"><span class="path1"></span><span class="path2"></span></i>
              </span>
            </div>
          </div>
          <div>
            <div class="text-gray-700 fw-bolder fs-6 lh-1 mb-1">Join 1000+ students</div>
            <div class="text-gray-500 fw-semibold fs-8">already taking care of their mental health</div>
          </div>
        </div>
      </div>

      <!-- Hero Animation -->
      <div class="col-lg-6 position-relative d-flex justify-content-center mt-10 mt-lg-0">
        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.3/dist/dotlottie-wc.js" type="module"></script>
        <dotlottie-wc src="https://lottie.host/177811db-3257-4256-8c80-74ba7bd7b915/5MFiKBwwD5.lottie"
          style="width: 100%; max-width: 600px; height: 600px;" autoplay loop></dotlottie-wc>
      </div>

    </div>
  </div>
</section>