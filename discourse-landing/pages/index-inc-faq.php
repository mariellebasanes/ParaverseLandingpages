<?php /* index-inc-faq.php — Discourse FAQ Section */
global $DISCOURSE_BASE;
$base = !empty($DISCOURSE_BASE) ? $DISCOURSE_BASE : "/discourse-landing/";
?>
<!-- ════════════════  FAQ SECTION  ════════════════ -->
<section id="faq" class="py-20 dc-bg-light" style="position:relative; overflow:hidden;">

  <!-- Ambient background blobs -->
  <div style="position:absolute; top:-120px; right:-80px; width:440px; height:440px; border-radius:50%;
              background:radial-gradient(circle, rgba(6,171,98,0.07) 0%, transparent 70%); pointer-events:none;"></div>
  <div style="position:absolute; bottom:-100px; left:-60px; width:360px; height:360px; border-radius:50%;
              background:radial-gradient(circle, rgba(235,187,7,0.06) 0%, transparent 70%); pointer-events:none;"></div>

  <div class="container-xxl" style="position:relative; z-index:1;">

    <!-- Section header -->
    <div class="row align-items-end mb-14">
      <div class="col-lg-7 dl-reveal">
        <span class="dl-eyebrow dl-eyebrow-green mb-3">
          <i class="ki-outline ki-information-4 fs-6"></i>
          Got Questions?
        </span>
        <h2 class="fw-bolder text-gray-900 mb-3" style="font-size:clamp(1.8rem,3.2vw,2.5rem); line-height:1.18;">
          Frequently Asked <span style="color:var(--dc-gold);">Questions</span>
        </h2>
        <p class="text-gray-500 mb-0" style="font-size:0.97rem; max-width:480px; line-height:1.70;">
          Everything you need to know about Discourse at FEU Tech, Alabang &amp; Diliman — all in one place.
        </p>
      </div>
      <div class="col-lg-5 text-lg-end mt-6 mt-lg-0 dl-reveal dl-delay-1">
        <a href="<?php echo htmlspecialchars($base); ?>"
           class="btn fw-bold px-6 py-3 d-inline-flex align-items-center gap-2"
           style="background:#fff; border:1.5px solid rgba(6,171,98,0.18); color:var(--dc-green-light); border-radius:12px;
                  font-size:0.88rem; box-shadow:0 2px 8px rgba(6,171,98,0.06); transition:all 0.2s;"
           onmouseover="this.style.background='var(--dc-green-light)';this.style.color='#fff';"
           onmouseout="this.style.background='#fff';this.style.color='var(--dc-green-light)';">
          Contact Support <i class="ki-outline ki-message-text-2 fs-5"></i>
        </a>
      </div>
    </div>

    <!-- FAQ Accordion -->
    <div class="row g-5 dl-reveal dl-delay-1">
      <!-- Column 1 -->
      <div class="col-lg-6">
        <div class="dl-faq-group">

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>What is Discourse and how does FEU use it?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Discourse is an open-source community platform that FEU Tech, Alabang, and Diliman use as a centralized hub for students, faculty, and alumni. It hosts academic discussions, campus announcements, hobby channels, and more — all in one organized space.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>How do I create an account?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>You can sign up using your official FEU institutional email address. Simply click <strong>Join Now</strong> on the platform, fill in your student details, and verify your email to activate your account. SSO via Google is also supported.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>Is Discourse available on mobile?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Yes! Discourse offers a responsive web experience optimized for mobile browsers. We are also launching a dedicated mobile app on iOS TestFlight and Android Google Play — join the beta to get early access.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>Can alumni still access the platform?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Absolutely! Alumni are welcome and encouraged to stay connected. After graduating, your account transitions to an alumni role with access to mentorship channels, career boards, and alumni-only communities. You can keep giving back to the community you were part of.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Column 2 -->
      <div class="col-lg-6">
        <div class="dl-faq-group">

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>How do I join a specific community or channel?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Browse the <strong>Communities</strong> section on the landing page or navigate to the Categories view inside Discourse. Each channel has a <em>Join</em> button. Some channels may require admin approval — simply request access and a moderator will review it within 24 hours.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>What are badges and how do I earn them?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Badges are digital achievements awarded for active participation — like helping peers, sharing resources, or consistently posting quality content. They appear on your public profile and can unlock special privileges such as channel moderator roles.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>How is the platform moderated?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Discourse is moderated by a team of student moderators and faculty admins. Community guidelines are enforced to maintain a respectful, inclusive environment. Users can also flag content for review, and our automated trust-level system helps surface quality contributors.</p>
            </div>
          </div>

          <div class="dl-faq-item">
            <button class="dl-faq-question" onclick="dlFaqToggle(this)" aria-expanded="false">
              <span>Is my data private and secure?</span>
              <span class="dl-faq-icon"><i class="ki-outline ki-plus fs-4"></i></span>
            </button>
            <div class="dl-faq-answer">
              <p>Yes. Your data is hosted on FEU-managed servers and governed by the university's data privacy policies in compliance with the Philippine Data Privacy Act (RA 10173). We never sell your data, and you can request data deletion at any time through the privacy settings panel.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div><!-- /container-xxl -->
