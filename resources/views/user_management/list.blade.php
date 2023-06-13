@include('include/header')
<style>
    .error {
        color: red;
        font-size: 10px;
    }
</style>
<style type="text/css">
   

    .breadcrumb23 {
        padding: 1em 0.5em 0.5em;
        text-align: center;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .profile-img {
        position: relative;
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        z-index: 3;
        margin: 10px;
        box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.3);
    }

    .background-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 40%;
        object-fit: cover;
        z-index: 0;
    }

    .name {
        font-size: 22px;
        position: absolute;
        right: 20px;
        top: 50%;
    }

    .bio {
        margin: 15px;
        margin-top: 0px;
    }
    .error{
        color: red;
    }
</style>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('include/sidenav')
            <div class="content">
                <div class="row  flex-between-end mb-5 breadcrumb23">
                    <div class="col-auto">
                        <h4 class="mb-2">STAFF</h4>
                    </div>
                    <div class="col-auto">
                        <nav style="--phoenix-breadcrumb-divider: '&gt;&gt;';" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 mb-2">
                                <li class="breadcrumb-item"><a href="#">User Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">STAFF</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between g-3 mb-3">
                    <div class="col col-auto">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search" type="search"
                                    placeholder="Search Staff" id="searchvendor" name="searchvendor"
                                    aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center"><button class="btn btn-link text-900 me-4 px-0">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#staffadded"><span class="fas fa-plus me-2"></span>Add
                                    Staff</button>
                                </div>
                    </div>
                </div>
                <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
                    <div class="table-responsive scrollbar  ms-n1 ps-1 mt-5" id="pay_list">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="uri_value" id="uri_value" value="{{ Request::segment(1) }}">
        @include('deactivate')
        <div class="modal fade" id="staffadded" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modalheader" style="background-color: #ebecec;">
                        <h5 class="modal-title" id="verticallyCenteredModalLabel">Add User</h5><button class="btn p-1" class="fas fa-times fs--1"></span></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center" style="color:#818787;">Contact Details</h4>
                        <form method="POST" id="addstaff">
                            @csrf()
                            {{-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Account add as a
                                            <span id="enaledisabletext">enable</span> account.</label>
                                        <input type="hidden" name="enabledisablevalue" id="enabledisablevalue"
                                            value="0">
                                    </div>
                                </div>
                                <div class="error" id="staff_name_error"></div>
                            </div> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" name="staff_name" id="staff_name"
                                                placeholder="Enter name">
                                            <label for="teammembersName" class="form-label">Name</label>
                                        </div>
                                        <div class="error" id="staff_name_error"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-floating mb-2 mt-2" style="display: flex;">
                                            <input type="text" class="form-control" name="email" id="email" aria-label="Enter Username" style="width: 50%;">
                                            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 50%;">@gmail.com</span>
                                            <label for="teammembersName" class="form-label">Username</label>
                                        </div>
                                        <div class="error" id="email_error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-floating mb-2 mt-2">

                                            <input type="password" class="form-control" name="staff_password"
                                                id="staff_password" placeholder="Enter Password">
                                            <label for="teammembersName" class="form-label">Password</label>
                                        </div>

                                        <div class="error" id="staff_password_error"></div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" name="staff_mob"
                                                id="staff_mob" placeholder="Enter Mobile No">
                                            <label for="teammembersName" class="form-label">Mobile</label>
                                        </div>
                                    </div>
                                    <div class="error" id="staff_mob_error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" name="staff_role"
                                                id="staff_role" placeholder="Enter Role">
                                            <label for="designation" class="form-label">Role</label>
                                        </div>
                                    </div>
                                    <div class="error" id="staff_role_error"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <div class="form-floating mb-2 mt-2">
                                            <input class="form-control" type="file" id="staff_image" name="staff_image">
                                            <label for="formFile" class="form-label">Profile Images</label>
                                        </div>
                                    </div>
                                    <div class="error" id="staff_image_error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="permission" class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="tshadow mb25 bozero">
                                            <h4 class="pagetitleh2">Select Module &amp; Permissions </h4>
                                            <div class="around10">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4"><b>Module</b></div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center"><b>Read</b>
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center"><b>Write</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        User Management <input type="hidden" name="sidebar_name[]"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read1" id="read_1"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write1" id="write_1"
                                                            value="1">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Content Management <input type="hidden" name="sidebar_name[]"
                                                            value="2">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read2" id="read_2"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write2" id="write_2"
                                                            value="1">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Product Management <input type="hidden" name="sidebar_name[]"
                                                            value="3">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read3" id="read_3"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write3" id="write_3"
                                                            value="1">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Order Management <input type="hidden" name="sidebar_name[]"
                                                            value="4">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read4" id="read_4"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write4" id="write_4"
                                                            value="1">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Offer <input type="hidden" name="sidebar_name[]"
                                                            value="5">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read5" id="read_5"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write5" id="write_5"
                                                            value="1">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Coupon <input type="hidden" name="sidebar_name[]"
                                                            value="6">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read6" id="read_6"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write6"
                                                            id="write_6"value="1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Seo &amp; Analytics <input type="hidden"
                                                            name="sidebar_name[]" value="7">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read7" id="read_7"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write7" id="write_7"
                                                            value="1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Inventory <input type="hidden" name="sidebar_name[]"
                                                            value="9">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read9" id="read_9"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write9" id="write_9"
                                                            value="1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-sx-4">
                                                        Settings <input type="hidden" name="sidebar_name[]"
                                                            value="10">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_add">
                                                        <input type="checkbox" name="read10" id="read_10"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-4 col-sm-2 col-sx-2 text-center can_view">
                                                        <input type="checkbox" name="write10" id="write_10"
                                                            value="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="modal-footer"style="background-color: #ebecec;">
                                    <input class="btn btn-outline-primary me-1 mb-1" type="submit" name="submit"
                                        value="Add Staff">
                                    <button class="btn btn-outline-danger me-1 mb-1" type="button"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editstaff" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modalheader" style="background-color: #ebecec;">
                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Edit Staff</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="update_staff" method="post">
                        @csrf()
                        <div id="staff_edit"></div>
                        <div class="modal-footer"style="background-color: #ebecec;">
                            <button class="btn btn-outline-primary me-1 mb-1 dasjkfhjksdfkjsdhf" type="submit" name="submit" id="submit">Submit</button>
                            <button class="btn btn-outline-danger me-1 mb-1" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>

    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
        aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header align-items-start border-bottom flex-column">
            <div class="pt-1 w-100 d-flex justify-content-between align-items-start">
                <div>
                    {{-- <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-0"></span>Profile</h5> --}}
                    <h5 class="mb-2 me-2 lh-sm">Profile</h5>
                    {{-- <p class="mb-0 fs--1">Explore different styles according to your preferences</p> --}}
                </div>
                <button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
                    <span class="fas fa-times fs-0"> </span>
                </button>
            </div>
        </div>
        <div class="container">
            <div
                style="background-image: url('https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_960_720.jpg')">
                <div class="avatar avatar-5xl text-center">
                    <img class="rounded-circle bg-white img-thumbnail ms-3  mt-10 shadow-sm"
                        src="../../assets/img/team/9.png" width="150" height="150" alt="">
                </div>

                <div class="d-flex ms-2">
                    <div class="dropdown">
                        <a href="#" class=" font-size-16 text-muted" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item">Active</a>
                            <a class="dropdown-item">Edit</a>
                            <a class="dropdown-item">Deactivate</a>
                            <a class="dropdown-item">Remove</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body mt-8 py-1 px-4">
            <h4 class="mb-0 card-title  ">Title goes here</h4>
            <p class="">IT</p>
        </div>
        <div class="offcanvas-body scrollbar px-card pt-2" id="themeController">
            <div class="setting-panel-item">
                <h5 class="setting-panel-item-title">Personal Details</h5>
                <div class="row gx-2">
                    <div class="p-3">

                        <div class="mb-2">
                            <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Number</p>
                            <h6>9999999009</h6>
                        </div>

                        <div class="mb-2">
                            <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Email</p>
                            <h6>navneet@firstwe.com</h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="setting-panel-item">
                <h5 class="setting-panel-item-title">Role &amp; Permissions</h5>
                <div class="row gx-2">
                    <div class="p-3 border-top">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Read</th>
                                    <th>Write</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        User Management </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Content Management </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Product Management </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Order Management </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Offer </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Coupon </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Seo &amp; Analytics </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-muted mb-0">

                                        Settings </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <input type="checkbox" class="text-muted mb-0" checked="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('include/footer')
</body>
<script src="{{ asset('assets/admin/js/staff.js') }}"></script>
<script>
    var uri_value = $('#uri_value').val();
    getpaylist(uri_value);
</script>
