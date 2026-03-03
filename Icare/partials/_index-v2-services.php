<?php
$BASE = isset($ICARE_BASE) ? $ICARE_BASE : '/Icare/Icare';
?>
<section id="services-v2"
    class="py-15 py-lg-20 position-relative overflow-hidden bg-white bg-glow-yellow bg-geometric bg-geometric-light bg-services-icons section-angle-bottom">
    <!-- Blob Backgrounds -->
    <div class="blur-blob blur-blob-green" style="width: 350px; height: 350px; top: 20%; right: -5%;"></div>
    <div class="blur-blob blur-blob-yellow" style="width: 400px; height: 400px; bottom: 10%; left: -10%;"></div>

    <!-- Decorative background elements -->
    <div class="position-absolute top-0 start-0 mt-10 ms-10 opacity-25">
        <div class="w-150px h-150px border border-2 border-white rounded-circle"></div>
    </div>
    <div class="position-absolute top-50 end-0 me-10 opacity-25">
        <div class="w-100px h-100px border border-2 border-white rounded-3" style="transform: rotate(45deg);"></div>
    </div>

    <div class="app-container container-xxl position-relative z-index-1 text-center">
        <!-- Header -->
        <div class="mb-12">
            <span class="badge rounded-pill px-6 py-3 fs-6 fw-bolder text-white tracking-wider shadow-sm mb-6"
                style="background-color: var(--icare-green);">
                SERVICES
            </span>
            <h2 class="display-4 fw-bolder text-dark mb-6 lh-sm">
                Choose Your <span style="color: var(--icare-green);">Study Adventure!</span>
            </h2>
            <p class="fs-4 text-muted fw-medium lh-lg mx-auto mb-10" style="max-width: 800px;">
                Not sure where to start? No worries! Check out these awesome (and FREE!) ways we can help you level up
                👾
            </p>
        </div>

        <!-- Simplified Services Layout -->
        <div class="row g-12 align-items-center text-start">

            <!-- Left Column: Image -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <!-- Decorative background block -->
                    <div class="position-absolute top-10 start-10 bg-light-success rounded-4 w-100 h-100"
                        style="z-index: 0; transform: translate(-15px, -15px);"></div>
                    <img src="<?php echo htmlspecialchars($BASE); ?>/assets/img/home-education.jfif"
                        class="img-fluid rounded-4 position-relative shadow-sm"
                        style="z-index: 1; object-fit: cover; min-height: 400px; width: 100%;" alt="Study Services">
                </div>
            </div>

            <!-- Right Column: Services List -->
            <div class="col-lg-6 ps-lg-15">
                <h3 class="display-6 fw-bolder text-dark mb-8">What We Offer</h3>

                <div class="d-flex flex-column gap-8">
                    <!-- Service Item 1 -->
                    <div class="d-flex align-items-start gap-5">
                        <div
                            class="symbol symbol-50px symbol-circle bg-light-success d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ki-outline ki-book-square fs-2 text-success"></i>
                        </div>
                        <div>
                            <h4 class="fs-4 fw-bolder text-dark mb-2">Review Classes 📚</h4>
                            <p class="fs-6 text-muted mb-0 lh-lg">
                                Group study sessions where we break down confusing topics into bite-sized pieces. Bring
                                your questions and snacks!
                            </p>
                        </div>
                    </div>

                    <!-- Service Item 2 -->
                    <div class="d-flex align-items-start gap-5">
                        <div
                            class="symbol symbol-50px symbol-circle bg-light-warning d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ki-outline ki-profile-user fs-2 text-warning"></i>
                        </div>
                        <div>
                            <h4 class="fs-4 fw-bolder text-dark mb-2">One-on-One Help 🎯</h4>
                            <p class="fs-6 text-muted mb-0 lh-lg">
                                Personal tutoring sessions tailored perfectly for you. Whether you're feeling lost or
                                just want to get ahead.
                            </p>
                        </div>
                    </div>

                    <!-- Service Item 3 -->
                    <div class="d-flex align-items-start gap-5">
                        <div
                            class="symbol symbol-50px symbol-circle bg-light-primary d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ki-outline ki-rocket fs-2 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="fs-4 fw-bolder text-dark mb-2">Skill Boosters 💡</h4>
                            <p class="fs-6 text-muted mb-0 lh-lg">
                                Cool workshops and hands-on sessions to teach you pro tips like speed reading and
                                note-taking hacks!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>