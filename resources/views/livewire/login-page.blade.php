<div>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-white shadow rounded p-4 p-sm-5 my-4 mx-3">
                        <form wire:submit.prevent='masuk'>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>RRI PALEMBANG</h3>
                                </a>
                                <h3>Masuk</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input wire:model='username' type="text" class="form-control" id="floatingInput"
                                    placeholder="name">
                                <label for="floatingInput">username</label>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input wire:model='password' type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input checked type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                {{-- <a href="">Forgot Password</a> --}}
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Masuk</button>
                            <p class="text-center mb-0">Don't have an Account? <a
                                    href="{{ url('daftar', []) }}">Daftar</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
</div>


<style>
    body{
        background-color: white
    }
</style>
