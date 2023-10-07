<div class="card-body">
    <h5 class="mb-4">Right Modal</h5>
    <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label>Name*</label>
                            <input wire:model='name' type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Surname*</label>
                            <input wire:model='Surname' type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Date of birth*</label>
                            <input wire:model='birth' type="date" class="form-control" placeholder="31/10/1999">
                            
                        </div>

                        <div class="form-group">
                            <label>Place of birth*</label>
                            <input wire:model='placebirth' type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Address*</label>
                            <div class="custom-control custom-checkbox">
                                <input wire:model='address' type="text" class="form-control" placeholder="Rua e número da casa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Zip code*</label>
                            <div class="custom-control custom-checkbox">
                                <input wire:model='zipcode' type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>City*</label>
                            <div class="custom-control custom-checkbox">
                                <input wire:model='city' type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>