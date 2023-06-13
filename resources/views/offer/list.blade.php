@include('include/header')

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('include/sidenav')
            <div class="content">
                <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        {{-- <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
                        <li class="breadcrumb-item"><a href="#!">Page 2</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Default</li> --}}
                        <h2>Offer</h2>
                    </ol>
                </nav>
                <div class="mb-9">
                    
                    <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                            <div class="card mt-5">
                                <div class="card-body form-steps">
                                    <form action="#">
                                        <div class="step-arrow-nav mb-4">
                                            <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="true">Flat Discount</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link " id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="false">Percentage Discount</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header align-items-center d-flex"> <h4 class="card-title mb-0 flex-grow-1">Flat Discount</h4> </div>
        
                                                                <div class="card-body">
        
                                                                    <div class="live-preview">
                                                                        <div class="table-responsive">
                                                                            <table class="table align-middle table-nowrap mb-0">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th scope="col">ID</th>
                                                                                        <th scope="col">Title</th>
                                                                                        <th scope="col">Offer By</th>
                                                                                        <th scope="col">Offer On</th>
                                                                                        <th scope="col">Discount</th>
                                                                                        <th scope="col">Left Validity</th>
                                                                                        <th scope="col">Status</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>1</a></td>
                                                                                        <td>title</td>
                                                                                        <td>Product</td>
                                                                                        <td>Category</td>
                                                                                        <td>₹ 32</td>
                                                                                        <td>5 Days </td>
                                                                                        <td> 5 </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- end table -->
                                                                        </div>
                                                                        <!-- end table responsive -->
        
                                                                    </div><!-- end card-body -->
                                                                </div><!-- end card -->
                                                            </div><!-- end col -->
                                                        </div>
                                                    </div>
        
        
                                                </div>
        
                                            </div>
                                            <!-- end tab pane -->
        
                                            <div class="tab-pane fade  " id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                                                <div>
                                                    <div class="col-xl-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0 flex-grow-1">Percentage Discount</h4>
        
                                                            </div><!-- end card header -->
        
                                                            <div class="card-body">
        
                                                                <div class="live-preview">
                                                                    <div class="table-responsive">
                                                                        <table class="table align-middle table-nowrap mb-0">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">ID</th>
                                                                                    <th scope="col">Title</th>
                                                                                    <th scope="col">Offer By</th>
                                                                                    <th scope="col">Offer On</th>
                                                                                    <th scope="col">Discount</th>
                                                                                    <th scope="col">Left Validity</th>
                                                                                    <th scope="col">Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>1</a></td>
                                                                                    <td>title</td>
                                                                                    <td>Product</td>
                                                                                    <td>Category</td>
                                                                                    <td>₹ 32</td>
                                                                                    <td>5 Days </td>
                                                                                    <td> 5 </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!-- end table -->
                                                                    </div>
                                                                    <!-- end table responsive -->
        
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col -->
                                                    </div>
                                                </div>
        
                                            </div>
                                            <!-- end tab pane -->
        
                                            <div class="tab-pane fade" id="pills-experience" role="tabpanel">
                                                <div class="text-center">
        
                                                    <div class="avatar-md mt-5 mb-4 mx-auto">
                                                        <div class="avatar-title bg-light text-success display-4 rounded-circle">
                                                            <i class="ri-checkbox-circle-fill"></i>
                                                        </div>
                                                    </div>
                                                    <h5>Well Done !</h5>
                                                    <p class="text-muted">You have Successfully Signed Up</p>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </form>
                                </div>
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