</section>

<style>
  /* ══════════════ FAQ SECTION ══════════════ */
  .dl-faq-group {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .dl-faq-item {
    background: #ffffff;
    border-radius: 16px;
    border: 1.5px solid rgba(6, 171, 98, 0.10);
    overflow: hidden;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
  }

  .dl-faq-item:hover {
    border-color: rgba(6, 171, 98, 0.28);
    box-shadow: 0 6px 24px rgba(6, 171, 98, 0.09);
  }

  .dl-faq-item.dl-faq-open {
    border-color: rgba(6, 171, 98, 0.35);
    box-shadow: 0 8px 30px rgba(6, 171, 98, 0.12);
  }

  .dl-faq-question {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 20px 24px;
    background: none;
    border: none;
    cursor: pointer;
    text-align: left;
    font-size: 0.96rem;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.45;
    transition: color 0.2s;
  }

  .dl-faq-item.dl-faq-open .dl-faq-question {
    color: #06AB62;
  }

  .dl-faq-icon {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(6, 171, 98, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #06AB62;
    transition: all 0.3s cubic-bezier(.34, 1.56, .64, 1);
  }

  .dl-faq-item.dl-faq-open .dl-faq-icon {
    background: #06AB62;
    color: #fff;
    transform: rotate(45deg);
  }

  .dl-faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.38s cubic-bezier(0.4, 0, 0.2, 1),
                padding 0.28s ease;
    padding: 0 24px;
  }

  .dl-faq-item.dl-faq-open .dl-faq-answer {
    max-height: 300px;
    padding: 0 24px 20px;
  }

  .dl-faq-answer p {
    margin: 0;
    font-size: 0.92rem;
    color: #5a6475;
    line-height: 1.72;
    border-top: 1px solid rgba(6, 171, 98, 0.08);
    padding-top: 14px;
  }

  @media (max-width: 768px) {
    .dl-faq-question {
      padding: 16px 18px;
      font-size: 0.92rem;
    }
    .dl-faq-answer, .dl-faq-item.dl-faq-open .dl-faq-answer {
      padding-left: 18px;
      padding-right: 18px;
    }
  }
</style>

<script>
  function dlFaqToggle(btn) {
    var item = btn.closest('.dl-faq-item');
    var isOpen = item.classList.contains('dl-faq-open');

    // Close all within same group
    var group = item.closest('.dl-faq-group');
    group.querySelectorAll('.dl-faq-item.dl-faq-open').forEach(function(el) {
      el.classList.remove('dl-faq-open');
      el.querySelector('.dl-faq-question').setAttribute('aria-expanded', 'false');
    });

    if (!isOpen) {
      item.classList.add('dl-faq-open');
      btn.setAttribute('aria-expanded', 'true');
    }
  }
</script>
