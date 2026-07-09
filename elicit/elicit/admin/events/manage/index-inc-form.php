<section>
    <div class="modal fade" id="event-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="edith_form" class="form needs-validation" method="post" novalidate>
                        <div class="mb-13 text-center">
                            <h1 id="event_title" class="mb-3">Create New Event</h1>
                            <div class="text-muted fw-semibold fs-5">Set up an event to enable live audience
                                interactions and real-time feedback</div>
                        </div>
                        <input type="hidden" id="event_id" name="id" value="0">
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Event Name</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Participants will see this name when joining your session">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <input id="name" name="name" type="text" class="form-control form-control-solid"
                                placeholder="e.g., Paraverse Quest: A Journey of Learning and Discovery" required />
                            <div class="form-text text-muted mt-2">Use a specific, recognizable name that clearly
                                identifies your event</div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Start Date</label>
                                <div class="position-relative d-flex align-items-center">
                                    <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>
                                    <input class="form-control form-control-solid ps-12" placeholder="Event start date"
                                        id="start_date" name="start_date" required />
                                </div>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">End Date</label>
                                <div class="position-relative d-flex align-items-center">
                                    <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>
                                    <input class="form-control form-control-solid ps-12" placeholder="Event end date"
                                        id="end_date" name="end_date" required />
                                </div>
                            </div>
                            <div class="form-text text-muted mt-2">Set the event timeframe for enabling Q&A sessions and
                                live polls for participants</div>
                        </div>
                        <div
                            class="alert bg-light-warning border border-warning d-flex flex-column flex-sm-row p-5 mb-10">
                            <i class="ki-duotone ki-information-5 fs-1 text-warning me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <span>Any logged in user with the code or link can paricipate.</span>
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let startDate = null;
    let endDate = null;

    $(document).ready(function () {
        startDate = $("#start_date").flatpickr({
            allowInput: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        endDate = $("#end_date").flatpickr({
            allowInput: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        /* 🔄 Submit Form
        ************************************************/

        $("#edith_form").submit(function (e) {
            e.preventDefault();

            let submitBtn = $(this).find('[type="submit"]');

            submitBtn.removeClass('btn-primary').addClass('btn-secondary').attr("disabled", "disabled");

            if ($("#name").val().trim() === "") {
                toastr.error("The name of the event is required.");
                submitBtn.removeClass('btn-secondary').addClass('btn-primary').removeAttr('disabled');
                return;
            }

            if ($("#start_date").val() === "") {
                toastr.error("The start date of the event must be selected.");
                submitBtn.removeClass('btn-secondary').addClass('btn-primary').removeAttr('disabled');
                return;
            }

            if ($("#end_date").val() === "") {
                toastr.error("The end date of the event must be selected.");
                submitBtn.removeClass('btn-secondary').addClass('btn-primary').removeAttr('disabled');
                return;
            }

            var formData = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: "manage/index-ajax-save.php",
                data: formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response.status === "success") {
                        if ($("#event_id").val() == 0) {
                            window.location.replace(`/elicit/admin/events/manage/${response.code}`);
                        } else {
                            MBGDATATABLE.ajax.reload();
                            $('#event-modal').modal('hide');
                            toastr.success(response.message);
                        }
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error('Request Failed: ' + xhr.responseText);
                }
            });

            submitBtn.removeClass('btn-secondary').addClass('btn-primary').removeAttr('disabled');
        });
    });
</script>