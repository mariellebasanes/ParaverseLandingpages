<section id="feedback" class="icare-bg-feedback py-15 py-lg-20 position-relative">
  <div class="app-container container-xxl position-relative">
    <div class="text-center mb-12 mb-lg-16">
      <div class="icare-badge mb-4">
        <span>Feedbacks from Students</span>
      </div>
      <h2 class="display-5 display-lg-4 text-icare-green mb-4">
        Students Spilling <span class="text-icare-yellow fw-bold">The Tea!</span>
      </h2>
      <p class="fs-4 text-gray-600 mx-auto icare-max-w-md">
        Don't just take our word for it! Here's what your fellow Tamaraws have to say about iCare
      </p>
    </div>
    <div class="row g-6">
      <?php
      $feedbacks = [
        ['name' => 'Alex Martinez', 'program' => 'BS Computer Science', 'year' => '3rd Year', 'text' => 'I was about to fail programming but the tutors saved my life! Now I actually understand pointers. Who knew? 😅', 'border' => 'border-icare-green'],
        ['name' => 'Sofia Garcia', 'program' => 'BS Information Technology', 'year' => '2nd Year', 'text' => 'Database class was giving me nightmares. iCare tutors explained SQL like I was five. Passed with flying colors! 🎨', 'border' => 'border-icare-yellow'],
        ['name' => 'Marco Dela Cruz', 'program' => 'BS Computer Engineering', 'year' => '4th Year', 'text' => 'The study skills workshop literally changed my life. I went from cramming to planning. Grades? UP! Stress? DOWN! 📈', 'border' => 'border-icare-green'],
        ['name' => 'Jasmine Tan', 'program' => 'BS Data Science', 'year' => '1st Year', 'text' => 'First year was scary but iCare made everything easier. Found my study squad here and we\'re crushing it together! 💪', 'border' => 'border-icare-yellow'],
        ['name' => 'Kevin Santos', 'program' => 'BS Information Systems', 'year' => '3rd Year', 'text' => 'They helped me plan my whole semester without overloading myself. Best decision ever. My sanity thanks you! 🧠', 'border' => 'border-icare-green'],
        ['name' => 'Isabella Ramos', 'program' => 'BS Entertainment & Multimedia Computing', 'year' => '2nd Year', 'text' => 'From barely passing to Dean\'s List! The peer mentors are absolute legends. iCare really does care! 🌟', 'border' => 'border-icare-yellow'],
      ];
      foreach ($feedbacks as $i => $f) :
        $bgClass = ($i % 2 === 0) ? 'bg-icare-green bg-opacity-10' : 'bg-icare-yellow bg-opacity-10';
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="icare-feedback-card border-2 <?= $f['border'] ?> <?= $bgClass ?> p-4 p-lg-6 position-relative rounded-3">
          <div class="position-absolute top-0 start-0 icare-badge rounded-circle d-flex align-items-center justify-content-center p-2 icare-feedback-quote-badge">"</div>
          <div class="mb-3 mt-4">
            <span class="text-icare-yellow">★</span><span class="text-icare-yellow">★</span><span class="text-icare-yellow">★</span><span class="text-icare-yellow">★</span><span class="text-icare-yellow">★</span>
          </div>
          <p class="icare-feedback-quote text-gray-800 mb-4 fst-italic bg-white p-3 rounded-3 small">"<?= htmlspecialchars($f['text']) ?>"</p>
          <div class="d-flex align-items-center gap-3">
            <img src="<?php echo isset($ICARE_BASE) ? htmlspecialchars($ICARE_BASE) : ''; ?>/assets/svg/blank-image.svg" alt="<?= htmlspecialchars($f['name']) ?>" class="rounded-circle object-fit-cover border border-2 border-white shadow icare-avatar-sm">
            <div>
              <p class="icare-feedback-name mb-0 small"><?= htmlspecialchars($f['name']) ?></p>
              <p class="icare-feedback-meta mb-0 small"><?= htmlspecialchars($f['program']) ?></p>
              <p class="icare-feedback-meta mb-0 small"><?= htmlspecialchars($f['year']) ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
