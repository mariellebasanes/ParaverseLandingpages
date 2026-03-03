<section id="hero" class="icare-bg-hero icare-min-h-hero position-relative overflow-hidden pt-10 pt-lg-15 pb-12 pb-lg-20">
  <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden opacity-30 hero-blur-wrap">
    <div class="position-absolute rounded-circle bg-icare-yellow opacity-25 hero-blur-circle hero-blur-yellow"></div>
    <div class="position-absolute rounded-circle bg-white opacity-10 hero-blur-circle hero-blur-white"></div>
  </div>
  <div class="app-container container-xxl position-relative py-12 py-lg-20">
    <div class="row align-items-center g-8">
      <div class="col-lg-6 order-2 order-lg-1 text-white">
        <div class="icare-badge mb-6 d-inline-flex align-items-center gap-2 shadow-sm rounded-pill px-4 py-2 border-0 bg-white bg-opacity-10 backdrop-blur">
          <span class="d-none d-sm-inline fs-4">🎓</span>
          <span class="text-white fw-bold tracking-wide text-uppercase fs-8">Academic Support Center</span>
          <span class="d-none d-sm-inline fs-4">🎓</span>
        </div>
        <h1 class="display-3 display-lg-1 fw-bolder mb-6 lh-sm text-shadow-sm">
          Empowering Your <br class="d-none d-lg-inline">
          <span class="text-icare-yellow position-relative z-index-1">Academic Journey</span>
        </h1>
        <p class="fs-4 fs-lg-3 text-white opacity-90 mb-8 max-w-lg fw-medium lh-lg">
          Striving for excellence in your coursework? Need comprehensive resources for your next major examination? 
          <strong class="text-icare-yellow fw-bolder">iCare</strong> provides integrated academic support, rigorous peer tutoring, and structured study environments at FEU Tech.
        </p>
        <div class="row g-3 g-sm-5 mb-8">
          <div class="col-4 text-center">
            <div class="rounded-4 p-4 p-sm-5 border border-white border-opacity-25 bg-white bg-opacity-10 icare-card-hover shadow-sm hover-elevate-up transition-all h-100 d-flex flex-column justify-content-center">
              <i class="ki-outline ki-book fs-3x mb-3 text-white"></i>
              <span class="small fw-bold tracking-wide">Peer Tutoring</span>
            </div>
          </div>
          <div class="col-4 text-center">
            <div class="rounded-4 p-4 p-sm-5 border border-white border-opacity-25 bg-white bg-opacity-10 icare-card-hover shadow-sm hover-elevate-up transition-all h-100 d-flex flex-column justify-content-center">
              <i class="ki-outline ki-people fs-3x mb-3 text-white"></i>
              <span class="small fw-bold tracking-wide">Study Groups</span>
            </div>
          </div>
          <div class="col-4 text-center">
            <div class="rounded-4 p-4 p-sm-5 border border-white border-opacity-25 bg-white bg-opacity-10 icare-card-hover shadow-sm hover-elevate-up transition-all h-100 d-flex flex-column justify-content-center">
              <i class="ki-outline ki-medal-star fs-3x mb-3 text-white"></i>
              <span class="small fw-bold tracking-wide">Exam Strategy</span>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row flex-wrap gap-4 mt-4">
          <a href="#services" class="btn btn-lg btn-warning fw-bolder px-8 py-4 rounded-pill shadow-sm hover-elevate-up d-inline-flex align-items-center justify-content-center gap-2 fs-5 text-dark" style="background-color: var(--icare-yellow); border-color: var(--icare-yellow);">
            Explore Services
          </a>
          <a href="https://www.feutech.edu.ph/campus_life/gcu" target="_blank" rel="noopener" class="btn btn-lg btn-outline btn-outline-white fw-bolder px-8 py-4 rounded-pill hover-elevate-up d-inline-flex align-items-center justify-content-center fs-5 text-white border-2 border-white border-opacity-50 hover-bg-white hover-text-success">
            Tell Me More
          </a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 position-relative mb-10 mb-lg-0">
        <div class="position-relative rounded-4 overflow-visible border border-0 bg-white bg-opacity-10 p-4 p-lg-8 shadow-lg hover-elevate-up transition-all" style="backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);">
          <div class="position-absolute top-0 start-0 w-100 h-100 border border-4 border-white border-opacity-25 rounded-4 z-index-n1"></div>
          <img src="<?php echo isset($ICARE_BASE) ? htmlspecialchars($ICARE_BASE) : ''; ?>/assets/img/tutor.jpg" alt="iCare - Tutoring and study support" class="w-100 object-fit-cover rounded-3 shadow-sm h-300px h-lg-400px">
          
          <!-- Floating Badges -->
          <div class="position-absolute top-0 start-100 translate-middle-x mt-8 hero-badge-no-cost text-dark px-4 py-3 rounded-pill shadow-lg border border-2 border-white bg-warning d-flex align-items-center gap-2 hover-elevate-up transition-all z-index-2 cursor-pointer" style="background-color: var(--icare-yellow) !important; transform: rotate(8deg);">
            <i class="ki-outline ki-shield-tick fs-2"></i>
            <span class="fw-bolder fs-6 tracking-wide text-uppercase">University Approved</span>
          </div>
          
          <div class="position-absolute bottom-0 start-0 translate-middle-y ms-n8 mb-10 hero-badge-welcome px-4 py-3 rounded-pill shadow-lg border border-2 border-success bg-white d-flex align-items-center gap-3 hover-elevate-up transition-all z-index-2 cursor-pointer" style="transform: rotate(-4deg); border-color: var(--icare-green) !important;">
            <div class="bg-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="background-color: var(--icare-green) !important;">
               <i class="ki-outline ki-verify fs-4 text-white"></i>
            </div>
            <span class="fw-bolder text-dark fs-6 tracking-wide text-uppercase">Fully Funded & Free</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
