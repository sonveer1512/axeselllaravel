@include('include/header')
<style>
   .activeclass {
    background: #ff9b43;
    color: white;
}
</style>
<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('include/sidenav')
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">PERCENTAGE OFFERS</h4>
    
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Offers</a></li>
                                    <li class="breadcrumb-item active">Percentage Offers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="second-list list-unstyled">
                                    <a>
                                        <li class="card allclass mb-2" id="div_category" onclick="showdivdetails('Category','category')">
                                            <div class="card-body">
                                                <b>Offer By Category</b>
                                            </div>
                                        </li>
                                    </a>
                                    
                                    <li class="card allclass mb-2" id="div_subcategory"
                                        onclick="showdivdetails('Sub Category','subcategory')">
                                        <div class="card-body">
                                            <b>Offer By Subcategory</b>
                                        </div>
                                    </li>
                                    <li class="card allclass mb-2" id="div_brand"
                                        onclick="showdivdetails('Brand','brand')">
                                        <div class="card-body">
                                            <b>Offer By Brand</b>
                                        </div>
                                    </li>
                                    <li class="card allclass mb-2" id="div_product"
                                        onclick="showdivdetails('Product','product')">
                                        <div class="card-body">
                                            <b>Offer By Products</b>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 mt-5" id="divwithdetails"><div class="card">
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-sm-4"> </div>
                                <div class="col-sm-auto ms-auto">
                                    <div class="list-grid-nav gap-1">
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editmodal" onclick="showadddiv(&quot;Category&quot;,&quot;&quot;)"><i class="ri-add-fill me-1 align-bottom"></i> Add Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <div class="noresult">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function showadddiv(category, str) {
                            $("#getheading").html(category);
                    
                            $.ajax({
                                url: "http://1onetouch.com/onetouch/offer/addflatdiv",
                                type: "post",
                                data: {
                                    id: category,
                                    str: str
                                },
                                success: function(response) {
                                    $('#editstaffdiv').html(response);
                                }
                            })
                        }
                    </script></div>
                </div>
                
            </div>
        </div>
        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-soft-info p-3">
                        <h5 class="modal-title" id="myModalLabel">Add Offer for <span
                                id="getheading"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="editstaffdetails">
                            @csrf()
                            <div id="editstaffdiv"></div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    
    @include('include/footer')
</body>


<script>
    if (localStorage.getItem('selectedcategory') != null || localStorage.getItem('selectedcategory') != '') {
        showdivdetails(localStorage.getItem('selectedcategory'), localStorage.getItem('selectedstr'));
    }

    function showdivdetails(category, str) {
        $(".allclass").removeClass('activeclass');
        $("#div_" + str).addClass('activeclass');

        $.ajax({
            url: base_url + 'offer/percentdata',
            type: "post",
            data: {
                id: category,
                str: str
            },
            success: function(response) {
                localStorage.setItem('selectedcategory', category);
                localStorage.setItem('selectedstr', str);
                $('#divwithdetails').html(response);
            }
        })
    }

</script>

