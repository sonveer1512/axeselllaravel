@include('include/header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<style>
    .error {
        color: red;
        font-size: 10px;
    }

    #success {
        background: green;
    }
</style>
<style type="text/css">
    .toast-title {
        font-weight: 700;
    }

    .toast-message {
        -ms-word-wrap: break-word;
        word-wrap: break-word;
    }

    .toast-message a,
    .toast-message label {
        color: #fff;
    }

    .toast-message a:hover {
        color: #ccc;
        text-decoration: none;
    }

    .toast-close-button {
        position: relative;
        right: -0.3em;
        top: -0.3em;
        float: right;
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        -webkit-text-shadow: 0 1px 0 #fff;
        text-shadow: 0 1px 0 #fff;
        opacity: 0.8;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
        filter: alpha(opacity=80);
        line-height: 1;
    }

    .toast-close-button:focus,
    .toast-close-button:hover {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.4;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
        filter: alpha(opacity=40);
    }

    .rtl .toast-close-button {
        left: -0.3em;
        float: left;
        right: 0.3em;
    }

    button.toast-close-button {
        padding: 0;
        cursor: pointer;
        background: 0 0;
        border: 0;
        -webkit-appearance: none;
    }

    .toast-top-center {
        top: 0;
        right: 0;
        width: 100%;
    }

    .toast-bottom-center {
        bottom: 0;
        right: 0;
        width: 100%;
    }

    .toast-top-full-width {
        top: 0;
        right: 0;
        width: 100%;
    }

    .toast-bottom-full-width {
        bottom: 0;
        right: 0;
        width: 100%;
    }

    .toast-top-left {
        top: 12px;
        left: 12px;
    }

    .toast-top-right {
        top: 12px;
        right: 12px;
    }

    .toast-bottom-right {
        right: 12px;
        bottom: 12px;
    }

    .toast-bottom-left {
        bottom: 12px;
        left: 12px;
    }

    #toast-container {
        position: fixed;
        z-index: 999999;
        pointer-events: none;
    }

    #toast-container * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #toast-container>div {
        position: relative;
        pointer-events: auto;
        overflow: hidden;
        margin: 0 0 6px;
        padding: 15px 15px 15px 50px;
        width: 300px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        background-position: 15px center;
        background-repeat: no-repeat;
        -moz-box-shadow: 0 0 12px #999;
        -webkit-box-shadow: 0 0 12px #999;
        box-shadow: 0 0 12px #999;
        color: #fff;
        opacity: 0.8;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
        filter: alpha(opacity=80);
    }

    #toast-container>div.rtl {
        direction: rtl;
        padding: 15px 50px 15px 15px;
        background-position: right 15px center;
    }

    #toast-container>div:hover {
        -moz-box-shadow: 0 0 12px #000;
        -webkit-box-shadow: 0 0 12px #000;
        box-shadow: 0 0 12px #000;
        opacity: 1;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        filter: alpha(opacity=100);
        cursor: pointer;
    }

    #toast-container>.toast-info {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=) !important;
    }

    #toast-container>.toast-error {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=) !important;
    }

    #toast-container>.toast-success {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==) !important;
    }

    #toast-container>.toast-warning {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=) !important;
    }

    #toast-container.toast-bottom-center>div,
    #toast-container.toast-top-center>div {
        width: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    #toast-container.toast-bottom-full-width>div,
    #toast-container.toast-top-full-width>div {
        width: 96%;
        margin-left: auto;
        margin-right: auto;
    }

    .toast {
        background-color: #030303;
    }

    .toast-success {
        background-color: #51a351;
    }

    .toast-error {
        background-color: #bd362f;
    }

    .toast-info {
        background-color: #2f96b4;
    }

    .toast-warning {
        background-color: #f89406;
    }

    .toast-progress {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        background-color: #000;
        opacity: 0.4;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
        filter: alpha(opacity=40);
    }

    @media all and (max-width: 240px) {
        #toast-container>div {
            padding: 8px 8px 8px 50px;
            width: 11em;
        }

        #toast-container>div.rtl {
            padding: 8px 50px 8px 8px;
        }

        #toast-container .toast-close-button {
            right: -0.2em;
            top: -0.2em;
        }

        #toast-container .rtl .toast-close-button {
            left: -0.2em;
            right: 0.2em;
        }
    }

    @media all and (min-width: 241px) and (max-width: 480px) {
        #toast-container>div {
            padding: 8px 8px 8px 50px;
            width: 18em;
        }

        #toast-container>div.rtl {
            padding: 8px 50px 8px 8px;
        }

        #toast-container .toast-close-button {
            right: -0.2em;
            top: -0.2em;
        }

        #toast-container .rtl .toast-close-button {
            left: -0.2em;
            right: 0.2em;
        }
    }

    @media all and (min-width: 481px) and (max-width: 768px) {
        #toast-container>div {
            padding: 15px 15px 15px 50px;
            width: 25em;
        }

        #toast-container>div.rtl {
            padding: 15px 50px 15px 15px;
        }
    }
    .error{color: red;}
</style>

