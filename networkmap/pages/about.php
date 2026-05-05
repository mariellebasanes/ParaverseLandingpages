<?php if (!defined('MBG')) exit; ?>
<section class="section-padding position-relative overflow-hidden min-vh-100 d-flex flex-column justify-content-center" id="about" style="background: linear-gradient(135deg, #f8faff 0%, #eef2ff 100%);">
  <!-- Decorative uneven blobs (Consistent) -->
  <div class="position-absolute bento-blob blob-1" style="top: 10%; left: -5%; width: 45vw; height: 45vw; background: radial-gradient(circle, rgba(78, 127, 247, 0.08) 0%, transparent 70%); border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; z-index: 0; pointer-events: none; transform: rotate(-10deg);"></div>
  <div class="position-absolute bento-blob blob-2" style="bottom: 10%; right: -5%; width: 30vw; height: 30vw; background: radial-gradient(circle, rgba(114, 57, 234, 0.05) 0%, transparent 70%); border-radius: 60% 40% 30% 70% / 50% 60% 50% 40%; z-index: 0; pointer-events: none; transform: rotate(15deg);"></div>

  <div class="container container-xxl position-relative z-index-1">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-10 mb-lg-0 z-index-2">
        <div class="mb-5">
            <div class="d-inline-flex align-items-center py-2 px-5 bg-primary bg-opacity-5 rounded-pill mb-8 text-uppercase fw-bold border border-primary border-opacity-10 shadow-sm" style="font-size: 12.35px; color: #4E7FF7; letter-spacing: 2px;">
              <i class="ki-duotone ki-information-5 fs-5 me-2" style="color: #4E7FF7;"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
              About NetworkMap
            </div>
            <h2 class="display-6 mb-8 text-dark ls-n2">Visualize Your <br><span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #4E7FF7 0%, #1c57cc 100%);">Curriculum Path</span></h2>
        </div>
        <p class="mb-12">
          Experience powerful Curriculum Mapping. Click on the course cards in the horizontal timeline to view past courses, prerequisites, and discover all connected subjects on your path to graduation!
        </p>
        <div class="d-flex align-items-center gap-3">
            <a href="#how-it-works" class="btn btn-nm-primary shadow-lg px-10 py-5 rounded-pill text-white transition-all hover-elevate-up">Explore Platform</a>
        </div>
      </div>
      <div class="col-lg-7">
        <style>
          .responsive-network-scale {
            transform: scale(0.85);
            transform-origin: left center;
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
        <div class="overflow-auto pb-5 custom-scroll">
          <div class="horizontal-network-wrapper responsive-network-scale mx-auto mt-5 mt-lg-0" style="height: 260px; width: 620px; min-width: 620px; margin: 40px 0;">
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
