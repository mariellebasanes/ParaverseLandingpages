<?php
$photoBase = isset($GCO_BASE)
  ? $GCO_BASE . 'assets/img/GCO Assets/gco faculties'
  : 'assets/img/GCO Assets/gco faculties';
$logoBase = isset($GCO_BASE)
  ? $GCO_BASE . 'assets/img/programs-logo'
  : 'assets/img/programs-logo';
$director = [
  'name' => 'Marietta M. Bengat', 
  'role' => 'DIRECTOR', 
  'email' => 'mmbengat@feutech.edu.ph', 
  'photo' => '../../team/team-blank.jpg'
];

$counselors = [
  ['name' => 'Rochile G. Borje', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'rgborje@feutech.edu.ph', 'programs' => ['BSCE', 'BSCEM', 'BSCPE', 'BSECE'], 'photo' => 'borje.png'],
  ['name' => 'Vilma R. Colinco', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'vrcolinco@feutech.edu.ph', 'programs' => ['BSITSMBA', 'BSCYBER', 'BSMFGE', 'BSCE'], 'photo' => 'Colinco.png'],
  ['name' => 'Charlene Marie A. Arabejo', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'caarabejo@feutech.edu.ph', 'programs' => ['BSITSMBA', 'BSCYBER'], 'photo' => 'Arabejo.png'],
  ['name' => 'Paula Trisha D. Balcera', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'pdbalcera@feutech.edu.ph', 'programs' => ['BSITWMA', 'BSITAGD'], 'photo' => 'balcera.png'],
];

