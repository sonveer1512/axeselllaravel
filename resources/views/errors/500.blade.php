@include('include/header')
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0" data-layout="container">
        <div class="px-3">
          <div class="row min-vh-100 flex-center p-5">
            <div class="col-12 col-xl-10 col-xxl-8">
              <div class="row justify-content-center g-5">
                <div class="col-12 col-lg-6 text-center order-lg-1"><img class="img-fluid w-md-50 w-lg-100 d-light-none" src="../../assets/img/spot-illustrations/27.png" alt="" width="540" /><img class="img-fluid w-md-50 w-lg-100 d-dark-none" src="../../assets/img/spot-illustrations/27.png" alt="" width="540" /></div>
                <div class="col-12 col-lg-6 text-center text-lg-start"><img class="img-fluid mb-6 w-50 w-lg-75 d-dark-none" src="../../assets/img/spot-illustrations/500.png" alt="" /><img class="img-fluid mb-6 w-50 w-lg-75 d-light-none" src="../../assets/img/spot-illustrations/dark_500.png" alt="" />
                  <h2 class="text-800 fw-bolder mb-3">Unknow error!</h2>
                  <p class="text-900 mb-5">But relax! Our cat is here to play you some music.</p><a class="btn btn-lg btn-primary" href="{{url('/')}}">Go Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

   
    @include('include/footer')
  </body>



</html>