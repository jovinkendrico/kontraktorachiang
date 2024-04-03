@extends('layouts.temp')

@section('title', 'Dashboard')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->

                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">My Projects</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->

            </div>
            <!--begin::Stats-->
            <div class="row g-6 g-xl-9">
                <div class="col-lg-6 col-xxl-4">
                    <!--begin::Card-->
                    <div class="card h-100">
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Heading-->
                            <div class="fs-2hx fw-bolder">{{ $jumlahProject }}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Current Projects</div>
                            <!--end::Heading-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                                    <canvas id="kt_project_list_chart" width="200" height="200"
                                        style="display: block; box-sizing: border-box; height: 100px; width: 100px;"></canvas>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                        <div class="bullet bg-primary me-3"></div>
                                        <div class="text-gray-400">Active</div>
                                        <div class="ms-auto fw-bolder text-gray-700">{{ $activeProject }}</div>
                                    </div>
                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                        <div class="bullet bg-danger me-3"></div>
                                        <div class="text-gray-400">Non Active</div>
                                        <div class="ms-auto fw-bolder text-gray-700">{{ $deletedProject }}</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                        <div class="bullet bg-success me-3"></div>
                                        <div class="text-gray-400">Completed</div>
                                        <div class="ms-auto fw-bolder text-gray-700">0</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-lg-6 col-xxl-4">
                    <!--begin::Budget-->
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">Rp. {{ number_format($profit, 0, ',', '.') }}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Project Income</div>
                            <div class="fs-6 d-flex justify-content-between mb-4">
                                <div class="fw-bold">Avg. Project Income</div>
                                <div class="d-flex fw-bolder">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr007.svg-->
                                    <span class="svg-icon svg-icon-3 me-1 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M13.4 10L5.3 18.1C4.9 18.5 4.9 19.1 5.3 19.5C5.7 19.9 6.29999 19.9 6.69999 19.5L14.8 11.4L13.4 10Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3" d="M19.8 16.3L8.5 5H18.8C19.4 5 19.8 5.4 19.8 6V16.3Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Rp. {{ number_format($averageProfit, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="separator separator-dashed"></div>
                            <div class="fs-6 d-flex justify-content-between my-4">
                                <div class="fw-bold">Lowest Project Income</div>
                                <div class="d-flex fw-bolder">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr006.svg-->
                                    <span class="svg-icon svg-icon-3 me-1 svg-icon-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M13.4 14.8L5.3 6.69999C4.9 6.29999 4.9 5.7 5.3 5.3C5.7 4.9 6.29999 4.9 6.69999 5.3L14.8 13.4L13.4 14.8Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3"
                                                d="M19.8 8.5L8.5 19.8H18.8C19.4 19.8 19.8 19.4 19.8 18.8V8.5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Rp. {{ number_format($lowestProfit, 0, ',', '.') }}
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Budget-->
                </div>
                <div class="col-lg-6 col-xxl-4">
                    <!--begin::Clients-->
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <!--begin::Heading-->
                            <div class="fs-2hx fw-bolder">49</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Our Clients</div>
                            <!--end::Heading-->
                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover mb-9">

                            </div>
                            <!--end::Users group-->
                        </div>
                    </div>
                    <!--end::Clients-->
                </div>
            </div>
            <!--end::Stats-->
            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack my-5">
                <!--begin::Heading-->
                <h2 class="fs-2 fw-bold my-2">Projects
                    <span class="fs-6 text-gray-400 ms-1">by Status</span>
                </h2>
                <!--end::Heading-->
                <!--begin::Controls-->
                {{-- <div class="d-flex flex-wrap my-1">
                    <!--begin::Select wrapper-->
                    <div class="m-0">
                        <!--begin::Select-->
                        <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bolder w-125px select2-hidden-accessible" data-select2-id="select2-data-10-sxjg" tabindex="-1" aria-hidden="true">
                            <option value="Active" selected="selected" data-select2-id="select2-data-12-p1se">Active</option>
                            <option value="Approved">In Progress</option>
                            <option value="Declined">To Do</option>
                            <option value="In Progress">Completed</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-dxp6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm bg-body border-body fw-bolder w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-status-th-container" aria-controls="select2-status-th-container"><span class="select2-selection__rendered" id="select2-status-th-container" role="textbox" aria-readonly="true" title="Active">Active</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <!--end::Select-->
                    </div>
                    <!--end::Select wrapper-->
                </div> --}}
                <!--end::Controls-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Row-->
            <div class="row g-6 g-xl-9">
                <!--begin::Col-->
                @foreach ($projectLists as $project)
                    <div class="col-md-6 col-xl-4">
                        <!--begin::Card-->
                        <a href="{{ route('admin.project.project.show', $project->id) }}" class="card border-hover-primary">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-9">
                                <!--begin::Card Title-->
                                <div class="card-title m-0">
                                    <!--begin::Avatar-->
                                    {{-- <div class="symbol symbol-50px w-50px bg-light">
                                        <img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                                    </div> --}}
                                    <!--end::Avatar-->
                                </div>
                                <!--end::Car Title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3"><i
                                            class="badge-light-primary fas fa-spinner fa-spin"></i>&nbsp;&nbsp;&nbsp;In
                                        Progress</span>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end:: Card header-->
                            <!--begin:: Card body-->
                            <div class="card-body p-9">
                                <!--begin::Name-->
                                <div class="fs-3 fw-bolder text-dark">{{ $project->nama }}</div>
                                <!--end::Name-->
                                <!--begin::Description-->
                                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{ $project->lokasi }}</p>
                                <!--end::Description-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap mb-5">
                                    <!--begin::Due-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                        <div class="fs-6 text-gray-800 fw-bolder">{{ $project->tanggal }}</div>
                                        <div class="fw-bold text-gray-400">Tanggal</div>
                                    </div>
                                    <!--end::Due-->
                                    <!--begin::Budget-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                        <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                            {{ number_format($project->totalharga, 0, ',', '.') }}</div>
                                        <div class="fw-bold text-gray-400">Budget</div>
                                    </div>
                                    <!--end::Budget-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Progress-->
                                {{-- <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="" data-bs-original-title="This project 50% completed">
                                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                                <!--end::Progress-->
                                <!--begin::Users-->
                                {{-- <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="" data-bs-original-title="Emma Smith">
                                        <img alt="Pic" src="assets/media/avatars/300-6.jpg">
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="" data-bs-original-title="Rudy Stone">
                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg">
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="" data-bs-original-title="Susan Redwood">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                                    </div>
                                    <!--begin::User-->
                                </div> --}}
                                <!--end::Users-->
                            </div>
                            <!--end:: Card body-->
                        </a>
                        <!--end::Card-->
                    </div>
                @endforeach

                <!--end::Col-->

            </div>
            <!--end::Row-->
            <!--begin::Pagination-->
            <div class="row mt-10">
                <div class="col-md-12">
                    <!--begin::Pages-->
                    {{ $projectLists->links() }}
                    <!--end::Pages-->
                </div>
            </div>
            <!--end::Pagination-->
        </div>
        <!--end::Container-->
    </div>
    <script>
        var KTProjectList = {
            init: function () {
                !(function () {
                    var t = document.getElementById("kt_project_list_chart");
                    if (t) {
                        var e = t.getContext("2d");
                        new Chart(e, {
                            type: "doughnut",
                            data: {
                                datasets: [
                                    {
                                        data: @json($data['data']),
                                        backgroundColor: [
                                            "#00A3FF",
                                            "#FF3131",
                                            "#50CD89",
                                        ],
                                    },
                                ],
                                labels: @json($data['labels']),
                            },
                            options: {
                                chart: { fontFamily: "inherit" },
                                cutout: "75%",
                                cutoutPercentage: 65,
                                responsive: !0,
                                maintainAspectRatio: !1,
                                title: { display: !1 },
                                animation: { animateScale: !0, animateRotate: !0 },
                                tooltips: {
                                    enabled: !0,
                                    intersect: !1,
                                    mode: "nearest",
                                    bodySpacing: 5,
                                    yPadding: 10,
                                    xPadding: 10,
                                    caretPadding: 0,
                                    displayColors: !1,
                                    backgroundColor: "#20D489",
                                    titleFontColor: "#ffffff",
                                    cornerRadius: 4,
                                    footerSpacing: 0,
                                    titleSpacing: 0,
                                },
                                plugins: { legend: { display: !1 } },
                            },
                        });
                    }
                })();
            },
        };
        KTUtil.onDOMContentLoaded(function () {
            KTProjectList.init();
        });
        </script>
@endsection

