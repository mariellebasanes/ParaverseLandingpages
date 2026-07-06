<?php /* index-inc-about.php — "Everything You Need for Campus Connection" */ ?>
<!-- ════════════════  FEATURES / ABOUT SECTION  ════════════ -->
<section id="about" class="py-20" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #0a2e1d 0%, #0f3d27 45%, #0d3a25 100%);">

  <!-- Ambient blobs (matching hero) -->
  <div style="position:absolute;top:-15%;left:-8%;width:550px;height:550px;border-radius:50%;
              background:radial-gradient(circle,rgba(6,171,98,0.07) 0%,transparent 70%);
              pointer-events:none;filter:blur(60px);"></div>
  <div style="position:absolute;bottom:-20%;right:-8%;width:600px;height:600px;border-radius:50%;
              background:radial-gradient(circle,rgba(235,187,7,0.05) 0%,transparent 70%);
              pointer-events:none;filter:blur(60px);"></div>
  <!-- Dot-grid overlay (matching hero) -->
  <div style="position:absolute;inset:0;pointer-events:none;z-index:0;
              background-image:radial-gradient(circle,rgba(255,255,255,0.06) 1px,transparent 1px);
              background-size:32px 32px;
              -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 30%,transparent 100%);
              mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 30%,transparent 100%);"></div>

  <div class="container-xxl" style="position: relative; z-index: 1;">

    <div class="row g-10 align-items-start">

      <!-- Left Column: Sticky Brand Header & Stats -->
      <div class="col-lg-5 position-lg-sticky dl-reveal" style="top: 100px;">
        <span class="dl-eyebrow mb-3 d-inline-flex align-items-center gap-2"
              style="background:rgba(255,255,255,0.10); color:rgba(255,255,255,0.75);
                     border:1px solid rgba(255,255,255,0.15); border-radius:50px;
                     padding:6px 16px; font-size:0.75rem; font-weight:700;
                     letter-spacing:0.08em; text-transform:uppercase;">
          <i class="ki-outline ki-route fs-6"></i>
          The Student Journey
        </span>
        <h2 class="fw-bolder mb-6" style="font-size:clamp(2rem,3.5vw,2.8rem); line-height:1.15;
                   letter-spacing:-0.02em; color:#ffffff;">
          Empowering Peer<br><span style="color:var(--dc-gold);">Support &amp; Growth</span>
        </h2>
        <p class="mb-8" style="font-size:1.02rem; line-height:1.75; color:rgba(255,255,255,0.65);">
          From your first day as a freshman to your final capstone presentation, Discourse provides the community and tools to help you succeed. Connect with classmates, share resources, and build a lasting academic footprint.
        </p>

        <!-- Stats widgets -->
        <div class="row g-4 mt-2">
          <div class="col-6">
            <div class="p-5 rounded-4"
                 style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12);">
              <span class="d-block fw-extrabold mb-1"
                    style="font-size:2.2rem; font-family:'Outfit',sans-serif; line-height:1; color:#5dd9a0;">98%</span>
              <span style="font-size:0.68rem; text-transform:uppercase; letter-spacing:0.06em;
                           color:rgba(255,255,255,0.45); font-weight:700;">Solution Rate</span>
            </div>
          </div>
          <div class="col-6">
            <div class="p-5 rounded-4"
                 style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12);">
              <span class="d-block fw-extrabold mb-1"
                    style="font-size:2.2rem; font-family:'Outfit',sans-serif; line-height:1; color:#ffffff;">24/7</span>
              <span style="font-size:0.68rem; text-transform:uppercase; letter-spacing:0.06em;
                           color:rgba(255,255,255,0.45); font-weight:700;">Peer Forums</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Staggered Features List -->
      <div class="col-lg-7">
        <div class="d-flex flex-column gap-6">

          <!-- Feature 1: Academic Support -->
          <div class="dl-reveal dl-delay-1">
            <div class="p-8" style="border-radius:20px; background:rgba(255,255,255,0.07);
                 border:1px solid rgba(255,255,255,0.12); transition:transform 0.3s ease,box-shadow 0.3s ease;"
                 onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,0.25)';"
                 onmouseout="this.style.transform='';this.style.boxShadow='';">
              <div class="d-flex align-items-start gap-5">
                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                     style="width:52px; height:52px; background:rgba(93,217,160,0.12); border:1px solid rgba(93,217,160,0.20);">
                  <i class="ki-outline ki-book fs-1" style="color:#5dd9a0;"></i>
                </div>
                <div>
                  <h4 class="fw-bold fs-5 mb-2" style="color:#ffffff;">1. Academic Peer Support</h4>
                  <p class="mb-0" style="font-size:0.92rem; line-height:1.7; color:rgba(255,255,255,0.62);">
                    Access course notes, study guides, capstone ideas, and coding resources shared by students who have taken your exact classes. Settle difficult questions together and master your subjects.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Feature 2: Student-Led Moderation -->
          <div class="dl-reveal dl-delay-2">
            <div class="p-8" style="border-radius:20px; background:rgba(255,255,255,0.07);
                 border:1px solid rgba(255,255,255,0.12); transition:transform 0.3s ease,box-shadow 0.3s ease;"
                 onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,0.25)';"
                 onmouseout="this.style.transform='';this.style.boxShadow='';">
              <div class="d-flex align-items-start gap-5">
                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                     style="width:52px; height:52px; background:rgba(255,120,100,0.12); border:1px solid rgba(255,120,100,0.18);">
                  <i class="ki-outline ki-shield-tick fs-1" style="color:#ff8f7a;"></i>
                </div>
                <div>
                  <h4 class="fw-bold fs-5 mb-2" style="color:#ffffff;">2. Student-Led Moderation</h4>
                  <p class="mb-0" style="font-size:0.92rem; line-height:1.7; color:rgba(255,255,255,0.62);">
                    Step up as a community moderator or peer guide. Help shape constructive discussions, host student guilds, and keep the campus forum a safe, collaborative space for everyone to learn.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Feature 3: Alumni & Mentorship -->
          <div class="dl-reveal dl-delay-3">
            <div class="p-8" style="border-radius:20px; background:rgba(255,255,255,0.07);
                 border:1px solid rgba(255,255,255,0.12); transition:transform 0.3s ease,box-shadow 0.3s ease;"
                 onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,0.25)';"
                 onmouseout="this.style.transform='';this.style.boxShadow='';">
              <div class="d-flex align-items-start gap-5">
                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                     style="width:52px; height:52px; background:rgba(235,187,7,0.12); border:1px solid rgba(235,187,7,0.18);">
                  <i class="ki-outline ki-people fs-1" style="color:#EBBB07;"></i>
                </div>
                <div>
                  <h4 class="fw-bold fs-5 mb-2" style="color:#ffffff;">3. Alumni &amp; Senior Mentorship</h4>
                  <p class="mb-0" style="font-size:0.92rem; line-height:1.7; color:rgba(255,255,255,0.62);">
                    Connect with graduating seniors and successful alumni. Get feedback on capstone designs, seek career advice, explore internships, and learn what it takes to excel beyond graduation.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>
