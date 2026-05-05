<?php if (!defined('MBG')) exit; ?>
<section class="section-padding position-relative overflow-hidden" style="background: #ffffff;">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.05; background-image: linear-gradient(#4E7FF7 1px, transparent 1px), linear-gradient(90deg, #4E7FF7 1px, transparent 1px); background-size: 30px 30px;"></div>
  <!-- Soft Background Blobs (Consistent) -->
  <div class="position-absolute bento-blob blob-1" style="top: -10%; right: -5%; width: 40vw; height: 40vw; background: radial-gradient(circle, rgba(78, 127, 247, 0.05) 0%, transparent 70%); border-radius: 50%; z-index: 0; pointer-events: none;"></div>
  
  <div class="container container-xxl position-relative" style="z-index: 2;">
    <!-- Section Header -->
    <div class="text-center mb-15">
      <div class="d-inline-flex align-items-center py-2 px-4 bg-primary bg-opacity-5 rounded-pill mb-5 text-uppercase fw-bold border border-primary border-opacity-10 shadow-sm" style="font-size: 0.85rem; color: #4E7FF7; letter-spacing: 2px;">
        <i class="ki-duotone ki-book-open fs-5 me-2" style="color: #4E7FF7;"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
        Process Flowchart
      </div>
      <h2 class="fs-2x fs-md-4x fw-bolder mb-4 text-dark ls-n2">Your Journey, <span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #4E7FF7 0%, #1c57cc 100%);">Simplified</span></h2>
      <p class="fs-4 text-gray-600 mw-700px mx-auto fw-medium">
        Graduate with confidence in just three beautifully effortless steps, mapped out exactly like your ideal curriculum.
      </p>
    </div>
    
    <!-- Curriculum Map & Details Layout -->
    <div class="row align-items-center">
      
      <!-- Flowchart Column -->
      <div class="col-lg-8">
        <div class="position-relative" style="padding: 20px 0;">
          
          <style>
            .mod-card {
              background: #fff;
              border-radius: 12px;
              box-shadow: 0 10px 30px rgba(0,0,0,0.05);
              width: 100%;
              max-width: 280px;
              position: relative;
              z-index: 2;
              overflow: hidden;
              font-family: inherit;
              border: 1px solid rgba(0,0,0,0.05);
              transition: transform 0.3s ease;
            }
            .mod-card:hover { transform: translateY(-5px); }
            .mod-card-header {
              padding: 16px 20px;
              color: white;
            }
            .mod-card-header.bg-blue { background-color: #4E7FF7; }
            .mod-card-header.bg-green { background-color: #50cd89; }
            .mod-title { font-size: 1.25rem; font-weight: 800; margin-bottom: 2px; }
            .mod-subtitle { font-size: 0.8rem; opacity: 0.9; font-weight: 500; }
            
            .mod-list {
              list-style: none;
              padding: 0;
              margin: 0;
            }
            .mod-item {
              padding: 12px 20px;
              border-bottom: 1px solid #f1f4f9;
              font-size: 0.85rem;
              font-weight: 600;
              color: #3f4254;
            }
            .mod-item span.blue-text { color: #4E7FF7; margin-right: 4px; }
            .mod-item span.green-text { color: #50cd89; margin-right: 4px; }
            
            .curriculum-flow {
              display: flex;
              justify-content: center;
              align-items: flex-start;
              padding: 10px 0;
            }
            .svg-connector {
              width: 50px;
              height: 600px;
            }
            .right-mod-card {
               margin-top: 1.5rem;
            }
            @media (min-width: 992px) {
               .right-mod-card {
                  margin-top: 80px;
               }
               .svg-connector {
                  width: 80px;
               }
            }
          </style>

          <div class="curriculum-flow flex-column flex-lg-row align-items-center">
            
            <!-- Left Card -->
            <div class="mod-card" data-aos="fade-right" style="cursor: pointer;" onclick="alert('Viewing GED0081 Modules...')">
              <div class="mod-card-header bg-blue d-flex justify-content-between align-items-center">
                <div>
                  <div class="mod-title">GED0081</div>
                  <div class="mod-subtitle">College Physics 1</div>
                </div>
                <i class="ki-duotone ki-maximize fs-4 opacity-75"></i>
              </div>
              <ul class="mod-list">
                <li class="mod-item"><span class="blue-text">Module 1:</span> Vectors</li>
                <li class="mod-item"><span class="blue-text">Module 2:</span> Operations on Vectors</li>
                <li class="mod-item"><span class="blue-text">Module 3:</span> Motion in 1 Dimension</li>
                <li class="mod-item"><span class="blue-text">Module 4:</span> Motion in 2 Dimensions</li>
                <li class="mod-item"><span class="blue-text">Module 5:</span> Newton's Laws of Motion</li>
                <li class="mod-item"><span class="blue-text">Module 6:</span> Applications of Newton's Laws of...</li>
                <li class="mod-item"><span class="blue-text">Module 7:</span> Work, Energy, and Power</li>
                <li class="mod-item"><span class="blue-text">Module 8:</span> Impulse and Momentum</li>
                <li class="mod-item" style="border-bottom:none;"><span class="blue-text">Module 9:</span> Equilibrium and Torque</li>
              </ul>
            </div>

            <!-- Connector SVG -->
            <div class="svg-connector d-none d-lg-block position-relative" style="z-index: 1;">
              <svg width="100%" height="100%" style="overflow: visible;" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <marker id="arrowhead-flow" markerWidth="6" markerHeight="4" refX="5" refY="2" orient="auto">
                    <polygon points="0 0, 6 2, 0 4" fill="#4E7FF7" />
                  </marker>
                </defs>
                <g stroke="#4E7FF7" stroke-width="1.5" fill="none" class="opacity-50">
                  <!-- From Top (125) -->
                  <path d="M 0 125 C 40 125, 40 182, 75 182" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 125 C 40 125, 40 227, 75 227" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 125 C 40 125, 40 272, 75 272" marker-end="url(#arrowhead-flow)" />
                  
                  <!-- From Middle (170) -->
                  <path d="M 0 170 C 40 170, 40 317, 75 317" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 170 C 40 170, 40 362, 75 362" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 170 C 40 170, 40 407, 75 407" marker-end="url(#arrowhead-flow)" />
                  
                  <!-- From Bottom (350) -->
                  <path d="M 0 350 C 40 350, 40 452, 75 452" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 350 C 40 350, 40 497, 75 497" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 350 C 40 350, 40 542, 75 542" marker-end="url(#arrowhead-flow)" />
                  <path d="M 0 350 C 40 350, 40 587, 75 587" marker-end="url(#arrowhead-flow)" />
                </g>
                
                <!-- Nodes -->
                <circle cx="0" cy="125" r="4" fill="#4E7FF7" />
                <circle cx="0" cy="170" r="4" fill="#4E7FF7" />
                <circle cx="0" cy="350" r="4" fill="#4E7FF7" />
              </svg>
            </div>

            <!-- Right Card -->
            <div class="mod-card right-mod-card" data-aos="fade-left" style="cursor: pointer;" onclick="alert('Viewing GED0083 Modules...')">
              <div class="mod-card-header bg-green d-flex justify-content-between align-items-center">
                <div>
                  <div class="mod-title">GED0083</div>
                  <div class="mod-subtitle">College Physics 2</div>
                </div>
                <i class="ki-duotone ki-maximize fs-4 opacity-75"></i>
              </div>
              <ul class="mod-list">
                <li class="mod-item"><span class="green-text">Module 1:</span> Fluid Mechanics</li>
                <li class="mod-item"><span class="green-text">Module 2:</span> Thermal Physics</li>
                <li class="mod-item"><span class="green-text">Module 3:</span> Electric Charges and Forces</li>
                <li class="mod-item"><span class="green-text">Module 4:</span> Electric Field</li>
                <li class="mod-item"><span class="green-text">Module 5:</span> Electric Potential and Potential...</li>
                <li class="mod-item"><span class="green-text">Module 6:</span> Capacitor Electrical Energy Storage ...</li>
                <li class="mod-item"><span class="green-text">Module 7:</span> Electric Current and DC Circuits</li>
                <li class="mod-item"><span class="green-text">Module 8:</span> Magnetic Field</li>
                <li class="mod-item"><span class="green-text">Module 9:</span> Electromagnetic Induction</li>
                <li class="mod-item" style="border-bottom:none;"><span class="green-text">Module 10:</span> Lights and Optics</li>
              </ul>
            </div>
            
          </div>
          <div class="text-center mt-5 d-lg-none">
             <span class="badge badge-light-primary fw-bold px-4 py-2"><i class="ki-duotone ki-mouse-square fs-6 me-2"></i> Click cards to see module details</span>
          </div>
        </div>
      </div>
      
      <!-- More Info Column -->
      <div class="col-lg-4 ps-lg-10 mt-15 mt-lg-0 d-flex flex-column gap-8">
        
        <!-- Box 1 -->
        <div class="card rounded-5 p-10 shadow-lg transition-all border-0 hover-elevate-up" data-aos="fade-left" data-aos-delay="200" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); cursor: default;">
          <div class="d-flex align-items-center mb-6">
            <div class="symbol symbol-50px me-5">
              <div class="symbol-label bg-light-primary">
                <i class="ki-duotone ki-time fs-2x text-primary"><span class="path1"></span><span class="path2"></span></i>
              </div>
            </div>
            <h3 class="fs-2 fw-bolder text-dark mb-0">View Previous Modules</h3>
          </div>
          <p class="fs-5 mb-0 lh-lg fw-bold text-gray-700 opacity-75">
            Easily look back at specific modules from subjects you've already completed. Keep your foundational knowledge organized and accessible.
          </p>
        </div>
        
        <!-- Box 2 -->
        <div class="card rounded-5 p-10 shadow-lg transition-all border-0 hover-elevate-up" data-aos="fade-left" data-aos-delay="350" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); cursor: default;">
          <div class="d-flex align-items-center mb-6">
            <div class="symbol symbol-50px me-5">
              <div class="symbol-label bg-light-success">
                <i class="ki-duotone ki-chart-line-star fs-2x text-success"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
              </div>
            </div>
            <h3 class="fs-2 fw-bolder text-dark mb-0">Connected Prerequisites</h3>
          </div>
          <p class="fs-5 mb-0 lh-lg fw-bold text-gray-700 opacity-75">
            Visually track how each topic connects to advanced subjects. Know exactly what's connected before moving forward.
          </p>
        </div>
        
      </div>
      
    </div>
    
  </div>
</section>
