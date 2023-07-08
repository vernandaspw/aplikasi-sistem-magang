<div>
    <div class="container-fluid pt-4 px-4" wire:poll>

        @if (auth()->user()->role == 'pembimbing')
            <div class="col-12 col-xl-10">
                <div class="bg-white shadow rounded h-100 p-4 ">
                    @if ($absenMasukPage || $absenKeluarPage)
                        <h6 class="mb-4">Absensi Hari ini</h6>
                        <div class="d-flex ">
                            @if ($absenMasukPage)
                                <a href="javascript:void()" wire:click='absenMasuk' class="card w-100 me-1 bg-success">
                                    <div class="card-body text-center">
                                        <div class="p-5 text-white">
                                            Absen Masuk
                                        </div>
                                    </div>
                                </a>
                                {{-- <a href="javascript:void()" wire:click='absenIzin' class="card w-100 me-1 bg-warning">
                                    <div class="card-body text-center">
                                        <div class="p-5 text-white">
                                            Izin
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void()" wire:click='absenSakit' class="card w-100 me-1 bg-info">
                                    <div class="card-body text-center">
                                        <div class="p-5 text-white">
                                            Sakit
                                        </div>
                                    </div>
                                </a> --}}
                                <a href="javascript:void()" wire:click='absenTidakHadir'
                                    class="card w-100 me-1 bg-danger">
                                    <div class="card-body text-center">
                                        <div class="p-5 text-white">
                                            Tidak hadir
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($absenKeluarPage)
                                <a href="javascript:void()" wire:click='absenKeluar' class="card w-100 me-1 bg-danger">
                                    <div class="card-body text-center">
                                        <div class="p-5 text-white">
                                            Absen keluar
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @else
                        Hari ini sudah absen
                    @endif
                </div>

            </div>
        @endif

        <div class="col-12 mt-3">
            <div class="bg-white shadow rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h6 class="mb-4">Data kehadiran Pembimbing</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pembimbing</th>
                                <th scope="col">Jam masuk</th>
                                <th scope="col">Jam keluar</th>
                                <th scope="col">Status kehadiran</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kehadirans as $data_kehadiran)
                                <tr>
                                    <th scope="row">{{ $data_kehadiran->tanggal }}</th>
                                    <td>
                                        {{ $data_kehadiran->pembimbing->nama }}
                                    </td>
                                    <td>
                                        {{ $data_kehadiran->jam_masuk }}
                                    </td>
                                    <td>
                                        {{ $data_kehadiran->jam_keluar != null ? $data_kehadiran->jam_keluar : '-' }}
                                    </td>
                                    <td
                                        class="
                                            @if ($data_kehadiran->status_kehadiran == 'hadir') text-success

                                            @elseif($data_kehadiran->status_kehadiran == 'tidak hadir')
                                            text-danger @endif
                                            ">
                                        {{ $data_kehadiran->status_kehadiran }}
                                    </td>
                                    <td
                                        class="@if ($data_kehadiran->status == 'pending') text-warning
                                            @elseif($data_kehadiran->status == 'disetujui')
                                        text-success
                                        @else
                                        text-danger @endif">
                                        {{ $data_kehadiran->status }}
                                    </td>
                                    <td>
                                        @if (auth()->user()->role == 'admin')
                                            @if ($data_kehadiran->status == 'pending' && $data_kehadiran->jam_keluar != null && $data_kehadiran->tanggal == date('Y-m-d'))
                                            <button class="btn btn-success"
                                            wire:click="ubahStatusApprove('{{ $data_kehadiran->id }}')">Setujui</button>
                                            <button class="btn btn-danger"
                                            wire:click="ubahStatusReject('{{ $data_kehadiran->id }}')">Tolak</button>
                                            @elseif ($data_kehadiran->status == 'pending' && $data_kehadiran->jam_keluar == null && $data_kehadiran->tanggal != date('Y-m-d'))
                                            <button class="btn btn-success"
                                            wire:click="ubahStatusApprove('{{ $data_kehadiran->id }}')">Setujui</button>
                                            <button class="btn btn-danger"
                                            wire:click="ubahStatusReject('{{ $data_kehadiran->id }}')">Tolak</button>
                                            @elseif($data_kehadiran->status == 'ditolak')
                                                <button class="btn btn-success"
                                                    wire:click="ubahStatusApprove('{{ $data_kehadiran->id }}')">Setujui</button>
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






    </div>
</div>
