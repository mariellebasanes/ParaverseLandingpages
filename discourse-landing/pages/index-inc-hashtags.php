<?php /* index-inc-hashtags.php — "Every subject has a hashtag" — infinite ticker carousel */ ?>
<!-- ════════════════  HASHTAGS SECTION  ════════════════════ -->
<section id="hashtags" class="py-20 dc-bg-tint">
  <div class="container-xxl">

    <div class="row align-items-center mb-10">
      <!-- Section header & CTA -->
      <div class="col-lg-6 mb-8 mb-lg-0 dl-reveal">
        <span class="dl-eyebrow dl-eyebrow-green">
          <i class="ki-outline ki-tag fs-6"></i>
          Topic Discovery
        </span>
        <h2 class="fw-bolder text-gray-900 mb-4" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
          Every subject has a hashtag
        </h2>
        <p class="text-gray-500 mb-8" style="font-size:1rem; line-height:1.72;">
          Hashtags group discussions dynamically across all communities. Click any tag to see how Discourse aggregates trending campus conversations.
        </p>
        <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>"
           class="btn fw-semibold rounded-pill px-8 py-3 d-inline-flex align-items-center gap-2"
           style="background:var(--dc-green-light); color:#fff; font-size:0.9rem;"
           onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          <i class="ki-outline ki-filter fs-5"></i> Browse All Hashtags
        </a>
      </div>
    </div>

    <?php
    /* Split 20 tags into 3 rows (7 / 7 / 6) and duplicate each row for seamless looping */
    $all_tags = [
      ['label' => '#TECHNOLOGY',  'style' => 'green', 'icon' => 'ki-outline ki-laptop'],
      ['label' => '#FEU',         'style' => 'gold',  'icon' => 'ki-outline ki-bank'],
      ['label' => '#GAMING',      'style' => 'green', 'icon' => 'ki-outline ki-mouse'],
      ['label' => '#WORLDPEACE',  'style' => 'dark',  'icon' => 'ki-outline ki-map'],
      ['label' => '#AI',          'style' => 'green', 'icon' => 'ki-outline ki-electricity'],
      ['label' => '#VALORANT',    'style' => 'gold',  'icon' => 'ki-outline ki-focus'],
      ['label' => '#CULTURE',     'style' => 'green', 'icon' => 'ki-outline ki-paintbucket'],
      ['label' => '#CAPSTONE',    'style' => 'dark',  'icon' => 'ki-outline ki-bookmark'],
      ['label' => '#ACADEMICS',   'style' => 'gold',  'icon' => 'ki-outline ki-book'],
      ['label' => '#ESPORTS',     'style' => 'green', 'icon' => 'ki-outline ki-award'],
      ['label' => '#PETITION',    'style' => 'dark',  'icon' => 'ki-outline ki-document'],
      ['label' => '#LIFESTYLE',   'style' => 'green', 'icon' => 'ki-outline ki-cup'],
      ['label' => '#MUSIC',       'style' => 'gold',  'icon' => 'ki-outline ki-star'],
      ['label' => '#SCIENCE',     'style' => 'green', 'icon' => 'ki-outline ki-flask'],
      ['label' => '#SPORTS',      'style' => 'dark',  'icon' => 'ki-outline ki-medal-star'],
      ['label' => '#CREATIVE',    'style' => 'gold',  'icon' => 'ki-outline ki-brush'],
      ['label' => '#POLITICS',    'style' => 'green', 'icon' => 'ki-outline ki-bank'],
      ['label' => '#NEWS',        'style' => 'dark',  'icon' => 'ki-outline ki-document'],
      ['label' => '#IDEAS',       'style' => 'gold',  'icon' => 'ki-outline ki-electricity'],
      ['label' => '#ISSUES',      'style' => 'green', 'icon' => 'ki-outline ki-message-notif'],
    ];

    $rows = [
      array_slice($all_tags, 0, 7),
      array_slice($all_tags, 7, 7),
      array_slice($all_tags, 14),
    ];

    function render_ticker_tag($t) {
      global $DISCOURSE_BASE;
      $slug = ltrim(strtolower($t['label']), '#');
      $cls  = 'dl-hashtag dl-hashtag-' . $t['style'];
      echo '<a href="' . htmlspecialchars($DISCOURSE_BASE) . 'hashtags/index.php?tag=' . urlencode($slug) . '" class="' . $cls . '">'
        . '<i class="' . htmlspecialchars($t['icon']) . ' me-1" style="font-size:0.8rem; opacity:0.7;"></i>'
        . htmlspecialchars(ltrim($t['label'], '#'))
        . '</a>';
    }
    ?>

    <!-- Ticker Carousel: 3 rows, alternating direction -->
    <div class="dl-ticker-wrap dl-reveal dl-delay-1" style="margin-left:-1.5rem; margin-right:-1.5rem;">

      <?php foreach ($rows as $ri => $row): ?>
      <div class="dl-ticker-row dl-ticker-row--<?php echo $ri + 1; ?>">
        <!-- Group 1 -->
        <div class="dl-ticker-group">
          <?php for ($k = 0; $k < 3; $k++): ?>
            <?php foreach ($row as $t): render_ticker_tag($t); endforeach; ?>
          <?php endfor; ?>
        </div>
        <!-- Group 2 (Duplicate for seamless loop) -->
        <div class="dl-ticker-group">
          <?php for ($k = 0; $k < 3; $k++): ?>
            <?php foreach ($row as $t): render_ticker_tag($t); endforeach; ?>
          <?php endfor; ?>
        </div>
      </div>
      <?php endforeach; ?>

    </div><!-- /dl-ticker-wrap -->

  </div>
</section>
