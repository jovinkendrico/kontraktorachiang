@extends('layouts.temp')
@section('title', 'Project')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->

            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_app">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
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
                            <form action="" id="kt_invoice_form">
                                <!--begin::Wrapper-->
                                {{-- <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                        data-bs-original-title="Tanggal Pembelian">
                                        <!--begin::Date-->
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-150px">
                                            <!--begin::Datepicker-->
                                            <div class="input-group date">
                                                <input type="date" class="form-control" value="" placeholder="Select date" name="tanggal">
                                            </div>
                                            <!--end::Datepicker-->
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->

                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="fs-6 fw-bold form-label mt-3">Tanggal Kas Keluar :</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" value=""
                                                placeholder="Select date" name="tanggal">
                                        </div>
                                    </div>
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
                                                    placeholder="Isi Dari Database Nama nya" value="">
                                            </div>

                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Deskripsi</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <textarea name="deskripsi" class="form-control form-control-solid" rows="3" placeholder="Deskripsi"></textarea>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <div class="border-bottom border-bottom-dashed text-end">

                                    </div>

                                    <div class="table-responsive mb-10">
                                        <!--begin::Table-->
                                        <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                    <th class="min-w-10 w-20">Deskripsi</th>
                                                    <th class="min-w-100 w-200">Harga</th>
                                                    <th class="min-w-75px w-75px ">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <input class="form-control form-control-solid" id="project_id"
                                                    type="text" name="project_id" placeholder="project_id"
                                                    value="" hidden>

                                                <td class="pe-7">
                                                    <input class="form-control form-control-solid" id="deskripsi"
                                                        type="text" name="deskripsi" placeholder="Deskripsi"
                                                        value="">
                                                </td>

                                                <td class="ps-0">
                                                    <input class="form-control form-control-solid" id="harga"
                                                        type="text" name="harga" placeholder="Harga"
                                                        value="">
                                                </td>
                                                <td class="ps-0">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addRow()">Tambah</button>
                                                </td>
                                            </tbody>
                                            <!--end::Table body-->

                                        </table>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive mb-10">
                                        <!--begin::Table-->

                                        <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" id="itemTable">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                    <th style="display: none;">id_project</th>
                                                    <th class="min-w-200 w-300">Deskripsi</th>
                                                    <th class="min-w-100 w-200">Harga</th>
                                                    <th class="min-w-75px w-75px text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                {{-- Add item dynamicly --}}
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
                                                    type="text" name="total" placeholder="Rp 0.00" value=""
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-10"></div>
                                        <!--begin::Action buttons-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <button class="btn btn-light me-3"><a
                                                    href="">Cancel</a></button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <!--end::Button-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // const data = [];
        function formatNumber(number) {
            return number.toLocaleString('id-ID', {
                maximumFractionDigits: 2
            });
        }


    });


    function extractNumericValue(value) {
        // Extract numeric value from a string (assuming 'Rp. xxx' format)
        return parseFloat(value.replace('Rp ', '').replace(',', ''));
    }

    function tableToJSON(table) {
        var data = [];
        var headers = [];

        // Get headers
        for (var i = 0; i < table.rows[0].cells.length; i++) {
            headers[i] = table.rows[0].cells[i].textContent.toLowerCase();
        }

        // Iterate through rows (start from index 1 to skip the header row)
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];
            var rowData = {};

            // Iterate through cells
            for (var j = 0; j < row.cells.length; j++) {
                rowData[headers[j]] = row.cells[j].textContent;
            }

            data.push(rowData);
        }

        return JSON.stringify(data);

    }

    function getTableData() {
        document.getElementById("tableData").value = tableToJSON(document.getElementById('itemTable'))
        console.log(tableToJSON(document.getElementById('itemTable')))
    }

    function addRow() {
        // const data = [];
        // Get values from the input fields
        var project_id = document.getElementById("project_id");
        var deskripsi = document.getElementById("deskripsi");
        var harga = document.getElementById("harga");

        // data.push({id:id,nama:nama,merk:merk,qty:qty,uom:uom,harga:harga,total_harga});

        // Create a new row in the table
        var table = document.getElementById("itemTable");
        var row = table.insertRow(table.rows.length);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        // Disable the input fields after adding an item
        // document.getElementById("id_supplier").value = document.getElementById('id_supp').value
        // document.getElementById("tanggal").readOnly = true;

        // document.getElementById("id_supp").disabled = true;
        // document.getElementById("jatuh_tempo").readOnly = true;

        // Set the cell values
        cell0.innerHTML = project_id.value;
        cell0.style.display = 'none'; // This will hide the cell
        cell1.innerHTML = deskripsi.value;
        cell2.innerHTML = 'Rp ' + harga.value;
        cell3.innerHTML = '<button type="button" class="btn btn-danger btn-sm mt-4" onclick="deleteRow(this)">Delete</button>';

        // Clear input fields after adding a row
        deskripsi.value = "";
        harga.value = "";

        // getTableData();
        updateTotals();
    }

    function deleteRow(btn) {
        // Delete the row from the table
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotals();

    }

    function formatNumber(number) {
        return number.toLocaleString('id-ID', {
            maximumFractionDigits: 2
        });
    }

    function updateTotals() {
        // Update totals
        var table = document.getElementById("itemTable");
        var totalHarga = 0;

        for (var i = 0, row; row = table.rows[i]; i++) {
            // Skip the header row
            if (i === 0) {
                continue;
            }

            var harga = parseFloat(row.cells[2].innerText.replace('Rp ', '').replaceAll('.', ''));

            totalHarga += harga;
        }

        // Display totals
        document.getElementById("total").value = 'Rp ' + formatNumber(totalHarga);
    }
</script>
<script>
    $(document).ready(function() {
        function formatNumber(number) {
            return number.toLocaleString('id-ID', {
                maximumFractionDigits: 0
            });
        }

        function maskingNumber() {
            var totalharga = parseInt($('#harga').val().replace(/\D/g, ''), 10);
            $('#harga').val(formatNumber(totalharga));
        }

        $('#harga').on('input', function() {
            maskingNumber();
        });
        $('#form').on('submit', function() {
            var totalharga = $('#harga').val().replaceAll('.', '');
            $('#harga').val(totalharga)
        });
    });
</script>
