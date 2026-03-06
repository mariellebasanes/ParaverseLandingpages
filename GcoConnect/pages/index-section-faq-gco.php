<?php
$faqs = [
  ['q' => 'What exactly do Guidance Counselors and Psychometricians do?', 'a' => 'A guidance counselor intently hears your story and works with you to establish the best course of action given your objectives. They provide an opportunity to be completely and honestly heard, exploring your deepest ideas and feelings. They may also provide techniques to help you recognize unhealthy thought patterns and behaviors. A psychometrician provides an opportunity for increased awareness and understanding of oneself through the administration and interpretation of standardized psychological tests.'],
  ['q' => 'What is a "Kumustahan" Session?', 'a' => 'It is carried out in the form of "kumustahan" and acts as an early intervention for students who may need help.'],
  ['q' => 'What are Consultation and Counseling services?', 'a' => 'Consultation services help students create solutions to recognized concerns or issues by giving adept advice and accessible resources. Counseling services assist students in dealing with challenges by clarifying concerns, exploring possibilities, increasing self-awareness, and developing intervention plans that may include psychological assessment.'],
  ['q' => 'What is Psychological Testing?', 'a' => 'Psychological testing is a way that students can become more aware of their strengths and areas of improvement using standardized psychological tests. Through testing, students can gain insights that help guide their decisions and actions.'],
  ['q' => 'Is the GCO available to everyone?', 'a' => 'Yes! The Guidance and Counseling Office is available to all enrolled students. Whether you need academic support, personal counseling, or career guidance, our doors are always open.'],
  ['q' => 'What is the cost?', 'a' => 'All GCO services are completely FREE for enrolled students. This is part of our commitment to student wellbeing and success.'],
  ['q' => 'How do I get started?', 'a' => "Getting started is easy! Simply click 'Book an Appointment', select the service you need, fill in your information, choose a time slot, and you're all set. You'll receive a confirmation with all the details."],
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
      <details class="accordion-item mb-5 bg-white border border-gray-200 rounded-2 shadow-none">
        <summary class="accordion-button fs-5 fw-bold text-gray-600 p-6">
          <?= htmlspecialchars($faq['q'])?>
        </summary>
        <div class="accordion-body text-gray-600 fs-6 px-6 pb-6 pt-0 lh-lg">
          <?= htmlspecialchars($faq['a'])?>
        </div>
      </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>