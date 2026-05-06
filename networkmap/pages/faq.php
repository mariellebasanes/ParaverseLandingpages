<?php if (!defined('MBG')) exit; ?>
<section class="section-padding bg-white position-relative overflow-hidden" id="faq-section" style="padding-top: 80px; padding-bottom: 100px;">
  <!-- Decorative uneven blobs (no blur) -->
  <div class="position-absolute" style="top: 10%; right: -5%; width: 45vw; height: 45vw; max-width: 550px; max-height: 550px; background: linear-gradient(135deg, rgba(28, 87, 204, 0.08) 0%, rgba(20, 64, 166, 0.03) 100%); border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; z-index: 0; pointer-events: none; transform: rotate(-10deg);"></div>
  <div class="position-absolute" style="bottom: 10%; left: -5%; width: 30vw; height: 30vw; max-width: 350px; max-height: 350px; background: linear-gradient(135deg, rgba(28, 87, 204, 0.06) 0%, rgba(20, 64, 166, 0.02) 100%); border-radius: 60% 40% 30% 70% / 50% 60% 50% 40%; z-index: 0; pointer-events: none; transform: rotate(15deg);"></div>

  <div class="container-xxl position-relative" style="z-index: 1;">
    <div class="text-center mb-15">
      <div class="d-inline-flex align-items-center py-2 px-5 bg-primary bg-opacity-5 rounded-pill mb-8 text-uppercase fw-bold border border-primary border-opacity-10 shadow-sm" style="font-size: 12.35px; color: #4E7FF7; letter-spacing: 2px;">
        <i class="ki-duotone ki-message-question fs-5 me-2" style="color: #4E7FF7;"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        Frequently Asked Questions
      </div>
      <h2 class="display-6 text-dark mb-4">Frequently Asked <span class="text-primary">Questions</span></h2>
      <p class="text-gray-600 mw-700px mx-auto fw-medium">
        Everything you need to know about navigating your educational journey with NetworkMap.
      </p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <div class="accordion accordion-icon-toggle border-0" id="networkmap_faq">
          
          <!-- FAQ 1 -->
          <div class="accordion-item border-0 mb-5 bg-white rounded-4 shadow-sm">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button h5 text-dark bg-transparent rounded-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="padding: 24px;">
                How does NetworkMap map my previous courses?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#networkmap_faq">
              <div class="accordion-body fs-5 text-gray-600 pt-0 pb-6 px-6" style="padding-left: 24px; padding-right: 24px;">
                NetworkMap will automatically map your previous courses to your degree map.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item border-0 mb-5 bg-white rounded-4 shadow-sm">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed h5 text-dark bg-transparent rounded-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="padding: 24px;">
                Can I switch majors to see how it affects my timeline?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#networkmap_faq">
              <div class="accordion-body fs-5 text-gray-600 pt-0 pb-6 px-6" style="padding-left: 24px; padding-right: 24px;">
                Yes, you can switch majors and NetworkMap will automatically adjust your degree map to reflect the new requirements.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item border-0 mb-5 bg-white rounded-4 shadow-sm">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed h5 text-dark bg-transparent rounded-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="padding: 24px;">
                Does it automatically update my grades after the term ends?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#networkmap_faq">
              <div class="accordion-body fs-5 text-gray-600 pt-0 pb-6 px-6" style="padding-left: 24px; padding-right: 24px;">
                Yes. NetworkMap automatically updates the status of your grades after the term ends. 
              </div>
            </div>
          </div>
          
          <!-- FAQ 4 -->
          <div class="accordion-item border-0 mb-5 bg-white rounded-4 shadow-sm">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed h5 text-dark bg-transparent rounded-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="padding: 24px;">
                Is my academic data secure?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#networkmap_faq">
              <div class="accordion-body fs-5 text-gray-600 pt-0 pb-6 px-6" style="padding-left: 24px; padding-right: 24px;">
                Data security is our top priority. We use end-to-end encryption to store your information, and we never share your personal academic records with third parties without your explicit consent.
              </div>
            </div>
          </div>

        </div>
        
      </div>
    </div>
  </div>
</section>
