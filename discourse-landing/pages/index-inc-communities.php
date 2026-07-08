<?php
/* index-inc-communities.php — "Find your people" — white bg */
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════════  COMMUNITIES SECTION  ════════════════ -->
<section id="communities" class="pt-20 pb-20" style="background: #ffffff; position: relative; background-image: linear-gradient(to right, rgba(6,171,98, 0.03) 1px, transparent 1px), linear-gradient(to bottom, rgba(6,171,98, 0.03) 1px, transparent 1px); background-size: 40px 40px;">

  <!-- Ambient background blobs — green & gold ONLY (clipped to section) -->
  <div style="position:absolute; inset:0; overflow:hidden; pointer-events:none; z-index:0;">
    <div style="position:absolute; top:-80px; right:-120px; width:480px; height:480px; background:rgba(6,171,98,0.07); border-radius:50%; filter:blur(80px);"></div>
    <div style="position:absolute; bottom:-60px; left:-80px; width:420px; height:420px; background:rgba(235,187,7,0.09); border-radius:50%; filter:blur(70px);"></div>
  </div>
  <div class="container-xxl" style="position:relative; z-index:1;">

    <!-- Section header -->
    <div class="row mb-6">
      <div class="col-lg-8 dl-reveal">
        <span class="dl-eyebrow dl-eyebrow-green mb-3">
          <i class="ki-outline ki-people fs-6"></i>
          Departmental &amp; Hobby Channels
        </span>
        <h2 class="fw-bolder text-gray-900 mb-0" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
          Find your <span style="color:var(--dc-gold);">people</span>
        </h2>
      </div>
    </div>

    <!-- Description & CTA -->
    <div class="row mb-10 dl-reveal">
      <div class="col-lg-8">
        <p class="text-gray-500 mb-6" style="font-size:1rem; line-height:1.72; max-width:580px;">
          Specialized channels for hobby guilds, study circles, academic departments, and general campus life — all waiting for you inside Discourse.
        </p>
        <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php"
           class="btn fw-bold rounded-pill px-7 py-3 d-inline-flex align-items-center gap-2"
           style="background:var(--dc-gold); color:#111; font-size:0.9rem; box-shadow: 0 4px 16px rgba(235,187,7,0.35);">
          <i class="ki-outline ki-compass fs-5"></i>Explore Communities
        </a>
      </div>
    </div>

    <!-- Carousel wrapper -->
    <div class="dl-comm-carousel-wrap dl-reveal dl-delay-1">
      <div id="dl-comm-carousel" class="dl-comm-carousel">

        <?php
        /*
         * avatar_letters : initials for Metronic symbol-label avatars
         * avatar_colors  : Metronic bg color class per avatar (no purple)
         * accent / bg    : card accent bar and icon bg — no violet/purple
         */
        /* Avatar pool: alternate local images so each card looks populated */
        $av_pool = [
          $base . 'assets/images/catalina.webp',
          $base . 'assets/images/anonymous.png',
          $base . 'assets/images/catalina.webp',
          $base . 'assets/images/anonymous.png',
        ];

        $communities = [
          [
            'name'        => 'FEU LIFE',
            'slug'        => 'FEU%20LIFE',
            'desc'        => 'General discussions, campus updates, events, and mental health shares.',
            'members'     => '1,240',
            'members_raw' => 1240,
            'posts_day'   => 87,
            'ki'          => 'ki-heart',
            'accent'      => '#c0392b',
            'bg'          => '#fdf1ef',
            'badge_bg'    => 'rgba(192,57,43,0.10)',
            'badge_c'     => '#c0392b',
            'tag'         => 'Campus Life',
          ],
          [
            'name'        => 'Freshies Guide',
            'slug'        => 'Freshies',
            'desc'        => 'Guidance on enrollment, university processes, and first-year advice.',
            'members'     => '890',
            'members_raw' => 890,
            'posts_day'   => 34,
            'ki'          => 'ki-people',
            'accent'      => '#0ea5e9',
            'bg'          => '#e8f4ff',
            'badge_bg'    => 'rgba(14,165,233,0.10)',
            'badge_c'     => '#0284c7',
            'tag'         => 'First Year',
          ],
          [
            'name'        => 'Study Group',
            'slug'        => 'Study%20Group',
            'desc'        => 'Collaborative learning circles, test-banks, review materials, and capstone help.',
            'members'     => '620',
            'members_raw' => 620,
            'posts_day'   => 22,
            'ki'          => 'ki-book',
            'accent'      => '#06AB62',
            'bg'          => '#e6f8f0',
            'badge_bg'    => 'rgba(6,171,98,0.10)',
            'badge_c'     => '#06AB62',
            'tag'         => 'Academics',
          ],
          [
            'name'        => 'CultureHub',
            'slug'        => 'CultureHub',
            'desc'        => 'Music, cinema, arts, student theater projects, and cultural gatherings.',
            'members'     => '410',
            'members_raw' => 410,
            'posts_day'   => 15,
            'ki'          => 'ki-note',
            'accent'      => '#d97706',
            'bg'          => 'rgba(235,187,7,0.13)',
            'badge_bg'    => 'rgba(200,165,0,0.10)',
            'badge_c'     => '#b45309',
            'tag'         => 'Arts & Culture',
          ],
          [
            'name'        => 'Cosplay & Artists',
            'slug'        => 'Cosplay',
            'desc'        => 'Share illustrations, cosplays, layout tips, and local convention updates.',
            'members'     => '350',
            'members_raw' => 350,
            'posts_day'   => 9,
            'ki'          => 'ki-brush',
            'accent'      => '#e85d04',
            'bg'          => '#fff0e6',
            'badge_bg'    => 'rgba(232,93,4,0.10)',
            'badge_c'     => '#c04f03',
            'tag'         => 'Creative',
          ],
          [
            'name'        => 'E-Sports Guild',
            'slug'        => 'E-Sports',
            'desc'        => 'Valorant, Mobile Legends, tournaments, rosters, and campus gaming events.',
            'members'     => '780',
            'members_raw' => 780,
            'posts_day'   => 61,
            'ki'          => 'ki-rocket',
            'accent'      => '#06AB62',
            'bg'          => '#e6f8f0',
            'badge_bg'    => 'rgba(6,171,98,0.10)',
            'badge_c'     => '#06AB62',
            'tag'         => 'Gaming',
          ],
        ];
        $max_av = 4; /* show 4 avatars max */

        foreach ($communities as $i => $c):
          $pd_label = ($c['posts_day'] > 10) ? $c['posts_day'] . '+' : (string)$c['posts_day'];
          $overflow = $c['members_raw'] - $max_av;
        ?>

        <div class="dl-comm-slide">
          <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php?c=<?php echo $c['slug']; ?>"
             class="dl-comm-card text-decoration-none d-block h-100">
            <div class="card border-0 h-100" style="border-radius:18px; background:#ffffff; box-shadow:0 2px 16px rgba(0,0,0,0.06); transition:all 0.3s cubic-bezier(0.165,0.84,0.44,1); overflow:hidden;">



              <div class="card-body p-6">

                <!-- Icon + Tag row -->
                <div class="d-flex align-items-center justify-content-between mb-5">
                  <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px; height:48px; background:<?php echo $c['bg']; ?>; flex-shrink:0;">
                    <i class="ki-outline <?php echo $c['ki']; ?> fs-2" style="color:<?php echo $c['accent']; ?>;"></i>
                  </div>
                  <span class="badge rounded-pill fw-semibold px-3 py-1" style="font-size:0.68rem; background:<?php echo $c['badge_bg']; ?>; color:<?php echo $c['badge_c']; ?>; letter-spacing:0.04em;">
                    <?php echo htmlspecialchars($c['tag']); ?>
                  </span>
                </div>

                <!-- Community name -->
                <h4 class="fw-bolder text-gray-900 fs-5 mb-1"><?php echo htmlspecialchars($c['name']); ?></h4>

                <!-- Member count -->
                <div class="d-flex align-items-center gap-1 mb-3">
                  <i class="ki-outline ki-people fs-8" style="color:<?php echo $c['accent']; ?>;"></i>
                  <span class="fw-semibold" style="font-size:0.78rem; color:<?php echo $c['accent']; ?>;">
                    <?php echo $c['members']; ?> members
                  </span>
                </div>

                <!-- Description -->
                <p class="text-gray-500 mb-5" style="font-size:0.84rem; line-height:1.68;">
                  <?php echo htmlspecialchars($c['desc']); ?>
                </p>

                <!-- Footer: avatar photos + posts/day -->
                <div class="d-flex align-items-center justify-content-between mt-auto pt-4" style="border-top:1px solid rgba(0,0,0,0.05);">

                  <!-- Avatar stack using local images -->
                  <div class="dl-avatar-stack">
                    <?php for ($j = 0; $j < $max_av; $j++): ?>
                      <div class="dl-av">
                        <img src="<?php echo $av_pool[$j]; ?>" alt="Member" class="w-100 h-100" style="object-fit:cover;">
                      </div>
                    <?php endfor; ?>
                    <?php if ($overflow > 0): ?>
                      <div class="dl-av dl-av-overflow">
                        +<?php echo $overflow > 999 ? round($overflow/1000,1).'k' : $overflow; ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Posts per day + Join link -->
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-inline-flex align-items-center gap-1" style="font-size:0.75rem; color:#94a3b8; font-weight:600;">
                      <i class="ki-outline ki-message-text fs-8" style="color:<?php echo $c['accent']; ?>;"></i>
                      <?php echo $pd_label; ?>/day
                    </span>
                    <span class="fw-bolder d-inline-flex align-items-center gap-1" style="font-size:0.82rem; color:<?php echo $c['accent']; ?>;">
                      Join <i class="ki-outline ki-arrow-right fs-6"></i>
                    </span>
                  </div>

                </div>
              </div>
            </div>
          </a>
        </div>

        <?php endforeach; ?>

      </div><!-- /dl-comm-carousel -->

      <!-- Fade edges -->
      <div class="dl-comm-fade dl-comm-fade-left"></div>
      <div class="dl-comm-fade dl-comm-fade-right"></div>

      <!-- Carousel nav buttons -->
      <button id="comm-prev" class="dl-carousel-nav dl-carousel-nav-prev" aria-label="Previous">
        <i class="ki-outline ki-arrow-left fs-4"></i>
      </button>
      <button id="comm-next" class="dl-carousel-nav dl-carousel-nav-next" aria-label="Next">
        <i class="ki-outline ki-arrow-right fs-4"></i>
      </button>
    </div><!-- /dl-comm-carousel-wrap -->

    <!-- Dot indicators -->
    <div id="dl-comm-dots" class="dl-comm-dots mt-8 mb-16" role="tablist" aria-label="Community slides"></div>

  </div>
