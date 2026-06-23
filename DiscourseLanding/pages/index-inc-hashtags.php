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

    <!-- Category Filters -->
    <div class="dl-hashtag-filters dl-reveal dl-delay-1">
      <button class="dl-filter-btn active" data-filter="all">
        <i class="ki-outline ki-category fs-6 me-1"></i> All Topics
      </button>
      <button class="dl-filter-btn" data-filter="design">
        <i class="ki-outline ki-color-swatch fs-6 me-1"></i> Design & Creative
      </button>
      <button class="dl-filter-btn" data-filter="tech">
        <i class="ki-outline ki-code fs-6 me-1"></i> Tech & AI
      </button>
      <button class="dl-filter-btn" data-filter="academic">
        <i class="ki-outline ki-teacher fs-6 me-1"></i> Academics
      </button>
      <button class="dl-filter-btn" data-filter="campus">
        <i class="ki-outline ki-geolocation fs-6 me-1"></i> Campus Life
      </button>
    </div>

    <!-- Hashtag pills cloud inside a glassmorphic container -->
    <div class="dl-hashtag-cloud-container dl-reveal dl-delay-2">
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <?php
        $tags = [
          // Design & Creative
          ['label' => '#DESIGN',      'style' => 'gold',  'category' => 'design',   'icon' => 'ki-color-swatch'],
          ['label' => '#UIUX',        'style' => 'green', 'category' => 'design',   'icon' => 'ki-screen'],
          ['label' => '#GRAPHICS',    'style' => 'dark',  'category' => 'design',   'icon' => 'ki-picture'],
          ['label' => '#CREATIVE',    'style' => 'gold',  'category' => 'design',   'icon' => 'ki-flash'],
          ['label' => '#TYPOGRAPHY',  'style' => 'green', 'category' => 'design',   'icon' => 'ki-text'],
          ['label' => '#ART',         'style' => 'dark',  'category' => 'design',   'icon' => 'ki-brush'],
          ['label' => '#ANIMATION',   'style' => 'green', 'category' => 'design',   'icon' => 'ki-youtube'],
          ['label' => '#BRANDING',    'style' => 'gold',  'category' => 'design',   'icon' => 'ki-medal-star'],
          ['label' => '#PROTOTYPE',   'style' => 'dark',  'category' => 'design',   'icon' => 'ki-setting-2'],

          // Tech & AI
          ['label' => '#AI',          'style' => 'green', 'category' => 'tech',     'icon' => 'ki-electricity'],
          ['label' => '#TECHNOLOGY',  'style' => 'green', 'category' => 'tech',     'icon' => 'ki-laptop'],
          ['label' => '#GAMING',      'style' => 'gold',  'category' => 'tech',     'icon' => 'ki-joystick'],
          ['label' => '#VALORANT',    'style' => 'dark',  'category' => 'tech',     'icon' => 'ki-focus'],
          ['label' => '#ESPORTS',     'style' => 'gold',  'category' => 'tech',     'icon' => 'ki-crown'],
          ['label' => '#CODING',      'style' => 'green', 'category' => 'tech',     'icon' => 'ki-code'],

          // Academics
          ['label' => '#CAPSTONE',    'style' => 'dark',  'category' => 'academic', 'icon' => 'ki-briefcase'],
          ['label' => '#ACADEMICS',   'style' => 'gold',  'category' => 'academic', 'icon' => 'ki-book'],
          ['label' => '#SCIENCE',     'style' => 'green', 'category' => 'academic', 'icon' => 'ki-flask'],
          ['label' => '#IDEAS',       'style' => 'gold',  'category' => 'academic', 'icon' => 'ki-coffee'],
          ['label' => '#RESEARCH',    'style' => 'dark',  'category' => 'academic', 'icon' => 'ki-magnifier'],

          // Campus Life
          ['label' => '#FEU',         'style' => 'gold',  'category' => 'campus',   'icon' => 'ki-bank'],
          ['label' => '#WORLDPEACE',  'style' => 'dark',  'category' => 'campus',   'icon' => 'ki-compass'],
          ['label' => '#CULTURE',     'style' => 'green', 'category' => 'campus',   'icon' => 'ki-people'],
          ['label' => '#PETITION',    'style' => 'dark',  'category' => 'campus',   'icon' => 'ki-document'],
          ['label' => '#LIFESTYLE',   'style' => 'green', 'category' => 'campus',   'icon' => 'ki-calendar'],
          ['label' => '#MUSIC',       'style' => 'gold',  'category' => 'campus',   'icon' => 'ki-speaker'],
          ['label' => '#SPORTS',      'style' => 'dark',  'category' => 'campus',   'icon' => 'ki-heart'],
          ['label' => '#NEWS',        'style' => 'dark',  'category' => 'campus',   'icon' => 'ki-notification'],
          ['label' => '#ISSUES',      'style' => 'green', 'category' => 'campus',   'icon' => 'ki-information-2'],
        ];
        foreach ($tags as $t):
          $slug = ltrim(strtolower($t['label']), '#');
          $cls  = 'dl-hashtag dl-hashtag-' . $t['style'];
        ?>
          <a href="/DiscourseLanding/hashtags/index.php?tag=<?php echo urlencode($slug); ?>"
             class="<?php echo $cls; ?>" data-category="<?php echo $t['category']; ?>">
            <i class="ki-outline <?php echo htmlspecialchars($t['icon'] ?? 'ki-tag'); ?>" style="font-size:0.8rem; opacity:0.7;"></i>
            <span class="dl-tag-label"><?php echo htmlspecialchars(ltrim($t['label'],'#')); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- CTA row -->
    <div class="text-center mt-12 dl-reveal dl-delay-3">
      <a href="/DiscourseLanding/"
         class="btn fw-semibold rounded-pill px-8 py-3 d-inline-flex align-items-center gap-2"
         style="background:var(--dc-green-light); color:#fff; font-size:0.9rem;"
         onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
        <i class="ki-outline ki-filter fs-5"></i> Browse All Hashtags
      </a>
    </div>

    <!-- Interactive Filtering Script -->
    <script>
    window.addEventListener("DOMContentLoaded", function () {
      var filterBtns = document.querySelectorAll('.dl-filter-btn');
      var tags = document.querySelectorAll('.dl-hashtag');

      filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          filterBtns.forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');

          var filter = btn.getAttribute('data-filter');

          tags.forEach(function (tag) {
            if (filter === 'all' || tag.getAttribute('data-category') === filter) {
              tag.style.display = 'inline-flex';
              tag.classList.add('animate-tag-in');
              // Clear the animation class after it completes to allow triggering it again
              setTimeout(function() { tag.classList.remove('animate-tag-in'); }, 300);
            } else {
              tag.style.display = 'none';
            }
          });
        });
      });
    });
    </script>

  </div>
</section>
