<?php /* index-inc-badges.php — "Reputation & Leaderboard" — WHITE BACKGROUND */ ?>
<!-- ════════════════  REPUTATION & SPOTLIGHT SECTION  ════════════════ -->
<section id="badges" class="py-20 dc-bg-white" style="position: relative; overflow: hidden;">

  <!-- Ambient background blobs -->
  <div class="dl-bg-blob dl-blob-green" style="position: absolute; top: 5%; left: -10%; width: 450px; height: 450px; background: rgba(82,183,136,0.14); filter: blur(80px); pointer-events: none; z-index: 0;"></div>
  <div class="dl-bg-blob dl-blob-gold"  style="position: absolute; top: 35%; right: -12%; width: 500px; height: 500px; background: rgba(251,197,1,0.15); filter: blur(95px); pointer-events: none; z-index: 0;"></div>
  <div class="dl-bg-blob dl-blob-purple" style="position: absolute; bottom: -5%; left: 25%; width: 450px; height: 450px; background: rgba(114,57,234,0.10); filter: blur(90px); pointer-events: none; z-index: 0;"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section Header -->
    <div class="text-center mx-auto mb-14 dl-reveal" style="max-width: 600px;">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-crown fs-6"></i>
        Campus Reputation
      </span>
      <h2 class="fw-bolder text-gray-900 mb-4" style="font-size: clamp(1.8rem,3.2vw,2.5rem); line-height: 1.18;">
        Reputation &amp; Leaderboard
      </h2>
      <p class="text-gray-600 mb-0" style="font-size: 1rem; line-height: 1.72;">
        Discourse rewards active, quality contributions. Earn points, climb the ranks, and see this month's featured leaders.
      </p>
    </div>

    <!-- PART 1: EARN + AVOID -->
    <div class="row g-6 mb-16 align-items-stretch">

      <!-- LEFT: How to Earn -->
      <div class="col-lg-8 dl-reveal dl-delay-1">
        <div class="h-100 p-7 rounded-4" style="background:#fff; border:1px solid rgba(0,0,0,0.05); box-shadow:0 2px 20px rgba(0,0,0,0.04);">
          <div class="d-flex align-items-center gap-3 mb-6">
            <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                 style="width:40px;height:40px;background:rgba(45,106,79,0.10);">
              <i class="ki-outline ki-route fs-4" style="color:#2D6A4F;"></i>
            </div>
            <h3 class="fw-bolder text-gray-900 fs-4 mb-0">How to Earn Reputation</h3>
          </div>
          <div class="d-flex flex-column gap-3">
            <!-- Row 1 -->
            <div class="dl-earn-row d-flex align-items-center justify-content-between p-4 rounded-4"
                 style="background:#f8fafc;border:1px solid rgba(0,0,0,0.03);">
              <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                     style="width:44px;height:44px;background:linear-gradient(135deg,rgba(45,106,79,0.15),rgba(45,106,79,0.05));">
                  <i class="ki-outline ki-shield-tick fs-4" style="color:#2D6A4F;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Answer &amp; Solve</h5>
                  <p class="text-muted mb-0" style="font-size:0.8rem;line-height:1.4;">Provide verified solutions. Getting marked as the answer by peers grants a massive boost.</p>
                </div>
              </div>
              <span class="dl-rep-badge flex-shrink-0 ms-4" style="background:rgba(45,106,79,0.12);color:#2D6A4F;">+15 Rep</span>
            </div>
            <!-- Row 2 -->
            <div class="dl-earn-row d-flex align-items-center justify-content-between p-4 rounded-4"
                 style="background:#f8fafc;border:1px solid rgba(0,0,0,0.03);">
              <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                     style="width:44px;height:44px;background:linear-gradient(135deg,rgba(114,57,234,0.12),rgba(114,57,234,0.04));">
                  <i class="ki-outline ki-arrow-up fs-4" style="color:#7239ea;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Start Discussions</h5>
                  <p class="text-muted mb-0" style="font-size:0.8rem;line-height:1.4;">Publish high-quality posts or programming tips. Upvotes from peers build your reputation fast.</p>
                </div>
              </div>
              <span class="dl-rep-badge flex-shrink-0 ms-4" style="background:rgba(114,57,234,0.10);color:#7239ea;">+5 Rep</span>
            </div>
            <!-- Row 3 -->
            <div class="dl-earn-row d-flex align-items-center justify-content-between p-4 rounded-4"
                 style="background:#f8fafc;border:1px solid rgba(0,0,0,0.03);">
              <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                     style="width:44px;height:44px;background:linear-gradient(135deg,rgba(251,197,1,0.18),rgba(251,197,1,0.06));">
                  <i class="ki-outline ki-crown fs-4" style="color:#d69e00;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Form Study Guilds</h5>
                  <p class="text-muted mb-0" style="font-size:0.8rem;line-height:1.4;">Create study groups or gaming guilds that retain 15+ active members for a sustained bonus.</p>
                </div>
              </div>
              <span class="dl-rep-badge flex-shrink-0 ms-4" style="background:rgba(251,197,1,0.15);color:#d69e00;">+50 Rep</span>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: What to Avoid -->
      <div class="col-lg-4 dl-reveal dl-delay-2">
        <div class="h-100 p-7 rounded-4"
             style="background:#fff8f8;border:1.5px dashed rgba(241,65,108,0.30);box-shadow:0 2px 20px rgba(241,65,108,0.05);">
          <div class="d-flex align-items-center gap-3 mb-5">
            <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                 style="width:40px;height:40px;background:rgba(241,65,108,0.10);">
              <i class="ki-outline ki-information-2 fs-4" style="color:#d9214e;"></i>
            </div>
            <h3 class="fw-bolder fs-4 mb-0" style="color:#d9214e;">What to Avoid</h3>
          </div>
          <p class="mb-5" style="font-size:0.82rem;line-height:1.6;color:#d9214e;opacity:0.85;">
            Behavior violations trigger automatic flag reviews and reputation deductions.
          </p>
          <ul class="d-flex flex-column gap-3 ps-0 mb-6" style="list-style:none;">
            <li class="d-flex align-items-center gap-3" style="color:#d9214e;">
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:26px;height:26px;background:rgba(241,65,108,0.10);"><i class="ki-outline ki-cross-circle fs-7" style="color:#d9214e;"></i></span>
              <span class="fw-semibold" style="font-size:0.83rem;">Spamming posts &amp; system abuse</span>
            </li>
            <li class="d-flex align-items-center gap-3" style="color:#d9214e;">
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:26px;height:26px;background:rgba(241,65,108,0.10);"><i class="ki-outline ki-cross-circle fs-7" style="color:#d9214e;"></i></span>
              <span class="fw-semibold" style="font-size:0.83rem;">Unsolicited self-promotion</span>
            </li>
            <li class="d-flex align-items-center gap-3" style="color:#d9214e;">
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:26px;height:26px;background:rgba(241,65,108,0.10);"><i class="ki-outline ki-cross-circle fs-7" style="color:#d9214e;"></i></span>
              <span class="fw-semibold" style="font-size:0.83rem;">Harassment or toxic comments</span>
            </li>
            <li class="d-flex align-items-center gap-3" style="color:#d9214e;">
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:26px;height:26px;background:rgba(241,65,108,0.10);"><i class="ki-outline ki-cross-circle fs-7" style="color:#d9214e;"></i></span>
              <span class="fw-semibold" style="font-size:0.83rem;">Plagiarism &amp; code copying</span>
            </li>
          </ul>
          <div class="p-4 rounded-3 text-center"
               style="background:rgba(241,65,108,0.08);border:1px solid rgba(241,65,108,0.18);">
            <span class="fw-bold d-block" style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.08em;color:#d9214e;">Reputation Deduction</span>
            <div class="fw-bolder mt-1" style="font-size:1.9rem;color:#d9214e;line-height:1;">
              &minus;20
              <span style="font-size:0.82rem;font-weight:600;opacity:0.7;">pts / flag</span>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /row earn+avoid -->


    <!-- PART 2: LEADERS SPOTLIGHT — PODIUM LAYOUT -->

    <div class="text-center mx-auto mb-14 dl-reveal" style="max-width:640px;">
      <span class="dl-eyebrow dl-eyebrow-green mb-3">
        <i class="ki-outline ki-ranking fs-6"></i>
        This Month
      </span>
      <h3 class="fw-bolder text-gray-900 mb-2" style="font-size:clamp(1.4rem,2.4vw,1.9rem);">
        Campus Leaders Spotlight
      </h3>
      <p class="text-gray-500 mb-0" style="font-size:0.92rem;">
        The most active contributors and top communities this month.
      </p>
    </div>

    <!-- Podium wrapper — flex row, center aligned at bottom -->
    <div class="d-flex align-items-stretch align-items-md-end justify-content-center gap-4 flex-wrap flex-md-nowrap dl-reveal">

      <!-- ─── #2 SILVER ─── -->
      <div class="w-100 d-flex flex-column order-2 order-md-1 dl-reveal dl-delay-2" style="max-width:320px;">
        <div class="card card-bordered shadow-sm hover-elevate-up mt-0 mt-md-12 position-relative d-flex flex-column" style="border-radius:20px; background:#fff;">

          <!-- Medal ribbon -->
          <div class="position-absolute top-0 end-0 m-4 badge rounded-pill px-3 py-2 text-white d-flex align-items-center gap-1"
               style="background:linear-gradient(135deg,#94a3b8,#cbd5e1); z-index: 2; box-shadow: 0 2px 8px rgba(0,0,0,0.12); font-size:0.68rem; font-weight:800;">
            <i class="ki-outline ki-ranking fs-5 text-white"></i>
            <span>#2</span>
          </div>

          <!-- Avatar -->
          <div class="d-flex justify-content-center pt-8 position-relative z-index-1">
            <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#94a3b8,#cbd5e1); box-shadow: 0 4px 16px rgba(0,0,0,0.10);">
              <img src="/discourse-landing/assets/images/catalina.webp"
                   class="rounded-circle border border-3 border-white d-block" alt="Marco Reyes"
                   style="width: 72px; height: 72px; object-fit: cover;">
            </div>
          </div>

          <div class="card-body p-6 text-center d-flex flex-column position-relative z-index-1 flex-grow-1">
            <h5 class="fw-bolder text-gray-900 mb-1" style="font-size:1rem;">Marco Reyes</h5>
            <p class="text-muted mb-3" style="font-size:0.76rem;">BSIT, 2nd Year &middot; FEU Tech</p>

            <div class="rounded-3 p-4 mb-4 text-start" style="background:rgba(148,163,184,0.10); border:1px dashed rgba(148,163,184,0.40);">
              <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.08em; font-size: 0.6rem;">Rep Score</span>
              <span class="d-block text-gray-800 fw-bolder fs-3" style="color:#64748b !important;">3,210</span>
            </div>

            <div class="d-flex border-top border-gray-100 mt-auto pt-4" style="margin: 0 -24px -8px -24px;">
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Posts</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">98</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Solutions</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">34</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Upvotes</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">620</span>
              </div>
            </div>
          </div>

          <!-- Podium step -->
          <div class="text-center py-2 text-white fw-bolder position-relative z-index-1"
               style="font-size:0.75rem; letter-spacing:0.06em; background:linear-gradient(180deg,#cbd5e1,#94a3b8); border-radius:0 0 20px 20px;">2nd</div>
        </div>
      </div>

      <!-- ─── #1 GOLD (center, elevated) ─── -->
      <div class="w-100 d-flex flex-column order-1 order-md-2 dl-reveal dl-delay-1" style="max-width:360px;">
        <div class="card card-bordered shadow-sm hover-elevate-up position-relative d-flex flex-column"
             style="border-radius:20px; background:#fff; border-color: rgba(251,197,1,0.30) !important; box-shadow: 0 8px 40px rgba(251,197,1,0.18), 0 2px 16px rgba(0,0,0,0.07);">

          <!-- Floating crown above card -->
          <div class="position-absolute translate-middle-y start-50 bg-warning rounded-circle d-flex align-items-center justify-content-center"
               style="top: 0; width: 44px; height: 44px; box-shadow: 0 0 0 6px rgba(251,197,1,0.15), 0 0 24px rgba(251,197,1,0.40); z-index: 3;">
            <i class="ki-outline ki-crown fs-2 text-dark"></i>
          </div>

          <!-- Medal ribbon -->
          <div class="position-absolute top-0 end-0 m-4 badge rounded-pill px-3 py-2 text-dark d-flex align-items-center gap-1"
               style="background:linear-gradient(135deg,#fbc501,#e8b600); z-index: 2; box-shadow: 0 2px 8px rgba(0,0,0,0.12); font-size:0.68rem; font-weight:800;">
            <i class="ki-outline ki-crown fs-5 text-dark"></i>
            <span>#1</span>
          </div>

          <!-- Avatar with gold shimmer ring -->
          <div class="d-flex justify-content-center pt-10 position-relative z-index-1">
            <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#fbc501,#e8b600); box-shadow: 0 4px 20px rgba(251,197,1,0.40);">
              <img src="/discourse-landing/assets/images/anonymous.png"
                   class="rounded-circle border border-3 border-white d-block" alt="Sofia Karim"
                   style="width: 88px; height: 88px; object-fit: cover;">
            </div>
          </div>

          <div class="card-body p-6 text-center d-flex flex-column position-relative z-index-1 flex-grow-1">
            <h4 class="fw-bolder text-gray-900 mb-1" style="font-size:1.15rem;">Sofia Karim</h4>
            <p class="text-muted mb-1" style="font-size:0.8rem;">BSCS, 3rd Year &middot; FEU Tech</p>
            <div class="d-inline-flex align-items-center justify-content-center gap-1 rounded-pill px-3 py-1 mb-4 mx-auto"
                 style="background:rgba(251,197,1,0.12); border:1px solid rgba(251,197,1,0.30); max-width: fit-content;">
              <i class="ki-outline ki-star" style="color:#d69e00;font-size:0.75rem;"></i>
              <span class="fw-bold" style="font-size:0.7rem;color:#d69e00;">Top Community Guide</span>
            </div>

            <!-- Score band — gold tinted white -->
            <div class="rounded-3 p-4 mb-4 text-start" style="background:#fdfaf0; border:1px dashed rgba(251,197,1,0.5);">
              <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.08em; font-size: 0.6rem;">Reputation Score</span>
              <span class="d-block text-gray-800 fw-bolder fs-2" style="color:#d69e00 !important;">4,850
                <span style="font-size:0.75rem;color:#94a3b8;font-weight:500;">Rep</span>
              </span>
              <span class="d-inline-flex align-items-center gap-1 mt-2 text-success fw-bold fs-8">
                <i class="ki-outline ki-arrow-up fs-9"></i>+450 pts this month
              </span>
            </div>

            <!-- Stats row — standard theme -->
            <div class="d-flex border-top border-gray-100 mt-auto pt-4" style="margin: 0 -24px -8px -24px;">
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Posts</span>
                <span class="d-block text-gray-850 fw-bolder fs-5" style="color:#1e293b !important;">142</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Solutions</span>
                <span class="d-block text-gray-850 fw-bolder fs-5" style="color:#1e293b !important;">61</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Upvotes</span>
                <span class="d-block text-gray-850 fw-bolder fs-5" style="color:#1e293b !important;">1,240</span>
              </div>
            </div>
          </div>

          <!-- Gold podium step bar -->
          <div class="text-center py-2 text-dark fw-bolder position-relative z-index-1"
               style="font-size:0.75rem; letter-spacing:0.06em; background:linear-gradient(180deg,#fbc501,#e8a800); border-radius:0 0 20px 20px;">1st</div>
        </div>
      </div>

      <!-- ─── #3 BRONZE ─── -->
      <div class="w-100 d-flex flex-column order-3 order-md-3 dl-reveal dl-delay-3" style="max-width:320px;">
        <div class="card card-bordered shadow-sm hover-elevate-up mt-0 mt-md-12 position-relative d-flex flex-column" style="border-radius:20px; background:#fff;">

          <!-- Medal ribbon -->
          <div class="position-absolute top-0 end-0 m-4 badge rounded-pill px-3 py-2 text-white d-flex align-items-center gap-1"
               style="background:linear-gradient(135deg,#d97706,#b45309); z-index: 2; box-shadow: 0 2px 8px rgba(0,0,0,0.12); font-size:0.68rem; font-weight:800;">
            <i class="ki-outline ki-award fs-5 text-white"></i>
            <span>#3</span>
          </div>

          <!-- Avatar -->
          <div class="d-flex justify-content-center pt-8 position-relative z-index-1">
            <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#d97706,#b45309); box-shadow: 0 4px 16px rgba(0,0,0,0.10);">
              <img src="/discourse-landing/assets/images/anonymous.png"
                   class="rounded-circle border border-3 border-white d-block" alt="Aira Santos"
                   style="width: 72px; height: 72px; object-fit: cover;">
            </div>
          </div>

          <div class="card-body p-6 text-center d-flex flex-column position-relative z-index-1 flex-grow-1">
            <h5 class="fw-bolder text-gray-900 mb-1" style="font-size:1rem;">Aira Santos</h5>
            <p class="text-muted mb-3" style="font-size:0.76rem;">BSECE, 4th Year &middot; FEU Tech</p>

            <div class="rounded-3 p-4 mb-4 text-start" style="background:rgba(217,119,6,0.07); border:1px dashed rgba(217,119,6,0.35);">
              <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.08em; font-size: 0.6rem;">Rep Score</span>
              <span class="d-block text-gray-800 fw-bolder fs-3" style="color:#b45309 !important;">2,540</span>
            </div>

            <div class="d-flex border-top border-gray-100 mt-auto pt-4" style="margin: 0 -24px -8px -24px;">
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Posts</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">74</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Solutions</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">18</span>
              </div>
              <div class="border-start border-gray-200 h-25px"></div>
              <div class="col text-center">
                <span class="d-block text-gray-500 fw-bold fs-9 text-uppercase mb-1" style="letter-spacing: 0.06em; font-size: 0.58rem;">Upvotes</span>
                <span class="d-block text-gray-800 fw-bolder fs-6">390</span>
              </div>
            </div>
          </div>

          <!-- Podium step -->
          <div class="text-center py-2 text-white fw-bolder position-relative z-index-1"
               style="font-size:0.75rem; letter-spacing:0.06em; background:linear-gradient(180deg,#f59e0b,#d97706); border-radius:0 0 20px 20px;">3rd</div>
        </div>
      </div>
    </div><!-- /podium row -->

    <!-- ── TOP COMMUNITY CARD (width aligned to podium) ── -->
    <div class="dl-reveal dl-delay-2 mt-12 mb-10">

      <!-- Sub-label -->
      <div class="text-center mb-6">
        <span class="dl-eyebrow dl-eyebrow-green">
          <i class="ki-outline ki-abstract-26 fs-6"></i>
          Top Community This Month
        </span>
      </div>

      <div class="card card-bordered shadow-sm dl-top-community-card mx-auto">
        <!-- Green accent bar -->
        <div style="height:4px; background:linear-gradient(90deg,#2D6A4F,#52b788); border-radius:20px 20px 0 0;"></div>

        <!-- Metronic Card Header -->
        <div class="card-header align-items-center border-0 py-5 px-8">
          <!-- Card Title (Left/Center info) -->
          <div class="card-title m-0">
            <!-- Icon Symbol -->
            <div class="symbol symbol-60px symbol-circle me-4 flex-shrink-0">
              <span class="symbol-label" style="background:rgba(91,97,229,0.08); border: 2px solid #fff; box-shadow: 0 4px 12px rgba(91,97,229,0.15);">
                <i class="ki-outline ki-message-programming fs-1" style="color:#5b61e5;"></i>
              </span>
            </div>
            <!-- Text info -->
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center gap-2 flex-wrap">
                <h4 class="fw-bolder text-gray-900 mb-0" style="font-size:1.18rem;">c/FEU TECH DEV</h4>
                <span class="badge badge-light-success fs-8 fw-bold px-3 py-1">Platinum</span>
              </div>
              <span class="text-muted fs-7 mt-1">
                <i class="ki-outline ki-category fs-8 me-1"></i>Technology &amp; Programming &middot; FEU Tech &middot; 
                <i class="ki-outline ki-star" style="color:#d69e00;font-size:0.8rem;"></i>
                <span class="fw-semibold" style="color:#d69e00;">4.95 Rating · #1 Ranked</span>
              </span>
            </div>
          </div>

          <!-- Card Toolbar (Right action) -->
          <div class="card-toolbar m-0">
            <div class="d-flex flex-column align-items-end">
              <a href="#posts"
                 class="btn btn-success fw-bold rounded-pill px-6 py-3"
                 style="background:var(--dc-green); border-color:var(--dc-green); color:#fff !important; font-size:0.88rem; box-shadow:0 4px 16px rgba(45,106,79,0.22); transition:all 0.2s;"
                 onmouseover="this.style.background='var(--dc-green-light)'; this.style.borderColor='var(--dc-green-light)'; this.style.color='#fff !important'; this.style.transform='translateY(-2px)';"
                 onmouseout="this.style.background='var(--dc-green)'; this.style.borderColor='var(--dc-green)'; this.style.color='#fff !important'; this.style.transform='';">
                Join Community
              </a>
              <span class="text-gray-500 mt-1 d-block" style="font-size:0.68rem;">Updated today</span>
            </div>
          </div>
        </div>

        <!-- Metronic Card Body (Stats widgets) -->
        <div class="card-body pt-0 pb-8 px-8">
          <div class="row g-5">
            <!-- Stat widget 1 -->
            <div class="col-6 col-md-3">
              <div class="rounded-4 p-5 text-center h-100" style="background:#f4faf6; border:1px solid rgba(45,106,79,0.08);">
                <span class="d-block text-gray-900 fw-bolder fs-3 mb-1" style="color:#2D6A4F !important;">1,240</span>
                <span class="text-gray-500 fw-bold fs-9 uppercase-tracking" style="font-size:0.65rem; letter-spacing:0.05em; text-transform:uppercase;">Members</span>
              </div>
            </div>
            <!-- Stat widget 2 -->
            <div class="col-6 col-md-3">
              <div class="rounded-4 p-5 text-center h-100" style="background:#f4faf6; border:1px solid rgba(45,106,79,0.08);">
                <span class="d-block text-gray-900 fw-bolder fs-3 mb-1" style="color:#2D6A4F !important;">48</span>
                <span class="text-gray-500 fw-bold fs-9 uppercase-tracking" style="font-size:0.65rem; letter-spacing:0.05em; text-transform:uppercase;">Live Threads</span>
              </div>
            </div>
            <!-- Stat widget 3 -->
            <div class="col-6 col-md-3">
              <div class="rounded-4 p-5 text-center h-100" style="background:#f4faf6; border:1px solid rgba(45,106,79,0.08);">
                <span class="d-block text-success fw-bolder fs-3 mb-1">+290</span>
                <span class="text-gray-500 fw-bold fs-9 uppercase-tracking" style="font-size:0.65rem; letter-spacing:0.05em; text-transform:uppercase;">Posts / Wk</span>
              </div>
            </div>
            <!-- Stat widget 4 -->
            <div class="col-6 col-md-3">
              <div class="rounded-4 p-5 text-center h-100" style="background:#f4faf6; border:1px solid rgba(45,106,79,0.08);">
                <span class="d-block text-gray-900 fw-bolder fs-3 mb-1" style="color:#2D6A4F !important;">98%</span>
                <span class="text-gray-500 fw-bold fs-9 uppercase-tracking" style="font-size:0.65rem; letter-spacing:0.05em; text-transform:uppercase;">Rep Score</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /top community -->


  </div>
