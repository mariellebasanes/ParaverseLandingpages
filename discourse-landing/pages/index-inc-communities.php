<?php
/* index-inc-communities.php — "Find your people" — white bg */
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════════  COMMUNITIES SECTION  ════════════════ -->
<section id="communities" class="pt-20 pb-28" style="background: #f4f6fb; position: relative;">

  <!-- Ambient background blobs — green & gold ONLY (clipped to section) -->
  <div style="position:absolute; inset:0; overflow:hidden; pointer-events:none; z-index:0;">
    <div style="position:absolute; top:-80px; right:-120px; width:480px; height:480px; background:rgba(45,106,79,0.07); border-radius:50%; filter:blur(80px);"></div>
    <div style="position:absolute; bottom:-60px; left:-80px; width:420px; height:420px; background:rgba(251,197,1,0.09); border-radius:50%; filter:blur(70px);"></div>
  </div>

  <div class="container-xxl" style="position:relative; z-index:1;">

    <!-- Section header -->
    <div class="row align-items-end mb-14">
      <div class="col-lg-7 dl-reveal">
        <span class="dl-eyebrow dl-eyebrow-green">
          <i class="ki-outline ki-people fs-6"></i>
          Departmental &amp; Hobby Channels
        </span>
        <h2 class="fw-bolder text-gray-900 mb-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
          Find your people
        </h2>
        <p class="text-gray-500 mb-0" style="font-size:1rem; line-height:1.72; max-width:480px;">
          Specialized channels for hobby guilds, study circles, academic departments, and general campus life — all waiting for you inside Discourse.
        </p>
      </div>
      <div class="col-lg-5 text-lg-end mt-6 mt-lg-0 dl-reveal dl-delay-1">
        <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php"
           class="btn fw-bold rounded-pill px-7 py-3 d-inline-flex align-items-center gap-2"
           style="background:var(--dc-gold); color:#111; font-size:0.9rem; box-shadow: 0 4px 16px rgba(251,197,1,0.35);">
          <i class="ki-outline ki-compass fs-5"></i>Explore Communities
        </a>
      </div>
    </div>

    <!-- Community cards grid -->
    <div class="row g-6">

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
          'accent'      => '#2D6A4F',
          'bg'          => '#e8f5ee',
          'badge_bg'    => 'rgba(45,106,79,0.10)',
          'badge_c'     => '#2D6A4F',
          'tag'         => 'Academics',
        ],
        [
          'name'        => 'CultureHub',
          'slug'        => 'CultureHub',
          'desc'        => 'Music, cinema, arts, student theater projects, and cultural gatherings.',
          'members'     => '410',
          'members_raw' => 410,
          'posts_day'   => 15,
          'ki'          => 'ki-music',
          'accent'      => '#d97706',
          'bg'          => 'rgba(251,197,1,0.13)',
          'badge_bg'    => 'rgba(217,119,6,0.10)',
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
          'accent'      => '#2D6A4F',
          'bg'          => '#e8f5ee',
          'badge_bg'    => 'rgba(45,106,79,0.10)',
          'badge_c'     => '#2D6A4F',
          'tag'         => 'Gaming',
        ],
      ];
      $delays   = ['dl-delay-1','dl-delay-2','dl-delay-3','dl-delay-1','dl-delay-2','dl-delay-3'];
      $max_av   = 4; /* show 4 avatars max */

      foreach ($communities as $i => $c):
        $pd_label = ($c['posts_day'] > 10) ? $c['posts_day'] . '+' : (string)$c['posts_day'];
        $overflow = $c['members_raw'] - $max_av;
      ?>

      <div class="col-md-6 col-lg-4 dl-reveal <?php echo $delays[$i]; ?>">
        <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php?c=<?php echo $c['slug']; ?>"
           class="dl-comm-card text-decoration-none d-block h-100">
          <div class="card border-0 h-100" style="border-radius:18px; background:#ffffff; box-shadow:0 2px 16px rgba(0,0,0,0.06); transition:all 0.3s cubic-bezier(0.165,0.84,0.44,1); overflow:hidden;">

            <!-- Colored top accent bar -->
            <div style="height:4px; background:linear-gradient(90deg, <?php echo $c['accent']; ?>, <?php echo $c['accent']; ?>55);"></div>

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
                    <div class="dl-av dl-av-overflow" style="background:rgba(30,41,59,0.12); color:#475569; font-size:0.58rem; font-weight:800;">
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

    </div><!-- /row -->
  </div>
</section>

<style>
  /* Community card hover lift */
  .dl-comm-card .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(0,0,0,0.10) !important;
  }
</style>

<!-- Community Scroll-and-Filter Interaction Script -->
<script>
window.addEventListener("DOMContentLoaded", function () {
  var commCards = document.querySelectorAll('.dl-comm-card');
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
});
</script>
