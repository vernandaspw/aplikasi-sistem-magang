<div>
    <div class="container-fluid pt-4 px-4">
        @if ($ubahPassPage)
            <div class="d-flex align-items-center justify-content-between">
                <div class="">
                    <h6 class="mb-4">Ubah password</h6>
                </div>
            </div>
            <form wire:submit.prevent='ubahPass'>
                <div class="mt-2">
                    <label for="">Password baru</label>
                    <input type="text" wire:model='password' class="form-control">
                </div>
                <div class="mt-2">
                    <button type="submit" class="form-control btn btn-primary">Simpan</button>
                </div>
            </form>
        @else
            @if ($createPage)
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-white shadow  rounded h-100 p-4">
                        <h6 class="mb-4">Buat akun pembimbing</h6>
                        <form wire:submit.prevent='buat'>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" maxlength="40" wire:model='img' class="form-control"
                                        id="inputEmail3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama </label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="40" wire:model='nama' class="form-control"
                                        id="inputEmail3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail32" class="col-sm-2 col-form-label">NIP </label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="20" wire:model='nip' class="form-control"
                                        id="inputEmail32">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" maxlength="40" wire:model='email' class="form-control"
                                        id="inputEmail3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" maxlength="40" wire:model='password' class="form-control"
                                        id="inputEmail3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor hp </label>
                                <div class="col-sm-10">
                                    <input type="tel" maxlength="17" wire:model='no_hp' class="form-control"
                                        id="inputEmail3">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis kelamin </label>
                                <div class="col-sm-10">
                                    <select class="form-control" wire:model='jk' id="">
                                        <option value="">Pilih</option>
                                        <option value="l">laki laki</option>
                                        <option value="p">prempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat </label>
                                <div class="col-sm-10">
                                    <input type="text" wire:model='alamat' class="form-control" id="inputEmail3">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" wire:click='createPageFalse' class="btn btn-warning">batal</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="bg-white shadow  rounded h-100 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h6 class="mb-4">Data akun pembimbing </h6>
                            </div>
                            <button class="ms-1 btn btn-success" wire:click='createPageTrue'>Buat baru</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Img</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Jenis kelamin</th>
                                        <th scope="col">Alamat</th>

                                        <th scope="col">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembimbings as $pembimbing)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                @if ($pembimbing->img)
                                                    <img src="{{ Storage::url($pembimbing->img) }}" height="50"
                                                        width="50" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $pembimbing->nama }}</td>
                                            <td>{{ $pembimbing->data_pembimbing->nip != null ? $pembimbing->data_pembimbing->nip : '-' }}</td>
                                            <td>{{ $pembimbing->email }}</td>
                                            <td>{{ $pembimbing->data_pembimbing->no_hp != null ? $pembimbing->data_pembimbing->no_hp : '-' }}
                                            </td>
                                            <td>{{ $pembimbing->data_pembimbing->jk == 'l' ? 'laki laki' : 'prempuan' }}
                                            </td>
                                            <td>{{ $pembimbing->data_pembimbing->alamat != null ? $pembimbing->data_pembimbing->alamat : '-' }}
                                            </td>

                                            <td>
                                                @if ($pembimbing->isaktif)
                                                    <button class="btn btn-success"
                                                        wire:click="ubahStatus('{{ $pembimbing->id }}')">{{ $pembimbing->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                                @else
                                                    <button class="btn btn-danger"
                                                        wire:click="ubahStatus('{{ $pembimbing->id }}')">{{ $pembimbing->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-warning"
                                                    wire:click="ubahPassPageTrue('{{ $pembimbing->id }}')">Ubah
                                                    password</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        @endif
    </div>
</div>
