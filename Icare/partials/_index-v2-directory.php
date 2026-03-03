<?php
$BASE = isset($ICARE_BASE) ? $ICARE_BASE : '/Icare/Icare';
?>
<section id="directory"
    class="py-15 py-lg-20 position-relative bg-geometric bg-geometric-dark bg-shape-1 section-angle-bottom"
    style="background-color: var(--icare-green);">
    <div class="app-container container-xxl">

        <!-- Section Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-12 mb-lg-16 gap-6">
            <div class="icare-max-w-lg">
                <span class="badge rounded-pill px-4 py-2 fs-7 fw-bolder text-uppercase tracking-wider shadow-sm mb-6"
                    style="background-color: rgba(253, 188, 23, 0.1); color: var(--icare-yellow);">
                    <i class="ki-outline ki-profile-user fs-5 me-2" style="color: var(--icare-yellow);"></i> Mentorship
                    Directory
                </span>
                <h2 class="display-5 fw-bolder text-white mb-4 lh-sm">
                    Distinguished <span class="position-relative d-inline-block">
                        <span class="position-relative z-index-1" style="color: var(--icare-yellow);">Faculty &
                            Mentors</span>
                        <span class="position-absolute bottom-0 start-0 w-100 h-8px opacity-25 translate-middle-y"
                            style="background-color: var(--icare-yellow);"></span>
                    </span>
                </h2>
                <p class="fs-4 text-white opacity-90 fw-medium lh-lg mb-0">
                    Our pedagogical team comprises accomplished faculty members alongside rigorously vetted peer mentors
                    who have demonstrated exceptional academic proficiency.
                </p>
            </div>
            <div>
                <a href="#"
                    class="btn btn-outline btn-outline-dashed btn-outline-success fw-bolder px-8 py-3 rounded-pill d-inline-flex align-items-center gap-2"
                    style="color: var(--icare-green); border-color: var(--icare-green);">
                    View Full Directory <i class="ki-outline ki-arrow-right fs-4"></i>
                </a>
            </div>
        </div>

        <!-- Mentor Carousel -->
        <div id="kt_mentors_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel"
            data-bs-interval="8000">
            <!-- Carousel Indicators -->
            <div class="d-flex align-items-center justify-content-center mb-8">
                <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                    <li data-bs-target="#kt_mentors_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
                    <li data-bs-target="#kt_mentors_carousel" data-bs-slide-to="1" class="ms-1"></li>
                </ol>
            </div>

            <div class="carousel-inner pt-2 pb-10">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-6 g-lg-10">
                        <!-- Faculty 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Program
                                        Director</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 1</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous1@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Mathematics</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Physics</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Statistics</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Faculty 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Lead
                                        Academic Tutor</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 2</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous2@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Computer
                                                Science</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Programming</span>
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Data
                                                Structures</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Faculty 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Academic
                                        Coordinator</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 3</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous3@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Database
                                                Systems</span>
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Information
                                                Systems</span>
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Web
                                                Dev</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-6 g-lg-10">
                        <!-- Faculty 4 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Senior
                                        Reviewer</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 4</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous4@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Electronics</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Circuits</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Faculty 5 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Review
                                        Specialist</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 5</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous5@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Operations</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Management</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Faculty 6 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm hover-elevate-up rounded-4 bg-white"
                                style="transition: all 0.3s ease; overflow: hidden;">
                                <div class="w-100 position-relative"
                                    style="height: 250px; background: linear-gradient(135deg, var(--icare-green), #045234);">
                                    <!-- Decorative pattern overlay -->
                                    <div class="position-absolute w-100 h-100 opacity-25"
                                        style="background-image: radial-gradient(var(--icare-yellow) 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center position-absolute top-0 start-0 z-index-1">
                                        <i class="ki-outline ki-profile-user text-white opacity-50"
                                            style="font-size: 5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-body p-6 p-lg-8 d-flex flex-column text-start">
                                    <span
                                        class="badge px-2 py-1 fs-9 fw-bolder text-uppercase tracking-wider mb-2 align-self-start"
                                        style="background-color: rgba(3, 110, 69, 0.1); color: var(--icare-green);">Academic
                                        Guide</span>
                                    <h3 class="fs-4 fw-bolder text-dark mb-1">Anonymous Mentor 6</h3>
                                    <div class="text-gray-600 fs-7 mb-4">anonymous6@email.com</div>

                                    <hr class="text-gray-200 my-0 mb-4">

                                    <div>
                                        <h4 class="fs-8 fw-bolder text-dark text-uppercase tracking-wider mb-2">Assigned
                                            Programs</h4>
                                        <div class="d-flex flex-wrap gap-2 mb-0">
                                            <span class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">IT
                                                Infrastructure</span>
                                            <span
                                                class="badge badge-light text-dark px-2 py-1 fs-8 fw-bold">Networking</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 p-6 p-lg-8 pt-0 bg-transparent">
                                    <a href="#" class="btn w-100 py-3 fw-bold fs-6 text-dark hover-elevate-up"
                                        style="background-color: var(--icare-yellow);">
                                        <i class="ki-outline ki-calendar fs-4 me-2 text-dark"></i> Get in Touch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>