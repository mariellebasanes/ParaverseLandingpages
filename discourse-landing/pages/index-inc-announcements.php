<?php /* index-inc-announcements.php — Discourse Announcements Section (Carousel Version) */ 
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════════  ANNOUNCEMENTS SECTION  ════════════════════ -->
<section id="announcements" class="py-20 dc-bg-light" style="position: relative; overflow: hidden;">
  <!-- Ambient background design -->
  <div class="dl-announcements-glow-1"></div>
  <div class="dl-announcements-glow-2"></div>
  <div class="dl-announcements-dots" aria-hidden="true"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">
    
    <!-- Section header -->
    <div class="text-center mx-auto mb-14 dl-reveal" style="max-width: 580px;">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-notification-status fs-6"></i>
        Stay Informed
      </span>
      <h2 class="fw-bolder text-gray-900 mb-4" style="font-size: clamp(1.8rem, 3.2vw, 2.5rem); line-height: 1.18;">
        Latest Campus Announcements
      </h2>
      <p class="text-gray-550 mb-0" style="font-size: 1rem; line-height: 1.72;">
        Catch up with the latest events, platform updates, and community highlights happening across FEU Tech, Alabang, and Diliman.
      </p>
    </div>

    <!-- Announcements Carousel Wrapper -->
    <div class="position-relative px-sm-12 dl-reveal dl-delay-1">
      
      <div id="dl-announcements-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">
        
        <div class="carousel-inner pt-2 pb-6">
          
          <!-- Slide 1: Academic Notice -->
          <div class="carousel-item active">
            <div class="card card-bordered shadow-sm dl-announcement-card-large p-8 p-lg-12 mx-auto position-relative" 
                 style="max-width: 820px; border-top: 4px solid #2D6A4F !important; background: radial-gradient(circle at 100% 0%, rgba(45, 106, 79, 0.05) 0%, rgba(255,255,255,0) 60%), #ffffff;">
              <!-- Featured tag -->
              <span class="position-absolute top-0 end-0 m-6 badge badge-light fw-bold px-3 py-1.5 fs-9 text-uppercase animate-pulse" 
                    style="letter-spacing: 0.05em; border: 1px solid rgba(0,0,0,0.06); color: #5e6278; background: #f5f8fa; border-radius: 6px;">
                FEATURED
              </span>
              <div class="row g-6 align-items-center">
                <!-- Icon column -->
                <div class="col-12 col-md-3 d-flex justify-content-center">
                  <div class="dl-announcement-icon-wrap" style="background: #e8f5ee; border: 1px solid rgba(45, 106, 79, 0.1); box-shadow: 0 8px 20px rgba(45, 106, 79, 0.12); transition: transform 0.3s ease;">
                    <i class="ki-outline ki-book fs-3x" style="color: #2D6A4F;"></i>
                  </div>
                </div>
                <!-- Content column -->
                <div class="col-12 col-md-9 text-center text-md-start">
                  <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start align-items-center mb-3">
                    <span class="badge rounded-pill px-3 py-1 fw-bold"
                          style="font-size: 0.72rem; background: #e8f5ee; color: #2D6A4F;">
                      Academic
                    </span>
                  </div>
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size: 1.35rem;">
                    Midterm Exams & Study Guides
                  </h3>
                  <!-- Author Metadata Block -->
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-4">
                    <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width: 24px; height: 24px; object-fit: cover;" alt="EDITH Admin">
                    <span class="fw-semibold text-gray-700" style="font-size: 0.8rem;">EDITH Admin</span>
                    <span class="text-gray-300">•</span>
                    <span class="text-gray-500" style="font-size: 0.8rem; font-weight: 500;">July 3, 2026</span>
                  </div>
                  <p class="text-gray-650 mb-6" style="font-size: 0.95rem; line-height: 1.65;">
                    Midterm examinations are scheduled for July 10-15. Boost your preparation by checking out community study guides and past materials shared in the c/Academics forum.
                  </p>
                  <div>
                    <a href="<?php echo htmlspecialchars($base); ?>" 
                       class="btn btn-success fw-bold px-8 py-3 rounded-pill text-white"
                       style="background-color: var(--dc-green-light); border: none; color: #ffffff !important;"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      View <i class="ki-outline ki-eye fs-5 ms-1 text-white" style="color: #ffffff !important;"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2: Campus Event -->
          <div class="carousel-item">
            <div class="card card-bordered shadow-sm dl-announcement-card-large p-8 p-lg-12 mx-auto position-relative" 
                 style="max-width: 820px; border-top: 4px solid #c89800 !important; background: radial-gradient(circle at 100% 0%, rgba(200, 152, 0, 0.05) 0%, rgba(255,255,255,0) 60%), #ffffff;">
              <!-- Featured tag -->
              <span class="position-absolute top-0 end-0 m-6 badge badge-light fw-bold px-3 py-1.5 fs-9 text-uppercase" 
                    style="letter-spacing: 0.05em; border: 1px solid rgba(0,0,0,0.06); color: #5e6278; background: #f5f8fa; border-radius: 6px;">
                FEATURED
              </span>
              <div class="row g-6 align-items-center">
                <!-- Icon column -->
                <div class="col-12 col-md-3 d-flex justify-content-center">
                  <div class="dl-announcement-icon-wrap" style="background: rgba(251, 197, 1, 0.12); border: 1px solid rgba(251, 197, 1, 0.2); box-shadow: 0 8px 20px rgba(200, 152, 0, 0.12); transition: transform 0.3s ease;">
                    <i class="ki-outline ki-award fs-3x" style="color: #c89800;"></i>
                  </div>
                </div>
                <!-- Content column -->
                <div class="col-12 col-md-9 text-center text-md-start">
                  <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start align-items-center mb-3">
                    <span class="badge rounded-pill px-3 py-1 fw-bold"
                          style="font-size: 0.72rem; background: rgba(251, 197, 1, 0.12); color: #c89800;">
                      Event
                    </span>
                  </div>
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size: 1.35rem;">
                    E-Sports Tournament Open
                  </h3>
                  <!-- Author Metadata Block -->
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-4">
                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" 
                         style="width: 24px; height: 24px; background: #2D6A4F; font-size: 0.65rem; flex-shrink: 0;">
                      MM
                    </div>
                    <span class="fw-semibold text-gray-700" style="font-size: 0.8rem;">Marixine (ESports Comm)</span>
                    <span class="text-gray-300">•</span>
                    <span class="text-gray-500" style="font-size: 0.8rem; font-weight: 500;">July 2, 2026</span>
                  </div>
                  <p class="text-gray-650 mb-6" style="font-size: 0.95rem; line-height: 1.65;">
                    Registration is now officially live for the upcoming campus Valorant and Mobile Legends tournament! Form your squad, reserve a slot, and compete for a PHP 25,000 prize pool.
                  </p>
                  <div>
                    <a href="<?php echo htmlspecialchars($base); ?>" 
                       class="btn btn-success fw-bold px-8 py-3 rounded-pill text-white"
                       style="background-color: var(--dc-green-light); border: none; color: #ffffff !important;"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      View <i class="ki-outline ki-eye fs-5 ms-1 text-white" style="color: #ffffff !important;"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3: Platform Update -->
          <div class="carousel-item">
            <div class="card card-bordered shadow-sm dl-announcement-card-large p-8 p-lg-12 mx-auto position-relative" 
                 style="max-width: 820px; border-top: 4px solid #7239ea !important; background: radial-gradient(circle at 100% 0%, rgba(114, 57, 234, 0.05) 0%, rgba(255,255,255,0) 60%), #ffffff;">
              <!-- Featured tag -->
              <span class="position-absolute top-0 end-0 m-6 badge badge-light fw-bold px-3 py-1.5 fs-9 text-uppercase" 
                    style="letter-spacing: 0.05em; border: 1px solid rgba(0,0,0,0.06); color: #5e6278; background: #f5f8fa; border-radius: 6px;">
                FEATURED
              </span>
              <div class="row g-6 align-items-center">
                <!-- Icon column -->
                <div class="col-12 col-md-3 d-flex justify-content-center">
                  <div class="dl-announcement-icon-wrap" style="background: rgba(114, 57, 234, 0.1); border: 1px solid rgba(114, 57, 234, 0.2); box-shadow: 0 8px 20px rgba(114, 57, 234, 0.12); transition: transform 0.3s ease;">
                    <i class="ki-outline ki-devices fs-3x" style="color: #7239ea;"></i>
                  </div>
                </div>
                <!-- Content column -->
                <div class="col-12 col-md-9 text-center text-md-start">
                  <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start align-items-center mb-3">
                    <span class="badge rounded-pill px-3 py-1 fw-bold"
                          style="font-size: 0.72rem; background: rgba(114, 57, 234, 0.1); color: #7239ea;">
                      Update
                    </span>
                  </div>
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size: 1.35rem;">
                    Discourse Mobile Beta Launch
                  </h3>
                  <!-- Author Metadata Block -->
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-4">
                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" 
                         style="width: 24px; height: 24px; background: #7239ea; font-size: 0.65rem; flex-shrink: 0;">
                      D
                    </div>
                    <span class="fw-semibold text-gray-700" style="font-size: 0.8rem;">Discourse Dev Team</span>
                    <span class="text-gray-300">•</span>
                    <span class="text-gray-500" style="font-size: 0.8rem; font-weight: 500;">July 1, 2026</span>
                  </div>
                  <p class="text-gray-650 mb-6" style="font-size: 0.95rem; line-height: 1.65;">
                    Discourse is coming to your pocket! Participate in our exclusive mobile app beta test on iOS TestFlight and Android Google Play. Get instant notification alerts for tags, replies, and messages.
                  </p>
                  <div>
                    <a href="<?php echo htmlspecialchars($base); ?>" 
                       class="btn btn-success fw-bold px-8 py-3 rounded-pill text-white"
                       style="background-color: var(--dc-green-light); border: none; color: #ffffff !important;"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      View <i class="ki-outline ki-eye fs-5 ms-1 text-white" style="color: #ffffff !important;"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Indicators -->
        <div class="carousel-indicators dl-carousel-indicators">
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

      </div>

      <!-- Controls -->
      <button class="dl-carousel-control dl-carousel-control-prev d-none d-sm-inline-flex" type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide="prev">
        <i class="ki-outline ki-arrow-left fs-4"></i>
      </button>
      <button class="dl-carousel-control dl-carousel-control-next d-none d-sm-inline-flex" type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide="next">
        <i class="ki-outline ki-arrow-right fs-4"></i>
      </button>

    </div>
  </div>
</section>
