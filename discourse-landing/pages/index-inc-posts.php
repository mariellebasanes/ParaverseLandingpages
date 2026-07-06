<?php
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════  POSTS + SIDEBAR (What students are saying)  ════════════ -->
<section id="posts" class="py-20 dc-bg-light" style="position: relative; overflow: hidden;">
  <!-- Ambient background glow blobs -->
  <div class="dl-posts-glow-1" style="position: absolute; top: 10%; left: -150px; width: 550px; height: 550px; background: radial-gradient(circle, rgba(6,171,98, 0.08) 0%, rgba(255, 255, 255, 0) 70%); pointer-events: none; z-index: 0; animation: dl-blob-pulse 24s infinite alternate ease-in-out;"></div>
  <div class="dl-posts-glow-2" style="position: absolute; bottom: 10%; right: -150px; width: 550px; height: 550px; background: radial-gradient(circle, rgba(235,187,7, 0.08) 0%, rgba(255, 255, 255, 0) 70%); pointer-events: none; z-index: 0; animation: dl-blob-pulse-reverse 28s infinite alternate ease-in-out;"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <!-- Section header -->
    <div class="mb-10">
      <span class="dl-eyebrow dl-eyebrow-green">
        <i class="ki-outline ki-messages fs-6"></i>
        Interactive Mock Feed
      </span>
      <h2 class="fw-bolder text-gray-900 mb-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
        What students are saying
      </h2>
      <p class="text-gray-600 mb-0" style="font-size:1rem; line-height:1.72; max-width:520px;">
        See the FEU Tech, Alabang, and Diliman communities in action. Upvote posts, join comments, and try the live poll — exactly like the real Discourse dashboard.
      </p>
    </div>

    <!-- Two-column layout: feed + sidebar -->
    <div class="row g-7 align-items-stretch">

      <!-- LEFT: post detail view (col-lg-8) -->
      <div class="col-lg-8 d-flex flex-column">
        
        <div class="card border-0 shadow-sm bg-white p-6 p-lg-8 rounded-4 mb-0 flex-grow-1 d-flex flex-column justify-content-between" data-dc="post-card">
          <!-- Card Header Row -->
          <div class="d-flex justify-content-between align-items-center mb-6">
            <div class="d-flex align-items-center gap-2">
              <span class="badge rounded-2 p-0 d-inline-flex align-items-center justify-content-center"
                    style="background: #e6f8f0; color: #06AB62; width: 32px; height: 32px; flex-shrink: 0;">
                <i class="ki-outline ki-eye fs-5" style="color: #06AB62;"></i>
              </span>
              <span class="badge rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                    style="font-size: 0.72rem; background: #e6f8f0; color: #06AB62; height: 32px;">
                c/CS Department
              </span>
            </div>
            <button class="dl-post-report btn btn-link text-muted p-0 d-inline-flex align-items-center gap-1.5 text-decoration-none fw-semibold" style="font-size: 0.82rem;">
              <i class="ki-outline ki-flag fs-6"></i> Report
            </button>
          </div>

          <!-- Author Info Row -->
          <div class="d-flex align-items-center gap-3 mb-6">
            <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;" alt="Khrysseline Faith R. Tuballa">
            <div>
              <div class="d-flex align-items-center">
                <span class="fw-bold text-gray-900 fs-6">Khrysseline Faith R. Tuballa</span>
                <span class="badge px-3 py-1 fw-bold ms-2" style="font-size: 0.7rem; background: #e6f8f0; color: #06AB62; border-radius: 6px;">Others</span>
              </div>
              <div class="text-muted mt-0.5" style="font-size: 0.76rem;">29 days ago</div>
            </div>
          </div>

          <!-- Title -->
          <h2 class="fw-extrabold text-gray-900 mb-4" style="font-size: 1.45rem; line-height: 1.25; letter-spacing: -0.015em;">
            How do you balance difficult major subjects with general education courses?
          </h2>

          <!-- Content rendered literally as HTML string in text -->
          <p class="text-gray-700 mb-6" style="font-size: 0.95rem; line-height: 1.68;">
            &lt;p&gt;I'm currently taking several major subjects alongside GE courses, and I'm finding it difficult to manage deadlines and study time effectively. For students who have gone through a similar semester, what strategies helped you stay organized and avoid burnout? Any tips on scheduling, note-taking, or prioritizing requirements would be appreciated.&lt;/p&gt;
          </p>

          <!-- Reactions Row -->
          <div class="d-flex align-items-center gap-6 text-muted fs-7 mb-6" id="dl-reactions-row">
            <button class="btn p-0 d-inline-flex align-items-center gap-2 text-muted hover-text-success border-0 bg-transparent" id="dl-like-btn">
              <i class="ki-outline ki-like fs-4"></i> <span id="dl-like-cnt">1</span>
            </button>
            <button class="btn p-0 d-inline-flex align-items-center gap-2 text-muted hover-text-danger border-0 bg-transparent" id="dl-dislike-btn">
              <i class="ki-outline ki-dislike fs-4"></i> <span id="dl-dislike-cnt">2</span>
            </button>
            <span class="d-inline-flex align-items-center gap-2 text-muted">
              <i class="ki-outline ki-message-text-2 fs-4"></i> <span class="dl-comment-total-cnt">5</span>
            </span>
            <button class="btn p-0 d-inline-flex align-items-center gap-2 text-muted hover-text-primary border-0 bg-transparent" id="dl-bookmark-btn">
              <i class="ki-outline ki-bookmark fs-4"></i> <span id="dl-bookmark-cnt">5</span>
            </button>
          </div>

          <hr class="text-gray-200 my-6">

          <!-- Comments Heading -->
          <h3 class="fw-bolder text-gray-900 mb-6" style="font-size: 1.15rem;">
            Comments <span class="text-muted fw-normal fs-6 ms-1" id="dl-comments-title-cnt">5</span>
          </h3>

          <!-- Comments List -->
          <div class="d-flex flex-column gap-5 mb-6" id="dl-comments-list">
            <!-- Comment 1 -->
            <div class="d-flex gap-3 align-items-start">
              <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width: 36px; height: 36px; object-fit: cover;" alt="Khrysseline Faith R. Tuballa">
              <div>
                <div class="fw-bold text-gray-900 fs-7">Khrysseline Faith R. Tuballa</div>
                <p class="text-gray-700 mb-0 mt-1" style="font-size: 0.88rem; line-height: 1.5;">I suggest setting up a weekly planner and dedicating specific blocks of time exclusively to your major subjects. For GE courses, try to skim the readings ahead of time so you can participate actively in class discussions without spending hours on them later.</p>
              </div>
            </div>

            <!-- Comment 2 -->
            <div class="d-flex gap-3 align-items-start">
              <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" 
                   style="width: 36px; height: 36px; background: #06AB62; font-size: 0.85rem; flex-shrink: 0;">
                MM
              </div>
              <div>
                <div class="fw-bold text-gray-900 fs-7">Marixine Sofia S. Manahan</div>
                <p class="text-gray-700 mb-0 mt-1" style="font-size: 0.88rem; line-height: 1.5;">Don't underestimate the power of starting early on your programming labs! Leaving CS projects for the last minute while trying to write GE essays is how you get burned out. Try spacing out your deliverables and using tools like Notion to track deadlines.</p>
              </div>
            </div>
          </div>

          <!-- Add Comment Form -->
          <form id="dl-single-comment-form" class="mt-4 border-top border-gray-100 pt-5">
            <div class="d-flex align-items-center gap-3">
              <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" 
                   style="width: 32px; height: 32px; background: #d4a800; font-size: 0.75rem; flex-shrink: 0;">
                U
              </div>
              <input type="text" id="dl-comment-input-field" class="form-control form-control-sm rounded-pill px-4 bg-light border-0" placeholder="Write a comment…" required style="font-size: 0.82rem; height: 36px;">
              <button type="submit" class="btn btn-sm btn-success rounded-pill px-5 fw-bold" style="background: var(--dc-green-light); color: #fff; height: 36px; display: flex; align-items: center; border: none;">Post</button>
            </div>
          </form>
        </div>

      </div>

      <!-- RIGHT: Sidebar (matches sec-sidebar.php widgets) -->
      <div class="col-lg-4 d-flex flex-column">

        <!-- Widget 1: Discourse info card — dark green (from sec-sidebar.php) -->
        <div class="dl-sidebar-info-card p-5 mb-5 rounded-4 shadow-sm" style="min-height:220px;">
          <div class="dl-sidebar-glow"></div>
          <div style="position:relative;z-index:1;">
            <img src="<?php echo $base; ?>assets/images/Discourse-logo.png" alt="Discourse Logo" style="height:52px;width:auto;margin-bottom:14px;">
            <p class="text-white mb-3" style="opacity:0.78; font-size:0.84rem; line-height:1.65;">
              Ask questions, start debates, post anonymously. No prof. No judgment. Just FEU Tech, Alabang, and Diliman students keeping it real.
            </p>
            <hr style="border-color:rgba(255,255,255,0.10); margin:12px 0;">
            <!-- Trending posts from sec-sidebar.php -->
            <?php
            $trending = [
              ['emoji'=>'🎮','text'=>'E-Sports Tournament sign-ups are OPEN — Valorant & ML squads needed now!','sub'=>'just posted · 12 comments'],
              ['emoji'=>'📅','text'=>'Capstone Defense Schedule for AY 2025–2026 is now posted in c/FEU TECH DEV','sub'=>'5 comments · most active'],
              ['emoji'=>'📚','text'=>'Finals study session this Saturday at SM Alabang — who\'s joining?','sub'=>'no replies yet'],
            ];
            foreach ($trending as $tr): ?>
            <a href="<?php echo $base; ?>posts/index.php"
               class="discourse-info-post-item d-flex align-items-start gap-2 p-2 rounded text-decoration-none mb-1">
              <span style="margin-top:2px; font-size:0.82rem;"><?php echo $tr['emoji']; ?></span>
              <div>
                <div class="text-white fw-semibold" style="font-size:0.78rem; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; line-height:1.4;">
                  <?php echo htmlspecialchars($tr['text']); ?>
                </div>
                <div style="font-size:0.68rem; color:rgba(255,255,255,0.45);"><?php echo $tr['sub']; ?></div>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Widget 2: Community Stats (from sec-sidebar.php) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5">
          <div class="card-body p-5">
            <h6 class="fw-bold text-gray-800 fs-6 mb-4">Community Stats</h6>
            <?php
            $stats = [
              ['icon'=>'ki-outline ki-people','label'=>'Members','val'=>'4,819','sub'=>'+143 This Week'],
              ['icon'=>'ki-outline ki-message-text','label'=>'Posts Today','val'=>'390','sub'=>'Across 9 Topics'],
              ['icon'=>'ki-outline ki-chart-line-up','label'=>'Online Now','val'=>'1,042','sub'=>'Active Users'],
            ];
            foreach ($stats as $s): ?>
            <div class="dl-stat-item d-flex align-items-center justify-content-between pb-4 mb-4">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width:36px;height:36px;background:#d0f0e2;flex-shrink:0;">
                  <i class="<?php echo $s['icon']; ?>" style="color:#06AB62; font-size:1.1rem;"></i>
                </div>
                <span class="fw-bold text-gray-800 fs-8 text-uppercase" style="letter-spacing:0.06em;"><?php echo $s['label']; ?></span>
              </div>
              <div class="text-end">
                <div class="fw-bolder text-gray-800 fs-5"><?php echo $s['val']; ?></div>
                <div class="text-muted fs-9 text-uppercase" style="letter-spacing:0.04em;"><?php echo $s['sub']; ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Widget 3: Browse Topics (from sec-sidebar.php) -->
        <div class="card border-0 shadow-sm rounded-4 mb-0 flex-grow-1">
          <div class="card-body p-5">
            <h6 class="fw-bold text-gray-800 fs-6 mb-4">Browse Topics</h6>
            <div class="d-flex flex-wrap gap-2">
              <?php
              $topics = ['TECHNOLOGY','GAMING','FEU','AI','CULTURE','SCIENCE','NEWS','SPORTS','ACADEMICS'];
              foreach ($topics as $t): ?>
              <a href="<?php echo $base; ?>topics/index.php?t=<?php echo $t; ?>"
                 class="badge rounded-pill fw-semibold px-3 py-2 text-decoration-none"
                 style="font-size:0.73rem; background:#d0f0e2; color:#06AB62; transition:background 0.15s, color 0.15s;"
                 onmouseover="this.style.background='#06AB62';this.style.color='#fff';"
                 onmouseout="this.style.background='#d0f0e2';this.style.color='#06AB62';">
                <?php echo $t; ?>
              </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div><!-- /sidebar col -->

    </div><!-- /row -->
  </div>
