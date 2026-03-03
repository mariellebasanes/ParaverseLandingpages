<?php
$BASE = isset($ICARE_BASE) ? $ICARE_BASE : '/Icare/Icare';
?>
<section id="events"
    class="py-15 py-lg-20 position-relative overflow-hidden bg-white bg-glow-green bg-geometric bg-geometric-light bg-events-icons section-angle-bottom">
    <!-- Blob Backgrounds -->
    <div class="blur-blob blur-blob-yellow" style="width: 350px; height: 350px; top: 10%; right: 5%;"></div>
    <div class="blur-blob blur-blob-green" style="width: 450px; height: 450px; bottom: -10%; left: 10%;"></div>

    <div class="app-container container-xxl">

        <!-- Section Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-12 mb-lg-16 gap-6">
            <div class="icare-max-w-lg">
                <span class="badge rounded-pill px-4 py-2 fs-7 fw-bolder text-uppercase tracking-wider shadow-sm mb-6"
                    style="background-color: var(--icare-green); color: white;">
                    <i class="ki-outline ki-calendar-8 fs-5 me-2 text-white"></i> Academic Events
                </span>
                <h2 class="display-5 fw-bolder text-dark mb-4 lh-sm">
                    Upcoming <span class="position-relative d-inline-block">
                        <span class="position-relative z-index-1" style="color: var(--icare-green);">Sessions &
                            Workshops</span>
                        <span class="position-absolute bottom-0 start-0 w-100 h-8px opacity-25 translate-middle-y"
                            style="background-color: var(--icare-yellow);"></span>
                    </span>
                </h2>
                <p class="fs-4 text-muted fw-medium lh-lg mb-0">
                    Engage in our upcoming workshops, review sessions, and academic seminars designed to enhance your
                    learning experience.
                </p>
            </div>
            <div>
                <a href="#"
                    class="btn btn-outline btn-outline-dashed btn-outline-default text-white border-white border-opacity-50 border-hover-white text-hover-dark bg-hover-white fw-bolder px-8 py-3 rounded-pill d-inline-flex align-items-center gap-2">
                    View All Events <i class="ki-outline ki-arrow-right fs-4"></i>
                </a>
            </div>
        </div>

        <!-- Events Grid -->
        <div class="row g-6 g-lg-10">

            <!-- Event 1 -->
            <div class="col-md-6 col-lg-4">
                <div
                    class="card h-100 border-0 shadow-sm hover-elevate-up transition-all rounded-4 overflow-hidden bg-white">
                    <!-- Header Image Placeholder -->
                    <div class="w-100 d-flex align-items-center justify-content-center"
                        style="height: 200px; background: linear-gradient(135deg, rgba(15, 137, 72, 0.15), rgba(253, 188, 23, 0.15));">
                        <i class="ki-outline ki-picture text-muted fs-2hx opacity-50"></i>
                    </div>

                    <div class="card-body p-6 p-lg-8 d-flex flex-column">
                        <!-- Badge -->
                        <span class="badge px-3 py-2 fs-8 fw-bolder text-uppercase tracking-wider mb-4 align-self-start"
                            style="background-color: rgba(15, 137, 72, 0.1); color: var(--icare-green);">UPCOMING
                            WORKSHOP</span>

                        <!-- Title -->
                        <a href="#" class="fs-4 fw-bolder text-dark text-hover-success lh-base mb-6 d-block">
                            Advanced Data Structures Workshop
                        </a>

                        <!-- Details List -->
                        <div class="d-flex flex-column gap-3 mt-auto">
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-calendar text-gray-500 fs-4 me-3"></i>
                                Tue • October 15, 2024 • 02:00 PM
                            </div>
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-geolocation text-gray-500 fs-4 me-3"></i>
                                FEU Tech Building, Room 502
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-md-6 col-lg-4">
                <div
                    class="card h-100 border-0 shadow-sm hover-elevate-up transition-all rounded-4 overflow-hidden bg-white">
                    <!-- Header Image Placeholder -->
                    <div class="w-100 d-flex align-items-center justify-content-center"
                        style="height: 200px; background: linear-gradient(135deg, rgba(253, 188, 23, 0.15), rgba(15, 137, 72, 0.15));">
                        <i class="ki-outline ki-picture text-muted fs-2hx opacity-50"></i>
                    </div>

                    <div class="card-body p-6 p-lg-8 d-flex flex-column">
                        <!-- Badge -->
                        <span class="badge px-3 py-2 fs-8 fw-bolder text-uppercase tracking-wider mb-4 align-self-start"
                            style="background-color: rgba(253, 188, 23, 0.1); color: var(--icare-yellow);">REVIEW
                            SESSION</span>

                        <!-- Title -->
                        <a href="#" class="fs-4 fw-bolder text-dark text-hover-warning lh-base mb-6 d-block">
                            Midterm Examination Review: Calculus 2
                        </a>

                        <!-- Details List -->
                        <div class="d-flex flex-column gap-3 mt-auto">
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-calendar text-gray-500 fs-4 me-3"></i>
                                Tue • October 22, 2024 • 10:00 AM
                            </div>
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-geolocation text-gray-500 fs-4 me-3"></i>
                                Virtual Session (Zoom)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="col-md-6 col-lg-4">
                <div
                    class="card h-100 border-0 shadow-sm hover-elevate-up transition-all rounded-4 overflow-hidden bg-white">
                    <!-- Header Image Placeholder -->
                    <div class="w-100 d-flex align-items-center justify-content-center"
                        style="height: 200px; background: linear-gradient(135deg, rgba(80, 205, 137, 0.15), rgba(15, 137, 72, 0.15));">
                        <i class="ki-outline ki-picture text-muted fs-2hx opacity-50"></i>
                    </div>

                    <div class="card-body p-6 p-lg-8 d-flex flex-column">
                        <!-- Badge -->
                        <span class="badge px-3 py-2 fs-8 fw-bolder text-uppercase tracking-wider mb-4 align-self-start"
                            style="background-color: rgba(80, 205, 137, 0.1); color: #50cd89;">SEMINAR</span>

                        <!-- Title -->
                        <a href="#" class="fs-4 fw-bolder text-dark text-hover-success lh-base mb-6 d-block">
                            Industry Best Practices in Web Dev
                        </a>

                        <!-- Details List -->
                        <div class="d-flex flex-column gap-3 mt-auto">
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-calendar text-gray-500 fs-4 me-3"></i>
                                Tue • November 05, 2024 • 01:00 PM
                            </div>
                            <div class="d-flex align-items-center text-muted fs-7 fw-bold">
                                <i class="ki-outline ki-geolocation text-gray-500 fs-4 me-3"></i>
                                Auditorium, 8th Floor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>