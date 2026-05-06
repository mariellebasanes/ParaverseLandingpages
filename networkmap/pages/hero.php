<?php if (!defined('MBG')) exit; ?>
<section class="hero-section bg-white overflow-hidden position-relative min-vh-100 d-flex flex-column justify-content-center">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.05; background-image: linear-gradient(#4E7FF7 1px, transparent 1px), linear-gradient(90deg, #4E7FF7 1px, transparent 1px); background-size: 40px 40px;"></div>
  
  <!-- Floating particles -->
  <div class="particle" style="top: 15%; left: 20%; animation-delay: 0s;"></div>
  <div class="particle" style="top: 40%; left: 10%; animation-delay: 2s; width: 8px; height: 8px;"></div>
  <div class="particle" style="top: 70%; left: 30%; animation-delay: 4s; width: 15px; height: 15px;"></div>
  <div class="particle" style="top: 20%; right: 20%; animation-delay: 1s;"></div>
  <div class="particle" style="top: 50%; right: 15%; animation-delay: 3s; width: 10px; height: 10px;"></div>
  
  <div class="container-xxl position-relative z-index-1">
    <!-- Floating course cards -->
    <div class="hero-floating-card h-card-1 animate-bouncy-float d-none d-lg-block">
      <div class="course-card-mini shadow-lg">
        <div class="course-type-bar type-ged">GED</div>
        <div class="course-card-body">
          <div class="course-code">GED0081</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>
    
    <div class="hero-floating-card h-card-2 animate-bouncy-float d-none d-lg-block" style="animation-delay: -2s;">
      <div class="course-card-mini shadow-lg">
        <div class="course-type-bar type-it">IT</div>
        <div class="course-card-body">
          <div class="course-code">CS0017</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>

    <div class="hero-floating-card h-card-3 animate-bouncy-float d-none d-lg-block" style="animation-delay: -4s;">
      <div class="course-card-mini shadow-lg">
        <div class="course-type-bar type-cs">CS</div>
        <div class="course-card-body">
          <div class="course-code">CS0048</div>
          <div class="course-status status-passed">PASSED</div>
        </div>
      </div>
    </div>

    <div class="hero-floating-card h-card-4 animate-bouncy-float d-none d-lg-block" style="animation-delay: -1s; top: 65%; left: 5%; transform: rotate(10deg);">
      <div class="course-card-mini shadow-lg">
        <div class="course-type-bar type-ite">ITE</div>
        <div class="course-card-body">
          <div class="course-code">ITE0012</div>
          <div class="course-status status-pending">PENDING</div>
        </div>
      </div>
    </div>

    <div class="hero-floating-card h-card-5 animate-bouncy-float d-none d-lg-block" style="animation-delay: -3.5s; top: 10%; right: 10%; transform: rotate(15deg);">
      <div class="course-card-mini shadow-lg">
        <div class="course-type-bar type-cpe">CpE</div>
        <div class="course-card-body">
          <div class="course-code">CPE0021</div>
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
      <h2 class="display-1 mb-8">
        Map Your Success: <br>
        <span class="text-primary">Master Your Curriculum</span>
      </h2>
      <p class="lead text-gray-600 mb-15 mw-800px mx-auto">
        Track every unit, visualize prerequisite chains, and graduate with confidence using NetworkMap's interactive academic storytelling.
      </p>
      <div class="d-flex justify-content-center gap-6">
        <a href="#" class="btn btn-nm-primary shadow-lg px-15 py-6 rounded-pill">Get Started</a>
        <a href="#" class="btn btn-light-primary px-15 py-6 rounded-pill border-0">View Demo</a>
      </div>
    </div>
  </div>
</section>
