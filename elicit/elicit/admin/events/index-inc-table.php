<section>


    <div class="d-flex align-items-center justify-content-between mb-5">
        <div></div>
        <ul class="nav rounded-pill px-3 py-2 gap-2 gap-lg-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active btn btn-sm btn-active-light-success fw-semibold fs-6 border border-active border-success rounded-pill px-5"
                    data-filter="All" data-bs-toggle="tab" href="#all" role="tab">
                    <span class="text-dark text-active-success">All</span>
                    <span class="badge badge-success ms-2" id="badge-all">0</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-active-light-success fw-semibold fs-6 border border-active border-success rounded-pill px-5"
                    data-filter="Active" data-bs-toggle="tab" href="#active" role="tab">
                    <span class="text-dark text-active-success">Active & upcoming</span>
                    <span class="badge badge-success ms-2" id="badge-active">0</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-active-light-success fw-semibold fs-6 border border-active border-success rounded-pill px-5"
                    data-filter="Past" data-bs-toggle="tab" href="#past" role="tab">
                    <span class="text-dark text-active-success">Past</span>
                    <span class="badge badge-success ms-2" id="badge-past">0</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="card border-0 shadow">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-2 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" datatable-filter="search" class="form-control form-control-solid w-250px ps-12"
                        placeholder="Search events...">
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i> Filter
                    </button>

                    <div id="filter-menu" class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                        data-kt-menu="true">
                        <div class="px-7 py-5">
                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Classification:</label>
                                <select id="filter-classification" class="form-select form-select-solid fw-bold"
                                    data-control="select2" data-placeholder="Select the classification"
                                    data-allow-clear="true" data-hide-search="true">
                                    <option value="All">All events</option>
                                    <option value="Me">Created by me</option>
                                    <option value="Organization">Organization events</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button id="reset-filter" type="reset"
                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                    data-kt-menu-dismiss="true">Reset</button>
                                <button id="apply-filter" type="submit" class="btn btn-primary fw-semibold px-6"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-primary fw-bold" data-bs-toggle="modal"
                        data-bs-target="#event-modal">
                        <i class="ki-duotone ki-plus fs-2"></i> Create Event
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body py-4 px-0 px-md-8">
            <table id="EdITH-TABLE"
                class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-0">
                <thead>
                    <tr class="text-gray-400 fw-bold fs-8 text-uppercase">
                        <th class="ps-4 pb-3" colspan="1">Event Details</th>
                        <th class="pb-3"></th>
                        <th class="pb-3 text-end pe-4"></th>
                        <!-- hidden cols -->
                        <th class="d-none"></th><th class="d-none"></th>
                        <th class="d-none"></th><th class="d-none"></th><th class="d-none"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<?php include("manage/index-inc-form.php"); ?>

