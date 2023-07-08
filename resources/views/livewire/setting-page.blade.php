<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-white shadow  rounded h-100 p-4">
                <h6 class="mb-4">Setting</h6>
                <form wire:submit.prevent='perbarui'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama instansi</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='nama_instansi' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi instansi</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='deskripsi_instansi' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat instansi</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='alamat_instansi' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='email' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='wa' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='ig' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='twitter' class="form-control" id="inputEmail3">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
