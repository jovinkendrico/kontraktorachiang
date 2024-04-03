<div id="payment{{ $id }}" class="modal fade">
    <div class="modal-dialog modal-confirm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-13">
                    <div class="icon-box">
                        <i class="fa fa-exclamation"></i>
                    </div>
                </div>

                <p>
                    How much do you want to pay
                    <b>{{ $model->$modelAttribute }}</b> project?
                    This process cannot be undone.
                </p>
                <div class="row mb-2">
                    <label class="fs-6 form-label">Tanggal :</label>
                    <div class="input-group date">
                        <input type="date" class="form-control" value="" placeholder="Select date"
                            id="tanggal" name="tanggal">
                    </div>
                </div>

                <div class="row">
                    <label class="fs-6 form-label">Harga :</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" value="" placeholder="0.00"
                            id="harga" name="harga">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <form method="post" action="{{ $route }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function formatNumber(number) {
            return number.toLocaleString('id-ID', {
                maximumFractionDigits: 0
            });
        }

        function maskingNumber() {
            var harga = parseInt($('#harga').val().replace(/\D/g, ''), 10);
            $('#harga').val(formatNumber(harga));
        }

        $('#harga').on('input', function() {
            maskingNumber();
        });
        $('#form').on('submit', function() {
            var harga = $('#harga').val().replaceAll('.', '');
            $('#harga').val(harga)
        });
    });
</script>
