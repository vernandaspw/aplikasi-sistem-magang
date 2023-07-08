<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-white shadow rounded h-100 p-4">
                <h6 class="mb-4">Daftar Magang</h6>
                <form wire:submit.prevent='buat'>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Surat pengantar</label>
                        <div class="col-sm-10">
                            <input required type="file" wire:model='surat_pengantar' maxlength="40"  class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Pilih penempatan kerja</label>
                        <div class="col-sm-10">
                            <select required wire:model='posisi_id' class="form-control text-dark" id="">
                                <option value="" class="text-dark">Pilih</option>
                                @foreach ($posisis as $posisi)
                                <option value="{{ $posisi->id }}" class="text-dark">{{ $posisi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Pilih Unit kerja</label>
                        <div class="col-sm-10">
                           <select required wire:model='bagian_id' class="form-control text-dark" id="">
                            <option value="" class="text-dark">Pilih</option>
                            @foreach ($bagians as $bagian)
                            <option value="{{ $bagian->id }}" class="text-dark">{{ $bagian->nama }}</option>
                            @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" wire:model='catatan_peserta' class="col-sm-2 col-form-label">Catatan Peserta </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                id="">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Mengajukan magang</button>
                </form>
            </div>
        </div>
    </div>
</div>
