<?php if (!defined('MBG')) exit; ?>
<section class="hero-section bg-white overflow-hidden position-relative min-vh-100 d-flex flex-column justify-content-center">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.05; background-image: linear-gradient(#0047AB 1px, transparent 1px), linear-gradient(90deg, #0047AB 1px, transparent 1px); background-size: 40px 40px;"></div>
  
  <!-- Floating particles -->
  <div class="particle" style="top: 15%; left: 20%; animation-delay: 0s;"></div>
  <div class="particle" style="top: 40%; left: 10%; animation-delay: 2s; width: 8px; height: 8px;"></div>
  <div class="particle" style="top: 70%; left: 30%; animation-delay: 4s; width: 15px; height: 15px;"></div>
  <div class="particle" style="top: 20%; right: 20%; animation-delay: 1s;"></div>
  <div class="particle" style="top: 50%; right: 15%; animation-delay: 3s; width: 10px; height: 10px;"></div>
  
  <div class="container container-xxl position-relative z-index-1">
    <!-- Floating course cards -->
    <div class="hero-floating-card h-card-1 animate-bouncy-float d-none d-lg-block">
      <div class="course-card-mini">
        <div class="course-type-bar type-ged">GED</div>
        <div class="course-card-body">
          <div class="course-code">GED0081</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>
    
    <div class="hero-floating-card h-card-2 animate-bouncy-float d-none d-lg-block" style="animation-delay: -2s;">
      <div class="course-card-mini">
        <div class="course-type-bar type-it">IT</div>
        <div class="course-card-body">
          <div class="course-code">CS0017</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>

    <div class="hero-floating-card h-card-3 animate-bouncy-float d-none d-lg-block" style="animation-delay: -4s;">
      <div class="course-card-mini">
        <div class="course-type-bar type-cs">CS</div>
        <div class="course-card-body">
          <div class="course-code">CS0048</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>

    <!-- Social Proof Pill -->
    <div class="verified-pill d-none d-md-flex animate-bouncy-float" style="animation-delay: -1s;">
      <div class="symbol-group symbol-hover">
        <div class="symbol symbol-30px symbol-circle"><img src="https://i.pravatar.cc/150?u=1" alt=""></div>
        <div class="symbol symbol-30px symbol-circle"><img src="https://i.pravatar.cc/150?u=2" alt=""></div>
        <div class="symbol symbol-30px symbol-circle"><img src="https://i.pravatar.cc/150?u=3" alt=""></div>
      </div>
      <div class="verified-text">1k+ Students Users</div>
    </div>
    
    <div class="hero-minimalist py-20 mt-10">
      <h2 class="hero-subheader fs-1 mb-6">Map Your <span class="text-primary fw-bold">Success</span>:</h2>
      <h1 class="hero-title-main" style="font-size: 6rem; line-height: 1.1; margin-bottom: 2.5rem;">
        Master Your <br><span class="text-primary">Curriculum</span>
      </h1>
      <p class="fs-2 lh-lg text-gray-600 mb-15 mw-800px mx-auto">
        Track every unit, visualize prerequisite chains, and graduate with confidence using network map.
      </p>
      <div class="d-flex justify-content-center gap-6">
        <a href="#" class="btn btn-nm-primary shadow-lg fs-3 fw-bold px-15 py-6 rounded-pill">Get Started</a>
        <a href="#" class="btn btn-light-primary fs-3 fw-bold px-15 py-6 rounded-pill border-0">View Demo</a>
      </div>
    </div>
  </div>
</section>
