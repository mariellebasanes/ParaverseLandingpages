<section id="faq" class="icare-bg-faq py-12 py-lg-16 position-relative">
  <div class="app-container container-xxl">
    <div class="text-center mb-12 mb-lg-16 text-white">
      <div class="icare-badge mb-4 border border-2 border-white">
        <span>❓ FAQ</span>
      </div>
      <h2 class="display-6 display-lg-5 text-white mb-4">
        Frequently Asked <span class="text-icare-yellow fw-bold">Questions</span>
      </h2>
      <p class="fs-5 text-white opacity-90 mx-auto icare-max-w-sm">
        Got questions? We've got answers! Check out the most common questions from students like you 🎓
      </p>
    </div>
    <div class="mx-auto icare-max-w-lg">
      <?php
      $faqs = [
        ['q' => 'Is iCare available to everyone?', 'a' => 'Yes! iCare is 100% FREE and available to all FEU Tech students. Whether you\'re a freshman or a senior, all programs are welcome. Just bring your student ID and you\'re good to go!'],
        ['q' => 'Are all of your tutors qualified?', 'a' => 'Absolutely! Our tutors are a mix of qualified faculty members and top-performing peer mentors who have excelled in their subjects. All peer tutors undergo training and are supervised by our academic staff to ensure quality support.'],
        ['q' => 'What is your price?', 'a' => '💯 Everything is completely FREE! No hidden charges, no registration fees, nothing. iCare is fully funded by FEU Tech to support your academic success. It\'s one of the awesome perks of being a Tamaraw!'],
        ['q' => 'How do I get set up and started now?', 'a' => 'Super easy! Just drop by the iCare office during operating hours (Monday-Friday, 9 AM - 5 PM), or visit our website to book an appointment online. You can also reach out via email or stop by during walk-in hours. No complicated sign-ups needed!'],
        ['q' => 'What if I need to reschedule my appointment?', 'a' => 'No worries! Life happens. Just contact us at least 24 hours before your scheduled session via email or by visiting our office. We\'ll help you find a new time slot that works better for you.'],
        ['q' => 'How long does each session last?', 'a' => 'Individual tutoring sessions typically last 45-60 minutes, while group study sessions and review classes can run for 1-2 hours depending on the topic. Workshop sessions are usually 2-3 hours. We can be flexible based on your needs!'],
      ];
      foreach ($faqs as $idx => $faq) :
      ?>
      <div class="icare-faq-item mb-4">
        <button type="button" class="faq-toggle w-100 text-start d-flex align-items-center justify-content-between p-4 p-lg-5 border-0 bg-white text-icare-green fw-semibold rounded-2" data-bs-toggle="collapse" data-bs-target="#faq-<?= $idx ?>" aria-expanded="false" aria-controls="faq-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon">▼</span>
        </button>
        <div class="collapse" id="faq-<?= $idx ?>">
          <div class="px-4 px-lg-5 pb-4 pb-lg-5 pt-2">
            <div class="icare-faq-answer">
              <p class="text-gray-700 mb-0"><?= nl2br(htmlspecialchars($faq['a'])) ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
