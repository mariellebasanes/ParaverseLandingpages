<?php /* index-inc-communities.php — "Find your people" — white bg */ ?>
<!-- ════════════════  COMMUNITIES SECTION  ════════════════ -->
<section id="communities" class="py-20 dc-bg-white">
  <div class="container-xxl">

    <!-- Section header -->
    <div class="row align-items-end mb-12">
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
           style="background:var(--dc-gold); color:#111; font-size:0.9rem;">
          <i class="ki-outline ki-compass fs-5"></i>Explore Communities
        </a>
      </div>
    </div>

    <!-- Community cards grid — 3 per row then wraps -->
    <div class="row g-5">

      <?php
      /*
       * members_raw  : integer used for avatar stack / overflow badge
       * posts_day    : posts per day (shown as "X+" if > 10, exact if ≤ 10)
       * avatars      : Pravatar image IDs for real member profile photos
       */
      $communities = [
        [
          'name'       => 'FEU LIFE',
          'slug'       => 'FEU%20LIFE',
          'desc'       => 'General discussions, campus updates, events, and mental health shares.',
          'members'    => '1,240',
          'members_raw'=> 1240,
          'posts_day'  => 87,
          'avatars'    => [12, 14, 18, 22],
          'ki'         => 'ki-heart',
          'bg'         => '#fdf1ef',
          'color'      => '#c0392b',
          'badge_bg'   => 'rgba(192,57,43,0.10)',
          'badge_c'    => '#c0392b',
          'filter'     => 'feu',
        ],
        [
          'name'       => 'Freshies Guide',
          'slug'       => 'Freshies',
          'desc'       => 'Guidance on enrollment, university processes, and first-year advice.',
          'members'    => '890',
          'members_raw'=> 890,
          'posts_day'  => 34,
          'avatars'    => [21, 23, 24, 25],
          'ki'         => 'ki-people',
          'bg'         => '#f1f5f9',
          'color'      => '#1e293b',
          'badge_bg'   => 'rgba(30,41,59,0.08)',
          'badge_c'    => '#1e293b',
          'filter'     => 'feu',
        ],
        [
          'name'       => 'Study Group',
          'slug'       => 'Study%20Group',
          'desc'       => 'Collaborative learning circles, test-banks, review materials, and capstone help.',
          'members'    => '620',
          'members_raw'=> 620,
          'posts_day'  => 22,
          'avatars'    => [31, 32, 33, 35],
          'ki'         => 'ki-bookmark',
          'bg'         => '#e8f5ee',
          'color'      => '#2D6A4F',
          'badge_bg'   => 'rgba(45,106,79,0.10)',
          'badge_c'    => '#2D6A4F',
          'filter'     => 'technology',
        ],
        [
          'name'       => 'CultureHub',
          'slug'       => 'CultureHub',
          'desc'       => 'Music, cinema, arts, student theater projects, and cultural gatherings.',
          'members'    => '410',
          'members_raw'=> 410,
          'posts_day'  => 15,
          'avatars'    => [41, 42, 43, 44],
          'ki'         => 'ki-star',
          'bg'         => '#f1f5f9',
          'color'      => '#1e293b',
          'badge_bg'   => 'rgba(30,41,59,0.08)',
          'badge_c'    => '#1e293b',
          'filter'     => 'feu',
        ],
        [
          'name'       => 'Cosplay &amp; Artists',
          'slug'       => 'Cosplay',
          'desc'       => 'Share illustrations, cosplays, layout tips, and local convention updates.',
          'members'    => '350',
          'members_raw'=> 350,
          'posts_day'  => 9,
          'avatars'    => [51, 52, 53, 54],
          'ki'         => 'ki-brush',
          'bg'         => 'rgba(251,197,1,0.14)',
          'color'      => '#b58105',
          'badge_bg'   => 'rgba(181,129,5,0.10)',
          'badge_c'    => '#b58105',
          'filter'     => 'gaming',
        ],
        [
          'name'       => 'E-Sports Guild',
          'slug'       => 'E-Sports',
          'desc'       => 'Valorant, Mobile Legends, tournaments, rosters, and campus gaming events.',
          'members'    => '780',
          'members_raw'=> 780,
          'posts_day'  => 61,
          'avatars'    => [61, 62, 63, 64],
          'ki'         => 'ki-rocket',
          'bg'         => '#e8f5ee',
          'color'      => '#2D6A4F',
          'badge_bg'   => 'rgba(45,106,79,0.10)',
          'badge_c'    => '#2D6A4F',
          'filter'     => 'gaming',
        ],
      ];
      $delays = ['dl-delay-1','dl-delay-2','dl-delay-3','dl-delay-1','dl-delay-2','dl-delay-3'];

      foreach ($communities as $i => $c):
        /* Posts-per-day label */
        $pd_label = ($c['posts_day'] > 10) ? $c['posts_day'] . '+' : (string)$c['posts_day'];

        /* Avatar stack: show up to 4, remainder as "+N" bubble */
        $max_av   = 4;
        $overflow = $c['members_raw'] - $max_av;   /* simplified: total members beyond the 4 avatars */
      ?>

      <div class="col-md-6 col-lg-4 dl-reveal <?php echo $delays[$i]; ?>">
        <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>communities/index.php?c=<?php echo $c['slug']; ?>"
           class="card card-flush shadow-sm hover-elevate-up h-100 text-decoration-none border-0"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()"
           style="transition: all 0.3s ease;">
          <div class="card-body p-6">

            <!-- Icon + title row -->
            <div class="d-flex align-items-center gap-4 mb-4">
              <!-- Icon -->
              <div class="symbol symbol-50px symbol-circle">
                <div class="symbol-label" style="background:<?php echo $c['bg']; ?>; color:<?php echo $c['color']; ?>;">
                  <i class="ki-solid <?php echo $c['ki']; ?> fs-2x" style="color:inherit;"></i>
                </div>
              </div>
              <!-- Title + members badge -->
              <div>
                <h4 class="fw-bolder text-gray-900 fs-5 mb-1"><?php echo htmlspecialchars($c['name']); ?></h4>
                <span class="badge fw-bold" style="background:<?php echo $c['badge_bg']; ?>; color:<?php echo $c['badge_c']; ?>;">
                  <i class="ki-outline ki-people fs-8 me-1" style="color:inherit;"></i>
                  <?php echo $c['members']; ?> members
                </span>
              </div>
            </div>

            <!-- Description -->
            <p class="text-gray-500 mb-4" style="font-size:0.85rem; line-height:1.68;">
              <?php echo htmlspecialchars($c['desc']); ?>
            </p>

            <!-- Member avatars + posts per day -->
            <div class="d-flex align-items-center justify-content-between mb-5">

              <!-- Avatar stack -->
              <div class="dl-avatar-stack">
                <?php foreach (array_slice($c['avatars'], 0, $max_av) as $img_id): ?>
                  <div class="dl-av">
                    <img src="https://i.pravatar.cc/100?img=<?php echo $img_id; ?>" alt="Member Profile" class="w-100 h-100" style="object-fit:cover;">
                  </div>
                <?php endforeach; ?>
                <?php if ($overflow > 0): ?>
                  <div class="dl-av dl-av-overflow" style="background:rgba(30,41,59,0.12); color:#475569; font-size:0.58rem; font-weight:800;">
                    +<?php echo $overflow > 999 ? round($overflow/1000, 1).'k' : $overflow; ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Posts per day -->
              <span class="d-inline-flex align-items-center gap-1" style="font-size:0.78rem; color:rgba(30,41,59,0.50); font-weight:600;">
                <i class="ki-outline ki-message-text fs-7" style="color:<?php echo $c['color']; ?>;"></i>
                <?php echo $pd_label; ?> posts/day
              </span>

            </div>

            <!-- View link -->
            <div class="d-flex align-items-center fw-bolder fs-6" style="color:var(--dc-green-light);">
              View Community <i class="ki-outline ki-arrow-right fs-4 ms-2 text-inherit"></i>
            </div>
          </div>
        </a>
      </div>

      <?php endforeach; ?>

    </div><!-- /row -->
  </div>
</section>

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
