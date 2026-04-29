<?php if (!defined('MBG')) exit; ?>
<section class="curriculum-section min-vh-100 d-flex flex-column justify-content-center bg-white" style="background-color: #ffffff !important; background-image: linear-gradient(rgba(26, 115, 232, 0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(26, 115, 232, 0.06) 1px, transparent 1px); background-size: 30px 30px;">
  <div class="container container-xxl">
    <div class="text-center mb-20">
      <div class="d-inline-flex align-items-center py-2 px-4 bg-light rounded-pill mb-5 text-uppercase fw-bold" style="font-size: 0.85rem; color: #5e6278; letter-spacing: 1px;">
        <i class="ki-duotone ki-map fs-5 me-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        Curriculum Map
      </div>
      <h2 class="fs-4x fw-bolder mb-8 text-dark">Your Interactive <span class="text-blue-primary">Curriculum  Map</span></h2>
      <p class="fs-2 lh-lg mw-800px mx-auto" style="color: #1a2d58;">
        Experience the visual power of NetworkMap. Track your progress across every trimester and see exactly where you stand on your journey to graduation.
      </p>
    </div>

    <div class="curriculum-viewport" style="background-color: #ffffff; background-image: none; border: 1px solid #c2d5f2; box-shadow: 0 10px 20px rgba(26, 115, 232, 0.05) inset;">
      <!-- Grid Header -->
      <div class="curriculum-grid-header">
        <div class="year-col">
          <div class="year-header">Freshman</div>
          <div class="trimester-container">
            <div class="trimester-header">1st Trimester</div>
            <div class="trimester-header">2nd Trimester</div>
            <div class="trimester-header">3rd Trimester</div>
          </div>
        </div>
        <div class="year-col">
          <div class="year-header">Sophomore</div>
          <div class="trimester-container">
            <div class="trimester-header">1st Trimester</div>
            <div class="trimester-header">2nd Trimester</div>
            <div class="trimester-header">3rd Trimester</div>
          </div>
        </div>
        <div class="year-col">
          <div class="year-header">Junior</div>
          <div class="trimester-container">
            <div class="trimester-header">1st Trimester</div>
            <div class="trimester-header">2nd Trimester</div>
            <div class="trimester-header">3rd Trimester</div>
          </div>
        </div>
        <div class="year-col">
          <div class="year-header">Senior</div>
          <div class="trimester-container">
            <div class="trimester-header">1st Trimester</div>
            <div class="trimester-header">2nd Trimester</div>
            <div class="trimester-header">3rd Trimester</div>
          </div>
        </div>
      </div>

      <!-- Grid Content -->
      <div class="curriculum-content">
        <!-- YEAR 1 -->
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal" 
               data-course-code="CCS0003" data-course-title="Introduction to Computing" 
               data-course-lessons="Computer Basics, Operating Systems, Networking Fundamentals, IT Ethics"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0003</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0003L" data-course-title="Intro to Computing - Lab"
               data-course-lessons="Hardware Assembly, CLI Basics, Basic Troubleshooting"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0003L</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0001" data-course-title="Computer Programming 1"
               data-course-lessons="Variables, Control Structures, Arrays, Functions"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0001</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="NSTP1" data-course-title="National Service Training Program 1"
               data-course-lessons="Civic Consciousness, Community Service, Disaster Preparedness"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">NSTP1</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="GED0029" data-course-title="Art Appreciation"
               data-course-lessons="Visual Arts, Music, Philippine Culture, Art Criticism"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">GED0029</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="GED0027" data-course-title="Readings in Philippine History"
               data-course-lessons="Pre-colonial Era, Spanish Period, Revolution, Modern History"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">GED0027</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0105" data-course-title="Discrete Mathematics"
               data-course-lessons="Set Theory, Logic, Graph Theory, Combinatorics"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0105</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0015" data-course-title="Computer Programming 2"
               data-course-lessons="Object Oriented Programming, File I/O, Error Handling"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0015</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="GED0007" data-course-title="Ethics"
               data-course-lessons="Moral Philosophy, Professional Ethics, Social Responsibility"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">GED0007</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>

        <!-- YEAR 2 -->
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="GED0081" data-course-title="Life and Works of Rizal"
               data-course-lessons="Rizal in Europe, Noli Me Tangere, El Filibusterismo"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">GED0081</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0021" data-course-title="Data Structures and Algorithms"
               data-course-lessons="Stacks, Queues, Binary Trees, Sorting Algorithms"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0021</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0017" data-course-title="Database Management Systems"
               data-course-lessons="SQL, ER Diagrams, Normalization, Transactions"
               data-course-status="PASSED">
            <div class="course-type-bar type-it">IT</div>
            <div class="course-card-body">
              <div class="course-code">CS0017</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CCS0013" data-course-title="Human Computer Interaction"
               data-course-lessons="User Interface Design, UX Research, Heuristic Evaluation"
               data-course-status="PASSED">
            <div class="course-type-bar type-ite">ITE</div>
            <div class="course-card-body">
              <div class="course-code">CCS0013</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0048" data-course-title="Web Development"
               data-course-lessons="HTML, CSS, JavaScript, PHP, Responsive Design"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0048</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0023" data-course-title="Software Engineering 1"
               data-course-lessons="Agile, SDLC, Requirement Analysis, UML"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0023</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>

        <!-- YEAR 3 -->
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0011" data-course-title="Operating Systems"
               data-course-lessons="Processes, Memory Management, File Systems, Security"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0011</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0019" data-course-title="Networks and Communications"
               data-course-lessons="OSI Model, TCP/IP, Routing, Switching, Network Security"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0019</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0051" data-course-title="Artificial Intelligence"
               data-course-lessons="Machine Learning, Neural Networks, Search Algorithms"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0051</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0031" data-course-title="Cloud Computing"
               data-course-lessons="AWS, Azure, Docker, Kubernetes, Serverless"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0031</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0047" data-course-title="Mobile Application Development"
               data-course-lessons="React Native, Android Studio, iOS Swift, Mobile UX"
               data-course-status="PASSED">
            <div class="course-type-bar type-cs">CS</div>
            <div class="course-card-body">
              <div class="course-code">CS0047</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0061L" data-course-title="Information Security Lab"
               data-course-lessons="Cryptography, Pentesting, Firewall Config"
               data-course-status="PASSED">
            <div class="course-type-bar type-it">IT</div>
            <div class="course-card-body">
              <div class="course-code">CS0061L</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
        </div>

        <!-- YEAR 4 -->
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="GED0065" data-course-title="Public Speaking"
               data-course-lessons="Speech Composition, Gesture, Audience Engagement"
               data-course-status="PASSED">
            <div class="course-type-bar type-ged">GED</div>
            <div class="course-card-body">
              <div class="course-code">GED0065</div>
              <div class="course-status status-passed">PASSED</div>
            </div>
          </div>
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0041" data-course-title="Embedded Systems"
               data-course-lessons="Microcontrollers, IoT, Arduino, Sensors"
               data-course-status="PENDING">
            <div class="course-type-bar type-cpe">CPE</div>
            <div class="course-card-body">
              <div class="course-code">CS0041</div>
              <div class="course-status status-pending">PENDING</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <div class="course-card-mini" data-bs-toggle="modal" data-bs-target="#course_details_modal"
               data-course-code="CS0043" data-course-title="Thesis Writing"
               data-course-lessons="Academic Research, Methodology, Proposal Defense"
               data-course-status="PENDING">
            <div class="course-type-bar type-cpe">CPE</div>
            <div class="course-card-body">
              <div class="course-code">CS0043</div>
              <div class="course-status status-pending">PENDING</div>
            </div>
          </div>
        </div>
        <div class="course-stack">
          <!-- Future slots -->
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Course Details Modal -->
<div class="modal fade" id="course_details_modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-500px">
    <div class="modal-content overflow-hidden border-0 shadow-lg rounded-3">
      <div class="modal-header border-0 pb-0 pt-8 px-8 d-flex flex-column align-items-start position-relative">
        <div id="modal_course_type_bg" class="position-absolute top-0 start-0 w-100 h-100 opacity-10" style="z-index: 0;"></div>
        <div class="d-flex justify-content-between w-100 position-relative" style="z-index: 1;">
          <span id="modal_course_code" class="badge bg-primary fs-8 fw-bolder px-4 py-2 mb-3">COURSE CODE</span>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <h3 id="modal_course_title" class="modal-title fs-2 fw-bolder text-dark position-relative" style="z-index: 1;">Course Title</h3>
      </div>
      <div class="modal-body p-8">
        <div class="mb-8">
          <div class="d-flex align-items-center mb-4">
            <div class="symbol symbol-30px me-3">
              <div class="symbol-label bg-light-primary">
                <i class="ki-duotone ki-book-open fs-5 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
              </div>
            </div>
            <h4 class="fs-6 fw-bold text-dark mb-0">Past Lessons & Curriculum</h4>
          </div>
          <div id="modal_course_lessons" class="d-flex flex-wrap gap-2">
            <!-- Lessons will be injected here -->
          </div>
        </div>

        <div class="rounded-2 p-4 d-flex align-items-center justify-content-between" style="background-color: #e2eafc; border: 1px solid #c2d5f2;">
          <div class="d-flex align-items-center">
             <div class="symbol symbol-35px me-3">
                <div id="modal_status_icon" class="symbol-label">
                  <i id="modal_status_i" class="ki-duotone fs-4"></i>
                </div>
             </div>
             <div>
                <div class="fs-8 fw-bold text-primary text-uppercase ls-1">Current Status</div>
                <div id="modal_course_status_text" class="fs-6 fw-bolder text-dark">PASSED</div>
             </div>
          </div>
          <div id="modal_status_badge" class="badge py-2 px-4 fs-8 fw-bolder">STATUS</div>
        </div>
      </div>
      <div class="modal-footer border-0 p-8 pt-0">
        <button type="button" class="btn fw-bolder w-100 py-4" style="background-color: #e2eafc; color: #1c57cc;" data-bs-dismiss="modal">Close Details</button>
      </div>
    </div>
  </div>
</div>
