<div>
    <div class="container-fluid pt-4 px-4">

        <div class="col-12">
            <div class="bg-white shadow  rounded h-100 p-4">


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
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h6 class="mb-4">Data akun peserta </h6>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Img</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Jenis kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Asal instansi</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Konsentrasi</th>

                                    <th scope="col">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            @if ($peserta->img)
                                                <img src="{{ Storage::url($peserta->img) }}" height="50"
                                                    width="50" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>{{ $peserta->data_peserta->no_hp != null ? $peserta->data_peserta->no_hp : '-' }}
                                        </td>
                                        <td>{{ $peserta->data_peserta->jk == 'l' ? 'laki laki' : 'prempuan' }}
                                        </td>
                                        <td>{{ $peserta->data_peserta->alamat != null ? $peserta->data_peserta->alamat : '-' }}
                                        </td>
                                        <td>{{ $peserta->data_peserta->asal_instansi != null ? $peserta->data_peserta->asal_instansi : '-' }}
                                        </td>
                                        <td>{{ $peserta->data_peserta->jurusan != null ? $peserta->data_peserta->jurusan : '-' }}
                                        </td>
                                        <td>{{ $peserta->data_peserta->konsentrasi != null ? $peserta->data_peserta->konsentrasi : '-' }}
                                        </td>

                                        <td>
                                            @if ($peserta->isaktif)
                                                <button class="btn btn-success"
                                                    wire:click="ubahStatus('{{ $peserta->id }}')">{{ $peserta->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                            @else
                                                <button class="btn btn-danger"
                                                    wire:click="ubahStatus('{{ $peserta->id }}')">{{ $peserta->isaktif == true ? 'Aktif' : 'tidak aktif' }}</button>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-warning"
                                                wire:click="ubahPassPageTrue('{{ $peserta->id }}')">Ubah
                                                password</button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
