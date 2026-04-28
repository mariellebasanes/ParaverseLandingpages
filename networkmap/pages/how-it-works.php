<?php if (!defined('MBG')) exit; ?>
<section class="section-padding bg-white position-relative overflow-hidden" style="padding-top: 100px; padding-bottom: 100px; background-image: linear-gradient(rgba(26, 115, 232, 0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(26, 115, 232, 0.06) 1px, transparent 1px); background-size: 30px 30px;">
  
  <div class="container container-xxl position-relative" style="z-index: 2;">
    <!-- Section Header -->
    <div class="text-center mb-15">
      <div class="d-inline-flex align-items-center py-2 px-4 bg-light rounded-pill mb-5 text-uppercase fw-bold" style="font-size: 0.85rem; color: #5e6278; letter-spacing: 1px;">
        <i class="ki-duotone ki-book-open fs-5 me-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
        Process Flowchart
      </div>
      <h2 class="fs-2x fs-md-3x fw-bolder mb-4 text-dark">Your Journey, <span class="text-primary">Simplified</span></h2>
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
              border-radius: 6px;
              box-shadow: 0 15px 35px rgba(0,0,0,0.06), 0 5px 15px rgba(0,0,0,0.03);
              width: 100%;
              max-width: 280px;
              position: relative;
              z-index: 2;
              overflow: hidden;
              font-family: inherit;
            }
            .mod-card-header {
              padding: 16px 20px;
              color: white;
            }
            .mod-card-header.bg-blue { background-color: #1a73e8; }
            .mod-card-header.bg-green { background-color: #34d399; }
            .mod-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 2px; }
            .mod-subtitle { font-size: 0.8rem; opacity: 0.9; }
            
            .mod-list {
              list-style: none;
              padding: 0;
              margin: 0;
            }
            .mod-item {
              padding: 12px 20px;
              border-bottom: 1px solid #eef3f9;
              font-size: 0.85rem;
              font-weight: 600;
              color: #1e293b;
            }
            .mod-item span.blue-text { color: #1a73e8; margin-right: 4px; }
            .mod-item span.green-text { color: #34d399; margin-right: 4px; }
            
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
            <div class="mod-card" data-aos="fade-right">
              <div class="mod-card-header bg-blue d-flex justify-content-between align-items-center">
                <div>
                  <div class="mod-title">GED0081</div>
                  <div class="mod-subtitle">College Physics 1</div>
                </div>
                <!-- Standard squeeze icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.8; stroke-width: 1.5;"><path d="M14 6 L14 10 L18 10"></path><path d="M10 18 L10 14 L6 14"></path><path d="M14 10 L21 3"></path><path d="M3 21 L10 14"></path></svg>
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
                    <polygon points="0 0, 6 2, 0 4" fill="#1a73e8" />
                  </marker>
                </defs>
                <g stroke="#1a73e8" stroke-width="1.5" fill="none" class="opacity-75">
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
                <circle cx="0" cy="125" r="4" fill="#1a73e8" />
                <circle cx="0" cy="170" r="4" fill="#1a73e8" />
                <circle cx="0" cy="350" r="4" fill="#1a73e8" />
              </svg>
            </div>

            <!-- Right Card -->
            <div class="mod-card right-mod-card" data-aos="fade-left">
              <div class="mod-card-header bg-green d-flex justify-content-between align-items-center">
                <div>
                  <div class="mod-title">GED0083</div>
                  <div class="mod-subtitle">College Physics 2</div>
                </div>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.8; stroke-width: 1.5;"><path d="M14 6 L14 10 L18 10"></path><path d="M10 18 L10 14 L6 14"></path><path d="M14 10 L21 3"></path><path d="M3 21 L10 14"></path></svg>
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
        </div>
      </div>
      
      <!-- More Info Column -->
      <div class="col-lg-4 ps-lg-5 mt-15 mt-lg-0 d-flex flex-column gap-6">
        
        <!-- Box 1 -->
        <div class="rounded-4 p-8 shadow-sm transition-all" data-aos="fade-left" data-aos-delay="200" style="background-color: #f4f8fe; border: 1px solid #d4e5ff; transition: transform 0.3s ease; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="d-flex align-items-center justify-content-center w-50px h-50px bg-white rounded-circle shadow-sm mb-6 border border-white">
            <i class="ki-duotone ki-time fs-2x text-primary"><span class="path1"></span><span class="path2"></span></i>
          </div>
          <h3 class="fs-2 fw-bolder text-dark mb-4">View Previous Modules</h3>
          <p class="fs-6 mb-0 lh-lg fw-medium" style="color: #4b668f;">
            Easily look back at specific modules from subjects you've already completed. Keep your foundational knowledge organized and accessible whenever you need to reference it.
          </p>
        </div>
        
        <!-- Box 2 -->
        <div class="rounded-4 p-8 shadow-sm transition-all" data-aos="fade-left" data-aos-delay="350" style="background-color: #f4f8fe; border: 1px solid #d4e5ff; transition: transform 0.3s ease; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="d-flex align-items-center justify-content-center w-50px h-50px bg-white rounded-circle shadow-sm mb-6 border border-white">
            <i class="ki-duotone ki-chart-line-star fs-2x text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
          </div>
          <h3 class="fs-2 fw-bolder text-dark mb-4">See Connected Prerequisites</h3>
          <p class="fs-6 mb-6 lh-lg fw-medium" style="color: #4b668f;">
            Visually track how each topic connects to advanced subjects. The map clearly highlights prerequisite links, ensuring you clearly know what's connected before moving forward.
          </p>
          <a href="#" class="btn btn-nm-primary w-100 fw-bold">Explore Curriculum Map</a>
        </div>
        
      </div>
      
    </div>
    
  </div>
</section>
