@extends('layouts.temp')
@section('title', 'Project')

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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Form Project</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->

            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h4>Add Project</h4>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Form-->
                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                        action="{{ route('admin.project.project.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <div class="col-md-4">
                                <x-forms.input id="nama" label="Nama" :required="'required'" :name="'nama'"
                                    :type="'text'" :placeholder="'Masukkan nama barang...'" :func="''" :isiFunc="''"
                                    :value="''" />
                                <x-forms.input-error name="nama" />

                                <x-forms.input id="lokasi" label="Lokasi" :required="'required'" :name="'lokasi'"
                                    :type="'text'" :placeholder="'Masukkan lokasi...'" :func="''" :isiFunc="''"
                                    :value="''" />
                                <x-forms.input-error name="lokasi" />

                                <x-forms.input :id="'totalharga'" label="Total harga" :required="'required'" :name="'totalharga'"
                                    :type="'number'" :placeholder="'Masukkan Total harga...'" :func="''" :isiFunc="''"
                                    :value="''" />
                                <x-forms.input-error name="totalharga" />

                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator mb-6"></div>
                        <!--end::Separator-->
                        <!--begin::Action buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <button class="btn btn-light me-3"><a
                                    href="{{ route('admin.master.barang.index') }}">Cancel</a></button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!--end::Button-->
                        </div>

                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
                {{-- <!--begin::Card footer-->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="reset" class="btn btn-secondary ">Back</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                <!--end::Card footer--> --}}
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <script>
        function formatNumber() {
            let inputField = document.getElementsById('totalharga').value;

            // Remove non-numeric characters from the input value
            let numericValue = inputField.value.replace(/\D/g, "");

            // Format the numeric value with the thousands separators
            let formattedValue = `${numericValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;

            // Update the input field value with the formatted value
            inputField.value = formattedValue;
        }
    </script>
@endsection
