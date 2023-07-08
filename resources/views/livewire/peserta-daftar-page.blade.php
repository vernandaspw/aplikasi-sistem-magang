<div>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form wire:submit.prevent='daftar'>
                        <div class="bg-white shadow rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="{{ url('/', []) }}" class="">
                                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>RRI PALEMBANG</h3>
                                </a>
                                <h3>Daftar</h3>
                            </div>

                            <div class="form-floating mb-3">
                                <input wire:model='email' required type="email" class="form-control"
                                    id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input wire:model='password' required type="password" class="form-control"
                                    id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <hr>
                            <h6>Data Siswa/Mahasiswa</h6>
                            <div class="form-floating mb-3">
                                <input wire:model='img' type="file" maxlength="40" class="form-control"
                                    id="floatingTextFoto" placeholder="">
                                <label for="floatingTextFoto">Foto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='nama' required type="text" maxlength="40" class="form-control"
                                    id="floatingTextNama" placeholder="">
                                <label for="floatingTextNama">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select wire:model='jk' required class="form-control" id="floatingTextJk"
                                    id="">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="l">Laki laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                <label for="floatingTextJk">Pilih Jenis kelamin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='no_hp' required type="tel" maxlength="16" class="form-control"
                                    id="floatingTextNoHp" placeholder="">
                                <label for="floatingTextNoHp">Nomor Hp</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='alamat' required type="text" class="form-control"
                                    id="floatingTextAlamat" placeholder="">
                                <label for="floatingTextAlamat">Alamat domisili</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='asal_instansi' required type="text" class="form-control"
                                    id="floatingTextAsalInstansi" placeholder="">
                                <label for="floatingTextAsalInstansi">Asal Instansi (sekolah/kampus)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='jurusan' required type="text" class="form-control"
                                    id="floatingTextJurusan" placeholder="">
                                <label for="floatingTextJurusan">Jurusan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='konsentrasi' type="text" class="form-control"
                                    id="floatingTextKonsentrasi" placeholder="">
                                <label for="floatingTextKonsentrasi">Konsentrasi</label>
                            </div>
                            <hr>
                            <h6>Data Magang</h6>
                            <div class="form-floating mb-3">
                                <input required type="file" wire:model='surat_pengantar' maxlength="40"  class="form-control" id="inputEmail3">
                                <label for="inputEmail3" class="">Surat pengantar</label>

                            </div>
                            <div class="form-floating mb-3">
                                <select wire:model='posisi_id' required class="form-control" id="floatingTextJk"
                                    id="">
                                    <option value="">Pilih pendekatan kerja</option>
                                    @foreach ($posisis as $posisi)
                                    <option value="{{ $posisi->id }}" class="text-dark">{{ $posisi->nama }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingTextJk">Pilih pendekatan kerja</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select wire:model='bagian_id' required class="form-control" id="floatingTextJk"
                                    id="">
                                    <option value="">Pilih Unit kerja</option>
                                    @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}" class="text-dark">{{ $bagian->nama }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingTextJk">Pilih Unit kerja</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="inputEmail3">
                                <label for="" wire:model='catatan_peserta' class="">Catatan Peserta </label>

                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Daftar</button>
                            <p class="text-center mb-0">Already have an Account? <a href="{{ url('login', []) }}">Sign
                                    In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
</div>
