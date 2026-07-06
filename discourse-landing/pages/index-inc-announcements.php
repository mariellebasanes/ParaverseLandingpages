<?php /* index-inc-announcements.php — Discourse Announcements Section (Styled Carousel) */
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════════  ANNOUNCEMENTS SECTION  ════════════════════ -->
<section id="announcements" class="py-20" style="position: relative; overflow: hidden; background: #f7f9f8;">
  <!-- Ambient background -->
  <div class="dl-announcements-glow-1"></div>
  <div class="dl-announcements-glow-2"></div>
  <div class="dl-announcements-dots" aria-hidden="true"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section header -->
    <div class="d-flex align-items-end justify-content-between mb-12 flex-wrap gap-4 dl-reveal">
      <div>
        <span class="dl-eyebrow dl-eyebrow-green mb-3">
          <i class="ki-outline ki-notification-status fs-6"></i>
          Stay Informed
        </span>
        <h2 class="fw-bolder text-gray-900 mb-2" style="font-size: clamp(1.7rem, 3vw, 2.3rem); line-height: 1.18;">
          Latest Campus Announcements
        </h2>
        <p class="text-gray-500 mb-0" style="font-size: 0.97rem; max-width: 480px; line-height: 1.65;">
          Events, platform updates, and community highlights across FEU Tech, Alabang &amp; Diliman.
        </p>
      </div>
      <a href="<?php echo htmlspecialchars($base); ?>"
         class="btn fw-bold px-6 py-3 d-none d-md-inline-flex align-items-center gap-2"
         style="background:#fff; border:1.5px solid rgba(6,171,98,0.18); color:#06AB62; border-radius:12px; font-size:0.88rem; box-shadow:0 2px 8px rgba(6,171,98,0.06); transition:all 0.2s;"
         onmouseover="this.style.background='#06AB62';this.style.color='#fff';"
         onmouseout="this.style.background='#fff';this.style.color='#06AB62';"
         onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
        View All <i class="ki-outline ki-arrow-right fs-5"></i>
      </a>
    </div>

    <!-- Carousel wrapper -->
    <div class="position-relative dl-reveal dl-delay-1">

      <div id="dl-announcements-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">
        <div class="carousel-inner pb-4">

          <!-- ══ SLIDE 1: Academic ══ -->
          <div class="carousel-item active">
            <div class="dl-ann-card dl-ann-card--slide mx-auto position-relative overflow-hidden"
                 style="max-width: 860px; 
                        background: linear-gradient(145deg, #ffffff 0%, #f2f9f5 100%);">

              <!-- Decorative blob -->
              <div style="position:absolute;top:-70px;right:-70px;width:240px;height:240px;border-radius:50%;
                          background:rgba(6,171,98,0.07);pointer-events:none;"></div>

              <div class="row g-0 align-items-center">
                <!-- Left: Icon + badge -->
                <div class="col-12 col-md-3 d-flex flex-column align-items-center align-items-md-start mb-6 mb-md-0 pe-md-6"
                     style="border-right: 1px solid rgba(6,171,98,0.10);">
                  <div class="dl-ann-icon mb-4" style="background:#e6f8f0; box-shadow:0 6px 20px rgba(6,171,98,0.12);">
                    <i class="ki-outline ki-book-open fs-2x" style="color:#06AB62;"></i>
                  </div>
                  <span class="dl-ann-badge" style="background:#e6f8f0; color:#06AB62;">
                    <i class="ki-outline ki-book fs-7 me-1"></i> Academic
                  </span>
                  <div class="dl-ann-date mt-2">July 3, 2026</div>
                </div>

                <!-- Right: Content -->
                <div class="col-12 col-md-9 ps-md-8">
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size:1.5rem; line-height:1.25;">
                    Midterm Exams &amp; Study Guides
                  </h3>
                  <p class="text-gray-600 mb-5" style="font-size:0.96rem; line-height:1.72;">
                    Midterm examinations are scheduled for July 10–15. Boost your preparation by checking out community study guides and past materials shared in the c/Academics forum. Don't go in blind — start early!
                  </p>
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-2">
                      <img src="<?php echo $base; ?>assets/images/catalina.webp"
                           class="rounded-circle" style="width:28px;height:28px;object-fit:cover;" alt="EDITH Admin">
                      <span class="fw-semibold text-gray-700" style="font-size:0.83rem;">EDITH Admin</span>
                      <span class="text-gray-300 mx-1">•</span>
                      <span class="text-muted" style="font-size:0.83rem;">5 days ago</span>
                    </div>
                    <a href="<?php echo htmlspecialchars($base); ?>"
                       class="btn fw-bold px-6 py-2 d-inline-flex align-items-center gap-2"
                       style="background:#06AB62;color:#fff;border-radius:10px;font-size:0.88rem;border:none;transition:all 0.2s;"
                       onmouseover="this.style.background='#038a4f';"
                       onmouseout="this.style.background='#06AB62';"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      Read More <i class="ki-outline ki-arrow-right fs-6"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ══ SLIDE 2: E-Sports Event ══ -->
          <div class="carousel-item">
            <div class="dl-ann-card dl-ann-card--slide mx-auto position-relative overflow-hidden"
                 style="max-width: 860px; 
                        background: linear-gradient(145deg, #ffffff 0%, #fffdf0 100%);">

              <div style="position:absolute;top:-70px;right:-70px;width:240px;height:240px;border-radius:50%;
                          background:rgba(200,165,0,0.07);pointer-events:none;"></div>

              <div class="row g-0 align-items-center">
                <!-- Left: Icon + badge -->
                <div class="col-12 col-md-3 d-flex flex-column align-items-center align-items-md-start mb-6 mb-md-0 pe-md-6"
                     style="border-right: 1px solid rgba(200,165,0,0.12);">
                  <div class="dl-ann-icon mb-4" style="background:rgba(235,187,7,0.12); box-shadow:0 6px 20px rgba(200,165,0,0.14);">
                    <i class="ki-outline ki-award fs-2x" style="color:#c8a000;"></i>
                  </div>
                  <span class="dl-ann-badge" style="background:rgba(235,187,7,0.14); color:#c8a000;">
                    <i class="ki-outline ki-joystick fs-7 me-1"></i> Event
                  </span>
                  <div class="dl-ann-date mt-2">July 2, 2026</div>
                </div>

                <!-- Right: Content -->
                <div class="col-12 col-md-9 ps-md-8">
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size:1.5rem; line-height:1.25;">
                    E-Sports Tournament Now Open
                  </h3>
                  <p class="text-gray-600 mb-5" style="font-size:0.96rem; line-height:1.72;">
                    Registration is now officially live for the upcoming campus Valorant and Mobile Legends tournament! Form your squad, reserve a slot, and compete for a <strong>PHP 25,000 prize pool</strong>. Limited team slots available — don't miss out!
                  </p>
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                           style="width:28px;height:28px;background:#c8a000;font-size:0.65rem;flex-shrink:0;">MM</div>
                      <span class="fw-semibold text-gray-700" style="font-size:0.83rem;">Marixine · ESports Comm</span>
                      <span class="text-gray-300 mx-1">•</span>
                      <span class="text-muted" style="font-size:0.83rem;">6 days ago</span>
                    </div>
                    <a href="<?php echo htmlspecialchars($base); ?>"
                       class="btn fw-bold px-6 py-2 d-inline-flex align-items-center gap-2"
                       style="background:#c8a000;color:#fff;border-radius:10px;font-size:0.88rem;border:none;transition:all 0.2s;"
                       onmouseover="this.style.background='#c8a000';"
                       onmouseout="this.style.background='#c8a000';"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      Read More <i class="ki-outline ki-arrow-right fs-6"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ══ SLIDE 3: Mobile Beta Launch ══ -->
          <div class="carousel-item">
            <div class="dl-ann-card dl-ann-card--slide mx-auto position-relative overflow-hidden"
                 style="max-width: 860px;
                        background: linear-gradient(145deg, #ffffff 0%, #faf8ff 100%);">

              <div style="position:absolute;top:-70px;right:-70px;width:240px;height:240px;border-radius:50%;
                          background:rgba(114,57,234,0.06);pointer-events:none;"></div>

              <div class="row g-0 align-items-center">
                <!-- Left: Icon + badge -->
                <div class="col-12 col-md-3 d-flex flex-column align-items-center align-items-md-start mb-6 mb-md-0 pe-md-6"
                     style="border-right: 1px solid rgba(114,57,234,0.10);">
                  <div class="dl-ann-icon mb-4" style="background:rgba(114,57,234,0.09); box-shadow:0 6px 20px rgba(114,57,234,0.12);">
                    <i class="ki-outline ki-devices fs-2x" style="color:#7239ea;"></i>
                  </div>
                  <span class="dl-ann-badge" style="background:rgba(114,57,234,0.09); color:#7239ea;">
                    <i class="ki-outline ki-setting-2 fs-7 me-1"></i> Update
                  </span>
                  <div class="dl-ann-date mt-2">July 1, 2026</div>
                </div>

                <!-- Right: Content -->
                <div class="col-12 col-md-9 ps-md-8">
                  <h3 class="fw-bolder text-gray-900 mb-3" style="font-size:1.5rem; line-height:1.25;">
                    Discourse Mobile Beta Launch
                  </h3>
                  <p class="text-gray-600 mb-5" style="font-size:0.96rem; line-height:1.72;">
                    Discourse is coming to your pocket! Participate in our exclusive mobile app beta test on iOS TestFlight and Android Google Play. Get instant notification alerts for tags, replies, and messages — stay connected anywhere.
                  </p>
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                           style="width:28px;height:28px;background:#7239ea;font-size:0.65rem;flex-shrink:0;">D</div>
                      <span class="fw-semibold text-gray-700" style="font-size:0.83rem;">Discourse Dev Team</span>
                      <span class="text-gray-300 mx-1">•</span>
                      <span class="text-muted" style="font-size:0.83rem;">7 days ago</span>
                    </div>
                    <a href="<?php echo htmlspecialchars($base); ?>"
                       class="btn fw-bold px-6 py-2 d-inline-flex align-items-center gap-2"
                       style="background:#7239ea;color:#fff;border-radius:10px;font-size:0.88rem;border:none;transition:all 0.2s;"
                       onmouseover="this.style.background='#5a2dc0';"
                       onmouseout="this.style.background='#7239ea';"
                       onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
                      Read More <i class="ki-outline ki-arrow-right fs-6"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /carousel-inner -->

        <!-- Dot Indicators -->
        <div class="carousel-indicators dl-carousel-indicators">
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="0"
                  class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
        </div>

      </div><!-- /carousel -->

      <!-- Arrow Controls -->
      <button class="dl-carousel-control dl-carousel-control-prev d-none d-sm-inline-flex"
              type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide="prev">
        <i class="ki-outline ki-arrow-left fs-4"></i>
      </button>
      <button class="dl-carousel-control dl-carousel-control-next d-none d-sm-inline-flex"
              type="button" data-bs-target="#dl-announcements-carousel" data-bs-slide="next">
        <i class="ki-outline ki-arrow-right fs-4"></i>
      </button>

    </div><!-- /carousel wrapper -->

    <!-- Mobile "View All" button -->
    <div class="text-center mt-8 d-md-none dl-reveal dl-delay-2">
      <a href="<?php echo htmlspecialchars($base); ?>"
         class="btn fw-bold px-8 py-3"
         style="background:#06AB62;color:#fff;border-radius:12px;border:none;"
         onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
        View All Announcements <i class="ki-outline ki-arrow-right fs-5 ms-1"></i>
      </a>
    </div>

  </div>
</section>
