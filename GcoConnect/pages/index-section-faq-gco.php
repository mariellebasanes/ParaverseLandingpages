<?php
$faqs = [
  ['q' => 'Is the GCO available to everyone?', 'a' => 'Yes! The Guidance and Counseling Office is available to all enrolled students. Whether you need academic support, personal counseling, or career guidance, our doors are always open.'],
  ['q' => 'Are all of your counselors certified?', 'a' => 'Absolutely. All our counselors are licensed professionals with advanced degrees in psychology, counseling, or related fields. They undergo continuous training to provide the best support possible.'],
  ['q' => 'What is the cost?', 'a' => 'All GCO services are completely FREE for enrolled students. This is part of our commitment to student wellbeing and success.'],
  ['q' => 'How do I get started?', 'a' => "Getting started is easy! Simply click 'Book an Appointment', select the service you need, fill in your basic information, choose a time slot, and you're all set. You'll receive a confirmation with all the details."],
  ['q' => 'What if I need to reschedule?', 'a' => "No problem! You can reschedule your appointment up to 24 hours before your scheduled time. Simply contact our office via email or phone, and we'll help you find a new time that works for you."],
  ['q' => 'How long does each session last?', 'a' => 'Session duration varies by service type. Interviews typically last 30–45 minutes, counseling sessions are 50–60 minutes, and psychological assessments can take 1–2 hours depending on the test.'],
];
?>
<section class="bg-body py-20 overflow-hidden position-relative" style="z-index: 0;">
  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden" style="z-index: 0; pointer-events: none;">
    <!-- Top right blob -->
    <div class="position-absolute bg-primary rounded-circle"
      style="width: 40vw; height: 40vw; top: 5%; right: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
    <!-- Bottom left blob -->
    <div class="position-absolute bg-danger rounded-circle"
      style="width: 35vw; height: 35vw; bottom: 10%; left: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
  </div>
  <!-- Uneven background design icons -->
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/flower.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; left: 5%; opacity: 0.4; pointer-events: none; width: 220px; transform: rotate(15deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/happy-face.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; right: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(-20deg); z-index: 0;"
    alt="">
  <div class="container-xxl position-relative" style="z-index: 1;">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">FAQ</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-600">Frequently Asked Questions</h2>
      <p class="text-gray-600 fs-5 mw-500px mx-auto">Find answers to common questions about our counseling services</p>
    </div>

    <!--
      Pure HTML5 accordion — no JavaScript required.
      <details>/<summary> toggle natively in every modern browser.
      gco-design.css wires the Bootstrap .accordion-button open/closed styles
      to details[open] so the chevron and active colours apply correctly.
    -->
    <div class="accordion accordion-icon-toggle mw-900px mx-auto" id="kt_accordion_faq">
      <?php foreach ($faqs as $i => $faq): ?>
      <div class="accordion-item mb-5 bg-white border border-gray-200 rounded-2 shadow-none">
        <h2 class="accordion-header" id="kt_accordion_faq_header_<?= $i ?>">
          <button class="accordion-button fs-5 fw-bold text-gray-600 collapsed p-6" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_faq_body_<?= $i ?>" aria-expanded="false" aria-controls="kt_accordion_faq_body_<?= $i ?>">
            <?= htmlspecialchars($faq['q'])?>
          </button>
        </h2>
        <div id="kt_accordion_faq_body_<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="kt_accordion_faq_header_<?= $i ?>" data-bs-parent="#kt_accordion_faq">
          <div class="accordion-body text-gray-600 fs-6 px-6 pb-6 pt-0 lh-lg">
            <?= htmlspecialchars($faq['a'])?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>; ??
</div>

</div>
</section>