</section>

<script>
window.addEventListener('DOMContentLoaded', function () {
  
  /* Upvote / Like toggle */
  var likeBtn = document.getElementById('dl-like-btn');
  var likeCnt = document.getElementById('dl-like-cnt');
  var dislikeBtn = document.getElementById('dl-dislike-btn');
  var dislikeCnt = document.getElementById('dl-dislike-cnt');
  
  if (likeBtn && likeCnt) {
    likeBtn.addEventListener('click', function () {
      var isLiked = likeBtn.classList.toggle('text-success');
      likeBtn.classList.toggle('fw-bold');
      var val = parseInt(likeCnt.textContent, 10);
      likeCnt.textContent = isLiked ? (val + 1) : (val - 1);
      
      // If dislike was active, remove it
      if (isLiked && dislikeBtn && dislikeBtn.classList.contains('text-danger')) {
        dislikeBtn.classList.remove('text-danger', 'fw-bold');
        var dval = parseInt(dislikeCnt.textContent, 10);
        dislikeCnt.textContent = dval - 1;
      }
    });
  }

  /* Downvote / Dislike toggle */
  if (dislikeBtn && dislikeCnt) {
    dislikeBtn.addEventListener('click', function () {
      var isDisliked = dislikeBtn.classList.toggle('text-danger');
      dislikeBtn.classList.toggle('fw-bold');
      var val = parseInt(dislikeCnt.textContent, 10);
      dislikeCnt.textContent = isDisliked ? (val + 1) : (val - 1);
      
      // If like was active, remove it
      if (isDisliked && likeBtn && likeBtn.classList.contains('text-success')) {
        likeBtn.classList.remove('text-success', 'fw-bold');
        var lval = parseInt(likeCnt.textContent, 10);
        likeCnt.textContent = lval - 1;
      }
    });
  }

  /* Bookmark toggle */
  var bkmkBtn = document.getElementById('dl-bookmark-btn');
  var bkmkCnt = document.getElementById('dl-bookmark-cnt');
  if (bkmkBtn && bkmkCnt) {
    bkmkBtn.addEventListener('click', function () {
      var isBookmarked = bkmkBtn.classList.toggle('text-primary');
      bkmkBtn.classList.toggle('fw-bold');
      var val = parseInt(bkmkCnt.textContent, 10);
      bkmkCnt.textContent = isBookmarked ? (val + 1) : (val - 1);
    });
  }

  /* Comment Form Submit */
  var commentForm = document.getElementById('dl-single-comment-form');
  var commentInput = document.getElementById('dl-comment-input-field');
  var commentsList = document.getElementById('dl-comments-list');
  var commentTotalSpan = document.querySelectorAll('.dl-comment-total-cnt');
  var commentTitleSpan = document.getElementById('dl-comments-title-cnt');

  if (commentForm && commentInput && commentsList) {
    commentForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var text = commentInput.value.trim();
      if (!text) return;
      
      var commentEl = document.createElement('div');
      commentEl.className = 'd-flex gap-3 align-items-start';
      commentEl.innerHTML = `
        <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" 
             style="width: 36px; height: 36px; background: #d4a800; font-size: 0.85rem; flex-shrink: 0;">
          U
        </div>
        <div>
          <div class="fw-bold text-gray-900 fs-7">You (Anonymous)</div>
          <p class="text-gray-700 mb-0 mt-1" style="font-size: 0.88rem; line-height: 1.5;">${text}</p>
        </div>
      `;
      
      commentsList.appendChild(commentEl);
      
      // Update counters
      if (commentTitleSpan) {
        var currentTitleCount = parseInt(commentTitleSpan.textContent, 10);
        commentTitleSpan.textContent = currentTitleCount + 1;
      }
      commentTotalSpan.forEach(function (span) {
        var currentTotalCount = parseInt(span.textContent, 10);
        span.textContent = currentTotalCount + 1;
      });
      
      // Reset & scroll
      commentInput.value = '';
    });
  }
});
</script>
