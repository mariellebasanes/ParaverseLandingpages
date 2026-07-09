<footer>
    <div class="app-container container-xxl">
        <div class="row d-flex align-items-end justify-content-between pt-10">
            <div class="col-lg-4 my-5">
                <a href="/elicit/" class="d-flex align-items-center mb-5">
                    <img src="<?= $BASE_PATH ?>/assets/img/logo/logo-elicit.svg" class="h-40px"
                         onerror="this.parentElement.innerHTML='<span class=\'fw-bolder fs-1\'>Elicit</span>'">
                </a>
                <p class='text-gray-700 fs-2'>Turn Every Audience Into a Conversation</p>
                <p class='text-gray-600 fs-4 mb-0'>Elicit is a live audience engagement platform where questions, polls,
                    and conversations unfold in real time. Whether in classrooms, talks, or events, it gives every
                    participant the power to share their voice and shape the discussion as it happens.</p>
            </div>

            <div class="col-lg-4 my-5">
                <div class="d-flex mb-5">
                    <a href="https://feualabang.edu.ph/" target="_blank" class="me-1"><img class="h-50px"
                            src="<?= $BASE_PATH ?>/assets/img/logo/feu-alabang.webp"
                            onerror="this.style.display='none'"></a>
                    <a href="https://feudiliman.edu.ph/" target="_blank" class="me-1"><img class="h-50px"
                            src="<?= $BASE_PATH ?>/assets/img/logo/feu-diliman.webp"
                            onerror="this.style.display='none'"></a>
                    <a href="https://feutech.edu.ph/" target="_blank"><img class="h-50px"
                            src="<?= $BASE_PATH ?>/assets/img/logo/feu-tech.webp"
                            onerror="this.style.display='none'"></a>
                </div>
                <div class="d-flex">
                    <a href="/"><img src="<?= $BASE_PATH ?>/assets/img/logo.png"
                            class="h-35px me-4" onerror="this.style.display='none'"></a>
                    <p class='fs-lg mb-0'>
                        <span class="d-block text-gray-600">Proudly made with <span class="text-danger">❤️</span> by
                            the</span>
                        <a href="/" class="fw-bold text-dark text-active-primary">Educational Innovation and Technology
                            Hub</span></a>
                    </p>
                </div>
                <a href="https://www.facebook.com/edith.feutech" target="_blank" class="btn btn-sm btn-facebook mt-5"><i
                        class="fab fa-facebook-f fs-4"></i> Like us on Facebook</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-gray-600 mt-8 pt-8 border-top">© <?php echo date("Y"); ?> <strong>Educational Innovation
                        and Technology Hub</strong>. All Rights Reserved. </p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= $BASE_PATH ?>/assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= $BASE_PATH ?>/assets/js/scripts.bundle.v2.01.js"></script>
<script>
// Stub for missing scripts
if (typeof KTApp === 'undefined') {
    window.KTApp = { showPageLoading: function(){}, init: function(){} };
}
</script>