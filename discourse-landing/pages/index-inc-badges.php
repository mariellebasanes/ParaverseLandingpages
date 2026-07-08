<?php /* index-inc-badges.php — "Campus Spotlight" — DARK GREEN GRID BACKGROUND */ ?>
<!-- ════════════════  CAMPUS SPOTLIGHT SECTION  ════════════════ -->
<section id="badges" class="py-20" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #0a2e1d 0%, #0f3d27 45%, #0d3a25 100%);">

  <!-- Ambient background blobs -->
  <div style="position:absolute;top:-15%;left:-8%;width:550px;height:550px;border-radius:50%;
              background:radial-gradient(circle,rgba(6,171,98,0.07) 0%,transparent 70%);
              pointer-events:none;filter:blur(60px);"></div>
  <div style="position:absolute;bottom:-20%;right:-8%;width:600px;height:600px;border-radius:50%;
              background:radial-gradient(circle,rgba(235,187,7,0.05) 0%,transparent 70%);
              pointer-events:none;filter:blur(60px);"></div>
  <!-- Dot-grid overlay (matching Student Journey) -->
  <div style="position:absolute;inset:0;pointer-events:none;z-index:0;
              background-image:radial-gradient(circle,rgba(255,255,255,0.06) 1px,transparent 1px);
              background-size:32px 32px;
              -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 30%,transparent 100%);
              mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 30%,transparent 100%);"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section Header (Merged & Polished) -->
    <div class="text-center mx-auto mb-14 dl-reveal" style="max-width: 640px;">
      <span class="dl-eyebrow dl-eyebrow-gold mb-3">
        <i class="ki-outline ki-crown fs-6"></i>
        Campus Spotlight
      </span>
      <h2 class="fw-bolder text-white mb-4" style="font-size: clamp(1.8rem,3.2vw,2.5rem); line-height: 1.18; color:#ffffff !important;">
        This Month's <span style="color:var(--dc-gold);">Campus Leaders</span>
      </h2>
      <p class="mb-0" style="font-size: 1rem; line-height: 1.72; color: rgba(255,255,255,0.75);">
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
                  <span class="text-gray-550 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 142 &middot; Upvotes: 1.2k
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-warning fs-8 fw-bolder px-3 py-2" style="background:rgba(235,187,7,0.12); color:#c8a000 !important;">
                  4,850 likes
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
                  <span class="text-gray-550 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 98 &middot; Upvotes: 620
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-secondary fs-8 fw-bolder px-3 py-2" style="background:rgba(148,163,184,0.12); color:#64748b !important;">
                  3,210 likes
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
                  <span class="text-gray-550 d-block mt-1" style="font-size:0.72rem;">
                    Posts: 74 &middot; Upvotes: 390
                  </span>
                </div>
              </div>
              <div class="text-end">
                <span class="badge badge-light-danger fs-8 fw-bolder px-3 py-2" style="background:rgba(200,165,0,0.08); color:#b45309 !important;">
                  2,540 likes
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
              Top Communities
            </h3>
          </div>

          <!-- Bento Box Grid for Top Communities (Even Squares 2x2) -->
          <div class="row g-4 mb-6 w-100 mx-auto">
            
            <!-- Tile 1: Rank #1 - FEU TECH DEV -->
            <div class="col-6">
              <div class="p-5 rounded-4 hover-elevate-up d-flex flex-column justify-content-between h-100" 
                   style="background: linear-gradient(135deg, #fffdf2 0%, #ffffff 100%); border: 1px solid rgba(235,187,7,0.25); transition: all 0.25s ease; min-height: 160px;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <span class="badge rounded-circle d-flex align-items-center justify-content-center bg-warning text-dark fw-bold" 
                        style="width:22px; height:22px; font-size:0.7rem; box-shadow: 0 1px 4px rgba(235,187,7,0.2);">1</span>
                  <div class="symbol symbol-35px rounded-3">
                    <span class="symbol-label rounded-3" style="background:rgba(91,97,229,0.06); border: 1px solid rgba(91,97,229,0.12);">
                      <i class="ki-outline ki-message-programming fs-4" style="color:#5b61e5;"></i>
                    </span>
                  </div>
                </div>
                <div>
                  <span class="fw-bold text-gray-900 fs-6 d-block mb-1" style="line-height: 1.2;">c/FEU TECH DEV</span>
                  <span class="text-muted d-block mb-2" style="font-size:0.7rem;">Programming</span>
                  <span class="badge badge-light-warning fs-9 fw-semibold px-2.5 py-1" style="background:rgba(235,187,7,0.1); color:#c89e20 !important;">
                    1.2k members
                  </span>
                </div>
              </div>
            </div>

            <!-- Tile 2: Rank #2 - FEU LIFE -->
            <div class="col-6">
              <div class="p-5 rounded-4 hover-elevate-up d-flex flex-column justify-content-between h-100" 
                   style="background: linear-gradient(135deg, #fffdfd 0%, #ffffff 100%); border: 1px solid rgba(192,57,43,0.15); transition: all 0.25s ease; min-height: 160px;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <span class="badge rounded-circle d-flex align-items-center justify-content-center bg-secondary text-gray-800 fw-bold" 
                        style="width:22px; height:22px; font-size:0.7rem; background:#cbd5e1 !important; color:#334155 !important;">2</span>
                  <div class="symbol symbol-35px rounded-3">
                    <span class="symbol-label rounded-3" style="background:rgba(192,57,43,0.06); border: 1px solid rgba(192,57,43,0.12);">
                      <i class="ki-outline ki-heart fs-4" style="color:#c0392b;"></i>
                    </span>
                  </div>
                </div>
                <div>
                  <span class="fw-bold text-gray-900 fs-6 d-block mb-1" style="line-height: 1.2;">c/FEU LIFE</span>
                  <span class="text-muted d-block mb-2" style="font-size:0.7rem;">Campus Life</span>
                  <span class="badge badge-light-success fs-9 fw-semibold px-2.5 py-1" style="background:rgba(6,171,98,0.06); color:#06AB62 !important;">
                    980 members
                  </span>
                </div>
              </div>
            </div>

            <!-- Tile 3: Rank #3 - Freshies Guide -->
            <div class="col-6">
              <div class="p-5 rounded-4 hover-elevate-up d-flex flex-column justify-content-between h-100" 
                   style="background: linear-gradient(135deg, #fbfdff 0%, #ffffff 100%); border: 1px solid rgba(14,165,233,0.15); transition: all 0.25s ease; min-height: 160px;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <span class="badge rounded-circle d-flex align-items-center justify-content-center bg-secondary text-gray-800 fw-bold" 
                        style="width:22px; height:22px; font-size:0.7rem; background:#cbd5e1 !important; color:#334155 !important;">3</span>
                  <div class="symbol symbol-35px rounded-3">
                    <span class="symbol-label rounded-3" style="background:rgba(14,165,233,0.06); border: 1px solid rgba(14,165,233,0.12);">
                      <i class="ki-outline ki-people fs-4" style="color:#0ea5e9;"></i>
                    </span>
                  </div>
                </div>
                <div>
                  <span class="fw-bold text-gray-900 fs-6 d-block mb-1" style="line-height: 1.2;">c/Freshies</span>
                  <span class="text-muted d-block mb-2" style="font-size:0.7rem;">First Year Guide</span>
                  <span class="badge badge-light-success fs-9 fw-semibold px-2.5 py-1" style="background:rgba(6,171,98,0.06); color:#06AB62 !important;">
                    890 members
                  </span>
                </div>
              </div>
            </div>

            <!-- Tile 4: Rank #4 - Study Group -->
            <div class="col-6">
              <div class="p-5 rounded-4 hover-elevate-up d-flex flex-column justify-content-between h-100" 
                   style="background: linear-gradient(135deg, #fafdff 0%, #ffffff 100%); border: 1px solid rgba(6,171,98,0.15); transition: all 0.25s ease; min-height: 160px;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <span class="badge rounded-circle d-flex align-items-center justify-content-center bg-secondary text-gray-800 fw-bold" 
                        style="width:22px; height:22px; font-size:0.7rem; background:#cbd5e1 !important; color:#334155 !important;">4</span>
                  <div class="symbol symbol-35px rounded-3">
                    <span class="symbol-label rounded-3" style="background:rgba(6,171,98,0.06); border: 1px solid rgba(6,171,98,0.12);">
                      <i class="ki-outline ki-book fs-4" style="color:#06AB62;"></i>
                    </span>
                  </div>
                </div>
                <div>
                  <span class="fw-bold text-gray-900 fs-6 d-block mb-1" style="line-height: 1.2;">c/Study Group</span>
                  <span class="text-muted d-block mb-2" style="font-size:0.7rem;">Academics &amp; Study</span>
                  <span class="badge badge-light-success fs-9 fw-semibold px-2.5 py-1" style="background:rgba(6,171,98,0.06); color:#06AB62 !important;">
                    620 members
                  </span>
                </div>
              </div>
            </div>

          </div>

          <!-- CTA / Footer Inside Card -->
          <div class="d-flex align-items-center justify-content-between mt-auto pt-4 border-top border-gray-100">
            <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php"
               class="btn btn-success fw-bold rounded-pill px-6 py-3"
               style="background:var(--dc-green); border-color:var(--dc-green); color:#fff !important; font-size:0.85rem; box-shadow:0 4px 14px rgba(6,171,98,0.18); transition:all 0.2s;"
               onmouseover="this.style.background='var(--dc-green-light)'; this.style.borderColor='var(--dc-green-light)'; this.style.transform='translateY(-2px)';"
               onmouseout="this.style.background='var(--dc-green)'; this.style.borderColor='var(--dc-green)'; this.style.transform='';">
              Explore All Communities
            </a>
            <span class="text-gray-555" style="font-size:0.7rem;">Updated today</span>
          </div>
        </div>
      </div>

    </div><!-- /row -->

  </div>
</section>
