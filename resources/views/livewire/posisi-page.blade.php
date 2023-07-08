<div>
    <div class="container-fluid pt-4 px-4">
        @if ($createPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <h6 class="mb-4">Buat penempatan kerja</h6>
                    <form wire:submit.prevent='buat'>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama penempatan kerja</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="40" wire:model='nama' class="form-control"
                                    id="inputEmail3">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" wire:click='createPageFalse' class="btn btn-warning">batal</button>
                    </form>
                </div>
            </div>
        @elseif($editPage)
        <div class="col-sm-12 col-xl-6">
            <div class="bg-white shadow  rounded h-100 p-4">
                <h6 class="mb-4">Edit penempatan kerja</h6>
                <form wire:submit.prevent='edit'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama penempatan kerja</label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="40" wire:model='editnama' class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" wire:click='editPageFalse' class="btn btn-warning">batal</button>
                </form>
            </div>
        </div>
        @else
            <div class="col-12">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h6 class="mb-4">Data penempatan kerja</h6>
                        </div>
                        <button class="ms-1 btn btn-success" wire:click='createPageTrue'>Buat baru</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Nama</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posisis as $posisi)
                                    <tr>
                                        {{-- <th scope="row"></th> --}}
                                        <td>{{ $posisi->nama }}</td>
                                        <td>
                                            <button class="btn btn-danger"
                                                wire:click="hapus('{{ $posisi->id }}')">Hapus</button>
                                            <button class="btn btn-warning"
                                                wire:click="editPageTrue('{{ $posisi->id }}')">Edit</button>
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
