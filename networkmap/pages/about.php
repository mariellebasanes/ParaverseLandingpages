<?php if (!defined('MBG')) exit; ?>
<section class="section-padding position-relative overflow-hidden min-vh-100 d-flex flex-column justify-content-center" id="about" style="background: linear-gradient(135deg, #f8faff 0%, #eef2ff 100%);">
  <!-- Advanced Decorative System -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden" style="z-index: 0; pointer-events: none;">
    <!-- Tech Grid Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
      style="opacity: 0.03; background-image: radial-gradient(var(--bs-primary) 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <!-- Large animated blobs -->
    <div class="position-absolute bg-primary rounded-circle blur-3 justify-content-center align-items-center animate-float"
      style="width: 35vw; height: 35vw; top: -10vw; left: -10vw; opacity: 0.08; filter: blur(80px); mix-blend-mode: multiply;">
    </div>
    <div class="position-absolute bg-info rounded-circle animate-float"
      style="width: 25vw; height: 25vw; bottom: -5vw; right: -5vw; opacity: 0.06; filter: blur(60px); animation-delay: -2s;">
    </div>
    
    <!-- Floating geometric accents -->
    <div class="position-absolute rounded-circle border border-primary border-opacity-10 animate-bouncy-float" 
      style="width: 120px; height: 120px; top: 15%; right: 10%; --rot: 15deg;"></div>
    <div class="position-absolute rounded-circle border border-info border-opacity-10 animate-bouncy-float" 
      style="width: 80px; height: 80px; bottom: 20%; left: 15%; --rot: -10deg; animation-delay: -3s;"></div>
    
    <!-- Data Points (Glowy Sparks) -->
    <div class="position-absolute bg-primary rounded-circle shadow-sm animate-pulse" 
      style="width: 8px; height: 8px; top: 30%; left: 35%; opacity: 0.4; box-shadow: 0 0 15px var(--bs-primary);"></div>
    <div class="position-absolute bg-info rounded-circle shadow-sm animate-pulse" 
      style="width: 6px; height: 6px; bottom: 40%; right: 40%; opacity: 0.3; animation-delay: -1.5s; box-shadow: 0 0 10px var(--bs-info);"></div>
    
    <!-- Micro-particles -->
    <div class="particle" style="top: 20%; left: 40%; width: 4px; height: 4px; background: var(--bs-primary); opacity: 0.3;"></div>
    <div class="particle" style="top: 60%; right: 30%; width: 6px; height: 6px; background: var(--bs-info); opacity: 0.2;"></div>
    <div class="particle" style="top: 40%; left: 10%; width: 8px; height: 8px; background: var(--bs-primary); opacity: 0.15; animation-delay: -5s;"></div>

    <!-- Extra soft blobs -->
    <div class="position-absolute bg-purple rounded-circle blur-3"
      style="width: 20vw; height: 20vw; top: 20%; right: 20%; opacity: 0.04; filter: blur(50px); pointer-events: none;">
    </div>
  </div>

  <div class="container-xxl position-relative" style="z-index: 1;">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-15 mb-lg-0 z-index-2 pe-lg-15">
        <div class="mb-8 position-relative">
            <!-- Decorative line accent -->
            <div class="position-absolute start-0 top-0 h-100 w-4px bg-primary rounded-pill opacity-10 ms-n8 d-none d-lg-block"></div>
            
            <div class="d-inline-flex align-items-center py-2 px-5 bg-white bg-opacity-80 backdrop-blur rounded-pill mb-6 text-uppercase fw-bold border border-primary border-opacity-10 shadow-sm" style="font-size: 11px; color: #4E7FF7; letter-spacing: 2.5px;">
              <i class="ki-duotone ki-chart-line-star fs-5 me-2" style="color: #4E7FF7;"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
              Intelligent Mapping
            </div>
            <h2 class="display-5 mb-8 text-dark fw-bolder">Visualize Your <br><span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #4E7FF7 0%, #1c57cc 100%);">Curriculum Path</span></h2>
        </div>
        <p class="mb-12 fs-5 text-gray-600 lh-lg">
          Experience the future of academic planning. Our interactive nodes visualize course dependencies, prerequisites, and your unique journey toward graduation.
        </p>
        <div class="d-flex align-items-center gap-6">
            <a href="#how-it-works" class="btn btn-nm-primary shadow-lg px-12 py-5 rounded-pill text-white transition-all hover-elevate-up">Explore Mapping</a>
            <a href="#" class="text-primary fw-bold fs-7 text-decoration-none border-bottom border-primary border-opacity-20 pb-1 hover-translate-x-5 transition-all d-flex align-items-center gap-2">
              Learn More <i class="ki-duotone ki-arrow-right fs-5"></i>
            </a>
        </div>
      </div>
      <div class="col-lg-7">
        <style>
          .backdrop-blur { backdrop-filter: blur(8px); }
          .hover-translate-x-5:hover { transform: translateX(5px); }
          .responsive-network-scale {
            transform: scale(1);
            transform-origin: center center;
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 0;
            box-shadow: none;
            backdrop-filter: none;
            transition: all 0.5s ease;
          }
          .responsive-network-scale:hover {
            transform: scale(1.02);
          }
          @media (min-width: 576px) {
            .responsive-network-scale {
              transform: scale(1);
              transform-origin: center center;
            }
          }
          @media (min-width: 992px) {
            .responsive-network-scale {
              transform: scale(1.15);
              transform-origin: center center;
            }
          }
        </style>
        <div class="position-relative">
          <div class="horizontal-network-wrapper responsive-network-scale mx-auto mt-5 mt-lg-0" style="height: 380px; width: 620px; min-width: 620px; margin: 60px auto;">
            <!-- SVG Lines -->
            <svg class="horizontal-network-svg" width="100%" height="100%" style="position:absolute; top:0; left:0; z-index:0;">
              <!-- Col 1 to Col 2 -->
              <path d="M 120,60 C 180,60 180,60 250,60" class="horizontal-net-line line-1" />
              <path d="M 120,60 C 180,60 180,180 250,180" class="horizontal-net-line line-2" />
              <path d="M 120,180 C 180,180 180,180 250,180" class="horizontal-net-line line-3" />
              
              <!-- Col 2 to Col 3 -->
              <path d="M 370,60 C 430,60 430,120 500,120" class="horizontal-net-line line-4" />
              <path d="M 370,180 C 430,180 430,120 500,120" class="horizontal-net-line line-5" />
            </svg>
            
            <!-- Nodes (Horizontal Cards) -->
            <!-- Col 1 -->
            <div class="course-node n-1" style="top: 20px; left: 0;">
              <div class="course-card-mini m-0" data-bs-toggle="modal" data-bs-target="#course_details_modal" data-course-code="CCS0003" data-course-title="Introduction to Computing" data-course-lessons="Computer Basics, Operating Systems, Networking Fundamentals" data-course-status="PASSED">
                <div class="course-type-bar type-ite">ITE</div>
                <div class="course-card-body">
                  <div class="course-code">CCS0003</div>
                  <div class="course-status status-passed">PASSED</div>
                </div>
              </div>
            </div>
            
            <div class="course-node n-2" style="top: 140px; left: 0;">
              <div class="course-card-mini m-0" data-bs-toggle="modal" data-bs-target="#course_details_modal" data-course-code="CCS0015" data-course-title="Computer Programming 2" data-course-lessons="Object Oriented Programming, File I/O, Error Handling" data-course-status="PASSED">
                <div class="course-type-bar type-ite">ITE</div>
                <div class="course-card-body">
                  <div class="course-code">CCS0015</div>
                  <div class="course-status status-passed">PASSED</div>
                </div>
              </div>
            </div>
            
            <!-- Col 2 -->
            <div class="course-node n-3" style="top: 20px; left: 250px;">
              <div class="course-card-mini m-0" data-bs-toggle="modal" data-bs-target="#course_details_modal" data-course-code="CS0017" data-course-title="Database Management Systems" data-course-lessons="SQL, ER Diagrams, Normalization, Transactions" data-course-status="PASSED">
                <div class="course-type-bar type-cs">CS</div>
                <div class="course-card-body">
                  <div class="course-code">CS0017</div>
                  <div class="course-status status-passed">PASSED</div>
                </div>
              </div>
            </div>
            
            <div class="course-node n-4" style="top: 140px; left: 250px;">
              <div class="course-card-mini m-0" data-bs-toggle="modal" data-bs-target="#course_details_modal" data-course-code="CS0023" data-course-title="Software Engineering 1" data-course-lessons="Agile, SDLC, Requirement Analysis, UML" data-course-status="PASSED">
                <div class="course-type-bar type-cs">CS</div>
                <div class="course-card-body">
                  <div class="course-code">CS0023</div>
                  <div class="course-status status-passed">PASSED</div>
                </div>
              </div>
            </div>
            
            <!-- Col 3 -->
            <div class="course-node n-5" style="top: 80px; left: 500px;">
              <div class="course-card-mini m-0" data-bs-toggle="modal" data-bs-target="#course_details_modal" data-course-code="CS0043" data-course-title="Thesis Writing" data-course-lessons="Academic Research, Methodology, Proposal Defense" data-course-status="PENDING">
                <div class="course-type-bar type-cpe">CPE</div>
                <div class="course-card-body">
                  <div class="course-code">CS0043</div>
                  <div class="course-status status-pending">PENDING</div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
