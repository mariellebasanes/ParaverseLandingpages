<?php
$BASE = isset($ICARE_BASE) ? $ICARE_BASE : '/Icare/Icare';
$events = [
  [
    'img' => $BASE . '/assets/img/news-images/building-bonds-in-virtual-worlds.jpg',
    'tag' => 'Open Registration',
    'title' => 'Community Research Immersion Seminar',
    'date' => 'Mon • February 16, 2026 • 07:00 AM',
    'venue' => 'Main Auditorium',
    'organizer' => 'Prof. Zosthenes D. Alicdan',
  ],
  [
    'img' => $BASE . '/assets/img/news-images/celebrating-in-the-metaverse.jpg',
    'tag' => 'Limited Slots',
    'title' => 'Midterm Examination Strategy Workshop',
    'date' => 'Mon • February 15, 2026 • 10:00 AM',
    'venue' => 'Library Study Hall A',
    'organizer' => 'iCare Faculty Mentors',
  ],
  [
    'img' => $BASE . '/assets/img/news-images/miles-virtual-world-valentines-special-edition.jpg',
    'tag' => 'Application Open',
    'title' => 'Peer Tutoring Certification Program',
    'date' => 'Fri • February 28, 2026 • 02:00 PM',
    'venue' => 'Room 301. Academic Wing',
    'organizer' => 'Academic Coordinating Team',
  ],
];
?>
<section id="tutorial" class="icare-bg-tutorial py-15 py-lg-20 position-relative">
  <div class="app-container container-xxl position-relative">
    <div class="text-center mb-12 mb-lg-16">
      <div class="icare-badge mb-6 px-5 py-3 rounded-pill shadow-sm border border-warning border-opacity-25" style="background-color: var(--icare-bg-light);">
        <span class="fs-6 fw-bold tracking-wide text-uppercase" style="color: var(--icare-yellow);"><i class="ki-outline ki-calendar-8 fs-4 me-2"></i>Academic Calendar</span>
      </div>
      <h2 class="display-4 display-lg-2 fw-bolder mb-6 lh-sm" style="color: var(--icare-green);">
        Upcoming Academic <br class="d-none d-lg-inline">
        <span class="position-relative d-inline-block mt-2">
            <span class="position-relative z-index-1" style="color: var(--icare-yellow);">Workshops</span>
            <span class="position-absolute bottom-0 start-0 w-100 h-8px bg-warning opacity-25 translate-middle-y"></span>
        </span>
      </h2>
      <p class="fs-4 text-gray-600 mx-auto icare-max-w-md fw-medium lh-lg">
        Register for our upcoming seminars, research symposiums, and specialized academic methodology workshops.
      </p>
    </div>
    <div class="row g-6 g-lg-10">
      <?php foreach ($events as $ev): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm hover-elevate-up transition-all overflow-hidden" style="background-color: var(--icare-bg-light); border-radius: 1.5rem;">
          <div class="position-relative h-200px h-lg-250px overflow-hidden">
            <img src="<?php echo htmlspecialchars($ev['img']); ?>" alt="<?php echo htmlspecialchars($ev['title']); ?>" class="w-100 h-100 object-fit-cover hover-scale transition-all">
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill fw-bold px-3 py-2 text-white shadow-sm" style="background-color: var(--icare-green);"><?php echo htmlspecialchars($ev['tag']); ?></span>
            </div>
          </div>
          <div class="card-body p-6 p-lg-8">
            <h3 class="fs-3 fw-bolder mb-5 text-dark lh-base hover-text-warning cursor-pointer transition-all"><?php echo htmlspecialchars($ev['title']); ?></h3>
            
            <div class="d-flex align-items-center gap-3 mb-4 text-muted fw-medium">
              <div class="d-flex align-items-center justify-content-center w-35px h-35px rounded-circle bg-light-warning" style="background-color: rgba(253, 188, 23, 0.1);">
                  <i class="ki-outline ki-calendar-2 fs-4" style="color: var(--icare-yellow);"></i>
              </div>
              <span class="text-gray-700"><?php echo htmlspecialchars($ev['date']); ?></span>
            </div>
            
            <div class="d-flex align-items-center gap-3 mb-4 text-muted fw-medium">
              <div class="d-flex align-items-center justify-content-center w-35px h-35px rounded-circle bg-light-success" style="background-color: rgba(12, 151, 81, 0.1);">
                  <i class="ki-outline ki-geolocation fs-4" style="color: var(--icare-green-light);"></i>
              </div>
              <span class="text-gray-700"><?php echo htmlspecialchars($ev['venue']); ?></span>
            </div>
            
            <div class="d-flex align-items-center gap-3 text-muted fw-medium">
              <div class="d-flex align-items-center justify-content-center w-35px h-35px rounded-circle bg-light-primary" style="background-color: rgba(0, 145, 71, 0.1);">
                  <i class="ki-outline ki-profile-user fs-4" style="color: var(--icare-green);"></i>
              </div>
              <span class="text-gray-700"><?php echo htmlspecialchars($ev['organizer']); ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php
endforeach; ?>
    </div>
  </div>
</section>
