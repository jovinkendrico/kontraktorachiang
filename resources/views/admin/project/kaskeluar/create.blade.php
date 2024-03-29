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
                                                placeholder="Select date" name="tanggal" />

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
                                        <x-forms.input-error name="tanggal" />
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
                                                <select class="form-select mb-2 select2" id="project_id" name="project_id">
                                                    <option value="{{ $project->id }}">{{ $project->nama }}</option>
                                                </select>
                                            </div>
                                            <x-forms.input-error name="project_id" />

                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Deskripsi</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <textarea name="deskripsi" class="form-control form-control-solid" rows="3" placeholder="Deskripsi">{{old('deskripsi') ?? '' }}</textarea>
                                            </div>
                                            <x-forms.input-error name="deskripsi" />
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
                                                    <th class="min-w-10 w-10">Deskripsi</th>
                                                    <th class="min-w-50 w-50">Harga</th>
                                                    <th class="min-w-75px w-75px ">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>

                                                <td class="pe-7">
                                                    <input class="form-control form-control-solid" id="deskripsi"
                                                        type="text" name="" placeholder="Deskripsi"
                                                        value="">
                                                </td>

                                                <td class="ps-0">
                                                    <input class="form-control form-control-solid" id="harga"
                                                        type="text" name="harga" placeholder="Harga" value="">
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
                                        <button class="btn btn-light me-3"><a href="">Cancel</a></button>
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

        function maskingNumber() {
            var totalharga = parseInt($('#harga').val().replace(/\D/g, ''), 10);
            $('#harga').val(formatNumber(totalharga));
        }

        function formatNumber(number) {
            return number.toLocaleString('id-ID', {
                maximumFractionDigits: 2
            });
        }

        function calculateTotal() {

            var harga = parseFloat($('#harga').val().replaceAll('.', '') || 0);
            var qty = parseFloat($('#qty').val() || 0);



            // Calculate subtotal
            var total_harga = qty * harga;
            $('#total_harga').val(formatNumber(total_harga));

        }

        $('#harga, #qty').on('input', function() {
            calculateTotal();
        });
        $('#harga').on('input', function() {
            maskingNumber();
        });
        $('#form').on('submit', function() {
            const data = getTableData();
            console.log(data);
        });
        var invoiceDate = $(form.querySelector('[name="tanggal"]'));
        invoiceDate.flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    });


    function extractNumericValue(value) {
        // Extract numeric value from a string (assuming 'Rp. xxx' format)
        return parseFloat(value.replace('Rp ', '').replace(',', ''));
    }


    // function getTableData() {
    //     // document.getElementById("tableData").value = tableToJSON();
    //     // console.log(tableToJSON(document.getElementById('itemTable')))
    //     document.getElementById("tableData").value = formatTableToJson(document.getElementById('itemTable'))
    //     console.log(formatTableToJson(document.getElementById('itemTable')))
    // }



    function pushItemToArray() {
        var table = document.getElementById("itemTable");
        var dataArray = [];

        // Iterate over rows in the table
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];
            var rowData = {};

            // Iterate over cells in the row
            for (var j = 0; j < row.cells.length - 1; j++) { // Exclude the last cell containing the delete button
                var cell = row.cells[j];
                var cellText = cell.textContent.trim(); // Get the trimmed text content of the cell
                var columnHeader = table.rows[0].cells[j].textContent.trim(); // Get the corresponding header text

                // If the cell is in column 5 or 6, trim any word and periods
                if (j === 1) {
                    cellText = cellText.replace(/Rp|\./g, "");
                }

                // Add the cell value to the rowData object with the header as key
                rowData[columnHeader] = cellText;
            }

            // Push rowData object to the dataArray
            dataArray.push(rowData);

        }
        console.log(dataArray);
        return dataArray;
    }

    function refetch() {
        // Data JSON dari variabel atau sumber data lainnya
        var jsonString = document.getElementById("tableData").value;

        // Parse the JSON string into a JSON object
        var jsonData = JSON.parse(jsonString);
        console.log(jsonData)

        // Ambil tabel HTML
        var table = document.getElementById("itemTable");

        for (var index = 0; index < jsonData.length; index++) {
            (function(index) {
                var item = jsonData[index];
                // Buat baris baru dalam tabel
                var row = table.insertRow();

                // Masukkan nilai-nilai ke dalam sel-sel baris tersebut
                var cell0 = row.insertCell(0);
                var cell1 = row.insertCell(1);
                var cell2 = row.insertCell(2);

                cell0.textContent = item.Deskripsi;
                var hargaFormatted = parseFloat(item.Harga).toLocaleString('id-ID');
                cell1.textContent = 'Rp. ' + hargaFormatted;
                cell2.innerHTML =
                    '<button type="button" class="btn btn-danger btn-sm mt-4" onclick="deleteOldRow(this)">Delete</button>';
                cell2.setAttribute("data-index", index); // Set custom attribute to store the index
            })(index);
        }
        // console.log(document.getElementById("tableData").value)
    }


    window.onload = function() {
        refetch();
        updateTotals();
    };


    function addRow() {
        // const data = [];
        // Get values from the input fields
        var deskripsi = document.getElementById("deskripsi");
        var harga = document.getElementById("harga");

        // Create a new row in the table
        var table = document.getElementById("itemTable");
        var row = table.insertRow(table.rows.length);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);

        // Disable the input fields after adding an item
        // document.getElementById("id_supplier").value = document.getElementById('id_supp').value
        // document.getElementById("tanggal").readOnly = true;

        // document.getElementById("id_supp").disabled = true;
        // document.getElementById("jatuh_tempo").readOnly = true;
        // Get existing table data (if any)

        // Set the cell values
        cell0.innerHTML = deskripsi.value;
        cell1.innerHTML = 'Rp. ' + harga.value;
        cell2.innerHTML =
            '<button type="button" class="btn btn-danger btn-sm mt-4" onclick="deleteRow(this)">Delete</button>';

        // Clear input fields after adding a row
        deskripsi.value = "";
        harga.value = "";

        // Call pushItemToArray to get the table data as an array of objects

        var tableDataArray = pushItemToArray();

        // Convert the array of objects to a JSON string
        var jsonDataString = JSON.stringify(tableDataArray);

        // Set the JSON string as the value of the hidden input field
        document.getElementById("tableData").value = jsonDataString;

        updateTotals();
    }


    function deleteOldRow(btn) {

        var dataIndex = btn.parentNode.getAttribute("data-index"); // Get the custom data-index attribute value
        var tableData = JSON.parse(document.getElementById("tableData").value);

        // Delete the row from the table
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // Remove the corresponding item from the jsonData array
        tableData.splice(dataIndex, 1);

        // Update the value of tableData input with the modified jsonData array
        document.getElementById("tableData").value = JSON.stringify(tableData);

        updateTotals(); // Call the function to update totals if needed
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
        var subTotal = 0;

        for (var i = 0, row; row = table.rows[i]; i++) {
            // console.log(row.cells[5].innerText.substring(3).replaceAll('.', ''));
            // Skip the header row
            if (i === 0) {
                continue;
            }

            var sub = parseFloat(row.cells[1].innerText.substring(3).replaceAll('.', ''));

            subTotal += sub;

        }

        // Display totals
        document.getElementById("total").value = 'Rp ' + formatNumber(subTotal);

    }
</script>
