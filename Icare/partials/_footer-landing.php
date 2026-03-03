<?php
$ICARE_BASE = defined('ICARE_BASE') ? ICARE_BASE : '/Icare/Icare';
?>
<footer>
  <div class="app-container container-xxl">
    <div class="row d-flex align-items-end justify-content-between pt-10">
      <div class="col-lg-4 my-5">
        <a href="<?php echo htmlspecialchars($ICARE_BASE); ?>/" class="d-flex align-items-center mb-5">
          <img src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/Logo.svg" alt="iCare" class="h-25px">
        </a>
        <p class="text-gray-700 fs-2">Start your journey towards academic success.</p>
        <p class="text-gray-600 fs-4 mb-0">iCare – Free tutoring, study groups, and academic support for FEU Tech students.</p>
      </div>
      <div class="col-lg-4 my-5">
        <div class="d-flex mb-5">
          <a href="https://feualabang.edu.ph/" target="_blank" rel="noopener" class="me-1"><img class="h-50px" src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/feu-alabang.webp" alt="FEU Alabang" onerror="this.style.display='none'"></a>
          <a href="https://feudiliman.edu.ph/" target="_blank" rel="noopener" class="me-1"><img class="h-50px" src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/feu-diliman.webp" alt="FEU Diliman" onerror="this.style.display='none'"></a>
          <a href="https://feutech.edu.ph/" target="_blank" rel="noopener"><img class="h-50px" src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/feu-tech.webp" alt="FEU Tech" onerror="this.style.display='none'"></a>
        </div>
        <div class="d-flex">
          <a href="<?php echo htmlspecialchars($ICARE_BASE); ?>/" class="me-4"><img src="<?php echo htmlspecialchars($ICARE_BASE); ?>/assets/img/logo/Logo.svg" class="h-35px" alt="iCare"></a>
          <p class="fs-lg mb-0">
            <span class="d-block text-gray-600">Proudly made with <span class="text-danger">❤️</span> by the</span>
            <a href="<?php echo htmlspecialchars($ICARE_BASE); ?>/" class="fw-bold text-dark text-active-primary">Educational Innovation and Technology Hub</a>
          </p>
        </div>
        <a href="https://www.facebook.com/edith.feutech" target="_blank" rel="noopener" class="btn btn-sm btn-facebook mt-5"><i class="fab fa-facebook-f fs-4"></i> Like us on Facebook</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="text-gray-600 mt-8 pt-8 border-top">© <?php echo date("Y"); ?> <strong>Educational Innovation and Technology Hub</strong>. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
