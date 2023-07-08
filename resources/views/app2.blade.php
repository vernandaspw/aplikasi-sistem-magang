<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Aplikasi Sistem Magang</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('darkpan/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('darkpan/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('darkpan/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('darkpan/css/style.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body class="antialiased">

    @if(auth()->check())
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
      <livewire:componen.sidebar />
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           <livewire:componen.navbar />
            <!-- Navbar End -->

            {{-- content --}}
            {{ $slot }}
            {{-- endcontent --}}


            <!-- Footer Start -->
            @if(!Request::is('chat'))
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">MAGANG RRI</a>, All Right Reserved.
                        </div>

                    </div>
                </div>
            </div>
            @endif
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @else
    {{ $slot }}
    @endif

    @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('darkpan/lib/chart/chart.min.js') }}"></script>
    <script src="{{asset('darkpan/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('darkpan/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('darkpan/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('darkpan/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('darkpan/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('darkpan/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('darkpan/js/main.js') }}"></script>

    {{-- alert notification --}}
    <script src="{{ asset('vendor/sweatalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        Livewire.on('success', data => {
            console.log(data.pesan);
            Swal.fire({
                position: 'center',
                title: 'success!',
                text: data.pesan,
                icon: 'success',
                confirmButtonText: 'oke'
                // showConfirmButton: false
                // , timer: 1500
            })
        })
        Livewire.on('error', data => {
            console.log(data.pesan);
            Swal.fire({
                position: 'center',
                title: 'error!',
                text: data.pesan,
                icon: 'error',
                confirmButtonText: 'oke'
                // showConfirmButton: false
                // , timer: 1500
            })
        })
    </script>
</body>

</html>
