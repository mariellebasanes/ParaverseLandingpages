<?php /* index-inc-badges.php — "Reputation & Leaderboard" — WHITE BACKGROUND */ ?>
<!-- ════════════════  REPUTATION & SPOTLIGHT SECTION  ════════════════ -->
<section id="badges" class="py-20 dc-bg-white" style="position: relative; overflow: hidden;">
  <!-- Ambient background blobs behind the section -->
  <div class="dl-bg-blob dl-blob-green" style="position: absolute; top: 5%; left: -10%; width: 450px; height: 450px; background: rgba(82, 183, 136, 0.14); filter: blur(80px); pointer-events: none; z-index: 0;"></div>
  <div class="dl-bg-blob dl-blob-gold" style="position: absolute; top: 35%; right: -12%; width: 500px; height: 500px; background: rgba(251, 197, 1, 0.15); filter: blur(95px); pointer-events: none; z-index: 0;"></div>
  <div class="dl-bg-blob dl-blob-purple" style="position: absolute; bottom: -5%; left: 25%; width: 450px; height: 450px; background: rgba(114, 57, 234, 0.10); filter: blur(90px); pointer-events: none; z-index: 0;"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">
    
    <!-- Section Header -->
    <div class="text-center mx-auto mb-12 dl-reveal" style="max-width: 600px;">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-crown fs-6"></i>
        Campus Reputation
      </span>
      <h2 class="fw-bolder text-gray-900 mb-4" style="font-size: clamp(1.8rem, 3.2vw, 2.5rem); line-height: 1.18;">
        Reputation &amp; Leaderboard
      </h2>
      <p class="text-gray-600 mb-0" style="font-size: 1rem; line-height: 1.72;">
        Discourse rewards active, quality contributions. Learn how to earn points to climb the ranks and see this month's featured leaders.
      </p>
    </div>

    <!-- PART 1: GUIDELINES DASHBOARD (Split Layout: Earn Points vs Avoid Penalties) -->
    <div class="row g-8 mb-16 justify-content-center align-items-stretch">
      
      <!-- LEFT COLUMN: How to Earn Points (Vertical Row Stack) -->
      <div class="col-lg-8 dl-reveal dl-delay-1">
        <div class="card border-0 h-100 shadow-sm p-6-5" style="background: #ffffff; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.05) !important;">
          <div class="d-flex align-items-center gap-3 mb-6">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: rgba(45, 106, 79, 0.08);">
              <i class="ki-outline ki-route text-success fs-4"></i>
            </span>
            <h3 class="fw-bolder text-gray-900 fs-4 mb-0">How to Earn Reputation</h3>
          </div>

          <!-- Rules List -->
          <div class="d-flex flex-column gap-4">
            
            <!-- Rule 1 -->
            <div class="dl-earning-row d-flex align-items-center justify-content-between p-4 rounded-4" style="background: #f8fafc; border: 1px solid rgba(0,0,0,0.03); transition: all 0.2s ease;">
              <div class="d-flex align-items-center gap-4">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 40px; height: 40px; background: rgba(45, 106, 79, 0.08); color: #2D6A4F; font-size: 1.15rem;">
                  <i class="ki-outline ki-shield-tick"></i>
                </span>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Answer &amp; Solve</h5>
                  <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.4;">
                    Provide verified solutions. Getting your answer marked as the solution by peers grants a massive boost.
                  </p>
                </div>
              </div>
              <span class="badge rounded-pill fw-bold text-uppercase px-3 py-2 flex-shrink-0 ms-4" style="font-size: 0.72rem; background: rgba(45, 106, 79, 0.12); color: #2D6A4F;">
                +15 Rep
              </span>
            </div>

            <!-- Rule 2 -->
            <div class="dl-earning-row d-flex align-items-center justify-content-between p-4 rounded-4" style="background: #f8fafc; border: 1px solid rgba(0,0,0,0.03); transition: all 0.2s ease;">
              <div class="d-flex align-items-center gap-4">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 40px; height: 40px; background: rgba(114, 57, 234, 0.08); color: #7239ea; font-size: 1.15rem;">
                  <i class="ki-outline ki-arrow-up"></i>
                </span>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Start Discussions</h5>
                  <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.4;">
                    Publish high-quality educational posts or programming tips. Upvotes from other students build reputation.
                  </p>
                </div>
              </div>
              <span class="badge rounded-pill fw-bold text-uppercase px-3 py-2 flex-shrink-0 ms-4" style="font-size: 0.72rem; background: rgba(114, 57, 234, 0.12); color: #7239ea;">
                +5 Rep
              </span>
            </div>

            <!-- Rule 3 -->
            <div class="dl-earning-row d-flex align-items-center justify-content-between p-4 rounded-4" style="background: #f8fafc; border: 1px solid rgba(0,0,0,0.03); transition: all 0.2s ease;">
              <div class="d-flex align-items-center gap-4">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 40px; height: 40px; background: rgba(251, 197, 1, 0.08); color: #e8b600; font-size: 1.15rem;">
                  <i class="ki-outline ki-crown"></i>
                </span>
                <div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-1">Form Study Guilds</h5>
                  <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.4;">
                    Create study groups or gaming guilds. Manage a community cohort that retains 15+ members.
                  </p>
                </div>
              </div>
              <span class="badge rounded-pill fw-bold text-uppercase px-3 py-2 flex-shrink-0 ms-4" style="font-size: 0.72rem; background: rgba(251, 197, 1, 0.12); color: #d69e00;">
                +50 Rep
              </span>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT COLUMN: What to Avoid (Penalty Box - Red Warning Theme with explicit Red Text) -->
      <div class="col-lg-4 dl-reveal dl-delay-2">
        <div class="card border-0 h-100 shadow-sm p-6-5" style="background: #fff8f8; border-radius: 16px; border: 1px dashed rgba(241, 65, 108, 0.3) !important;">
          <div class="d-flex align-items-center gap-3 mb-6">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: rgba(241, 65, 108, 0.1);">
              <i class="ki-outline ki-information-2 fs-4" style="color: #d9214e !important;"></i>
            </span>
            <h3 class="fw-bolder fs-4 mb-0" style="color: #d9214e !important;">What to Avoid</h3>
          </div>

          <p class="mb-5" style="font-size: 0.82rem; line-height: 1.5; color: #d9214e !important; opacity: 0.85;">
            To maintain a healthy academic space, the community enforces behavior guidelines. Violations will lead to automatic flag reviews.
          </p>

          <ul class="d-flex flex-column gap-3.5 ps-0 mb-6" style="list-style: none;">
            <li class="d-flex align-items-start gap-2.5 fs-7" style="color: #d9214e !important;">
              <i class="ki-outline ki-cross-circle mt-1 fs-6" style="color: #d9214e !important;"></i>
              <span class="fw-semibold">Spamming posts &amp; system abuse</span>
            </li>
            <li class="d-flex align-items-start gap-2.5 fs-7" style="color: #d9214e !important;">
              <i class="ki-outline ki-cross-circle mt-1 fs-6" style="color: #d9214e !important;"></i>
              <span class="fw-semibold">Unsolicited self-promotion</span>
            </li>
            <li class="d-flex align-items-start gap-2.5 fs-7" style="color: #d9214e !important;">
              <i class="ki-outline ki-cross-circle mt-1 fs-6" style="color: #d9214e !important;"></i>
              <span class="fw-semibold">Harassment or toxic comments</span>
            </li>
            <li class="d-flex align-items-start gap-2.5 fs-7" style="color: #d9214e !important;">
              <i class="ki-outline ki-cross-circle mt-1 fs-6" style="color: #d9214e !important;"></i>
              <span class="fw-semibold">Plagiarism &amp; code copying</span>
            </li>
          </ul>

          <div class="mt-auto p-3-5 rounded-3 text-center" style="background: rgba(241, 65, 108, 0.08); border: 1px solid rgba(241, 65, 108, 0.15);">
            <span class="fw-bolder fs-8 text-uppercase tracking-wider" style="color: #d9214e !important;">Reputation Deduction</span>
            <div class="fw-bolder fs-3 mt-1" style="color: #d9214e !important;">-20 Points <span class="fs-7 fw-normal" style="color: #d9214e !important; opacity: 0.7;">Per Flag</span></div>
          </div>
        </div>
      </div>

    </div>

    <!-- SUBHEADING FOR LEADERS -->
    <div class="text-center mx-auto mb-10 dl-reveal" style="max-width: 600px;">
      <h3 class="fw-bolder text-gray-800 fs-4"><i class="ki-outline ki-star text-warning me-2"></i>This Month's Campus Leaders</h3>
    </div>

    <!-- PART 2: LEADERS SPOTLIGHT (2 Columns Side by Side) -->
    <div class="row g-6 justify-content-center">
      
      <!-- COLUMN 1: TOP STUDENT CONTRIBUTOR -->
      <div class="col-lg-6 dl-reveal dl-delay-1">
        <div class="dl-spotlight-card card border-0 h-100 shadow-sm p-8" style="background: #ffffff; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.05) !important; transition: all 0.3s ease; position: relative;">
          <!-- Gold top stripe -->
          <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #fbc501, #e8b600); border-radius: 16px 16px 0 0;"></div>
          
          <div class="d-flex align-items-center justify-content-between mb-6">
            <span class="badge rounded-pill px-3 py-1 fw-bold text-uppercase" style="font-size: 0.65rem; background: rgba(251, 197, 1, 0.12); color: #d69e00; letter-spacing: 0.05em;">
              <i class="ki-outline ki-user me-1" style="color: #d69e00; font-size: 0.75rem;"></i> Top Contributor
            </span>
            <span class="text-muted fs-8">Updated today</span>
          </div>

          <!-- Student Profile Details (Centered) -->
          <div class="d-flex flex-column align-items-center text-center mb-6">
            <div class="position-relative mb-4">
              <img src="/discourse-landing/assets/images/anonymous.png" class="rounded-circle border border-2 border-primary" style="width: 80px; height: 80px; object-fit: cover;" alt="Sofia Karim" onerror="this.src='/discourse-landing/assets/images/anonymous.png'">
              <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white" style="width: 15px; height: 15px; right: 2px; bottom: 2px;"></span>
            </div>
            <h4 class="fw-bolder text-gray-900 fs-4 mb-1">Sofia Karim</h4>
            <p class="text-muted mb-1" style="font-size: 0.85rem;"><i class="ki-outline ki-book fs-8 me-1"></i> BSCS, 3rd Year · FEU Tech</p>
            <div class="d-flex align-items-center justify-content-center gap-1">
              <i class="ki-solid ki-star text-warning fs-8"></i>
              <span class="fw-bold text-gray-800 fs-8">Rank #1 Community Guide</span>
            </div>
          </div>

          <!-- Reputation Score Box -->
          <div class="p-4 rounded-4 mb-6" style="background: #fdfaf0; border: 1px dashed rgba(251, 197, 1, 0.4);">
            <div class="row align-items-center">
              <div class="col-7">
                <span class="text-gray-600 fs-8 text-uppercase tracking-wider fw-bold">Reputation Score</span>
                <h3 class="fw-bolder text-gray-900 fs-2 mt-1 mb-0" style="color: #d69e00 !important;">4,850 <span class="fs-7 fw-semibold text-gray-500">Rep</span></h3>
              </div>
              <div class="col-5 border-start border-gray-200 ps-4">
                <span class="text-gray-500 fs-9 d-block">Monthly Gain</span>
                <span class="fw-bolder text-success fs-7 d-inline-flex align-items-center gap-1">
                  <i class="ki-outline ki-arrow-up fs-7 text-success"></i> +450 points
                </span>
              </div>
            </div>
          </div>

          <!-- Stats Grid -->
          <div class="row g-4 text-center mt-auto border-top border-gray-100 pt-5">
            <div class="col-4">
              <span class="text-gray-500 fs-9 text-uppercase tracking-wider d-block mb-1">Posts</span>
              <span class="fw-bolder text-gray-800 fs-5">142</span>
            </div>
            <div class="col-4 border-start border-gray-200">
              <span class="text-gray-500 fs-9 text-uppercase tracking-wider d-block mb-1">Solutions</span>
              <span class="fw-bolder text-gray-800 fs-5">61</span>
            </div>
            <div class="col-4 border-start border-gray-200">
              <span class="text-gray-500 fs-9 text-uppercase tracking-wider d-block mb-1">Upvotes</span>
              <span class="fw-bolder text-gray-800 fs-5">1,240</span>
            </div>
          </div>
        </div>
      </div>

      <!-- COLUMN 2: MOST REPUTABLE COMMUNITY -->
      <div class="col-lg-6 dl-reveal dl-delay-2">
        <div class="dl-spotlight-card card border-0 h-100 shadow-sm p-8" style="background: #ffffff; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.05) !important; transition: all 0.3s ease; position: relative;">
          <!-- Green top stripe -->
          <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #2D6A4F, #52b788); border-radius: 16px 16px 0 0;"></div>
          
          <div class="d-flex align-items-center justify-content-between mb-6">
            <span class="badge rounded-pill px-3 py-1 fw-bold text-uppercase" style="font-size: 0.65rem; background: rgba(45, 106, 79, 0.12); color: #2D6A4F; letter-spacing: 0.05em;">
              <i class="ki-outline ki-abstract-26 me-1" style="color: #2D6A4F; font-size: 0.75rem;"></i> Top Community
            </span>
            <span class="text-muted fs-8">Updated today</span>
          </div>

          <!-- Community Details (Centered) -->
          <div class="d-flex flex-column align-items-center text-center mb-6">
            <div class="d-flex align-items-center justify-content-center rounded-3 bg-light-primary mb-4" style="width: 80px; height: 80px; background: #eef0fb;">
              <i class="ki-outline ki-message-programming text-primary fs-3x" style="color: #5b61e5 !important;"></i>
            </div>
            <h4 class="fw-bolder text-gray-900 fs-4 mb-1">c/FEU TECH DEV</h4>
            <p class="text-muted mb-1" style="font-size: 0.85rem;"><i class="ki-outline ki-category fs-8 me-1"></i> Technology &amp; Programming</p>
            <div class="d-flex align-items-center justify-content-center gap-1">
              <i class="ki-solid ki-medal text-success fs-8"></i>
              <span class="fw-bold text-gray-800 fs-8">Platinum Tier · 4.95 Rating</span>
            </div>
          </div>

          <!-- Reputation Progress -->
          <div class="p-4 rounded-4 mb-6" style="background: #f4faf6; border: 1px dashed rgba(45, 106, 79, 0.4);">
            <div class="row align-items-center">
              <div class="col-7">
                <span class="text-gray-600 fs-8 text-uppercase tracking-wider fw-bold">Active Threads</span>
                <h3 class="fw-bolder text-gray-900 fs-2 mt-1 mb-0" style="color: #2D6A4F !important;">48 <span class="fs-7 fw-semibold text-gray-500">Live</span></h3>
              </div>
              <div class="col-5 border-start border-gray-200 ps-4">
                <span class="text-gray-500 fs-9 d-block">Weekly Posts</span>
                <span class="fw-bolder text-success fs-7 d-inline-flex align-items-center gap-1">
                  <i class="ki-outline ki-chart-line-up fs-7 text-success"></i> +290 posts
                </span>
              </div>
            </div>
          </div>

          <!-- Stats Grid & Join CTA -->
          <div class="d-flex align-items-center justify-content-between mt-auto border-top border-gray-100 pt-5">
            <div class="d-flex align-items-center gap-6">
              <div>
                <span class="text-gray-500 fs-9 text-uppercase tracking-wider d-block">Members</span>
                <span class="fw-bolder text-gray-800 fs-5">1,240</span>
              </div>
              <div class="border-start border-gray-200 ps-4">
                <span class="text-gray-500 fs-9 text-uppercase tracking-wider d-block">Rep Score</span>
                <span class="fw-bolder text-gray-800 fs-5">98%</span>
              </div>
            </div>
            
            <a href="#posts" class="btn btn-sm px-5 py-3 fw-bold rounded-pill" style="background: var(--dc-green); color: white; transition: all 0.2s;" onmouseover="this.style.background='var(--dc-green-light)'" onmouseout="this.style.background='var(--dc-green)'">
              Join Community
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Include hover effects for spotlight cards -->
<style>
  .dl-spotlight-card {
    transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
  }
  .dl-spotlight-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 20px 40px rgba(45, 106, 79, 0.12) !important;
  }
  .py-1-5 {
    padding-top: 0.35rem !important;
    padding-bottom: 0.35rem !important;
  }
  .px-2-5 {
    padding-left: 0.75rem !important;
    padding-right: 0.75rem !important;
  }
  .mt-1-5 {
    margin-top: 0.38rem !important;
  }
  .p-3-5 {
    padding: 0.85rem !important;
  }
  .p-6-5 {
    padding: 2rem !important;
  }
  .gap-3.5 {
    gap: 0.85rem !important;
  }
  .gap-2.5 {
    gap: 0.65rem !important;
  }
  
  /* Earning Rows list hover */
  .dl-earning-row {
    border: 1px solid rgba(0, 0, 0, 0.04) !important;
  }
  .dl-earning-row:hover {
    transform: translateX(4px);
    background: #ffffff !important;
    border-color: rgba(45, 106, 79, 0.2) !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03) !important;
  }
  
  /* Reputation individual cards */
  .dl-rule-card {
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
    position: relative;
    background: #ffffff !important;
  }
  .dl-rule-card:hover {
    transform: translateY(-6px);
    border-color: rgba(45, 106, 79, 0.22) !important;
    box-shadow: 0 12px 24px rgba(45, 106, 79, 0.08) !important;
  }

  /* Animated background blobs style & keyframes */
  .dl-bg-blob {
    border-radius: 50%;
    mix-blend-mode: multiply;
    animation: dlBlobMorph 20s infinite alternate ease-in-out;
  }
  .dl-blob-green {
    animation-duration: 22s;
  }
  .dl-blob-gold {
    animation-duration: 28s;
    animation-delay: 2s;
  }
  .dl-blob-purple {
    animation-duration: 25s;
    animation-delay: 4s;
  }

  @keyframes dlBlobMorph {
    0% {
      border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
      transform: translate(0px, 0px) rotate(0deg) scale(1);
    }
    33% {
      border-radius: 70% 30% 52% 48% / 60% 40% 60% 40%;
      transform: translate(30px, -40px) rotate(120deg) scale(1.15);
    }
    66% {
      border-radius: 48% 52% 42% 58% / 40% 60% 38% 62%;
      transform: translate(-25px, 20px) rotate(240deg) scale(0.9);
    }
    100% {
      border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
      transform: translate(0px, 0px) rotate(360deg) scale(1);
    }
  }
</style>
