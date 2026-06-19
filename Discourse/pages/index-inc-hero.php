<?php
$base            = "/Discourse/";
$communities_url = "/Discourse/communities/index.php";
$app_url         = "/Discourse/";
?>
<!-- ════════════════════  HERO SECTION  ════════════════════ -->
<section id="dl-hero" class="py-0">
  <div class="dl-hero-glow"></div>

  <div class="dl-hero-content py-20 px-0">
    <div class="container-xxl">
      <div class="row align-items-center">

        <!-- LEFT: Content -->
        <div class="col-12 col-lg-7" style="padding-right:2rem;">

          <!-- Eyebrow -->
          <span class="d-inline-flex align-items-center gap-2 fw-semibold mb-5"
            style="color:rgba(251,197,1,0.85); font-size:0.82rem; letter-spacing:0.09em; text-transform:uppercase;">
            <i class="bi bi-building-fill" style="color:#05b166;"></i> FEU Institute of Technology · Discourse
          </span>

          <!-- Title -->
          <h1 class="fw-bolder text-white mb-5" style="font-size:clamp(2.5rem,5.5vw,4rem); line-height:1.10;">
            Your School's<br>
            <span style="color:#05b166;">Community</span>
            <span style="color:var(--dc-gold);">Hub</span>
          </h1>

          <!-- Subtitle -->
          <p class="mb-8" style="font-size:1.05rem; line-height:1.70; color:rgba(255,255,255,0.82); max-width:480px;">
            Discourse is the premier forum where FEU Tech students connect, ask questions, start debates, and share resources — all in one place.
          </p>

          <!-- CTAs -->
          <div class="d-flex flex-wrap gap-3 mb-12">
            <a href="<?php echo htmlspecialchars($communities_url); ?>"
               class="dl-hero-btn btn fw-bold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               style="font-size:0.95rem;"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              Get Started &rarr;
            </a>
            <a href="<?php echo htmlspecialchars($app_url); ?>"
               class="dl-hero-ghost btn fw-semibold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
               style="font-size:0.95rem;"
               onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
              Open Dashboard <i class="bi bi-arrow-right"></i>
            </a>
          </div>

          <!-- Stat pills -->
          <div class="d-flex flex-wrap gap-4">
            <div class="dl-stat-pill">
              <i class="bi bi-people-fill" style="color:#05b166; font-size:1.1rem;"></i>
              <div>
                <div class="num">4,819+</div>
                <div class="lbl">Members</div>
              </div>
            </div>
            <div class="dl-stat-pill">
              <i class="bi bi-file-text-fill" style="color:var(--dc-gold); font-size:1.1rem;"></i>
              <div>
                <div class="num">390</div>
                <div class="lbl">Posts Today</div>
              </div>
            </div>
            <div class="dl-stat-pill">
              <i class="bi bi-grid-fill" style="color:rgba(255,255,255,0.65); font-size:1.1rem;"></i>
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
                 onerror="this.src='/Discourse/assets/images/hero3d.png';">
          </div>
        </div>

      </div>
    </div>
  </div>

</section>
