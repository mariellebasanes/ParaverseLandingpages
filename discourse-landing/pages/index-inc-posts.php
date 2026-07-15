<?php
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<style>
.dl-post-card-carousel {
  min-height: 480px;
}
@media (min-width: 576px) {
  .dl-post-card-carousel {
    min-height: 380px;
  }
}
@media (min-width: 768px) {
  .dl-post-card-carousel {
    min-height: 330px;
  }
}
</style>
<!-- ════════════  POSTS + SIDEBAR (What students are saying)  ════════════ -->
<section id="posts" class="py-20 dc-bg-light" style="position: relative; overflow: hidden;">
  <!-- Ambient background glow blobs -->
  <div class="dl-posts-glow-1" style="position: absolute; top: 10%; left: -150px; width: 550px; height: 550px; background: radial-gradient(circle, rgba(6,171,98, 0.08) 0%, rgba(255, 255, 255, 0) 70%); pointer-events: none; z-index: 0; animation: dl-blob-pulse 24s infinite alternate ease-in-out;"></div>
  <div class="dl-posts-glow-2" style="position: absolute; bottom: 10%; right: -150px; width: 550px; height: 550px; background: radial-gradient(circle, rgba(235,187,7, 0.08) 0%, rgba(255, 255, 255, 0) 70%); pointer-events: none; z-index: 0; animation: dl-blob-pulse-reverse 28s infinite alternate ease-in-out;"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section header -->
    <div class="mb-10">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-messages fs-6"></i>
        Interactive Mock Feed
      </span>
      <h2 class="fw-bolder text-gray-900 mb-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
        What students are saying
      </h2>
    </div>

    <!-- Centered Carousel Layout -->
    <div class="mx-auto position-relative" style="max-width: 860px;">
      
      <div id="dl-posts-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="12000">
        <div class="carousel-inner pb-4">

          <!-- ══ POST 1: CS Department ══ -->
          <div class="carousel-item active">
            <div class="card border-0 shadow-sm bg-white p-6 p-lg-8 rounded-4 mb-0 dl-post-card-carousel" data-dc="post-card">
              <!-- Card Header Row -->
              <div class="d-flex justify-content-between align-items-center mb-6">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge rounded-2 p-0 d-inline-flex align-items-center justify-content-center"
                        style="background:var(--dc-green-tint); color:var(--dc-green-light); width:32px; height:32px; flex-shrink:0;">
                    <i class="ki-outline ki-eye fs-5" style="color:var(--dc-green-light);"></i>
                  </span>
                  <span class="badge rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                        style="font-size:0.72rem; background:var(--dc-green-tint); color:var(--dc-green-light); height:32px;">
                    c/CS Department
                  </span>
                </div>
                <button class="dl-post-report btn btn-link text-muted p-0 d-inline-flex align-items-center gap-1.5 text-decoration-none fw-semibold" style="font-size: 0.82rem;">
                  <i class="ki-outline ki-flag fs-6"></i> Report
                </button>
              </div>

              <!-- Author Info Row -->
              <div class="d-flex align-items-center gap-3 mb-6">
                <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;" alt="Khrysseline Faith R. Tuballa">
                <div>
                  <div class="d-flex align-items-center">
                    <span class="fw-bold text-gray-900 fs-6">Khrysseline Faith R. Tuballa</span>
                    <span class="badge fw-bold ms-2" style="font-size:0.7rem; background:var(--dc-green-tint); color:var(--dc-green-light); border-radius:6px; padding:4px 10px;">Others</span>
                  </div>
                  <div class="text-muted mt-0.5" style="font-size: 0.76rem;">29 days ago</div>
                </div>
              </div>

              <!-- Title -->
              <h2 class="fw-extrabold text-gray-900 mb-4" style="font-size: 1.45rem; line-height: 1.25; letter-spacing: -0.015em;">
                How do you balance difficult major subjects with general education courses?
              </h2>

              <!-- Post content -->
              <p class="text-gray-700 mb-0" style="font-size: 0.95rem; line-height: 1.68;">
                I'm currently taking several major subjects alongside GE courses, and I'm finding it difficult to manage deadlines and study time effectively. For students who have gone through a similar semester, what strategies helped you stay organized and avoid burnout? Any tips on scheduling, note-taking, or prioritizing requirements would be appreciated.
              </p>
            </div>
          </div>

          <!-- ══ POST 2: Freedom Wall (Anonymous) ══ -->
          <div class="carousel-item">
            <div class="card border-0 shadow-sm bg-white p-6 p-lg-8 rounded-4 mb-0 dl-post-card-carousel" data-dc="post-card">
              <!-- Card Header Row -->
              <div class="d-flex justify-content-between align-items-center mb-6">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge rounded-2 p-0 d-inline-flex align-items-center justify-content-center"
                        style="background:rgba(114,57,234,0.09); color:#7239ea; width:32px; height:32px; flex-shrink:0;">
                    <i class="ki-outline ki-eye fs-5" style="color:#7239ea;"></i>
                  </span>
                  <span class="badge rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                        style="font-size:0.72rem; background:rgba(114,57,234,0.09); color:#7239ea; height:32px;">
                    c/Freedom Wall
                  </span>
                </div>
                <button class="dl-post-report btn btn-link text-muted p-0 d-inline-flex align-items-center gap-1.5 text-decoration-none fw-semibold" style="font-size: 0.82rem;">
                  <i class="ki-outline ki-flag fs-6"></i> Report
                </button>
              </div>

              <!-- Author Info Row -->
              <div class="d-flex align-items-center gap-3 mb-6">
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" 
                     style="width: 44px; height: 44px; background: var(--dc-gold-hover); font-size: 0.95rem; flex-shrink:0;">
                  A
                </div>
                <div>
                  <div class="d-flex align-items-center">
                    <span class="fw-bold text-gray-900 fs-6">Anonymous Student</span>
                    <span class="badge fw-bold ms-2" style="font-size:0.7rem; background:rgba(114,57,234,0.09); color:#7239ea; border-radius:6px; padding:4px 10px;">Freedom Wall</span>
                  </div>
                  <div class="text-muted mt-0.5" style="font-size: 0.76rem;">2 days ago</div>
                </div>
              </div>

              <!-- Title -->
              <h2 class="fw-extrabold text-gray-900 mb-4" style="font-size: 1.45rem; line-height: 1.25; letter-spacing: -0.015em;">
                Is it really 100% anonymous when posting on the Freedom Wall?
              </h2>

              <!-- Post content -->
              <p class="text-gray-700 mb-0" style="font-size: 0.95rem; line-height: 1.68;">
                I want to share some honest feedback about the enrollment process but I'm worried it might get linked back to my account. Has anyone here posted anonymously before? Does it show any hints of our identity to admins or is it completely hidden?
              </p>
            </div>
          </div>

          <!-- ══ POST 3: FEU TECH DEV (Gabriel Santos) ══ -->
          <div class="carousel-item">
            <div class="card border-0 shadow-sm bg-white p-6 p-lg-8 rounded-4 mb-0 dl-post-card-carousel" data-dc="post-card">
              <!-- Card Header Row -->
              <div class="d-flex justify-content-between align-items-center mb-6">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge rounded-2 p-0 d-inline-flex align-items-center justify-content-center"
                        style="background:rgba(235,187,7,0.12); color:var(--dc-gold-hover); width:32px; height:32px; flex-shrink:0;">
                    <i class="ki-outline ki-eye fs-5" style="color:var(--dc-gold-hover);"></i>
                  </span>
                  <span class="badge rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                        style="font-size:0.72rem; background:rgba(235,187,7,0.12); color:var(--dc-gold-hover); height:32px;">
                    c/FEU TECH DEV
                  </span>
                </div>
                <button class="dl-post-report btn btn-link text-muted p-0 d-inline-flex align-items-center gap-1.5 text-decoration-none fw-semibold" style="font-size: 0.82rem;">
                  <i class="ki-outline ki-flag fs-6"></i> Report
                </button>
              </div>

              <!-- Author Info Row -->
              <div class="d-flex align-items-center gap-3 mb-6">
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" 
                     style="width: 44px; height: 44px; background: var(--dc-green-light); font-size: 0.95rem; flex-shrink:0;">
                  GS
                </div>
                <div>
                  <div class="d-flex align-items-center">
                    <span class="fw-bold text-gray-900 fs-6">Gabriel Santos</span>
                    <span class="badge fw-bold ms-2" style="font-size:0.7rem; background:var(--dc-green-tint); color:var(--dc-green-light); border-radius:6px; padding:4px 10px;">Tech</span>
                  </div>
                  <div class="text-muted mt-0.5" style="font-size: 0.76rem;">5 days ago</div>
                </div>
              </div>

              <!-- Title -->
              <h2 class="fw-extrabold text-gray-900 mb-4" style="font-size: 1.45rem; line-height: 1.25; letter-spacing: -0.015em;">
                Looking for Capstone groupmates (web/mobile app development)
              </h2>

              <!-- Post content -->
              <p class="text-gray-700 mb-0" style="font-size: 0.95rem; line-height: 1.68;">
                Hey guys! We are looking for one more developer to join our Capstone team. We plan to build a student productivity app using React Native and Firebase. If you have some experience in JS/TS and want to collaborate, hit me up!
              </p>
            </div>
          </div>

        </div><!-- /carousel-inner -->

        <!-- Dot Indicators -->
        <div class="carousel-indicators dl-carousel-indicators position-relative mt-6 mb-0">
          <button type="button" data-bs-target="#dl-posts-carousel" data-bs-slide-to="0"
                  class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#dl-posts-carousel" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#dl-posts-carousel" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
        </div>

      </div><!-- /carousel -->

      <!-- Arrow Controls -->
      <button class="dl-carousel-control dl-carousel-control-prev d-none d-sm-inline-flex"
              type="button" data-bs-target="#dl-posts-carousel" data-bs-slide="prev"
              style="left: -60px;">
        <i class="ki-outline ki-arrow-left fs-4"></i>
      </button>
      <button class="dl-carousel-control dl-carousel-control-next d-none d-sm-inline-flex"
              type="button" data-bs-target="#dl-posts-carousel" data-bs-slide="next"
              style="right: -60px;">
        <i class="ki-outline ki-arrow-right fs-4"></i>
      </button>
    </div><!-- /centered wrapper -->
  </div><!-- /container-xxl -->
</section><!-- /posts -->
