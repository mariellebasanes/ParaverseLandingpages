<?php
$base            = "/DiscourseLanding/";
$communities_url = "#communities";
$app_url         = "/DiscourseLanding/";
?>
<!-- ════════════════════  HERO SECTION  ════════════════════ -->
<section id="dl-hero" class="py-0">
  <div class="dl-hero-glow"></div>

  <div class="dl-hero-content py-20 px-0">
    <div class="container-xxl">
      <div class="row align-items-center">

        <!-- LEFT: Content -->
        <div class="col-12 col-lg-7" style="padding-right:2.5rem;">

          <!-- Eyebrow badge -->
          <div class="mb-6 dl-reveal">
            <span class="dl-hero-badge">
              <i class="ki-outline ki-home-2 fs-7"></i>
              FEU Institute of Technology &middot; Discourse
            </span>
          </div>

          <!-- Title -->
          <h1 class="fw-bolder text-white mb-5 dl-reveal dl-delay-1"
            style="font-size:clamp(2.5rem,5.5vw,4rem); line-height:1.10; letter-spacing:-0.03em;">
            Your Campus<br>
            <span style="color:#05b166;">Journey</span>
            <span style="color:var(--dc-gold);"> Starts Here</span>
          </h1>

          <!-- Subtitle -->
          <p class="mb-8 dl-reveal dl-delay-2"
            style="font-size:1.05rem; line-height:1.72; color:rgba(255,255,255,0.78); max-width:480px;">
            From surviving finals to launching capstone projects, Discourse is where FEU Tech students connect, collaborate, and thrive.
          </p>

          <!-- CTAs -->
          <div class="d-flex flex-wrap gap-3 mb-12 dl-reveal dl-delay-3">
            <a href="<?php echo htmlspecialchars($communities_url); ?>"
               class="dl-hero-btn btn fw-bold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               style="font-size:0.95rem;"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              <i class="ki-outline ki-rocket fs-5"></i>
              Get Started
            </a>
            <a href="<?php echo htmlspecialchars($app_url); ?>"
               class="dl-hero-ghost btn fw-semibold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               style="font-size:0.95rem;"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              Open Dashboard <i class="ki-outline ki-arrow-right fs-5"></i>
            </a>
          </div>

          <!-- Stat pills -->
          <div class="d-flex flex-wrap gap-4 dl-reveal dl-delay-4">
            <div class="dl-stat-pill">
              <i class="ki-solid ki-people fs-2" style="color:#05b166;"></i>
              <div>
                <div class="num">4,819+</div>
                <div class="lbl">Members</div>
              </div>
            </div>
            <div class="dl-stat-pill">
              <i class="ki-solid ki-message-text fs-2" style="color:var(--dc-gold);"></i>
              <div>
                <div class="num">390</div>
                <div class="lbl">Posts Today</div>
              </div>
            </div>
            <div class="dl-stat-pill">
              <i class="ki-solid ki-grid fs-2" style="color:rgba(255,255,255,0.60);"></i>
              <div>
                <div class="num">9+</div>
                <div class="lbl">Topics</div>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT: Illustration -->
        <div class="col-12 col-lg-5 d-none d-lg-block position-static">
          <div class="dl-hero-img-frame">
            <img src="<?php echo htmlspecialchars($base); ?>assets/images/hero3d.png"
                 alt="FEU Tech Students"
                 class="dl-hero-img"
                 onerror="this.src='/DiscourseLanding/assets/images/hero3d.png';">
          </div>
        </div>

      </div>
    </div>
  </div>

</section>
