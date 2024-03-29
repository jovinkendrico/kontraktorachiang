@extends('layouts.temp')
@section('title', 'Project')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Form Pengeluaran Kas</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-12">
                            <!--begin::Form-->
                            <form action="{{ route('admin.project.kaskeluar.store') }}" method="POST" id="form">
                                @csrf
                                <input type="hidden" name="tableData" id="tableData" value="{{ old('tableData') ?? '' }}">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2"
                                        data-bs-toggle="tooltip" data-bs-trigger="" title="">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Tanggal Kas Keluar :</div>
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-150px">
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-transparent fw-bolder pe-5"
                                                placeholder="Select date" name="tanggal" value="{{ \Carbon\Carbon::parse($kaskeluar->tanggal)->format('d-m-Y') }}" readonly />

                                            <!--end::Datepicker-->
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                        </div>

                                        <!--end::Input-->

                                    </div>

                                    <!--end::Input group-->
                                </div>

                                <!--end::Top-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-10"></div>
                                <!--end::Separator-->
                                <!--begin::Wrapper-->
                                <div class="mb-0">
                                    <!--begin::Row-->
                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-4">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Project</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ $kaskeluar->project->nama }}" placeholder="Name Supplier" readonly>
                                            </div>


                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Deskripsi</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <textarea name="deskripsi" class="form-control form-control-solid" rows="3" placeholder="Deskripsi" readonly>{{$kaskeluar->deskripsi}}</textarea>
                                            </div>

                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <div class="border-bottom border-bottom-dashed text-end">

                                    </div>


                                    <!--end::Row-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive mb-10">
                                        <!--begin::Table-->

                                        <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" id="itemTable">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                    <th class="min-w-200 w-300">Deskripsi</th>
                                                    <th class="min-w-100 w-200">Harga</th>

                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                {{-- Add item dynamicly --}}
                                                @foreach ($kaskeluar->detailcashkeluar as $detail)
                                                <tr>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>{{ $detail->deskripsi }}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>Rp. {{ number_format($detail->harga, 0, ',', '.')}}</h3>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                            <!--begin::Table foot-->
                                            <tfoot>

                                            </tfoot>
                                            <!--end::Table foot-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Total</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input class="form-control form-control-solid" id="total"
                                                    type="text" name="total" placeholder="Rp 0.00" value="Rp.{{ number_format($kaskeluar->getTotalHarga(), 0, ',', '.') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-10"></div>
                                    <!--begin::Action buttons-->
                                </div>
                                <!--end::Wrapper-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->

                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
