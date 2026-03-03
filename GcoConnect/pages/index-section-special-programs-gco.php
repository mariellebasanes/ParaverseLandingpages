<?php
$eventsBase = isset($GCO_BASE) ? $GCO_BASE . 'assets/img/events' : 'assets/img/events';
$programs = [
  [
    'title'    => 'IQ and EQ Testing',
    'category' => 'Event Ended',
    'desc'     => "GCO R.A.D.A.R.: IQ and EQ Testing for Term 2, AY '25-26",
    'date'     => 'Mon • January 19, 2026 • 08:00 AM',
    'location' => 'Case room F1604',
    'image'    => 'IQ and EQ Testing.png',
  ],
  [
    'title'    => 'Kumustahan',
    'category' => 'Event Ended',
    'desc'     => '"KUMUSTAHAN": Group Routine Interview for Students',
    'date'     => 'Thu • December 4, 2025 • 09:00 AM',
    'location' => '1603 AVR',
    'image'    => 'kumustahan.png',
  ],
  [
    'title'    => 'Starting Your Career Path',
    'category' => 'Event Ended',
    'desc'     => 'Career Development Activity: G.A.B.A.Y. Series – Psychological Testing &amp; Career Discussion',
    'date'     => 'Mon • December 1, 2025 • 09:00 AM',
    'location' => '1603 AVR',
    'image'    => 'career path.png',
  ],
];

/* Group into slides of 3 — add more $programs entries to get slide 2, 3 … */
$slides = array_chunk($programs, 3);
?>
<section id="featured-events" class="bg-gco py-20">
  <div class="container">

    <div class="text-center mb-15">
      <span class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-25 fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">SPECIAL PROGRAMS</span>
      <h2 class="text-white fw-bolder fs-2x mb-4">Featured Events &amp; Activities</h2>
      <p class="text-white opacity-75 fs-5 mw-600px mx-auto">Join program-based interviews, testing, and consultation sessions&mdash;connected in <strong class="text-white">Eventually</strong>.</p>
    </div>

    <!--
      Multi-item Bootstrap carousel: each slide is a row of up to 3 cards.
      data-bs-ride="false"  → no auto-play; user must click prev/next.
      Controls are hidden when there is only one slide.
    -->
    <div id="eventsCarousel"
         class="carousel slide"
         data-bs-ride="false"
         data-bs-touch="true">

      <!-- Dot indicators (only rendered when >1 slide) -->
      <?php if (count($slides) > 1): ?>
      <div class="carousel-indicators mb-n6">
        <?php foreach ($slides as $si => $slide): ?>
        <button type="button"
                data-bs-target="#eventsCarousel"
                data-bs-slide-to="<?= $si ?>"
                class="<?= $si === 0 ? 'active' : '' ?>"
                <?= $si === 0 ? 'aria-current="true"' : '' ?>
                aria-label="Slide <?= $si + 1 ?>"></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Slides -->
      <div class="carousel-inner">
        <?php foreach ($slides as $si => $slide): ?>
        <div class="carousel-item <?= $si === 0 ? 'active' : '' ?>">
          <div class="row g-6 row-cols-1 row-cols-md-<?= count($slide) ?> px-<?= count($slides) > 1 ? '8' : '0' ?>">
            <?php foreach ($slide as $p): ?>
            <div class="col">
              <div class="card card-bordered overflow-hidden h-100 hover-elevate-up">

                <?php if (!empty($p['image'])): ?>
                <div style="height:200px;overflow:hidden;">
                  <img src="<?= htmlspecialchars($eventsBase . '/' . $p['image']) ?>"
                       alt="<?= htmlspecialchars($p['title']) ?>"
                       class="w-100 h-100 object-fit-cover">
                </div>
                <?php endif; ?>

                <div class="card-body p-5">
                  <span class="badge badge-light-danger text-danger fs-9 text-uppercase ls-1 fw-bold mb-3">
                    <?= htmlspecialchars($p['category']) ?>
                  </span>
                  <h4 class="fw-bold fs-6 mb-4"><?= $p['desc'] ?></h4>
                  <div class="d-flex align-items-center gap-2 text-gray-500 fs-7 mb-2">
                    <i class="ki-duotone ki-calendar-2 fs-5 text-primary">
                      <span class="path1"></span><span class="path2"></span>
                      <span class="path3"></span><span class="path4"></span><span class="path5"></span>
                    </i>
                    <?= htmlspecialchars($p['date']) ?>
                  </div>
                  <div class="d-flex align-items-center gap-2 text-gray-500 fs-7">
                    <i class="ki-duotone ki-geolocation fs-5 text-primary">
                      <span class="path1"></span><span class="path2"></span>
                    </i>
                    <?= htmlspecialchars($p['location']) ?>
                  </div>
                </div>

              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div><!-- /carousel-inner -->

      <!-- Prev / Next — only rendered when >1 slide -->
      <?php if (count($slides) > 1): ?>
      <button class="carousel-control-prev" type="button"
              data-bs-target="#eventsCarousel" data-bs-slide="prev"
              style="width:2.5rem;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button"
              data-bs-target="#eventsCarousel" data-bs-slide="next"
              style="width:2.5rem;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <?php endif; ?>

    </div><!-- /carousel -->

  </div>
</section>
