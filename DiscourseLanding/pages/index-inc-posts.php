<?php
$base = "/ParaverseLandingpages/DiscourseLanding/";
?>
<!-- ════════════  POSTS + SIDEBAR (What students are saying)  ════════════ -->
<section id="posts" class="py-20 dc-bg-light">
  <div class="container-xxl">

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
        See the FEU Tech community in action. Upvote posts, join comments, and try the live poll — exactly like the real Discourse dashboard.
      </p>
    </div>

    <!-- Feed filter tabs -->
    <div class="d-flex flex-wrap gap-2 mb-8" id="dl-feed-tabs">
      <button class="btn btn-sm dl-feed-tab active" data-filter="all"><i class="ki-outline ki-grid me-1 fs-7"></i>All Topics</button>
      <button class="btn btn-sm dl-feed-tab" data-filter="announcement"><i class="ki-outline ki-message-notif me-1 fs-7"></i>Announcements</button>
      <button class="btn btn-sm dl-feed-tab" data-filter="technology"><i class="ki-outline ki-message-programming me-1 fs-7"></i>Technology</button>
      <button class="btn btn-sm dl-feed-tab" data-filter="gaming"><i class="ki-outline ki-medal-star me-1 fs-7"></i>Gaming</button>
      <button class="btn btn-sm dl-feed-tab" data-filter="feu"><i class="ki-outline ki-heart me-1 fs-7"></i>FEU Life</button>
    </div>

    <!-- Two-column layout: feed + sidebar -->
    <div class="row g-7 align-items-start">

      <!-- LEFT: posts feed (col-lg-8) -->
      <div class="col-lg-8">
        <div id="dl-feed" class="d-flex flex-column gap-5">

          <!-- ── Post 1: Announcement ── -->
          <div class="card border-0 shadow-sm" data-dc="post-card" data-cat="announcement gaming"
            style="border-left:4px solid #05b166 !important; background:#f4faf6;">
            <div class="d-flex">
              <div class="dl-vote-col">
                <button class="dl-vote-btn dl-up" title="Upvote"><i class="ki-solid ki-up fs-3"></i></button>
                <span class="fw-bold text-gray-700 dl-cnt" style="font-size:0.95rem;">214</span>
                <button class="dl-vote-btn dl-down" title="Downvote"><i class="ki-solid ki-down fs-3"></i></button>
              </div>
              <div class="d-flex flex-column py-5 flex-grow-1">
                <div class="px-5 mb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center gap-2">
                      <span style="width:22px;height:22px;border-radius:6px;background:#e8f5ee;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="ki-outline ki-cpu-charge" style="color:#2D6A4F; font-size:0.75rem;"></i>
                      </span>
                      <span class="fw-bold text-gray-800 fs-7">c/FEU TECH</span>
                      <span class="badge rounded-pill px-3 py-1 fw-bold d-flex align-items-center gap-1"
                        style="font-size:0.7rem; background:#e8f5ee; color:#2D6A4F;">
                        <i class="ki-outline ki-message-notif" style="font-size:0.75rem;"></i> ANNOUNCEMENT
                      </span>
                    </div>
                    <button class="dl-post-report"><i class="ki-outline ki-flag fs-6"></i> Report</button>
                  </div>
                  <div class="d-flex gap-3 align-items-center mb-2">
                    <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width:32px;height:32px;object-fit:cover;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/catalina.webp'">
                    <div>
                      <div class="fw-bold text-gray-800 fs-7">EDITH Admin</div>
                      <div class="text-muted" style="font-size:0.72rem;"><i class="ki-outline ki-time me-1" style="font-size:0.8rem;"></i>1 hour ago</div>
                    </div>
                  </div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-2">E-Sports Tournament Registration is now live! 🎮</h5>
                  <p class="text-gray-700 mb-3" style="font-size:0.86rem; line-height:1.65;">
                    Register your teams for Valorant and Mobile Legends. Weekly slots open with cash prizes. Tag your guildmates below!
                  </p>
                  <div class="d-flex flex-wrap gap-1">
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#gaming</span>
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#esports</span>
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#campus-cup</span>
                  </div>
                </div>
                <div class="d-flex align-items-center gap-1 px-5 border-top border-gray-100 pt-3 mt-2">
                  <button class="dl-post-action dl-toggle-comments"><i class="ki-outline ki-messages me-1 fs-6"></i><span class="dl-c-cnt">3</span> Comments</button>
                  <button class="dl-post-action"><i class="ki-outline ki-share me-1 fs-6"></i>Share</button>
                  <button class="dl-post-action dl-bkmk"><i class="ki-outline ki-bookmark me-1 fs-6"></i>Save</button>
                </div>
                <div class="dl-comments-drawer px-5 pt-4 pb-4 border-top border-gray-100 mt-2">
                  <div class="dl-comments-list d-flex flex-column gap-3 mb-4" style="max-height:160px;overflow-y:auto;">
                    <div class="d-flex gap-2">
                      <img src="<?php echo $base; ?>assets/images/anonymous.png" class="rounded-circle" style="width:25px;height:25px;flex-shrink:0;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png'">
                      <div class="flex-grow-1 p-2 rounded-3" style="background:#f1f5f9;font-size:0.8rem;">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="fw-bold text-gray-800">Sofia Karim</span>
                          <span class="text-muted" style="font-size:0.7rem;">45m ago</span>
                        </div>
                        <p class="mb-0 text-gray-700">Let's form a team from BSCS! Who is down for Valorant?</p>
                      </div>
                    </div>
                    <div class="d-flex gap-2">
                      <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width:25px;height:25px;flex-shrink:0;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/catalina.webp'">
                      <div class="flex-grow-1 p-2 rounded-3" style="background:#f1f5f9;font-size:0.8rem;">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="fw-bold text-gray-800">Marco Torres</span>
                          <span class="text-muted" style="font-size:0.7rem;">30m ago</span>
                        </div>
                        <p class="mb-0 text-gray-700">Count me in as Duelist! I'll register us.</p>
                      </div>
                    </div>
                  </div>
                  <form class="dl-comment-form">
                    <div class="d-flex align-items-center gap-2">
                      <img src="<?php echo $base; ?>assets/images/anonymous.png" class="rounded-circle" style="width:26px;height:26px;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png'">
                      <input type="text" class="form-control form-control-sm rounded-pill px-4 bg-white dl-c-input" placeholder="Write a comment…" required style="font-size:0.81rem;">
                      <button type="submit" class="btn btn-sm rounded-pill px-4 fw-bold py-2" style="background:var(--dc-green-light);color:#fff;white-space:nowrap;">Post</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- ── Post 2: Technology ── -->
          <div class="card border-0 shadow-sm bg-white" data-dc="post-card" data-cat="technology">
            <div class="d-flex">
              <div class="dl-vote-col">
                <button class="dl-vote-btn dl-up" title="Upvote"><i class="ki-solid ki-up fs-3"></i></button>
                <span class="fw-bold text-gray-700 dl-cnt" style="font-size:0.95rem;">124</span>
                <button class="dl-vote-btn dl-down" title="Downvote"><i class="ki-solid ki-down fs-3"></i></button>
              </div>
              <div class="d-flex flex-column py-5 flex-grow-1">
                <div class="px-5 mb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center gap-2">
                      <span style="width:22px;height:22px;border-radius:6px;background:#eef0fb;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="ki-outline ki-message-programming" style="color:#5b61e5; font-size:0.75rem;"></i>
                      </span>
                      <span class="fw-bold text-gray-800 fs-7">c/FEU TECH DEV</span>
                      <span class="rounded-pill px-3 py-1 fw-bold" style="font-size:0.7rem;background:#eef0fb;color:#5b61e5;">TECHNOLOGY</span>
                    </div>
                    <button class="dl-post-report"><i class="ki-outline ki-flag fs-6"></i> Report</button>
                  </div>
                  <div class="d-flex gap-3 align-items-center mb-2">
                    <img src="<?php echo $base; ?>assets/images/anonymous.png" class="rounded-circle" style="width:32px;height:32px;object-fit:cover;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png'">
                    <div>
                      <div class="fw-bold text-gray-800 fs-7">Sofia Karim</div>
                      <div class="text-muted" style="font-size:0.72rem;"><i class="ki-outline ki-time me-1" style="font-size:0.8rem;"></i>2 hours ago</div>
                    </div>
                  </div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-2">Integrating AI tools in our Capstone projects? Let's discuss.</h5>
                  <p class="text-gray-700 mb-3" style="font-size:0.86rem; line-height:1.65;">
                    Has anyone tried using local LLMs (Llama 3) for backend code? Need suggestions on schemas and thermal envelope handling.
                  </p>
                  <div class="d-flex flex-wrap gap-1">
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#capstone</span>
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#ai</span>
                    <span class="rounded-pill px-2 py-1" style="font-size:0.72rem;background:#e8ede9;color:#3a5c45;">#docker</span>
                  </div>
                </div>
                <div class="d-flex align-items-center gap-1 px-5 border-top border-gray-100 pt-3 mt-2">
                  <button class="dl-post-action dl-toggle-comments"><i class="ki-outline ki-messages me-1 fs-6"></i><span class="dl-c-cnt">2</span> Comments</button>
                  <button class="dl-post-action"><i class="ki-outline ki-share me-1 fs-6"></i>Share</button>
                  <button class="dl-post-action dl-bkmk"><i class="ki-outline ki-bookmark me-1 fs-6"></i>Save</button>
                </div>
                <div class="dl-comments-drawer px-5 pt-4 pb-4 border-top border-gray-100 mt-2">
                  <div class="dl-comments-list d-flex flex-column gap-3 mb-4" style="max-height:160px;overflow-y:auto;">
                    <div class="d-flex gap-2">
                      <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width:25px;height:25px;flex-shrink:0;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/catalina.webp'">
                      <div class="flex-grow-1 p-2 rounded-3" style="background:#f1f5f9;font-size:0.8rem;">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="fw-bold text-gray-800">Ravi Joshi</span>
                          <span class="text-muted" style="font-size:0.7rem;">1h ago</span>
                        </div>
                        <p class="mb-0 text-gray-700">We ran llama3-8b on an M2 Mac using Ollama, works great!</p>
                      </div>
                    </div>
                  </div>
                  <form class="dl-comment-form">
                    <div class="d-flex align-items-center gap-2">
                      <img src="<?php echo $base; ?>assets/images/anonymous.png" class="rounded-circle" style="width:26px;height:26px;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png'">
                      <input type="text" class="form-control form-control-sm rounded-pill px-4 bg-white dl-c-input" placeholder="Write a comment…" required style="font-size:0.81rem;">
                      <button type="submit" class="btn btn-sm rounded-pill px-4 fw-bold py-2" style="background:var(--dc-green-light);color:#fff;white-space:nowrap;">Post</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- ── Post 3: Poll / FEU Life ── -->
          <div class="card border-0 shadow-sm bg-white" data-dc="post-card" data-cat="feu">
            <div class="d-flex">
              <div class="dl-vote-col">
                <button class="dl-vote-btn dl-up" title="Upvote"><i class="ki-solid ki-up fs-3"></i></button>
                <span class="fw-bold text-gray-700 dl-cnt" style="font-size:0.95rem;">456</span>
                <button class="dl-vote-btn dl-down" title="Downvote"><i class="ki-solid ki-down fs-3"></i></button>
              </div>
              <div class="d-flex flex-column py-5 flex-grow-1">
                <div class="px-5 mb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center gap-2">
                      <span style="width:22px;height:22px;border-radius:6px;background:#fdf1ef;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="ki-solid ki-heart" style="color:#c0392b; font-size:0.75rem;"></i>
                      </span>
                      <span class="fw-bold text-gray-800 fs-7">c/FEU LIFE</span>
                      <span class="rounded-pill px-3 py-1 fw-bold" style="font-size:0.7rem;background:rgba(255,193,7,0.13);color:#b58105;">FEU</span>
                    </div>
                    <button class="dl-post-report"><i class="ki-outline ki-flag fs-6"></i> Report</button>
                  </div>
                  <div class="d-flex gap-3 align-items-center mb-2">
                    <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width:32px;height:32px;object-fit:cover;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/catalina.webp'">
                    <div>
                      <div class="fw-bold text-gray-800 fs-7">Marco Torres</div>
                      <div class="text-muted" style="font-size:0.72rem;"><i class="ki-outline ki-time me-1" style="font-size:0.8rem;"></i>4 hours ago</div>
                    </div>
                  </div>
                  <h5 class="fw-bold text-gray-900 fs-6 mb-2">📊 Poll: How do you study for finals? Be honest.</h5>
                  <p class="text-gray-700 mb-3" style="font-size:0.86rem; line-height:1.65;">
                    Curious how my fellow FEU Tech students survive finals season. Drop your honest answer 👇
                  </p>
                  <!-- Poll options — sec-posts.css -->
                  <div class="dl-poll-group mb-2" style="max-width:460px;">
                    <button type="button" class="dc-poll-opt" style="--tw:28%;"><span>Start early, study consistently</span><span class="fw-semibold text-gray-700" style="font-size:0.78rem;">28%</span></button>
                    <button type="button" class="dc-poll-opt" style="--tw:45%;"><span>Cram the night before</span><span class="fw-semibold text-gray-700" style="font-size:0.78rem;">45%</span></button>
                    <button type="button" class="dc-poll-opt" style="--tw:19%;"><span>Rely on group chats &amp; slides</span><span class="fw-semibold text-gray-700" style="font-size:0.78rem;">19%</span></button>
                    <button type="button" class="dc-poll-opt" style="--tw:8%;"><span>Pray and submit anyway</span><span class="fw-semibold text-gray-700" style="font-size:0.78rem;">8%</span></button>
                  </div>
                  <span class="text-muted d-block mb-1" style="font-size:0.76rem;">442 votes · 3 days left</span>
                </div>
                <div class="d-flex align-items-center gap-1 px-5 border-top border-gray-100 pt-3 mt-2">
                  <button class="dl-post-action dl-toggle-comments"><i class="ki-outline ki-messages me-1 fs-6"></i><span class="dl-c-cnt">1</span> Comment</button>
                  <button class="dl-post-action"><i class="ki-outline ki-share me-1 fs-6"></i>Share</button>
                  <button class="dl-post-action dl-bkmk"><i class="ki-outline ki-bookmark me-1 fs-6"></i>Save</button>
                </div>
                <div class="dl-comments-drawer px-5 pt-4 pb-4 border-top border-gray-100 mt-2">
                  <div class="dl-comments-list d-flex flex-column gap-3 mb-4" style="max-height:160px;overflow-y:auto;">
                    <div class="d-flex gap-2">
                      <img src="<?php echo $base; ?>assets/images/catalina.webp" class="rounded-circle" style="width:25px;height:25px;flex-shrink:0;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/catalina.webp'">
                      <div class="flex-grow-1 p-2 rounded-3" style="background:#f1f5f9;font-size:0.8rem;">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="fw-bold text-gray-800">Catalina Smith</span>
                          <span class="text-muted" style="font-size:0.7rem;">4h ago</span>
                        </div>
                        <p class="mb-0 text-gray-700">Cramming is the way, but I promise I'll start early next semester 😂</p>
                      </div>
                    </div>
                  </div>
                  <form class="dl-comment-form">
                    <div class="d-flex align-items-center gap-2">
                      <img src="<?php echo $base; ?>assets/images/anonymous.png" class="rounded-circle" style="width:26px;height:26px;" alt="" onerror="this.src='/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png'">
                      <input type="text" class="form-control form-control-sm rounded-pill px-4 bg-white dl-c-input" placeholder="Write a comment…" required style="font-size:0.81rem;">
                      <button type="submit" class="btn btn-sm rounded-pill px-4 fw-bold py-2" style="background:var(--dc-green-light);color:#fff;white-space:nowrap;">Post</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /dl-feed -->
      </div>

      <!-- RIGHT: Sidebar (matches sec-sidebar.php widgets) -->
      <div class="col-lg-4">

        <!-- Widget 1: Discourse info card — dark green (from sec-sidebar.php) -->
        <div class="dl-sidebar-info-card p-5 mb-5 rounded-4 shadow-sm" style="min-height:220px;">
          <div class="dl-sidebar-glow"></div>
          <div style="position:relative;z-index:1;">
            <img src="/ParaverseLandingpages/DiscourseLanding/assets/images/Discourse-logo.png" alt="Discourse Logo" style="height:52px;width:auto;margin-bottom:14px;">
            <p class="text-white mb-3" style="opacity:0.78; font-size:0.84rem; line-height:1.65;">
              Ask questions, start debates, post anonymously. No prof. No judgment. Just FEU Tech students keeping it real.
            </p>
            <hr style="border-color:rgba(255,255,255,0.10); margin:12px 0;">
            <!-- Trending posts from sec-sidebar.php -->
            <?php
            $trending = [
              ['emoji'=>'📊','text'=>'Poll: How do you actually study for finals?...','sub'=>'just posted'],
              ['emoji'=>'🔵','text'=>'The silent revolution in edge AI — why on-device inference is changing everything','sub'=>'3 comments · most active'],
              ['emoji'=>'💡','text'=>'What if governance used ranked-choice weighted by stake?','sub'=>'no replies yet'],
            ];
            foreach ($trending as $tr): ?>
            <a href="/ParaverseLandingpages/DiscourseLanding/posts/index.php"
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
              ['icon'=>'ki-solid ki-people','label'=>'Members','val'=>'4,819','sub'=>'+143 This Week'],
              ['icon'=>'ki-solid ki-message-text','label'=>'Posts Today','val'=>'390','sub'=>'Across 9 Topics'],
              ['icon'=>'ki-solid ki-chart-line-up','label'=>'Online Now','val'=>'1,042','sub'=>'Active Users'],
            ];
            foreach ($stats as $s): ?>
            <div class="dl-stat-item d-flex align-items-center justify-content-between pb-4 mb-4">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width:36px;height:36px;background:#e8ede9;flex-shrink:0;">
                  <i class="<?php echo $s['icon']; ?>" style="color:#3a5c45; font-size:1.1rem;"></i>
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
        <div class="card border-0 shadow-sm rounded-4 mb-5">
          <div class="card-body p-5">
            <h6 class="fw-bold text-gray-800 fs-6 mb-4">Browse Topics</h6>
            <div class="d-flex flex-wrap gap-2">
              <?php
              $topics = ['TECHNOLOGY','GAMING','FEU','AI','CULTURE','SCIENCE','NEWS','SPORTS','ACADEMICS'];
              foreach ($topics as $t): ?>
              <a href="/ParaverseLandingpages/DiscourseLanding/topics/index.php?t=<?php echo $t; ?>"
                 class="badge rounded-pill fw-semibold px-3 py-2 text-decoration-none"
                 style="font-size:0.73rem; background:#dce8df; color:#3a5c45; transition:background 0.15s, color 0.15s;"
                 onmouseover="this.style.background='#2D6A4F';this.style.color='#fff';"
                 onmouseout="this.style.background='#dce8df';this.style.color='#3a5c45';">
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
  /* Vote toggle */
  document.querySelectorAll('.dl-up').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var p = btn.parentNode, cnt = p.querySelector('.dl-cnt'), v = +cnt.textContent;
      if (btn.classList.toggle('voted-up')) {
        var dn = p.querySelector('.dl-down');
        if (dn.classList.contains('voted-down')) { dn.classList.remove('voted-down'); v++; }
        cnt.textContent = v + 1;
      } else { cnt.textContent = v - 1; }
    });
  });
  document.querySelectorAll('.dl-down').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var p = btn.parentNode, cnt = p.querySelector('.dl-cnt'), v = +cnt.textContent;
      if (btn.classList.toggle('voted-down')) {
        var up = p.querySelector('.dl-up');
        if (up.classList.contains('voted-up')) { up.classList.remove('voted-up'); v--; }
        cnt.textContent = v - 1;
      } else { cnt.textContent = v + 1; }
    });
  });

  /* Bookmark */
  document.querySelectorAll('.dl-bkmk').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var saved = btn.innerHTML.includes('bookmark-fill');
      btn.innerHTML = saved
        ? '<i class="ki-outline ki-bookmark me-1 fs-6"></i>Save'
        : '<i class="ki-solid ki-bookmark me-1 fs-6" style="color:#2D6A4F;"></i>Saved';
    });
  });

  /* Comment drawer */
  document.querySelectorAll('.dl-toggle-comments').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = btn.closest('[data-dc="post-card"]');
      var drawer = card ? card.querySelector('.dl-comments-drawer') : null;
      if (!drawer) return;
      $(drawer).slideToggle(220);
    });
  });

  /* Comment submit */
  document.querySelectorAll('.dl-comment-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var card  = form.closest('[data-dc="post-card"]');
      var input = form.querySelector('.dl-c-input');
      var list  = card.querySelector('.dl-comments-list');
      var cnt   = card.querySelector('.dl-c-cnt');
      var text  = input.value.trim();
      if (!text) return;
      var el = document.createElement('div');
      el.className = 'd-flex gap-2';
      el.innerHTML = `<img src="/ParaverseLandingpages/DiscourseLanding/assets/images/anonymous.png" class="rounded-circle" style="width:25px;height:25px;flex-shrink:0;" alt="">
        <div class="flex-grow-1 p-2 rounded-3" style="background:#f1f5f9;font-size:0.8rem;">
          <div class="d-flex justify-content-between mb-1">
            <span class="fw-bold text-gray-800">You (Anonymous)</span>
            <span class="text-muted" style="font-size:0.7rem;">Just now</span>
          </div>
          <p class="mb-0 text-gray-700">${text}</p>
        </div>`;
      list.appendChild(el);
      cnt.textContent = +cnt.textContent + 1;
      input.value = '';
      list.scrollTop = list.scrollHeight;
    });
  });

  /* Feed filter */
  var tabs  = document.querySelectorAll('#dl-feed-tabs .dl-feed-tab');
  var cards = document.querySelectorAll('#dl-feed [data-dc="post-card"]');
  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      tabs.forEach(function (t) { t.classList.remove('active'); });
      tab.classList.add('active');
      var f = tab.dataset.filter;
      cards.forEach(function (card) {
        var cats = card.dataset.cat || '';
        (f === 'all' || cats.includes(f)) ? $(card).fadeIn(200) : $(card).fadeOut(200);
      });
    });
  });

  /* Poll option highlight */
  document.querySelectorAll('.dl-poll-group .dc-poll-opt').forEach(function (opt) {
    opt.addEventListener('click', function () {
      opt.closest('.dl-poll-group').querySelectorAll('.dc-poll-opt').forEach(function (o) {
        o.classList.remove('selected');
      });
      opt.classList.add('selected');
    });
  });
});
</script>
