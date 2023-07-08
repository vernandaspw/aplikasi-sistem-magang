<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-white shadow rounded h-100 p-4">
                <h6 class="mb-4">Setting</h6>
                <form wire:submit.prevent='simpan'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">password lama</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='password_lama' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">password baru</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='password_baru' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ulangi password baru</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='password_confirm' class="form-control" id="inputEmail3">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
