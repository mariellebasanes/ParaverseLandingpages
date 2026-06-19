<?php
$base = "/Discourse/";
$logo_small = $base . 'assets/images/Discourse-logo.png';
?>
<style>
  footer {
    background-color: #f8fafc;
    border-top: 1px solid #e2e8f0;
  }
</style>

<footer>
  <div class="app-container container-xxl">
    <div class="row d-flex align-items-end justify-content-between pt-10">
      
      <!-- LEFT: Brand description -->
      <div class="col-lg-4 my-5">
        <a href="<?php echo htmlspecialchars($base); ?>" class="d-flex align-items-center mb-5"
          onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()">
          <img src="<?php echo htmlspecialchars($logo_small); ?>" class="h-32px" alt="Discourse">
          <span class="fs-2 fw-bolder text-gray-800 ms-3" style="font-family: 'Outfit', sans-serif;">Discourse</span>
        </a>
        <p class="text-gray-700 fs-3 fw-semibold">Connect, Discuss, and Grow Together</p>
        <p class="text-gray-600 fs-5 mb-0">
          Discourse is a modern community forum where students, faculty, and interest groups create posts, share resources, ask academic questions, and coordinate events.
        </p>
      </div>

      <!-- RIGHT: Network & Credit -->
      <div class="col-lg-4 my-5">
        <div class="d-flex mb-5">
          <a href="https://feualabang.edu.ph/" target="_blank" rel="noopener" class="me-1">
            <img class="h-50px" src="<?php echo htmlspecialchars($base); ?>assets/img/logo/feu-alabang.webp"
              alt="FEU Alabang" onerror="this.src='/Discourse/assets/img/logo/feu-alabang.webp';">
          </a>
          <a href="https://feudiliman.edu.ph/" target="_blank" rel="noopener" class="me-1">
            <img class="h-50px" src="<?php echo htmlspecialchars($base); ?>assets/img/logo/feu-diliman.webp"
              alt="FEU Diliman" onerror="this.src='/Discourse/assets/img/logo/feu-diliman.webp';">
          </a>
          <a href="https://feutech.edu.ph/" target="_blank" rel="noopener">
            <img class="h-50px" src="<?php echo htmlspecialchars($base); ?>assets/img/logo/feu-tech.webp" alt="FEU Tech"
              onerror="this.src='/Discourse/assets/img/logo/feu-tech.webp';">
          </a>
        </div>
        <div class="d-flex align-items-center">
          <a href="<?php echo htmlspecialchars($base); ?>" onclick="typeof KTApp!=='undefined'&&KTApp.showPageLoading&&KTApp.showPageLoading()" class="me-4">
            <img src="<?php echo htmlspecialchars($base); ?>assets/img/logo.png" class="h-35px" alt="FEU Logo"
              onerror="this.src='/Discourse/assets/img/logo.png';">
          </a>
          <p class="fs-lg mb-0 text-gray-600">
            Proudly made with <span class="text-danger">❤️</span> by the<br>
            <a href="https://paraverse.feutech.edu.ph" target="_blank" class="fw-bold text-dark text-hover-primary">Educational Innovation and Technology Hub</a>
          </p>
        </div>
        <a href="https://www.facebook.com/edith.feutech" target="_blank" rel="noopener"
          class="btn btn-sm btn-facebook mt-5">
          <i class="fab fa-facebook-f fs-4"></i> Like us on Facebook
        </a>
      </div>

    </div>
    
    <!-- Bottom copyright -->
    <div class="row">
      <div class="col mt-8 pt-8 border-top">
        <p class="text-muted fs-8 lh-base mb-0">
          © <?php echo date("Y"); ?> <strong>Educational Innovation and Technology Hub</strong>. All Rights Reserved. Trademarks, screenshots, and brand assets displayed belong to their respective owners.
        </p>
      </div>
    </div>

  </div>
</footer>

