<?php
global $DISCOURSE_BASE;
$base            = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
$communities_url = $base . "communities/index.php";
$app_url         = $base;
?>
<!-- ════════════════════  HERO SECTION  ════════════════════ -->
<section id="dl-hero" class="py-0">
  <div class="dl-hero-glow"></div>

  <!-- Ambient spotlight blobs -->
  <div class="dl-hero-blob dl-hero-blob--a" aria-hidden="true"></div>
  <div class="dl-hero-blob dl-hero-blob--b" aria-hidden="true"></div>
  <div class="dl-hero-blob dl-hero-blob--c" aria-hidden="true"></div>

  <!-- Dot-grid overlay -->
  <div class="dl-hero-dots" aria-hidden="true"></div>



  <!-- Floating glowing particles -->
  <div class="dl-hero-particles" aria-hidden="true">
    <span class="dl-particle dl-particle--1"></span>
    <span class="dl-particle dl-particle--2"></span>
    <span class="dl-particle dl-particle--3"></span>
    <span class="dl-particle dl-particle--4"></span>
    <span class="dl-particle dl-particle--5"></span>
    <span class="dl-particle dl-particle--6"></span>
    <span class="dl-particle dl-particle--7"></span>
    <span class="dl-particle dl-particle--8"></span>
  </div>

  <!-- Corner glow accents -->
  <div class="dl-hero-corner dl-hero-corner--tl" aria-hidden="true"></div>
  <div class="dl-hero-corner dl-hero-corner--br" aria-hidden="true"></div>

  <div class="dl-hero-content">
    <div class="container-xxl h-100">
      <div class="row align-items-center g-0 h-100">

        <!-- ══════  LEFT — Text column  ══════ -->
        <div class="col-12 col-lg-6 dl-hero-left">



          <!-- Headline -->
          <h1 class="dl-hero-title dl-reveal dl-delay-1">
            Your Campus<br>
            <span class="dl-hero-title__accent-green">Journey</span>
            <span class="dl-hero-title__accent-gold"> Starts Here</span>
          </h1>

          <!-- Sub-headline -->
          <p class="dl-hero-sub dl-reveal dl-delay-2">
            From surviving finals to launching capstone projects — Discourse is where FEU Tech, Alabang &amp; Diliman students connect, collaborate, and thrive.
          </p>

          <!-- CTAs -->
          <div class="d-flex flex-wrap gap-3 mb-10 dl-reveal dl-delay-3">
            <a href="<?php echo htmlspecialchars($communities_url); ?>"
               id="dl-hero-cta-start"
               class="dl-hero-btn btn fw-bold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              <i class="ki-outline ki-rocket fs-5"></i> Get Started
            </a>
            <a href="<?php echo htmlspecialchars($app_url); ?>"
               id="dl-hero-cta-dash"
               class="dl-hero-ghost btn fw-semibold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              Open Dashboard <i class="ki-outline ki-arrow-right fs-5"></i>
            </a>
          </div>


        </div><!-- /left col -->


        <!-- ══════  RIGHT — Visual column  ══════ -->
        <div class="col-12 col-lg-6 dl-hero-right">

          <!-- Main 3D image -->
          <div class="dl-hero-visual">

            <!-- Glow ring behind image -->
            <div class="dl-vring" aria-hidden="true"></div>

            <!-- Community chips — orbit around image -->
            <a href="<?php echo htmlspecialchars($communities_url); ?>?c=FEU%20LIFE"
               class="dl-orbit-chip dl-orbit-chip--tl" style="animation-delay:0s;">
              <div class="dl-oc-icon" style="background:#fdf1ef;">
                <img src="<?php echo htmlspecialchars($base); ?>assets/images/communities/comm_6a1fbb3384b750.69753970.png"
                     alt="FEU Life" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <i class="ki-outline ki-heart fs-4" style="color:#c0392b;display:none;"></i>
              </div>
              <div class="dl-oc-text">
                <span class="dl-oc-name">FEU Life</span>
                <span class="dl-oc-meta">1,240 members</span>
              </div>
            </a>

            <a href="<?php echo htmlspecialchars($communities_url); ?>?c=E-Sports"
               class="dl-orbit-chip dl-orbit-chip--tr" style="animation-delay:0.5s;">
              <div class="dl-oc-icon" style="background:#e6f8f0;">
                <img src="<?php echo htmlspecialchars($base); ?>assets/images/communities/comm_6a22a40f7323f2.07105387.png"
                     alt="E-Sports" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <i class="ki-outline ki-rocket fs-4" style="color:#06AB62;display:none;"></i>
              </div>
              <div class="dl-oc-text">
                <span class="dl-oc-name">E-Sports Guild</span>
                <span class="dl-oc-meta">780 members</span>
              </div>
            </a>

            <a href="<?php echo htmlspecialchars($communities_url); ?>?c=Study%20Group"
               class="dl-orbit-chip dl-orbit-chip--bl" style="animation-delay:1s;">
              <div class="dl-oc-icon" style="background:#e6f8f0;">
                <img src="<?php echo htmlspecialchars($base); ?>assets/images/communities/comm_6a1fc4b6130233.39661525.png"
                     alt="Study Group" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <i class="ki-outline ki-bookmark fs-4" style="color:#06AB62;display:none;"></i>
              </div>
              <div class="dl-oc-text">
                <span class="dl-oc-name">Study Group</span>
                <span class="dl-oc-meta">620 members</span>
              </div>
            </a>

            <a href="<?php echo htmlspecialchars($communities_url); ?>?c=Freshies"
               class="dl-orbit-chip dl-orbit-chip--br" style="animation-delay:1.5s;">
              <div class="dl-oc-icon" style="background:#f1f5f9;">
                <img src="<?php echo htmlspecialchars($base); ?>assets/images/communities/comm_6a1fbd5c0d6420.04280651.png"
                     alt="Freshies Guide" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <i class="ki-outline ki-people fs-4" style="color:#1e293b;display:none;"></i>
              </div>
              <div class="dl-oc-text">
                <span class="dl-oc-name">Freshies Guide</span>
                <span class="dl-oc-meta">890 members</span>
              </div>
            </a>

            <!-- Floating hashtag badges -->
            <span class="dl-orbit-tag dl-orbit-tag--right" style="animation-delay:0.9s;">
              <i class="ki-outline ki-mouse me-1" style="font-size:0.75rem;"></i>#GAMING
            </span>
            <span class="dl-orbit-tag dl-orbit-tag--left" style="animation-delay:1.4s;">
              <i class="ki-outline ki-book me-1" style="font-size:0.75rem;"></i>#ACADEMICS
            </span>

            <!-- 3D image inside app-window frame -->
            <div class="dl-img-frame dl-reveal dl-delay-2">
              <!-- Window chrome: title bar -->
              <div class="dl-img-frame__bar">
                <span class="dl-wdot dl-wdot--red"></span>
                <span class="dl-wdot dl-wdot--yellow"></span>
                <span class="dl-wdot dl-wdot--green"></span>
                <div class="dl-img-frame__url">
                  <i class="ki-outline ki-lock-2" style="font-size:0.65rem; opacity:0.5;"></i>
                  <span>discourse.feutech.edu.ph</span>
                </div>
              </div>
              <!-- Window body -->
              <div class="dl-img-frame__body">
                <img src="<?php echo htmlspecialchars($base); ?>assets/images/hero3d.png"
                     alt="FEU Tech Discourse Students"
                     class="dl-hero-img"
                     onerror="this.src='<?php echo $base; ?>assets/images/hero3d.png';">
              </div>
            </div>

          </div><!-- /visual -->
        </div><!-- /right col -->

      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /hero-content -->

</section>
