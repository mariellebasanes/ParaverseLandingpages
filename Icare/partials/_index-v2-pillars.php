<?php
$BASE = isset($ICARE_BASE) ? $ICARE_BASE : '/Icare/Icare';
?>
<section id="pillars" class="py-15 py-lg-20 position-relative bg-geometric bg-geometric-dark bg-shape-1 section-angle-bottom" style="background-color: var(--icare-green);">
  <div class="app-container container-xxl">
    <!-- Section Header -->
    <div class="row justify-content-center mb-12 mb-lg-16">
        <div class="col-lg-8 text-center pe-lg-10">
            <span class="badge rounded-pill px-4 py-2 fs-7 fw-bolder text-uppercase tracking-wider shadow-sm mb-6 bg-white bg-opacity-10 border border-white border-opacity-25" style="color: var(--icare-yellow);">
                <i class="ki-outline ki-abstract-26 fs-5 me-2" style="color: var(--icare-yellow);"></i> Core Pedagogy
            </span>
            <h2 class="display-4 fw-bolder text-white mb-6 lh-sm">
                Pillars of <span class="position-relative d-inline-block">
                    <span class="position-relative z-index-1" style="color: var(--icare-yellow);">Academic Support</span>
                    <span class="position-absolute bottom-0 start-0 w-100 h-8px opacity-25 translate-middle-y bg-white"></span>
                </span>
            </h2>
            <p class="fs-4 text-white opacity-90 fw-medium lh-lg mx-auto icare-max-w-md">
                We provide a multifaceted approach to learning, combining individualized instruction with collaborative group dynamics and advanced pedagogical methodologies.
            </p>
        </div>
    </div>

    <!-- Pillars Grid -->
    <div class="row g-8 g-lg-10">
        
        <!-- Pillar 1: Individual Mentorship -->
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-elevate-up transition-all overflow-hidden rounded-4 bg-white">
                <div class="h-250px position-relative overflow-hidden w-100 p-8 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, rgba(0, 145, 71, 0.05) 0%, rgba(0, 145, 71, 0.15) 100%);">
                    <img src="<?php echo htmlspecialchars($BASE); ?>/assets/img/logo/icon-gco-connect.svg" class="h-100px w-100px position-relative z-index-1 hover-scale transition-all" alt="Individual Mentorship">
                    <div class="position-absolute top-0 end-0 m-6 w-50px h-50px bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                        <span class="fs-3 fw-bolder" style="color: var(--icare-green);">01</span>
                    </div>
                </div>
                <div class="card-body p-8 p-lg-10 d-flex flex-column">
                    <h3 class="fs-2 fw-bolder text-dark mb-4">Individual Mentorship</h3>
                    <p class="fs-5 text-gray-600 mb-8 lh-lg flex-grow-1">
                        One-on-one academic consultation sessions tailored to diagnose specific areas of academic difficulty and develop personalized learning strategies.
                    </p>
                    <ul class="list-unstyled mb-8 d-flex flex-column gap-3">
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Personalized instruction</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Curriculum pacing alignment</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Objective goal setting</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-success fw-bolder px-6 py-3 rounded-pill mt-auto">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Pillar 2: Collaborative Review -->
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-elevate-up transition-all overflow-hidden rounded-4 mt-lg-n10 position-relative z-index-2 bg-white">
                <div class="h-250px position-relative overflow-hidden w-100 p-8 d-flex align-items-center justify-content-center border-bottom border-gray-100" style="background: linear-gradient(135deg, rgba(253, 188, 23, 0.05) 0%, rgba(253, 188, 23, 0.15) 100%);">
                    <img src="<?php echo htmlspecialchars($BASE); ?>/assets/img/logo/icon-curriculum.svg" class="h-100px w-100px position-relative z-index-1 hover-scale transition-all" alt="Collaborative Cohorts">
                    <div class="position-absolute top-0 end-0 m-6 w-50px h-50px bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                        <span class="fs-3 fw-bolder" style="color: var(--icare-yellow);">02</span>
                    </div>
                </div>
                <div class="card-body p-8 p-lg-10 d-flex flex-column">
                    <h3 class="fs-2 fw-bolder text-dark mb-4">Collaborative Cohorts</h3>
                    <p class="fs-5 text-gray-600 mb-8 lh-lg flex-grow-1">
                        Structured group study sessions led by advanced peer mentors, focusing on breaking down complex syllabi and comprehensive examination preparation.
                    </p>
                    <ul class="list-unstyled mb-8 d-flex flex-column gap-3">
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3 text-warning" style="color: var(--icare-yellow) !important;"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Comprehensive review blocks</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3 text-warning" style="color: var(--icare-yellow) !important;"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Peer-to-peer networking</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3 text-warning" style="color: var(--icare-yellow) !important;"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Intensive exam preparation</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-warning fw-bolder px-6 py-3 rounded-pill mt-auto mt-auto text-dark" style="background-color: var(--icare-yellow);">View Schedule</a>
                </div>
            </div>
        </div>

        <!-- Pillar 3: Methodology Workshops -->
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-elevate-up transition-all overflow-hidden rounded-4 bg-white">
                <div class="h-250px position-relative overflow-hidden w-100 p-8 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, rgba(253, 188, 23, 0.05) 0%, rgba(253, 188, 23, 0.15) 100%);">
                    <img src="<?php echo htmlspecialchars($BASE); ?>/assets/img/logo/icon-leaderboard.svg" class="h-100px w-100px position-relative z-index-1 hover-scale transition-all" alt="Methodology Workshops">
                    <div class="position-absolute top-0 end-0 m-6 w-50px h-50px bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                        <span class="fs-3 fw-bolder" style="color: var(--icare-green);">03</span>
                    </div>
                </div>
                <div class="card-body p-8 p-lg-10 d-flex flex-column">
                    <h3 class="fs-2 fw-bolder text-dark mb-4">Methodology Workshops</h3>
                    <p class="fs-5 text-gray-600 mb-8 lh-lg flex-grow-1">
                        Extracurricular seminars designed to impart advanced learning techniques, scholarly research skills, and time optimization strategies.
                    </p>
                    <ul class="list-unstyled mb-8 d-flex flex-column gap-3">
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Cognitive skill development</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Research methodologies</span>
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <i class="ki-outline ki-check-circle fs-3" style="color: var(--icare-green);"></i>
                            <span class="fs-5 text-gray-700 fw-medium">Time management protocols</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-success fw-bolder px-6 py-3 rounded-pill mt-auto">Explore Topics</a>
                </div>
            </div>
        </div>

    </div>
  </div>
</section>