</section>



<style>
/* ══════════════ LEADERS HOVER & ANIMATIONS ══════════════ */

/* Earn rows */
.dl-earn-row {
  transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
}
.dl-earn-row:hover {
  transform: translateX(5px);
  background: #fff !important;
  border-color: rgba(45,106,79,0.20) !important;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04) !important;
}

/* Blob animation */
.dl-bg-blob {
  border-radius: 50%;
  mix-blend-mode: multiply;
  animation: dlBlobMorph 20s infinite alternate ease-in-out;
}
.dl-blob-green  { animation-duration: 22s; }
.dl-blob-gold   { animation-duration: 28s; animation-delay: 2s; }
.dl-blob-purple { animation-duration: 25s; animation-delay: 4s; }

@keyframes dlBlobMorph {
  0%   { border-radius:42% 58% 70% 30%/45% 45% 55% 55%; transform:translate(0,0) rotate(0deg) scale(1); }
  33%  { border-radius:70% 30% 52% 48%/60% 40% 60% 40%; transform:translate(30px,-40px) rotate(120deg) scale(1.15); }
  66%  { border-radius:48% 52% 42% 58%/40% 60% 38% 62%; transform:translate(-25px,20px) rotate(240deg) scale(0.9); }
  100% { border-radius:42% 58% 70% 30%/45% 45% 55% 55%; transform:translate(0,0) rotate(360deg) scale(1); }
}

/* ══ Top Community Card ══ */
.dl-top-community-card {
  max-width: 1032px;
  border-radius: 20px !important;
  border-color: rgba(45,106,79,0.15) !important;
  transition: transform 0.3s cubic-bezier(0.165,0.84,0.44,1), box-shadow 0.3s;
}
.dl-top-community-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 48px rgba(45,106,79,0.15) !important;
}
</style>
