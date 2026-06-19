<?php
$app_url         = "/Discourse/";
$communities_url = "/Discourse/communities/index.php";
?>
<!-- ════════════════  CTA SECTION  ════════════════════════ -->
<section id="dl-cta" class="py-20">
  <!-- Decorative glows -->
  <div class="dl-cta-glow-1"></div>
  <div class="dl-cta-glow-2"></div>

  <div class="container-xxl">
    <div class="text-center mx-auto position-relative" style="max-width:580px; z-index:2;">

      <!-- Eyebrow -->
      <span class="d-inline-block fw-bold text-uppercase mb-5"
        style="color:rgba(251,197,1,0.75); font-size:0.78rem; letter-spacing:0.10em;">
        Get started today
      </span>

      <!-- Heading -->
      <h2 class="fw-bolder text-white mb-5" style="font-size:clamp(2rem,4vw,3rem); line-height:1.15;">
        Ready to Join Your<br>School Community?
      </h2>

      <!-- Desc -->
      <p class="mb-10" style="font-size:1.05rem; line-height:1.72; color:rgba(255,255,255,0.72); max-width:460px; margin:0 auto;">
        Discourse connects thousands of FEU Tech students every day. Enter the forum, find your community, and start the conversation now.
      </p>

      <!-- CTA buttons -->
      <div class="d-flex flex-wrap justify-content-center gap-4">
        <a href="<?php echo htmlspecialchars($communities_url); ?>"
           class="dl-hero-btn btn fw-bold rounded-pill px-10 py-4"
           style="font-size:1rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          <i class="bi bi-chat-text-fill me-2"></i> Join Now
        </a>
        <a href="<?php echo htmlspecialchars($app_url); ?>"
           class="dl-hero-ghost btn fw-semibold rounded-pill px-8 py-4"
           style="font-size:1rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          View Dashboard <i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>

      <!-- Reassurance row -->
      <div class="d-flex flex-wrap justify-content-center gap-6 mt-10">
        <span style="color:rgba(255,255,255,0.55); font-size:0.82rem; display:flex; align-items:center; gap:6px;">
          <i class="bi bi-shield-fill-check" style="color:#05b166;"></i> Peer Moderated
        </span>
        <span style="color:rgba(255,255,255,0.55); font-size:0.82rem; display:flex; align-items:center; gap:6px;">
          <i class="bi bi-eye-slash-fill" style="color:var(--dc-gold);"></i> Anonymous Mode
        </span>
        <span style="color:rgba(255,255,255,0.55); font-size:0.82rem; display:flex; align-items:center; gap:6px;">
          <i class="bi bi-people-fill" style="color:#05b166;"></i> 4,819+ Members
        </span>
      </div>

    </div>
  </div>
</section>
