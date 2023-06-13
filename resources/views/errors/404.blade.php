@include('include/header')

<div class="container-fluid px-0" data-layout="container">
    <div class="px-3">
        <div class="row min-vh-100 flex-center p-5">
            <div class="col-12 col-xl-10 col-xxl-8">
                <div class="row justify-content-center g-5">
                    <div class="col-12 col-lg-6 text-center order-lg-1"><img class="img-fluid w-md-50 w-lg-100 d-light-none" src="../../assets/img/spot-illustrations/27.png" alt="" width="540" /><img class="img-fluid w-md-50 w-lg-100 d-dark-none" src="../../assets/img/spot-illustrations/404-illustration.png" alt="" width="540" /></div>
                    <div class="col-12 col-lg-6 text-center text-lg-start"><img class="img-fluid mb-6 w-50 w-lg-75 d-dark-none" src="../../assets/img/spot-illustrations/404.png" alt="" /><img class="img-fluid mb-6 w-50 w-lg-75 d-light-none" src="../../assets/img/spot-illustrations/dark_500.png" alt="" />
                        
                        {{-- <h1 style="color:blue; font-size: 100px">404</h1> --}}
                        <h2 class="text-800 fw-bolder mb-3">Page Not Found!</h2>
                        <a class="btn btn-lg btn-primary" href="{{ url('/ ') }}">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include/footer')