<script>
    let MBGDATATABLE;
    let currentStatus = "All";

    $(document).ready(function () {
        function getQueryParameterByName(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        function copyToClipboard(text) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    toastr.success('Copied to clipboard');
                }).catch(() => {
                    toastr.error('Failed to copy');
                });
            } else {
                const textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    document.execCommand('copy');
                    toastr.success('Copied to clipboard');
                } catch (err) {
                    toastr.error('Failed to copy');
                }
                document.body.removeChild(textarea);
            }
        }

        function formatDateRange(start, end) {
            const s = moment(start), e = moment(end);
            if (s.isSame(e, 'day')) return s.format('MMM D, YYYY');
            const sameYear = s.year() === e.year();
            if (sameYear && s.month() === e.month())
                return s.format('MMM D') + ' - ' + e.format('D, YYYY');
            if (sameYear)
                return s.format('MMM D') + ' - ' + e.format('MMM D, YYYY');
            return s.format('MMM D, YYYY') + ' - ' + e.format('MMM D, YYYY');
        }

        function getEventStatus(start, end) {
            const now = moment().startOf('day');
            const s = moment(start).startOf('day');
            const e = moment(end).startOf('day');

            if (now.isSameOrAfter(s) && now.isSameOrBefore(e)) {
                return { className: 'success', icon: 'bi bi-clipboard-data', text: 'Active now' };
            }

            const isFuture = now.isBefore(s);
            const diffDays = isFuture ? s.diff(now, 'days') : now.diff(e, 'days');

            const getText = (diff, unit, pluralUnit) => {
                if (diff === 1) return isFuture ? `In 1 ${unit}` : `1 ${unit} ago`;
                return isFuture ? `In ${diff} ${pluralUnit}` : `${diff} ${pluralUnit} ago`;
            };

            let className, icon, text;
            if (isFuture) {
                className = 'primary';
                icon = 'bi bi-stopwatch';
            } else {
                className = 'dark';
                icon = 'bi bi-clock-history';
            }

            if (diffDays < 7) {
                text = getText(diffDays, 'day', 'days');
            } else if (diffDays < 30) {
                const weeks = Math.floor(diffDays / 7);
                text = getText(weeks, 'week', 'weeks');
            } else if (diffDays < 365) {
                const months = Math.floor(diffDays / 30);
                text = getText(months, 'month', 'months');
            } else {
                const years = Math.floor(diffDays / 365);
                text = getText(years, 'year', 'years');
            }

            return { className, icon, text };
        }

        function getAvatar(name, status) {
            const letter = name.charAt(0).toUpperCase();
            const styles = {
                success: 'background:#e8f5e9; color:#2e7d32;',
                primary: 'background:#e3f2fd; color:#1565c0;',
                dark:    'background:#f0f0f0; color:#1a1a2e;',
            };
            const s = styles[status.className] || styles.dark;
            return `<span class="d-flex align-items-center justify-content-center rounded-2 fw-bold fs-4 flex-shrink-0" style="width:42px;height:42px;${s}">${letter}</span>`;
        }

        MBGDATATABLE = $('#EdITH-TABLE').DataTable({
            order: [[6, 'asc'], [7, 'asc']],
            searchDelay: 500,
            responsive: true,
            ordering: true,
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: 'index-ajax-fetch.php',
                type: 'GET',
                data: function (d) {
                    d.classification = $("#filter-classification").val() || '';
                    d.status = currentStatus;
                    return d;
                }
            },
            columns: [
                { data: 0, searchable: false, visible: false },
                { data: 1, searchable: true, visible: true, responsivePriority: 1 },
                { data: 2, searchable: true, visible: true },
                { data: 3, searchable: false, visible: true },
                { data: 4, searchable: true, visible: false },
                { data: 5, searchable: true, visible: false },
                { data: 6, searchable: false, visible: false },
                { data: 7, searchable: false, visible: false },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row) { return row[0]; }
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        const status = getEventStatus(row[3], row[4]);
                        const avatar = getAvatar(row[2], status);
                        return `
                            <div class="d-flex align-items-center gap-4 py-3 px-4">
                                ${avatar}
                                <div class="d-flex flex-column">
                                    <a href="manage/${row[1]}" class="fw-bold text-gray-900 fs-6 text-hover-primary">${row[2]}</a>
                                    <span class="text-gray-500 fs-7 mt-1">
                                        <span class="me-2"># ${row[1]}</span>
                                        <i class="bi bi-calendar3 me-1 fs-8"></i>${formatDateRange(row[3], row[4])}
                                    </span>
                                </div>
                            </div>
                        `;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        const status = getEventStatus(row[3], row[4]);
                        return `<span class="badge badge-light-${status.className} px-4 py-2 fs-7 fw-bold text-uppercase d-inline-flex align-items-center gap-2 text-${status.className}">
                            <i class="${status.icon} fs-7 text-${status.className}"></i>${status.text}
                        </span>`;
                    }
                },
                {
                    targets: 3,
                    "orderable": false,
                    render: function (data, type, row) {
                        const status = getEventStatus(row[3], row[4]);
                        const isPast = row[4] < new Date().toISOString().slice(0, 10);

                        const cardLink = isPast ? `manage/${row[1]}/analytics` : `manage/${row[1]}`;
                        const cardTitle = isPast ? "View Results" : "Manage Event";
                        const cardDesc = isPast
                            ? "See poll results, engagement and analysis of your Q&A."
                            : "Create and manage polls, view live results, and host audience Q&A.";
                        const cardIcon = isPast ? "bar-chart" : "cogs";

                        return `
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-icon btn-sm btn-active-secondary rounded-circle btn-edit-event" data-id="${row[0]}" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Edit event">
                                    <i class="ki-duotone ki-pencil fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>

                                <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-three-dots fs-3"></i>
                                </button>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-350px" data-kt-menu="true">
                                    <div class="menu-content p-5">
                                        <div class="d-flex justify-content-between align-items-center my-5">
                                            <h4 class="mb-0">${row[2]}</h4>
                                            <span class="badge badge-light-${status.className} px-6 py-3 fs-7 fw-bold">${status.text}</span>
                                        </div>
                                        <div class="d-flex flex-column gap-1 fs-7">
                                            <span class="fw-normal"><i class="bi bi-calendar4-week me-2 text-dark"></i> ${formatDateRange(row[3], row[4])}</span>
                                            <span class="fw-normal"><i class="bi bi-person me-2 text-dark"></i> ${row[5]}</span>
                                        </div>
                                    </div>
                                    <div class="menu-item p-5 pt-0">
                                        <div class="d-flex gap-5 mb-2">
                                            <button class="btn btn-secondary btn-sm btn-flex flex-column flex-fill overflow-hidden rounded-3 copy-link" data-link="/elicit/event/${row[1]}">
                                                <i class="bi bi-link-45deg bg-white fs-4 p-2 rounded text-dark"></i>
                                                <span class="mt-2">Copy link</span>
                                            </button>
                                            <button class="btn btn-secondary btn-sm btn-flex flex-column flex-fill overflow-hidden rounded-3 copy-code" data-code="${row[1]}">
                                                <i class="bi bi-hash bg-white fs-4 p-2 rounded text-dark"></i>
                                                <span class="mt-2">Copy code</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="menu-item px-5 pt-0 pb-7">
                                        <a href="${cardLink}" class="card rounded-3">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center bg-light-info">
                                                    <i class="fa fa-${cardIcon} fs-2x text-info-emphasis"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body p-5">
                                                        <p class="card-title">${cardTitle}</p>
                                                        <p class="card-text fw-normal fs-7">${cardDesc}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                },
            ],
            drawCallback: function () {
                $('#EdITH-TABLE tbody tr.category-separator').remove();

                if (currentStatus !== 'All') return;

                const rows = MBGDATATABLE.rows({ page: 'current' }).nodes();
                const data = MBGDATATABLE.rows({ page: 'current' }).data();

                const labels = { 1: 'Current Events', 2: 'Upcoming Events', 3: 'Past Events' };

                function makeSeparator(label) {
                    return $('<tr class="category-separator bg-transparent">').html(`
                        <td colspan="4" class="pt-8 pb-2 px-4 border-0">
                            <span class="text-gray-400 fw-bold fs-8 text-uppercase ls-1">${label}</span>
                        </td>
                    `);
                }

                let lastGroup = null;
                for (let i = 0; i < rows.length; i++) {
                    const group = parseInt(data[i][6]);
                    if (group !== lastGroup) {
                        if (labels[group]) {
                            $(rows[i]).before(makeSeparator(labels[group]));
                        }
                        lastGroup = group;
                    }
                }
            }
        });

        let searchTimeout;
        $('[datatable-filter="search"]').keyup(function () {
            clearTimeout(searchTimeout);
            let searchValue = $(this).val();
            searchTimeout = setTimeout(function () {
                MBGDATATABLE.search(searchValue).draw();
            }, 500);
        });

        MBGDATATABLE.on('draw', function () {
            KTMenu.createInstances();
            $("html, body").animate({ scrollTop: 0 }, 600);
            $("[data-bs-toggle='tooltip']").tooltip();
        });

        $('#EdITH-TABLE').on('click', '.btn-edit-event', function (e) {
            e.preventDefault();
            openEditEventModal($(this).data('id'));
        });

        $('#EdITH-TABLE').on('click', '.copy-code', function (e) {
            e.preventDefault();
            copyToClipboard($(this).data('code'));
        });

        $('#EdITH-TABLE').on('click', '.copy-link', function (e) {
            e.preventDefault();
            copyToClipboard(window.location.origin + $(this).data('link'));
        });

        $("#apply-filter").on("click", function () {
            MBGDATATABLE.ajax.reload();
        });

        $("#reset-filter").on("click", function () {
            $("#filter-classification").val(null).trigger("change");
            MBGDATATABLE.ajax.reload();
        });

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            currentStatus = $(this).data('filter');
            MBGDATATABLE.ajax.reload();
        });

        function updateCounts() {
            $.ajax({
                url: 'index-ajax-counts.php',
                type: 'GET',
                dataType: 'json',
                success: function (res) {
                    if (res.status === 'success') {
                        $('#badge-all').text(res.counts.all);
                        $('#badge-active').text(res.counts.active);
                        $('#badge-past').text(res.counts.past);
                    }
                }
            });
        }
        updateCounts();

        function resetModal() {
            $('#event_title').text('Create New Event');
            $('#event_id').val(0);
            $('#name').val('');
            if (startDate) startDate.clear();
            if (endDate) endDate.clear();
        }

        function openEditEventModal(id) {
            $.ajax({
                url: 'manage/index-ajax-fetch.php',
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (res) {
                    if (res.status === 'success') {
                        console.log("res", res);

                        $('#event_title').text('Edit Event');
                        $('#event_id').val(res.data.id);
                        $('#name').val(res.data.name);
                        startDate.setDate(res.data.start_date);
                        endDate.setDate(res.data.end_date);
                        $('#event-modal').modal('show');
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function () {
                    toastr.error('Failed to load event data');
                }
            });
        }

        $('#event-modal').on('hidden.bs.modal', function () {
            resetModal();
        });
    });
</script>