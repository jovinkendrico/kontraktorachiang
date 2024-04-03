<div id="payment{{ $id }}" class="modal fade">
    <div class="modal-dialog modal-confirm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post" action="{{ $route }}">
                @csrf
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

                    <input type="hidden" class="form-control" value="{{ $id }}" id="project_id"
                        name="project_id">
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
                                id="total_bayar" name="total_bayar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
