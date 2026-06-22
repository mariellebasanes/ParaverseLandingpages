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
        <a href="/ParaverseLandingpages/DiscourseLanding/communities/index.php"
           class="btn fw-bold rounded-pill px-7 py-3 d-inline-flex align-items-center gap-2"
           style="background:var(--dc-gold); color:#111; font-size:0.9rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          <i class="ki-outline ki-compass fs-5"></i>Explore Communities
        </a>
      </div>
    </div>

    <!-- Community cards grid — 3 per row then wraps -->
    <div class="row g-5">

      <?php
      $communities = [
        [
          'name'    => 'FEU LIFE',
          'slug'    => 'FEU%20LIFE',
          'desc'    => 'General discussions, campus updates, events, and mental health shares.',
          'members' => '1,240',
          'ki'      => 'ki-heart',
          'bg'      => '#fdf1ef',
          'color'   => '#c0392b',
          'badge_bg'=> 'rgba(192,57,43,0.10)',
          'badge_c' => '#c0392b',
        ],
        [
          'name'    => 'Freshies Guide',
          'slug'    => 'Freshies',
          'desc'    => 'Guidance on enrollment, university processes, and first-year advice.',
          'members' => '890',
          'ki'      => 'ki-people',
          'bg'      => '#e8f0fb',
          'color'   => '#3a56d4',
          'badge_bg'=> 'rgba(58,86,212,0.10)',
          'badge_c' => '#3a56d4',
        ],
        [
          'name'    => 'Study Group',
          'slug'    => 'Study%20Group',
          'desc'    => 'Collaborative learning circles, test-banks, review materials, and capstone help.',
          'members' => '620',
          'ki'      => 'ki-bookmark',
          'bg'      => '#e8f5ee',
          'color'   => '#2D6A4F',
          'badge_bg'=> 'rgba(45,106,79,0.10)',
          'badge_c' => '#2D6A4F',
        ],
        [
          'name'    => 'CultureHub',
          'slug'    => 'CultureHub',
          'desc'    => 'Music, cinema, arts, student theater projects, and cultural gatherings.',
          'members' => '410',
          'ki'      => 'ki-star',
          'bg'      => '#e8f0fb',
          'color'   => '#3a56d4',
          'badge_bg'=> 'rgba(58,86,212,0.10)',
          'badge_c' => '#3a56d4',
        ],
        [
          'name'    => 'Cosplay & Artists',
          'slug'    => 'Cosplay',
          'desc'    => 'Share illustrations, cosplays, layout tips, and local convention updates.',
          'members' => '350',
          'ki'      => 'ki-graph',
          'bg'      => 'rgba(251,197,1,0.14)',
          'color'   => '#b58105',
          'badge_bg'=> 'rgba(181,129,5,0.10)',
          'badge_c' => '#b58105',
        ],
        [
          'name'    => 'E-Sports Guild',
          'slug'    => 'E-Sports',
          'desc'    => 'Valorant, Mobile Legends, tournaments, rosters, and campus gaming events.',
          'members' => '780',
          'ki'      => 'ki-rocket',
          'bg'      => '#e8f5ee',
          'color'   => '#2D6A4F',
          'badge_bg'=> 'rgba(45,106,79,0.10)',
          'badge_c' => '#2D6A4F',
        ],
      ];
      $delays = ['dl-delay-1','dl-delay-2','dl-delay-3','dl-delay-1','dl-delay-2','dl-delay-3'];
      foreach ($communities as $i => $c): ?>

      <div class="col-md-6 col-lg-4 dl-reveal <?php echo $delays[$i]; ?>">
        <a href="/ParaverseLandingpages/DiscourseLanding/communities/index.php?c=<?php echo $c['slug']; ?>"
           class="dl-comm-card p-6 h-100"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">

          <div class="d-flex align-items-center gap-4 mb-4">
            <!-- Icon -->
            <div class="dl-comm-icon" style="background:<?php echo $c['bg']; ?>;">
              <i class="ki-solid <?php echo $c['ki']; ?>" style="color:<?php echo $c['color']; ?>; font-size:1.4rem;"></i>
            </div>
            <!-- Title + members -->
            <div>
              <h4 class="fw-bold text-gray-900 fs-6 mb-1"><?php echo htmlspecialchars($c['name']); ?></h4>
              <span class="dl-members-badge" style="background:<?php echo $c['badge_bg']; ?>; color:<?php echo $c['badge_c']; ?>;">
                <i class="ki-outline ki-people" style="font-size:0.75rem;"></i>
                <?php echo $c['members']; ?> members
              </span>
            </div>
          </div>

          <p class="text-gray-500 mb-4" style="font-size:0.85rem; line-height:1.68;">
            <?php echo htmlspecialchars($c['desc']); ?>
          </p>

          <div class="dl-comm-arrow" style="color:var(--dc-green-light);">
            View Community <i class="ki-outline ki-arrow-right fs-6"></i>
          </div>

        </a>
      </div>

      <?php endforeach; ?>

    </div><!-- /row -->
  </div>
</section>