$psychometrician = [
  'name' => 'Moira Ashley C. Roy', 
  'role' => 'PSYCHOMETRICIAN', 
  'email' => 'mcroy@feutech.edu.ph', 
  'programs' => ['BSMFGE', 'BSCE', 'BSITWMA', 'BSITAGD'], 
  'photo' => 'roy.png'
];
?>
<section class="bg-light py-20 overflow-hidden position-relative" style="z-index: 0;">
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
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/human-brain.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; right: 5%; opacity: 0.4; pointer-events: none; width: 260px; transform: rotate(10deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/brain.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; left: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(-15deg); z-index: 0;"
    alt="">
  <div class="container-xxl position-relative" style="z-index: 1;">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">MEET THE TEAM</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-600">Our Dedicated Team</h2>
      <p class="text-gray-600 fs-5 mw-500px mx-auto">Meet our professional team ready to support your wellness journey</p>
    </div>

    <!-- DIRECTOR AREA -->
    <div class="mb-20 text-center">
      <h3 class="fw-bold fs-1 mb-8 text-primary">Director</h3>
      <div class="d-flex justify-content-center">
        <div class="card card-bordered overflow-hidden" style="max-width: 300px;">
          <div class="ratio ratio-1x1 overflow-hidden">
            <img src="<?= htmlspecialchars($photoBase . '/' . $director['photo'])?>" alt="<?= htmlspecialchars($director['name'])?>"
              class="object-fit-cover w-100 h-100 position-absolute top-0 start-0 hover-scale">
          </div>
          <div class="card-body p-6 d-flex flex-column text-start">
            <span class="badge badge-light-primary fs-9 text-uppercase ls-1 mb-3 align-self-start">
              <?= htmlspecialchars($director['role'])?>
            </span>
            <h3 class="fw-bold fs-3 mb-1 text-gray-800">
              <?= htmlspecialchars($director['name'])?>
            </h3>
            <a href="mailto:<?= htmlspecialchars($director['email'])?>"
              class="text-gray-600 fs-7 d-block mb-4">
              <?= htmlspecialchars($director['email'])?>
            </a>
            <div class="separator mb-4"></div>
            <div class="mt-auto">
              <a href="mailto:<?= htmlspecialchars($director['email'])?>"
                class="btn btn-primary btn-sm fw-semibold w-100 hover-elevate-up">
                <i class="ki-duotone ki-messages fs-6 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                Contact Director
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- GUIDANCE COUNSELOR AREA -->
    <div class="mb-20">
      <div class="text-center mb-10">
        <h3 class="fw-bold fs-1 mb-4 text-primary">Guidance Counselors</h3>
      </div>
      <div class="swiper my-5 pb-10" id="teamSwiper">
        <div class="swiper-wrapper">
          <?php foreach ($counselors as $m): ?>
          <div class="swiper-slide h-auto">
            <div class="card card-bordered overflow-hidden h-100 mx-auto" style="max-width: 260px;">
              <div class="ratio ratio-1x1 overflow-hidden">
                <img src="<?= htmlspecialchars($photoBase . '/' . $m['photo'])?>" alt="<?= htmlspecialchars($m['name'])?>"
                  class="object-fit-cover w-100 h-100 position-absolute top-0 start-0 hover-scale">
              </div>
              <div class="card-body p-5 p-lg-6 d-flex flex-column">
                <span class="badge badge-light-primary fs-9 text-uppercase ls-1 mb-3 align-self-start">
                  <?= htmlspecialchars($m['role'])?>
                </span>
                <h3 class="fw-bold fs-4 mb-1 text-gray-800">
                  <?= htmlspecialchars($m['name'])?>
                </h3>
                <a href="mailto:<?= htmlspecialchars($m['email'])?>"
                  class="text-gray-600 fs-7 d-block mb-4 text-truncate">
                  <?= htmlspecialchars($m['email'])?>
                </a>
                <div class="separator mb-4"></div>
                <div class="text-gray-500 fs-9 fw-normal text-uppercase ls-1 mb-3">Assigned Programs</div>
                <div class="d-flex flex-wrap gap-2 mb-4">
                  <?php foreach ($m['programs'] as $p): ?>
                  <span class="badge badge-light fs-9 fw-semibold d-flex align-items-center gap-2">
                    <img src="<?= htmlspecialchars($logoBase . '/' . $p . '.png')?>" alt="<?= htmlspecialchars($p)?>" class="w-15px h-15px">
                    <?= htmlspecialchars($p)?>
                  </span>
                  <?php endforeach; ?>
                </div>
                <div class="mt-auto">
                  <a href="mailto:<?= htmlspecialchars($m['email'])?>"
                    class="btn btn-light-primary btn-sm fw-semibold w-100 hover-elevate-up">
                    Contact Counselor
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination mt-8 position-relative"></div>
      </div>
    </div>

    <!-- PSYCHOMETRICIAN AREA -->
    <div class="text-center">
      <h3 class="fw-bold fs-1 mb-8 text-primary">Psychometrician</h3>
      <div class="d-flex justify-content-center">
        <div class="card card-bordered overflow-hidden" style="max-width: 280px;">
          <div class="ratio ratio-1x1 overflow-hidden">
            <img src="<?= htmlspecialchars($photoBase . '/' . $psychometrician['photo'])?>" alt="<?= htmlspecialchars($psychometrician['name'])?>"
              class="object-fit-cover w-100 h-100 position-absolute top-0 start-0 hover-scale">
          </div>
          <div class="card-body p-6 d-flex flex-column text-start">
            <span class="badge badge-light-primary fs-9 text-uppercase ls-1 mb-3 align-self-start">
              <?= htmlspecialchars($psychometrician['role'])?>
            </span>
            <h3 class="fw-bold fs-4 mb-1 text-gray-800">
              <?= htmlspecialchars($psychometrician['name'])?>
            </h3>
            <a href="mailto:<?= htmlspecialchars($psychometrician['email'])?>"
              class="text-gray-600 fs-7 d-block mb-4">
              <?= htmlspecialchars($psychometrician['email'])?>
            </a>
            <div class="separator mb-4"></div>
            <div class="text-gray-500 fs-9 fw-normal text-uppercase ls-1 mb-3">Assigned Programs</div>
            <div class="d-flex flex-wrap gap-2 mb-4">
              <?php foreach ($psychometrician['programs'] as $p): ?>
              <span class="badge badge-light fs-9 fw-semibold d-flex align-items-center gap-2">
                <img src="<?= htmlspecialchars($logoBase . '/' . $p . '.png')?>" alt="<?= htmlspecialchars($p)?>" class="w-15px h-15px">
                <?= htmlspecialchars($p)?>
              </span>
              <?php endforeach; ?>
            </div>
            <div class="mt-auto">
              <a href="mailto:<?= htmlspecialchars($psychometrician['email'])?>"
                class="btn btn-light-primary btn-sm fw-semibold w-100 hover-elevate-up">
                Contact Psychometrician
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
          new Swiper('#teamSwiper', {
            slidesPerView: 1, spaceBetween: 20, loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: { 640: { slidesPerView: 2, spaceBetween: 20 }, 1024: { slidesPerView: 4, spaceBetween: 20 } }
          });
        }
      });
    </script>
    <style>
      .hover-scale {
        transition: transform .3s ease;
      }

      .card:hover .hover-scale {
        transform: scale(1.05);
      }

      #teamSwiper .swiper-pagination-bullet {
        background-color: var(--bs-primary);
        opacity: .5;
      }

      #teamSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        width: 24px;
        border-radius: 8px;
      }
    </style>

  </div>
</section>