<body>

    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('include/sidenav')
            <div class="content">
                <h2 class="text-bold text-1100 mb-5">testimonial</h2>
                <div id="members"
                    data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
                    <div class="row align-items-center justify-content-between g-3 mb-3">
                        <div class="col col-auto">
                            <div class="search-box">
                                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                    <input class="form-control search-input search" type="search"
                                        placeholder="Search testimonial" id="searchvendor" name="searchvendor"
                                        aria-label="Search" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </form>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center"><button class="btn btn-link text-900 me-4 px-0"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#testemonialadded"><span class="fas fa-plus me-2"></span>Add testimonial</button></div>
                        </div>
                    </div>
                    <div
                        class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
                        <div class="table-responsive scrollbar ms-n1 ps-1" id="pay_list">
                           
                        </div>
                        <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                            <div class="col-auto d-flex">
                                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900"
                                    data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!"
                                    data-list-view="*">View all<span class="fas fa-angle-right ms-1"
                                        data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none"
                                    href="#!" data-list-view="less">View Less<span
                                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                            <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                        class="fas fa-chevron-left"></span></button>
                                <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                    data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('deactivate')
        <div class="modal fade" id="testemonialadded" tabindex="-1"
            aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #ebecec;">
                        <h5 class="modal-title" id="verticallyCenteredModalLabel">Add testimonial</h5><button
                            class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                class="fas fa-times fs--1"></span></button>
                    </div>
                    <input type="hidden" name="uri_value" id="uri_value" value="cms/testimonial">
                    <div class="modal-body">
                       
                        <form class="row g-3" id="testimonialaddd" method="POST" enctype="multipart/form-data">
                            @csrf()
                            <div id="addnew">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-2 mt-2">
                                            <input class="form-control" id="title" type="text" name="title[]"
                                                placeholder="Enter Name" />
                                            <label for="title" class="name">Title </label>
                                            <span id="title_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating  mb-2 mt-2">
                                            <input class="form-control" id="Position" type="text" name="Position[]"
                                                placeholder="Enter Email" />
                                            <label for="email" class="email">Position</label>
                                            <span id="subtitle_error" class="error"></span>
                                        </div>
                                    </div>
                               
                                
                                <div class="col-md-12">
                                    <div class="form-floating  mb-3 mt-3">
                                        <input class="form-control" id="image" type="file" name="image[]"
                                            placeholder="Enter Mobile" />
                                        <label for="mobile" class="mobile">Image </label>
                                        <span id="image_error" class="error"></span>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="description" placeholder="Leave a comment here" style="height: 100px"
                                            name="description[]"></textarea>
                                        <label for="address">Description</label>
                                        <span id="description_error" class="error"></span>
                                    </div>
                                </div>
                                <input type="hidden" class="rowcount" value="" name="rowcount">
                                <div class="col-sm-12">
                                    <div class="mt-3" style="float: right;">
                                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm " onclick="add_row()">Add</button>
                                        <div class="eqress"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="modal-footer"style="background-color: #ebecec;">
                            <input class="btn btn-outline-primary me-1 mb-1" type="submit" name="submit"
                                value="Submit">
                            <button class="btn btn-outline-danger me-1 mb-1" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="slidermodel" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ebecec;">
                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Edit testimonial</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" style="color:#818787;">Contact Details</h4>
                    <form class="row g-3" id="testimonial_update" method="post">
                        @csrf()
                        <div id="testimonialedit"></div>
                        <div class="modal-footer"style="background-color: #ebecec;">
                            <button class="btn btn-outline-primary me-1 mb-1 dasjkfhjksdfkjsdhf" type="submit"
                                name="submit" id="submit">Submit</button>
                            <button class="btn btn-outline-danger me-1 mb-1" type="button"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script>
    var uri_value = $('#uri_value').val();
    getpaylist(uri_value);
    </script>
    <script>
        var rowcount = 1;
        $(".rowcount").val(rowcount);
    
        function add_row() {
            rowcount++;
            $(".rowcount").val(rowcount);
            var html = '<div class="row borderset" id="addnew' + rowcount + '" >';
            html += '<div class="mt-2 mb-2" style="border-bottom: 1px solid #e2e5e8;"></div>';;
            html += '<div class="col-md-6"> <div class="form-floating mb-2 mt-2"> <input class="form-control" id="title" type="text" name="title[]" placeholder="Enter Name" /> <label for="name" class="name">Name </label> <span id="title_error" class="error"></span> </div> </div>';
            html += '<div class="col-md-6"> <div class="form-floating  mb-2 mt-2"><input class="form-control" id="Position" type="text" name="Position[]" placeholder="Enter Email" /><label for="email" class="email">Position</label> <span id="subtitle_error" class="error"></span> </div> </div>';
            html += ' <div class="col-md-12"> <div class="form-floating  mb-3 mt-3"> <input class="form-control" id="image" type="file" name="image[]" placeholder="Enter Mobile" /> <label for="mobile" class="mobile">Image </label> <span id="image_error" class="error"></span> </div> </div>';
            html += '<div class="col-12"> <div class="form-floating"> <textarea class="form-control" id="description" placeholder="Leave a comment here" style="height: 100px" name="description[]"></textarea> <label for="address">Description</label>  <span id="description_error" class="error"></span> </div> </div>';
            html += '<div class="col-sm-12"> <div class="form-check form-switch" style="float:right;"><div class="d-flex align-items-start gap-3 mt-4" ><button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="removerow(' + rowcount + ')">Less</button></div></div></div><div class="eqress"></div></div></div>';
            $('#addnew').append(html);
    
        }
    
        function removerow(product) {
            $('#addnew' + product).remove();
        }
    </script>


    @include('include/footer')
    <script src="{{asset('assets/admin/js/testimonial.js')}}"></script>
</body>
<script>
    $(document).ready(function() {
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
    });
</script>

<script>
    $("#searchvendor").keyup(function() {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function(index) {
            if (!index) return;
            $(this).find("td").each(function() {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });
    
</script>


