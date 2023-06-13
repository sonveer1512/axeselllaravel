@include('include/header')
<style>
    .error {
        color: red;
        font-size: 10px;
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

    .card-img-top {
        width: 60%;
        border-radius: 50%;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .card {
        padding: 1.5em 0.5em 0.5em;
        text-align: center;
        border-radius: 2em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-weight: bold;
        font-size: 1.5em;
    }

    .btn-primary {
        border-radius: 2em;
        padding: 0.5em 1.5em;
    }
</style>
<style>
    
canvas {
    width: 60%;
    border-radius: 50%;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    height: 180px;
}

input {
  font-family: verdana;
  font-size: 12pt;
}
#setlogo{
    width: 60%;
    border-radius: 50%;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    height: 180px;
   
}
</style>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('include/sidenav')
            <div class="content ">
                {{-- <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
                        <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
                        <li class="breadcrumb-item active">Default</li>
                    </ol>
                </nav> --}}
                
                <div class="row g-3 flex-between-end mb-5">
                    <div class="col-auto">
                        <h2 class="mb-2">General Settings</h2>  
                    </div>
                   <div class="col-auto">
                        <nav style="--phoenix-breadcrumb-divider: '&gt;&gt;';" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                            </ol>
                        </nav>
                   </div>
                </div>
                <div class="card" style="padding: 35px;">
                    <form class="mb-9" method="post" id="generalupdate">
                        @csrf()
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i> Personal Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                       
                        <div class="row g-5 ">
                            <div class="col-md-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="title" type="text" name="title"
                                                placeholder="Enter GST" value="{{$details->c_name ?? ''}}"/>
                                            <label for="loginemail"> Title</label>
                                            <span id="title_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="mobile" type="text" name="mobile"
                                                placeholder="Enter GST" value="{{$details->mobile ?? ''}}"/>
                                            <label for="loginemail"> Phone Number</label>
                                            <span id="mobile_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Enter GST" value="{{$details->email ?? ''}}"/>
                                            <label for="loginemail">Email Address</label>
                                            <span id="email_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="website" type="text" name="website"
                                                placeholder="Enter GST" value="{{$details->website ?? ''}}"/>
                                            <label for="loginemail">Website</label>
                                            <span id="website_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating  mb-4 mt-4">
                                            <textarea class="form-control" id="address" placeholder="Leave a comment here" style="height: 100px"
                                                name="address">{{$details->c_address ?? ''}}</textarea>
                                            <label for="companyaddress">Company Address</label>
                                            <span id="address_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="city" type="text" name="city"
                                                placeholder="Enter GST" value="{{$details->city ?? ''}}"/>
                                            <label for="loginemail">City</label>
                                            <span id="city_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="state" type="text" name="state"
                                                placeholder="Enter GST" value="{{$details->state ?? ''}}"/>
                                            <label for="loginemail">state</label>
                                            <span id="state_error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating  mb-4 mt-4">
                                            <input class="form-control" id="country" type="text" name="country"
                                                placeholder="Enter GST" value="{{$details->country ?? ''}}" />
                                            <label for="loginemail">country</label>
                                            <span id="country_error" class="error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:auto;">
                                <div class="col-lg-4 ">
                                    <div class="col-12 col-xl-12 mb-3">
                                        <div class="card" >
                                            <h5 class="card-title mb-2">Logo</h5>
                                            @if(!empty($details->vendor_logo))
                                                
                                                <img src="{{ url('uploads/logo/'.$details->vendor_logo)}}" alt="" id="setlogo">  
                                            @else
                                                <canvas id= "canv1"  ></canvas>
                                            @endif
                                            
                                            
                                           
                                            <div class="card-body">
                                                <input type="file" multiple="false" class="form-control" name="logo" accept="image/*" id=finput onchange="upload()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="col-12 col-xl-12 mb-3">
                                        <div class="card" >
                                            <h5 class="card-title mb-2">Favicon</h5>
                                            @if(!empty($details->favicon))
                                                
                                                <img src="{{ url('uploads/favicon/'.$details->favicon)}}" alt="" id="setlogo">  
                                            @else
                                                <canvas id= "canv1"  ></canvas>
                                            @endif
                                            
                                            <div class="card-body">
                                                <input type="file" multiple="false" class="form-control" name="favicon" accept="image/*" id=finput2 onchange="uploadfavicon()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card " style="padding: 22px;">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="flex-grow-1">
                                                <h5 class="card-title mb-0">Portfolio</h5>
                                            </div>
                                        </div>
                                        <div class="mb-2 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-4">
                                                <span class="avatar-title rounded-circle fs-16">
                                                    <img src="https://img.icons8.com/color/48/null/facebook-new.png"/>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="fb_link" id="fb_link" placeholder="Username" value="{{$details->fb_link ?? ''}}">
                                        </div>
                                        <div class="mb-2 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-4">
                                                <span class="avatar-title rounded-circle fs-16">
                                                    <img src="https://img.icons8.com/color/48/null/twitter-circled--v1.png"/>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="twitter_link"
                                                name="twitter_link" placeholder="www.example.com" value="{{$details->twitter_link ?? ''}}">
                                        </div>
                                        <div class="mb-2 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-4">
                                                <span class="avatar-title rounded-circle fs-16 ">
                                                    <img src="https://img.icons8.com/3d-fluency/94/null/instagram-new.png" width="48"/>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="insta_link"
                                                name="insta_link" placeholder="Username" value="{{$details->insta_link ?? ''}}">
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="avatar-xs d-block flex-shrink-0 me-4">
                                                <span class="avatar-title rounded-circle fs-16 ">
                                                    <img src="https://img.icons8.com/color/48/null/youtube-play.png"/>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control " id="youtube_link"
                                                name="youtube_link" placeholder="Username" value="{{$details->youtube_link ?? ''}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ getuserdetail('id') }}">
                        <button class="btn btn-outline-success me-1 mb-1 mt-4" type="submit" name="submit" style="width: 350px;" >Update</button>
    
                    </form>
                </div>
               
            </div>
    </main>



    @include('include/footer')
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
    $(document).on('submit', '#generalupdate', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        if (error == false) {
            $.ajax({
                url: base_url + 'setting/update',
                type: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".submitbtn").css('display', 'none');
                },
                success: function(result) {
                    if (result.code == 200) {
                        showsuccess(result.message);
                        $("#generalupdate")[0].reset();
                       
                    } else if (result.code == 201) {
                        swal(result.message, {
                            icon: "error",
                        });
                    } else if (result.code == 401) {
                        $.each(result.message, function(key, value) {
                            $("#" + key + "_error").html(value);
                        });
                    }
                }

            })
        }
    })
</script>
<script>

    function upload() {
        var imgcanvas = document.getElementById("canv1");
        var fileinput = document.getElementById("finput");
        var image = new SimpleImage(fileinput);
        image.drawTo(imgcanvas);
    }

    function uploadfavicon() {
        var imgcanvas = document.getElementById("canv2");
        var fileinput = document.getElementById("finput2");
        var image = new SimpleImage(fileinput);
        image.drawTo(imgcanvas);
    }
</script>
<script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
