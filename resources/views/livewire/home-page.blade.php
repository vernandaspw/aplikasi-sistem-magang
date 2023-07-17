<div>
    <div class="container" style="margin-top: 200px">
        <div class="d-flex align-items-center   ">
            <div class="col-6 text-start">
                <h3><b>LAYANAN ADMINISTRASI MAGANG</b></h3>
                <div class="h4 text-start">
                    <b>RRI PALEMBANG</b>
                </div>
                <div class="mb-3 text-start">
                    <small class="text-dark ">Mau magang? segera daftar sekarang</small>
                </div>
                <a href="{{ url('login', []) }}" class="btn btn-primary">Masuk</a>

                <a href="{{ url('daftar', []) }}" class="btn btn-info ">Daftar</a>
            </div>
            <div class="col-6">
                <div class="text-center my-4">
                    <img src="{{ asset('img/logo.png') }}" width="350" height="350" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 200px; margin-bottom: 200px">
        <div class="d-flex align-items-center   ">
            <div class="col-6 text-center">


                <div class="text-center my-4">
                    <img src="{{ asset('img/logo.png') }}" width="350" height="350" alt="">
                </div>

            </div>
            <div class="col-6">
                <h3>Kontak RRI</h3>
                <div class="text-start my-4">
                    <div class="mb-2">
                        <div class=""><b>Alamat</b></div>
                        <div class="">{{ $setting->alamat_instansi }}</div>
                    </div>
                    <div class="mb-2">
                        <div class=""><b>Email</b></div>
                        <div class="">{{ $setting->email }}</div>
                    </div>
                    <div class="mb-2">
                        <div class=""><b>Telp</b></div>
                        <div class="">{{ $setting->wa }}</div>
                    </div>
                    <div class="mb-2">
                        <div class=""><b>IG</b></div>
                        <div class="">{{ $setting->ig }}</div>
                    </div>
                    <div class="mb-2">
                        <div class=""><b>Twitter</b></div>
                        <div class="">{{ $setting->twitter }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<style>
    * {
        background-color: white;
    }
</style>
