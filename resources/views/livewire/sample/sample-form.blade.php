<div>
<div class="modal-content">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Sample Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Sample Name</label>
                    <div class="input-group">
                        <input type="text" wire:model.defer="name" class="form-control">
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer  bg-whitesmoke br">
                <button type="submit" class="btn btn-primary m-t-15 waves-effect float-right">Save</button>
            </div>
        </form>
    </div>
</div>
