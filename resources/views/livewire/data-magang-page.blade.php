<div>
    <div class="container-fluid pt-4 px-4 d-print-none">
        @if ($terimaPengajuanPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow rounded h-100 p-4">
                    <h6 class="mb-4">Terima pengajuan</h6>
                    <form wire:submit.prevent='terima_pengajuan'>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Surat balasan</label>
                            <div class="col-sm-10">
                                <input required type="file" maxlength="40" wire:model='surat_balasan'
                                    class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Pilih pembimbing</label>
                            <div class="col-sm-10">
                                <select required wire:model='pembimbing_id' class="form-control text-dark"
                                    id="">
                                    <option value="" class="text-dark">Pilih</option>
                                    @foreach ($pembimbings as $pembimbing)
                                        <option value="{{ $pembimbing->id }}" class="text-dark">{{ $pembimbing->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal mulai magang</label>
                            <div class="col-sm-10">
                                <input required type="date" maxlength="40" wire:model='magang_mulai'
                                    class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal selesai magang</label>
                            <div class="col-sm-10">
                                <input required type="date" maxlength="40" wire:model='magang_selesai'
                                    class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        @elseif($magang_selesaiProsesPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <h6 class="mb-4">Magang selesai_proses</h6>
                    <form wire:submit.prevent='magang_selesai_proses'>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Sertifikat</label>
                            <div class="col-sm-10">
                                <input required type="file" maxlength="40" wire:model='sertifikat'
                                    class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        @elseif ($beriNilaiPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <h6 class="mb-4">Beri Nilai</h6>
                    <div class="mb-2 text-white">
                        Keterangan : beri nilai mulai dari 0 sampai 100
                    </div>
                    <form wire:submit.prevent='beri_nilai'>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nilai kehadiran</label>
                            <div class="col-sm-10">
                                <input required type="number" min="0" max="100"
                                    wire:model='nilai_kehadiran' class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nilai disiplin</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" max="100" wire:model='nilai_disiplin'
                                    class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nilai produktivitas_kerja</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" max="100"
                                    wire:model='nilai_produktivitas_kerja' class="form-control" id="inputEmail3">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        @elseif ($ubahDataMagangPage)
            <div class="col-sm-12 col-xl-6">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <h6 class="mb-4">Ubah data magang</h6>
                    <div class="mb-2 text-white">
                        {{-- Keterangan : beri nilai mulai dari 0 sampai 100 --}}
                    </div>
                    <form wire:submit.prevent='ubahDataMagang'>
                        <div class="form-floating mb-3">
                            <select wire:model='e_pembimbing_id' required class="form-control" id="floatingTextJk"
                                id="">
                                <option value="">Pilih Pembimbing</option>
                                @foreach ($pembimbings as $pembimbing)
                                <option value="{{ $pembimbing->id }}" class="text-dark">{{ $pembimbing->nama }}</option>
                                @endforeach
                            </select>
                            <label for="floatingTextJk">Pilih Pembimbing</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select wire:model='e_posisi_id' required class="form-control" id="floatingTextJk"
                                id="">
                                <option value="">Pilih penempatan kerja</option>
                                @foreach ($posisis as $posisi)
                                <option value="{{ $posisi->id }}" class="text-dark">{{ $posisi->nama }}</option>
                                @endforeach
                            </select>
                            <label for="floatingTextJk">Pilih penempatan kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select wire:model='e_bagian_id' required class="form-control" id="floatingTextJk"
                                id="">
                                <option value="">Pilih Unit kerja</option>
                                @foreach ($bagians as $bagian)
                                <option value="{{ $bagian->id }}" class="text-dark">{{ $bagian->nama }}</option>
                                @endforeach
                            </select>
                            <label for="floatingTextJk">Pilih Unit kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="date" maxlength="40" wire:model='e_mulai_magang'
                                class="form-control" id="inputEmail3">
                            <label for="inputEmail3" class="">Tanggal mulai magang</label>

                        </div>
                        <div class="form-floating mb-3">
                            <input required type="date" maxlength="40" wire:model='e_selesai_magang'
                                class="form-control" id="inputEmail3">
                            <label for="inputEmail3" class="">Tanggal selesai magang</label>

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="bg-white shadow  rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h6 class="mb-4">Data Magang </h6>
                        </div>
                        @if(auth()->user()->role == 'admin')
                        <button onclick="window.print();" class="btn btn-info">
                            Print
                        </button>
                        @endif
                    </div>


                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="text-center">
                                <tr>

                                    <th scope="col">Peserta</th>
                                    <th scope="col">Pembimbing</th>
                                    <th scope="col">Penempatan kerja/Unit kerja</th>

                                    <th scope="col">Tanggal daftar</th>
                                    {{-- <th scope="col">Diterima oleh</th> --}}
                                    <th scope="col">Status</th>
                                    <th scope="col">Surat pengantar</th>
                                    <th scope="col">Surat balasan</th>
                                    <th scope="col">Mulai magang</th>
                                    <th scope="col">Selesai magang</th>
                                    <th scope="col">Sertifikat</th>
                                    <th scope="col">Nilai Magang</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data_magangs as $data_magang)
                                    <tr>
                                        <td>{{ $data_magang->peserta->nama }}</td>
                                        <td>{{ $data_magang->pembimbing != null ? $data_magang->pembimbing->nama : '-' }}
                                        </td>
                                        <td>{{ $data_magang->posisi != null ? $data_magang->posisi->nama : '-' }}/{{ $data_magang->bagian != null ? $data_magang->bagian->nama : '-' }}
                                        </td>

                                        <td>{{ $data_magang->tanggal_daftar != null ? $data_magang->tanggal_daftar : '-' }}
                                        </td>
                                        {{-- <td>{{ $data_magang->diterima_oleh != null ? $data_magang->diterima_oleh->nama : '-' }} --}}
                                        <td>
                                            <div
                                                class="@if ($data_magang->status == 'pengajuan') badge bg-warning @elseif ($data_magang->status == 'magang') badge bg-success @elseif ($data_magang->status == 'gagal') badge bg-danger @endif">
                                                {{ $data_magang->status }}</div>
                                        </td>

                                        <td>
                                            @if ($data_magang->surat_pengantar)
                                                <a href="{{ Storage::url($data_magang->surat_pengantar) }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    File
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data_magang->surat_balasan)
                                                <a href="{{ Storage::url($data_magang->surat_balasan) }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    File
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $data_magang->magang_mulai != null ? $data_magang->magang_mulai : '-' }}
                                        </td>
                                        <td>{{ $data_magang->magang_selesai != null ? $data_magang->magang_selesai : '-' }}
                                        </td>
                                        <td class="">
                                            @if ($data_magang->sertifikat)
                                                <a href="{{ Storage::url($data_magang->sertifikat) }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <span class="text-warning">
                                                        File
                                                    </span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-start">
                                            <div class="">
                                                Kehadiran : @if ($data_magang->data_penilaian)
                                                    @if ($data_magang->data_penilaian->nilai_kehadiran < 40)
                                                        E
                                                    @elseif ($data_magang->data_penilaian->nilai_kehadiran < 60)
                                                        D
                                                    @elseif ($data_magang->data_penilaian->nilai_kehadiran < 70)
                                                        C
                                                    @elseif ($data_magang->data_penilaian->nilai_kehadiran < 85)
                                                        B
                                                    @elseif ($data_magang->data_penilaian->nilai_kehadiran <= 100)
                                                        A
                                                    @endif
                                                    &nbsp;({{ $data_magang->data_penilaian != null ? $data_magang->data_penilaian->nilai_kehadiran : '0' }})
                                                @endif
                                            </div>
                                            <div class="">
                                                Disiplin : @if ($data_magang->data_penilaian)
                                                    @if ($data_magang->data_penilaian->nilai_disiplin < 40)
                                                        E
                                                    @elseif ($data_magang->data_penilaian->nilai_disiplin < 60)
                                                        D
                                                    @elseif ($data_magang->data_penilaian->nilai_disiplin < 70)
                                                        C
                                                    @elseif ($data_magang->data_penilaian->nilai_disiplin < 85)
                                                        B
                                                    @elseif ($data_magang->data_penilaian->nilai_disiplin <= 100)
                                                        A
                                                    @endif
                                                    &nbsp;({{ $data_magang->data_penilaian != null ? $data_magang->data_penilaian->nilai_disiplin : '0' }})
                                                @endif
                                            </div>
                                            <div class="">
                                                Produktifitas : @if ($data_magang->data_penilaian)
                                                    @if ($data_magang->data_penilaian->nilai_produktivitas_kerja < 40)
                                                        E
                                                    @elseif ($data_magang->data_penilaian->nilai_produktivitas_kerja < 60)
                                                        D
                                                    @elseif ($data_magang->data_penilaian->nilai_produktivitas_kerja < 70)
                                                        C
                                                    @elseif ($data_magang->data_penilaian->nilai_produktivitas_kerja < 85)
                                                        B
                                                    @elseif ($data_magang->data_penilaian->nilai_produktivitas_kerja <= 100)
                                                        A
                                                    @endif
                                                    &nbsp;({{ $data_magang->data_penilaian != null ? $data_magang->data_penilaian->nilai_produktivitas_kerja : '0' }})
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            @if (auth()->user()->role == 'pembimbing')
                                                @if ($data_magang->status == 'magang')
                                                    @if ($data_magang->data_penilaian)
                                                    @else
                                                        <button wire:click="beriNilaiTrue('{{ $data_magang->id }}')"
                                                            class="btn btn-sm m-1 btn-success ">Beri Nilai</button>
                                                    @endif
                                                @endif
                                            @endif
                                            @if (auth()->user()->role == 'admin')
                                                @if ($data_magang->status == 'pengajuan')
                                                    <button
                                                        wire:click="terima_pengajuanTrue('{{ $data_magang->id }}')"
                                                        class="btn btn-sm m-1 btn-success ">Terima
                                                        Pengajuan</button>
                                                    <button
                                                        onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()"
                                                        wire:click="tolakPengajuan('{{ $data_magang->id }}')"
                                                        class="btn btn-sm m-1 btn-danger">Tolak</button>
                                                @endif
                                                @if ($data_magang->status == 'magang')
                                                    <button
                                                        wire:click="magang_selesaiProsesTrue('{{ $data_magang->id }}')"
                                                        class="btn btn-sm m-1 btn-success ">Magang Selesai</button>

                                                    <button
                                                        onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()"
                                                        wire:click="gagal_magang('{{ $data_magang->id }}')"
                                                        class="btn btn-sm m-1 btn-danger">Gagal</button>
                                                    <button
                                                        wire:click="ubah_data_magang_page_true('{{ $data_magang->id }}')"
                                                        class="btn btn-sm m-1 btn-warning">Ubah</button>
                                                @endif
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

    {{-- print disini --}}
    <div class="d-print-block d-none">
        <div class="container-fluid mt-2">
            <div class="kop d-flex align-items-center">
                <div class="col-3">
                    <img src="{{ asset('img/logo.png') }}" width="140" alt="">
                </div>
                <div class="col text-start">
                    <div class="">
                        <b>LAYANAN ADMINISTRASI MAGANG</b>
                    </div>
                    <div class="">
                        <b>RRI PALEMBANG</b>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="mb-2">
                    Total yang magang : {{ $laporan_data_magangs->count() }}
                </div>
                <table class="table table-bordered">
                    <thead>
                            <th>
                                No.
                            </th>
                            <th>
                                Siswa/Mahasiswa
                            </th>
                            <th>
                                Pembimbing
                            </th>
                            <th>
                                Penempatan
                            </th>
                            <th>
                                Unit kerja
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($laporan_data_magangs as $lpm)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $lpm->peserta->nama }}
                                </td>
                                <td>
                                    {{ $lpm->pembimbing->nama }}
                                </td>
                                <td>
                                    {{ $lpm->posisi->nama }}
                                </td>
                                <td>
                                    {{ $lpm->bagian->nama }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
