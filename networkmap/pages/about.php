<?php if (!defined('MBG')) exit; ?>
<section class="section-padding bg-light-blue position-relative overflow-hidden min-vh-100 d-flex flex-column justify-content-center" id="about">
  <div class="container container-xxl">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-10 mb-lg-0 z-index-2">
        <div class="mb-5">
            <span class="badge badge-light-primary fw-bold px-6 py-3 rounded-pill mb-6 fs-6">About Us</span>
            <h2 class="fs-4x fw-bolder mb-8">Visualize Your <br><span class="text-blue-primary">Curriculum</span></h2>
        </div>
        <p class="fs-2 lh-lg text-gray-600 mb-12">
          Experience powerful Curriculum Mapping. Click on the course cards in the horizontal timeline to view past courses, prerequisites, and discover all road or connected subjects on your path to graduation!
        </p>
        <div class="d-flex align-items-center gap-3">
            <a href="#how-it-works" class="btn btn-nm-primary fs-3 px-10 py-5 rounded-pill shadow-sm">Explore Platform</a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="overflow-auto pb-5 custom-scroll">
          <div class="horizontal-network-wrapper mx-auto mt-5 mt-lg-0" style="height: 260px; width: 620px; min-width: 620px; transform: scale(1.15); transform-origin: center center; margin: 40px 0;">
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
