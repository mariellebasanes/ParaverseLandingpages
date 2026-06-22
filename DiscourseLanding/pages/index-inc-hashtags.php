<?php /* index-inc-hashtags.php — "Every subject has a hashtag" — light green bg */ ?>
<!-- ════════════════  HASHTAGS SECTION  ════════════════════ -->
<section id="hashtags" class="py-20 dc-bg-tint">
  <div class="container-xxl">

    <!-- Section header -->
    <div class="text-center mx-auto mb-12 dl-reveal" style="max-width:520px;">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-tag fs-6"></i>
        Topic Discovery
      </span>
      <h2 class="fw-bolder text-gray-900 mb-4" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
        Every subject has a hashtag
      </h2>
      <p class="text-gray-500" style="font-size:1rem; line-height:1.72;">
        Hashtags group discussions dynamically across all communities. Click any tag to see how Discourse aggregates trending campus conversations.
      </p>
    </div>

    <!-- Hashtag pills cloud -->
    <div class="d-flex flex-wrap justify-content-center gap-3 dl-reveal dl-delay-1">
      <?php
      $tags = [
        ['label' => '#TECHNOLOGY',    'style' => 'green'],
        ['label' => '#FEU',           'style' => 'gold'],
        ['label' => '#GAMING',        'style' => 'green'],
        ['label' => '#WORLDPEACE',    'style' => 'dark'],
        ['label' => '#AI',            'style' => 'green'],
        ['label' => '#VALORANT',      'style' => 'gold'],
        ['label' => '#CULTURE',       'style' => 'green'],
        ['label' => '#CAPSTONE',      'style' => 'dark'],
        ['label' => '#ACADEMICS',     'style' => 'gold'],
        ['label' => '#ESPORTS',       'style' => 'green'],
        ['label' => '#PETITION',      'style' => 'dark'],
        ['label' => '#LIFESTYLE',     'style' => 'green'],
        ['label' => '#MUSIC',         'style' => 'gold'],
        ['label' => '#SCIENCE',       'style' => 'green'],
        ['label' => '#SPORTS',        'style' => 'dark'],
        ['label' => '#CREATIVE',      'style' => 'gold'],
        ['label' => '#POLITICS',      'style' => 'green'],
        ['label' => '#NEWS',          'style' => 'dark'],
        ['label' => '#IDEAS',         'style' => 'gold'],
        ['label' => '#ISSUES',        'style' => 'green'],
      ];
      foreach ($tags as $t):
        $slug = ltrim(strtolower($t['label']), '#');
        $cls  = 'dl-hashtag dl-hashtag-' . $t['style'];
      ?>
        <a href="/ParaverseLandingpages/DiscourseLanding/hashtags/index.php?tag=<?php echo urlencode($slug); ?>"
           class="<?php echo $cls; ?>">
          <i class="ki-outline ki-tag" style="font-size:0.8rem; opacity:0.7;"></i>
          <?php echo htmlspecialchars(ltrim($t['label'],'#')); ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- CTA row -->
    <div class="text-center mt-12 dl-reveal dl-delay-2">
      <a href="/ParaverseLandingpages/DiscourseLanding/"
         class="btn fw-semibold rounded-pill px-8 py-3 d-inline-flex align-items-center gap-2"
         style="background:var(--dc-green-light); color:#fff; font-size:0.9rem;"
         onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
        <i class="ki-outline ki-filter fs-5"></i> Browse All Hashtags
      </a>
    </div>

  </div>
</section>
