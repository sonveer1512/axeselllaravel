@include('include/header')

<div class="container-fluid px-0" data-layout="container">
    <div class="px-3">
        <div class="row min-vh-100 flex-center p-5">
            <div class="col-12 col-xl-10 col-xxl-8">
                <div class="row justify-content-center g-5">
                    <div class="col-12 col-lg-6 text-center order-lg-1"><img class="img-fluid w-md-50 w-lg-100 d-dark-none" src="../../assets/img/spot-illustrations/dark_500-illustration.png" alt="" width="540" /></div>
                    <div class="col-12 col-lg-6 text-center text-lg-start" style="margin-top: 160px;">
                        <h1 style="color:blue; font-size: 100px">403</h1>
                        <h2 class="text-800 fw-bolder mb-3">Not Authorized!</h2>
                        <a class="btn btn-lg btn-primary" href="{{ url('/ ') }}">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include/footer')

