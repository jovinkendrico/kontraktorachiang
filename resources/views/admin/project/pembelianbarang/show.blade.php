@extends('layouts.temp')
@section('title', 'Project')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->

            <!--end::Page title-->

        </div>
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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Show Pembelian Barang</h1>
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
                            <form action="{{ route('admin.project.pembelianbarang.store') }}" method="POST"
                                id="form">
                                @csrf
                                <input type="hidden" name="tableData" id="tableData" value="">
                                <!--begin::Wrapper-->
                                <div class="">
                                    <!--begin::Input group-->

                                    <!--end::Input group-->

                                    <!--begin::Input group-->

                                    <!--end::Input group-->

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label class="fs-6 fw-bold form-label">Tanggal :</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($pembelianbarang->tanggal)->format('d-m-Y') }}"
                                                    placeholder="Select date" id="tanggal" name="tanggal" readonly>
                                            </div>


                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="fs-6 fw-bold form-label">Jatuh Tempo :</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($pembelianbarang->tanggal)->format('d-m-Y') }}"
                                                    placeholder="Select date" id="jatuh_tempo" name="jatuh_tempo" readonly>

                                            </div>


                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-4">
                                            <label class="fs-6 fw-bold form-label">Jatuh Tempo :</label>
                                            <div class="input-group date">
                                                <input type="date" class="form-control" value=""
                                                    placeholder="Select date" name="jatuhtempo">
                                            </div>
                                        </div>
                                    </div> --}}

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
                                        <div class="col-md-4">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Project</label>
                                            <input type="text" class="form-control form-control-solid"
                                                value="{{ $pembelianbarang->project->nama }}" placeholder="" readonly>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Supplier</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ $pembelianbarang->supplier }}" placeholder="Name Supplier" readonly>

                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status
                                                Bayar</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ $pembelianbarang->status }}" placeholder="Name Supplier" readonly>
                                            </div>
                                            <!--end::Input group-->
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
                                                    <th class="min-w-200 w-300">Item</th>
                                                    <th class="min-w-100 w-200">Merk</th>
                                                    <th class="min-w-100px w-100px">QTY</th>
                                                    <th class="min-w-100px w-100px">Uom</th>
                                                    <th class="min-w-150px w-150px">Harga</th>
                                                    <th class="min-w-100px w-150px">Total</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                {{-- Add item dynamicly --}}
                                                @foreach ($pembelianbarang->detailpembelianbarang as $detail)
                                                <tr>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>{{ $detail->Barang->nama}}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>{{ $detail->merk }}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>{{ $detail->qty }}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>{{ $detail->uom }}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>Rp. {{ number_format($detail->harga, 0, ',', '.')}}</h3>
                                                    </td>
                                                    <td class="text-gray-800 text-hover-primary mb-1">
                                                        <h3>Rp. {{ number_format($detail->qty * $detail->harga,0,',','.')}}</h3>
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
                                                    type="text" name="total" placeholder="Rp 0.00" value="Rp.{{ number_format($pembelianbarang->getTotalHarga(), 0, ',', '.') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="separator separator-dashed my-10"></div>
                                    <!--begin::Action buttons-->
                                    <div class="d-flex justify-content-end">

                                    </div>
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
