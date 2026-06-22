<?php
$app_url         = "/ParaverseLandingpages/DiscourseLanding/";
$communities_url = "/ParaverseLandingpages/DiscourseLanding/communities/index.php";
?>
<!-- ════════════════  CTA SECTION  ════════════════════════ -->
<section id="dl-cta" class="py-20">
  <!-- Decorative glows -->
  <div class="dl-cta-glow-1"></div>
  <div class="dl-cta-glow-2"></div>

  <div class="container-xxl">
    <div class="text-center mx-auto position-relative" style="max-width:620px; z-index:2;">

      <!-- Eyebrow -->
      <div class="mb-5 dl-reveal">
        <span class="dl-eyebrow dl-eyebrow-gold">
          <i class="ki-outline ki-rocket fs-6"></i>
          Get started today
        </span>
      </div>

      <!-- Heading -->
      <h2 class="fw-bolder text-white mb-5 dl-reveal dl-delay-1"
        style="font-size:clamp(2rem,4vw,3.2rem); line-height:1.15; letter-spacing:-0.03em;">
        Ready to Join Your<br>School Community?
      </h2>

      <!-- Desc -->
      <p class="mb-10 dl-reveal dl-delay-2"
        style="font-size:1.05rem; line-height:1.72; color:rgba(255,255,255,0.70); max-width:460px; margin:0 auto;">
        Discourse connects thousands of FEU Tech students every day. Enter the forum, find your community, and start the conversation now.
      </p>

      <!-- CTA buttons -->
      <div class="d-flex flex-wrap justify-content-center gap-4 dl-reveal dl-delay-3">
        <a href="<?php echo htmlspecialchars($communities_url); ?>"
           class="dl-hero-btn btn fw-bold rounded-pill px-10 py-4 d-inline-flex align-items-center gap-2"
           style="font-size:1rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          <i class="ki-outline ki-messages fs-4"></i> Join Now
        </a>
        <a href="<?php echo htmlspecialchars($app_url); ?>"
           class="dl-hero-ghost btn fw-semibold rounded-pill px-8 py-4 d-inline-flex align-items-center gap-2"
           style="font-size:1rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          View Dashboard <i class="ki-outline ki-arrow-right fs-4"></i>
        </a>
      </div>

      <!-- Reassurance row -->
      <div class="d-flex flex-wrap justify-content-center gap-7 mt-12 dl-reveal dl-delay-4">
        <span class="dl-trust-badge">
          <i class="ki-outline ki-shield-tick" style="color:#05b166;"></i>
          Peer Moderated
        </span>
        <span class="dl-trust-badge">
          <i class="ki-outline ki-lock" style="color:var(--dc-gold);"></i>
          Anonymous Mode
        </span>
        <span class="dl-trust-badge">
          <i class="ki-outline ki-people" style="color:#05b166;"></i>
          4,819+ Members
        </span>
      </div>

    </div>
  </div>
</section>
