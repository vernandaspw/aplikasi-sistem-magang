<div>
    <div class="container-fluid pt-4 px-4">
        @if ($createPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <h6 class="mb-4">Buat akun admin</h6>
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="40" wire:model='username' class="form-control"
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
                            <h6 class="mb-4">Data akun admin </h6>
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
                                    <th scope="col">username</th>

                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            @if ($admin->img)
                                            <img src="{{ Storage::url($admin->img) }}" height="50" width="50" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $admin->nama }}</td>
                                        <td>{{ $admin->username }}</td>

                                        <td>
                                           @if($admin->isaktif)
                                           <button class="btn btn-success"
                                           wire:click="ubahStatus('{{ $admin->id }}')">{{ $admin->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                           @else
                                           <button class="btn btn-danger"
                                           wire:click="ubahStatus('{{ $admin->id }}')">{{ $admin->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                           @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
