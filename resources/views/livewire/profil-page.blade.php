<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-white shadow rounded h-100 p-4">
                <h6 class="mb-4">Profile</h6>
                @if(auth()->user()->role == 'peserta')
                <form wire:submit.prevent='updatePeserta'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input required type="file" wire:model='img' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='nama' maxlength="40" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" wire:model='email' maxlength="80" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="tel" wire:model='no_hp' maxlength="17" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" wire:model='jk' id="">
                                <option value="l">Laki laki</option>
                                <option value="p">Prempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">alamat</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='alamat' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">asal instansi</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='asal_instansi' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='jurusan' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Konsentrasi</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='konsentrasi' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
                @elseif(auth()->user()->role == 'pembimbing')
                <form wire:submit.prevent='updatePembimbing'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input required type="file" wire:model='img' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='nama' maxlength="40" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" wire:model='email' maxlength="80" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="tel" wire:model='no_hp' maxlength="17" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" wire:model='jk' id="">
                                <option value="l">Laki laki</option>
                                <option value="p">Prempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">alamat</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='alamat' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
                @elseif(auth()->user()->role == 'admin')
                <form wire:submit.prevent='updateAdmin'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input required type="file" wire:model='img' class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" wire:model='nama' maxlength="40" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" wire:model='email' maxlength="80" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
