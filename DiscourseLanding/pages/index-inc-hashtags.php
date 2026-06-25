<?php /* index-inc-hashtags.php — "Every subject has a hashtag" — light green bg */ ?>
<!-- ════════════════  HASHTAGS SECTION  ════════════════════ -->
<section id="hashtags" class="py-20 dc-bg-tint">
  <div class="container-xxl">

    <div class="row align-items-center">
      <!-- Section header & CTA -->
      <div class="col-lg-5 mb-10 mb-lg-0 dl-reveal">
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

      <!-- Hashtag pills cloud -->
      <div class="col-lg-7 dl-reveal dl-delay-1">
        <div class="d-flex flex-wrap gap-3">
          <?php
          $tags = [
            ['label' => '#TECHNOLOGY',    'style' => 'green', 'icon' => 'bi bi-laptop'],
            ['label' => '#FEU',           'style' => 'gold',  'icon' => 'bi bi-building'],
            ['label' => '#GAMING',        'style' => 'green', 'icon' => 'bi bi-controller'],
            ['label' => '#WORLDPEACE',    'style' => 'dark',  'icon' => 'bi bi-globe-americas'],
            ['label' => '#AI',            'style' => 'green', 'icon' => 'bi bi-robot'],
            ['label' => '#VALORANT',      'style' => 'gold',  'icon' => 'bi bi-crosshair'],
            ['label' => '#CULTURE',       'style' => 'green', 'icon' => 'bi bi-palette'],
            ['label' => '#CAPSTONE',      'style' => 'dark',  'icon' => 'bi bi-journal-bookmark'],
            ['label' => '#ACADEMICS',     'style' => 'gold',  'icon' => 'bi bi-book'],
            ['label' => '#ESPORTS',       'style' => 'green', 'icon' => 'bi bi-trophy'],
            ['label' => '#PETITION',      'style' => 'dark',  'icon' => 'bi bi-file-earmark-text'],
            ['label' => '#LIFESTYLE',     'style' => 'green', 'icon' => 'bi bi-cup-hot'],
            ['label' => '#MUSIC',         'style' => 'gold',  'icon' => 'bi bi-music-note-beamed'],
            ['label' => '#SCIENCE',       'style' => 'green', 'icon' => 'bi bi-droplet'],
            ['label' => '#SPORTS',        'style' => 'dark',  'icon' => 'bi bi-dribbble'],
            ['label' => '#CREATIVE',      'style' => 'gold',  'icon' => 'bi bi-brush'],
            ['label' => '#POLITICS',      'style' => 'green', 'icon' => 'bi bi-bank'],
            ['label' => '#NEWS',          'style' => 'dark',  'icon' => 'bi bi-newspaper'],
            ['label' => '#IDEAS',         'style' => 'gold',  'icon' => 'bi bi-lightbulb'],
            ['label' => '#ISSUES',        'style' => 'green', 'icon' => 'bi bi-exclamation-circle'],
          ];
          foreach ($tags as $t):
            $slug = ltrim(strtolower($t['label']), '#');
            $cls  = 'dl-hashtag dl-hashtag-' . $t['style'];
          ?>
            <a href="<?php global $DISCOURSE_BASE; echo htmlspecialchars($DISCOURSE_BASE); ?>hashtags/index.php?tag=<?php echo urlencode($slug); ?>"
               class="<?php echo $cls; ?>">
              <i class="<?php echo htmlspecialchars($t['icon']); ?>" style="font-size:0.8rem; opacity:0.7;"></i>
              <?php echo htmlspecialchars(ltrim($t['label'],'#')); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>
