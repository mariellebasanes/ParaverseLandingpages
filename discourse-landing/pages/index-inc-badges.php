<?php /* index-inc-badges.php — "Campus Spotlight" — WHITE BACKGROUND */ ?>
<!-- ════════════════  CAMPUS SPOTLIGHT SECTION  ════════════════ -->
<section id="badges" class="py-20 dc-bg-white" style="position: relative; overflow: hidden;">

  <!-- Ambient background blobs (Green and Yellow only) -->
  <div class="dl-bg-blob dl-blob-green" style="position: absolute; top: -5%; left: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(6,171,98,0.18) 0%, rgba(6,171,98,0) 70%); filter: blur(60px); pointer-events: none; z-index: 0;"></div>
  <div class="dl-bg-blob dl-blob-gold"  style="position: absolute; bottom: -5%; right: -5%; width: 550px; height: 550px; background: radial-gradient(circle, rgba(235,187,7,0.18) 0%, rgba(235,187,7,0) 70%); filter: blur(70px); pointer-events: none; z-index: 0;"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section Header (Merged & Polished) -->
    <div class="text-center mx-auto mb-14 dl-reveal" style="max-width: 640px;">
      <span class="dl-eyebrow dl-eyebrow-green mb-3">
        <i class="ki-outline ki-crown fs-6"></i>
        Campus Spotlight
      </span>
      <h2 class="fw-bolder text-gray-900 mb-4" style="font-size: clamp(1.8rem,3.2vw,2.5rem); line-height: 1.18;">
        This Month's <span style="color:var(--dc-gold);">Campus Leaders</span>
      </h2>
      <p class="text-gray-600 mb-0" style="font-size: 1rem; line-height: 1.72;">
        Discourse celebrates the active peer guides, student leaders, and top academic channels contributing to success at FEU Tech.
      </p>
    </div>

    <!-- Redesigned Grid: Leaderboard & Top Community side-by-side -->
    <div class="row g-8 align-items-stretch dl-reveal">

      <!-- LEFT: Campus Leaderboard Card -->
      <div class="col-lg-6 d-flex">
        <div class="card card-bordered shadow-sm w-100 p-8 hover-elevate-up" style="border-radius:24px; background:#fff;">
          <div class="d-flex align-items-center justify-content-between mb-8">
            <h3 class="fw-bolder text-gray-900 fs-4 mb-0 d-flex align-items-center gap-2">
              <i class="ki-outline ki-ranking fs-3 text-success"></i>
              Top Student Contributors
            </h3>
            <span class="text-gray-500 fs-8">Updated today</span>
          </div>

          <div class="d-flex flex-column gap-6">

            <!-- Leader #1: Sofia Karim -->
            <div class="d-flex align-items-center justify-content-between p-4 rounded-4" 
                 style="background: linear-gradient(135deg, #fffdf2 0%, #ffffff 100%); border: 1px solid rgba(235,187,7,0.25);">
              <div class="d-flex align-items-center gap-4">
                <!-- Avatar with rank crown badge -->
                <div class="position-relative">
                  <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#EBBB07,#d4a800); box-shadow: 0 2px 10px rgba(235,187,7,0.30);">
                    <img src="/discourse-landing/assets/images/anonymous.png"
                         class="rounded-circle border border-2 border-white d-block" alt="Sofia Karim"
                         style="width: 48px; height: 48px; object-fit: cover;">
                  </div>
                  <span class="position-absolute translate-middle start-100 top-0 badge rounded-circle d-flex align-items-center justify-content-center bg-warning p-1"
                        style="width:20px; height:20px; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
                    <i class="ki-outline ki-crown text-dark fs-9" style="font-size:0.6rem;"></i>
                  </span>
                </div>
                <div>
                  <h4 class="fw-bold text-gray-900 fs-6 mb-0">Sofia Karim</h4>
                  <span class="text-muted d-block" style="font-size:0.75rem;">BSCS, 3rd Year &middot; FEU Tech</span>
                  <span class="text-gray-500 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 142 &middot; Solutions: 61 &middot; Upvotes: 1.2k
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-warning fs-8 fw-bolder px-3 py-2" style="background:rgba(235,187,7,0.12); color:#c8a000 !important;">
                  4,850 pts
                </span>
              </div>
            </div>

            <!-- Leader #2: Marco Reyes -->
            <div class="d-flex align-items-center justify-content-between p-4 rounded-4" 
                 style="background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%); border: 1px solid rgba(148,163,184,0.15);">
              <div class="d-flex align-items-center gap-4">
                <!-- Avatar with rank badge -->
                <div class="position-relative">
                  <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#94a3b8,#cbd5e1); box-shadow: 0 2px 8px rgba(148,163,184,0.20);">
                    <img src="/discourse-landing/assets/images/catalina.webp"
                         class="rounded-circle border border-2 border-white d-block" alt="Marco Reyes"
                         style="width: 48px; height: 48px; object-fit: cover;">
                  </div>
                  <span class="position-absolute translate-middle start-100 top-0 badge rounded-circle d-flex align-items-center justify-content-center bg-secondary p-1"
                        style="width:20px; height:20px; box-shadow: 0 2px 6px rgba(0,0,0,0.15); background:#94a3b8 !important;">
                    <span class="text-white fw-bold" style="font-size:0.58rem;">2</span>
                  </span>
                </div>
                <div>
                  <h4 class="fw-bold text-gray-900 fs-6 mb-0">Marco Reyes</h4>
                  <span class="text-muted d-block" style="font-size:0.75rem;">BSIT, 2nd Year &middot; FEU Tech</span>
                  <span class="text-gray-500 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 98 &middot; Solutions: 34 &middot; Upvotes: 620
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-secondary fs-8 fw-bolder px-3 py-2" style="background:rgba(148,163,184,0.12); color:#64748b !important;">
                  3,210 pts
                </span>
              </div>
            </div>

            <!-- Leader #3: Aira Santos -->
            <div class="d-flex align-items-center justify-content-between p-4 rounded-4" 
                 style="background: linear-gradient(135deg, #fffbf7 0%, #ffffff 100%); border: 1px solid rgba(200,165,0,0.12);">
              <div class="d-flex align-items-center gap-4">
                <!-- Avatar with rank badge -->
                <div class="position-relative">
                  <div class="rounded-circle p-1" style="background:linear-gradient(135deg,#d97706,#b45309); box-shadow: 0 2px 8px rgba(200,165,0,0.15);">
                    <img src="/discourse-landing/assets/images/anonymous.png"
                         class="rounded-circle border border-2 border-white d-block" alt="Aira Santos"
                         style="width: 48px; height: 48px; object-fit: cover;">
                  </div>
                  <span class="position-absolute translate-middle start-100 top-0 badge rounded-circle d-flex align-items-center justify-content-center p-1"
                        style="width:20px; height:20px; box-shadow: 0 2px 6px rgba(0,0,0,0.15); background:#d97706 !important;">
                    <span class="text-white fw-bold" style="font-size:0.58rem;">3</span>
                  </span>
                </div>
                <div>
                  <h4 class="fw-bold text-gray-900 fs-6 mb-0">Aira Santos</h4>
                  <span class="text-muted d-block" style="font-size:0.75rem;">BSECE, 4th Year &middot; FEU Tech</span>
                  <span class="text-gray-500 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 74 &middot; Solutions: 18 &middot; Upvotes: 390
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-danger fs-8 fw-bolder px-3 py-2" style="background:rgba(200,165,0,0.08); color:#b45309 !important;">
                  2,540 pts
                </span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT: Top Community Card -->
      <div class="col-lg-6 d-flex">
        <div class="card card-bordered shadow-sm w-100 p-8 hover-elevate-up" style="border-radius:24px; background: linear-gradient(135deg, #ffffff 60%, #f7faf8 100%);">
          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between mb-6">
            <h3 class="fw-bolder text-gray-900 fs-4 mb-0 d-flex align-items-center gap-2">
              <i class="ki-outline ki-abstract-26 fs-3 text-success"></i>
              Top Community
            </h3>
            <span class="badge badge-light-success fs-8 fw-bold px-3 py-1">
              <i class="ki-outline ki-ranking fs-7 text-success me-1"></i>#1 Ranked
            </span>
          </div>

          <!-- Community Identity -->
          <div class="d-flex align-items-center mb-6">
            <div class="symbol symbol-55px rounded-4 me-4 flex-shrink-0">
              <span class="symbol-label rounded-4" style="background:rgba(91,97,229,0.08); border: 2px solid #fff; box-shadow: 0 4px 12px rgba(91,97,229,0.15);">
                <i class="ki-outline ki-message-programming fs-1" style="color:#5b61e5;"></i>
              </span>
            </div>
            <div class="d-flex flex-column">
              <h4 class="fw-bolder text-gray-900 mb-0" style="font-size:1.2rem;">c/FEU TECH DEV</h4>
              <span class="text-muted mt-1" style="font-size:0.8rem;">
                <i class="ki-outline ki-category fs-7 me-1"></i>Technology &amp; Programming &middot; FEU Tech
              </span>
            </div>
          </div>

          <!-- Description -->
          <p class="text-gray-650 mb-6" style="font-size:0.92rem; line-height:1.62;">
            Collaborate, build, and share projects with fellow student developers. Join live coding sessions, coursework help, and capstone validation groups.
          </p>

          <!-- Stats Grid inside the card -->
          <div class="row g-4 mb-8">
            <div class="col-6">
              <div class="rounded-4 p-4 d-flex align-items-center gap-3" style="background:#f4faf6; border:1px solid rgba(6,171,98,0.08);">
                <i class="ki-outline ki-people fs-2 text-success"></i>
                <div>
                  <span class="d-block text-gray-900 fw-extrabold fs-6" style="line-height:1.2;">1,240</span>
                  <span class="text-gray-500 fs-9 text-uppercase" style="font-size:0.6rem; letter-spacing:0.04em;">Members</span>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="rounded-4 p-4 d-flex align-items-center gap-3" style="background:#f4faf6; border:1px solid rgba(6,171,98,0.08);">
                <i class="ki-outline ki-messages fs-2 text-success"></i>
                <div>
                  <span class="d-block text-gray-900 fw-extrabold fs-6" style="line-height:1.2;">48</span>
                  <span class="text-gray-500 fs-9 text-uppercase" style="font-size:0.6rem; letter-spacing:0.04em;">Live Threads</span>
                </div>
              </div>
            </div>
          </div>

          <!-- CTA / Footer Inside Card -->
          <div class="d-flex align-items-center justify-content-between mt-auto pt-4 border-top border-gray-100">
            <a href="#posts"
               class="btn btn-success fw-bold rounded-pill px-6 py-3"
               style="background:var(--dc-green); border-color:var(--dc-green); color:#fff !important; font-size:0.85rem; box-shadow:0 4px 14px rgba(6,171,98,0.18); transition:all 0.2s;"
               onmouseover="this.style.background='var(--dc-green-light)'; this.style.borderColor='var(--dc-green-light)'; this.style.transform='translateY(-2px)';"
               onmouseout="this.style.background='var(--dc-green)'; this.style.borderColor='var(--dc-green)'; this.style.transform='';">
              Join Community
            </a>
            <span class="text-gray-500" style="font-size:0.7rem;">Updated today</span>
          </div>
        </div>
      </div>

    </div><!-- /row -->

    <!-- BOTTOM: Separate Guidelines Card -->
    <div class="row mt-8 dl-reveal">
      <div class="col-12">
        <div class="card card-bordered shadow-sm p-8 hover-elevate-up" style="border-radius:24px; background: linear-gradient(135deg, #ffffff 70%, #fffdf4 100%);">
          
          <div class="d-flex align-items-center gap-3 mb-6">
            <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                 style="width:36px; height:36px; background:rgba(6,171,98,0.10);">
              <i class="ki-outline ki-information-2 fs-3" style="color:#06AB62;"></i>
            </div>
            <h3 class="fw-bolder text-gray-900 fs-5 mb-0">How to Earn Points &amp; Get Spotlighted</h3>
          </div>

          <div class="row g-6">
            
            <!-- Pillar 1 -->
            <div class="col-md-4">
              <div class="d-flex align-items-start gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" 
                     style="width:40px; height:40px; background:#e6f8f0;">
                  <i class="ki-outline ki-shield-tick fs-4" style="color:#06AB62;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">
                    Peer Solutions
                    <span class="badge badge-light-success fs-9 fw-bold ms-1" style="background:#e6f8f0; color:#06AB62 !important;">+15 Rep</span>
                  </h5>
                  <p class="text-gray-550 mb-0" style="font-size:0.8rem; line-height:1.5;">
                    Provide verified answers to peer questions. Earn points when your reply is marked as the solution.
                  </p>
                </div>
              </div>
            </div>

            <!-- Pillar 2 -->
            <div class="col-md-4">
              <div class="d-flex align-items-start gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" 
                     style="width:40px; height:40px; background:rgba(114,57,234,0.10);">
                  <i class="ki-outline ki-arrow-up fs-4" style="color:#7239ea;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">
                    Quality Discussions
                    <span class="badge badge-light-primary fs-9 fw-bold ms-1" style="background:rgba(114,57,234,0.10); color:#7239ea !important;">+5 Rep</span>
                  </h5>
                  <p class="text-gray-550 mb-0" style="font-size:0.8rem; line-height:1.5;">
                    Start useful threads or post programming tips. Earn points from peer upvotes.
                  </p>
                </div>
              </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-md-4">
              <div class="d-flex align-items-start gap-4">
                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" 
                     style="width:40px; height:40px; background:rgba(235,187,7,0.13);">
                  <i class="ki-outline ki-crown fs-4" style="color:#c8a000;"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">
                    Active Study Guilds
                    <span class="badge badge-light-warning fs-9 fw-bold ms-1" style="background:rgba(235,187,7,0.15); color:#d69e00 !important;">+50 Rep</span>
                  </h5>
                  <p class="text-gray-550 mb-0" style="font-size:0.8rem; line-height:1.5;">
                    Create study groups or guilds. Maintain 15+ active members for a sustained boost.
                  </p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
</section>