</section>

<style>
  /* ══════════════ COMMUNITY CAROUSEL ══════════════ */

  .dl-comm-carousel-wrap {
    position: relative;
    overflow: visible;
    border-radius: 20px;
  }

  .dl-comm-carousel {
    display: flex;
    gap: 24px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;          /* Firefox */
    padding: 16px 12px 16px;
    cursor: grab;
    user-select: none;
  }
  .dl-comm-carousel::-webkit-scrollbar { display: none; }
  .dl-comm-carousel.is-dragging { cursor: grabbing; scroll-snap-type: none; }

  .dl-comm-slide {
    flex: 0 0 clamp(280px, 32vw, 360px);
    scroll-snap-align: start;
    min-height: 280px;
  }

  /* Card hover lift */
  .dl-comm-card .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(0,0,0,0.10) !important;
  }

  /* Fade-edge overlays */
  .dl-comm-fade {
    position: absolute;
    top: 0; bottom: 16px;
    width: 72px;
    pointer-events: none;
    z-index: 2;
    transition: opacity 0.3s;
  }
  .dl-comm-fade-left  {
    left: 0;
    background: linear-gradient(to right, #ffffff 10%, transparent);
    opacity: 0;
  }
  .dl-comm-fade-right {
    right: 0;
    background: linear-gradient(to left, #ffffff 10%, transparent);
  }
  .dl-comm-carousel-wrap.can-scroll-left  .dl-comm-fade-left  { opacity: 1; }
  .dl-comm-carousel-wrap.can-scroll-right .dl-comm-fade-right { opacity: 1; }

  /* Nav buttons (absolute positioned on the sides) */
  .dl-carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 46px; height: 46px;
    border-radius: 50%;
    border: 1.5px solid rgba(6,171,98,0.25);
    background: #fff;
    color: #06AB62;
    display: inline-flex; align-items: center; justify-content: center;
    cursor: pointer;
    transition: all 0.22s cubic-bezier(.34,1.56,.64,1);
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    z-index: 10;
  }
  .dl-carousel-nav-prev {
    left: 20px;
  }
  .dl-carousel-nav-next {
    right: 20px;
  }
  .dl-carousel-nav:hover {
    background: var(--dc-green-light);
    border-color: var(--dc-green-light);
    color: #fff;
    transform: translateY(-50%) scale(1.08);
    box-shadow: 0 6px 20px rgba(6,171,98,0.28);
  }
  .dl-carousel-nav:disabled {
    opacity: 0;
    pointer-events: none;
  }
  @media (max-width: 991px) {
    .dl-carousel-nav {
      display: none !important;
    }
  }

  /* Dot indicators */
  .dl-comm-dots {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .dl-comm-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: rgba(6,171,98,0.20);
    border: none; cursor: pointer; padding: 0;
    transition: all 0.3s cubic-bezier(.34,1.56,.64,1);
  }
  .dl-comm-dot.active {
    width: 28px;
    border-radius: 4px;
    background: var(--dc-green-light);
  }
</style>

<!-- Carousel JS -->
<script>
(function () {
  var carousel  = document.getElementById('dl-comm-carousel');
  var wrap      = carousel ? carousel.parentElement : null;
  var prevBtn   = document.getElementById('comm-prev');
  var nextBtn   = document.getElementById('comm-next');
  var dotsWrap  = document.getElementById('dl-comm-dots');
  if (!carousel || !wrap) return;

  var slides = carousel.querySelectorAll('.dl-comm-slide');
  var total  = slides.length;
  var slideW = 0; /* will be computed */

  /* ── Build dots ── */
  slides.forEach(function (_, idx) {
    var dot = document.createElement('button');
    dot.className = 'dl-comm-dot' + (idx === 0 ? ' active' : '');
    dot.setAttribute('role', 'tab');
    dot.setAttribute('aria-label', 'Slide ' + (idx + 1));
    dot.addEventListener('click', function () { scrollToSlide(idx); });
    dotsWrap.appendChild(dot);
  });
  var dots = dotsWrap.querySelectorAll('.dl-comm-dot');

  function getSlideW() {
    return slides[0] ? slides[0].offsetWidth + 24 : 300; /* 24 = gap */
  }

  function scrollToSlide(idx) {
    slideW = getSlideW();
    carousel.scrollTo({ left: slideW * idx, behavior: 'smooth' });
  }

  function updateState() {
    var sl = carousel.scrollLeft;
    slideW = getSlideW();
    var maxScroll = carousel.scrollWidth - carousel.clientWidth;

    /* active dot */
    var activeIdx = Math.round(sl / slideW);
    dots.forEach(function (d, i) {
      d.classList.toggle('active', i === activeIdx);
    });

    /* fade edges */
    wrap.classList.toggle('can-scroll-left',  sl > 8);
    wrap.classList.toggle('can-scroll-right', sl < maxScroll - 8);

    /* button states */
    if (prevBtn) prevBtn.disabled = sl < 8;
    if (nextBtn) nextBtn.disabled = sl >= maxScroll - 8;
  }

  /* Init */
  updateState();

  /* Nav buttons */
  if (prevBtn) prevBtn.addEventListener('click', function () {
    slideW = getSlideW();
    carousel.scrollBy({ left: -slideW, behavior: 'smooth' });
  });
  if (nextBtn) nextBtn.addEventListener('click', function () {
    slideW = getSlideW();
    carousel.scrollBy({ left: slideW, behavior: 'smooth' });
  });

  /* Scroll listener */
  carousel.addEventListener('scroll', updateState, { passive: true });

  /* ── Drag-to-scroll ── */
  var isDragging = false, startX = 0, startScroll = 0;

  carousel.addEventListener('mousedown', function (e) {
    isDragging = true;
    startX     = e.pageX - carousel.offsetLeft;
    startScroll = carousel.scrollLeft;
    carousel.classList.add('is-dragging');
  });
  document.addEventListener('mousemove', function (e) {
    if (!isDragging) return;
    e.preventDefault();
    var x    = e.pageX - carousel.offsetLeft;
    var walk = (x - startX) * 1.2;
    carousel.scrollLeft = startScroll - walk;
  });
  document.addEventListener('mouseup', function () {
    if (!isDragging) return;
    isDragging = false;
    carousel.classList.remove('is-dragging');
  });

  /* ── Community scroll-and-filter interaction ── */
  var commCards = carousel.querySelectorAll('.dl-comm-card');
  commCards.forEach(function (card) {
    card.addEventListener('click', function (e) {
      var filter = card.getAttribute('data-feed-filter');
      if (filter) {
        e.preventDefault();
        var targetSection = document.getElementById('posts');
        if (targetSection) {
          targetSection.scrollIntoView({ behavior: 'smooth' });
          var tabBtn = document.querySelector('#dl-feed-tabs .dl-feed-tab[data-filter="' + filter + '"]');
          if (tabBtn) { tabBtn.click(); }
        }
      }
    });
  });

  /* Recalculate on resize */
  window.addEventListener('resize', updateState);
})();
</script>
