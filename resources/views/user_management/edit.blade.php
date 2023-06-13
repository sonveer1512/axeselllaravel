<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <div class="form-floating mb-2 mt-2">
                <input type="text" class="form-control" name="staff_name" id="staff_name" placeholder="Enter name" value="{{$staff->name ?? ''}}">
                <label for="teammembersName" class="form-label">Name</label>
            </div>
            <div class="error" id="staff_name_error"></div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <div class="form-floating mb-2 mt-2" style="display: flex;">
                <input type="text" class="form-control" name="email" id="email" aria-label="Enter Username" style="width: 50%;" value="{{$staff->email ?? ''}}">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width: 50%;">@gmail.com</span>
                <label for="teammembersName" class="form-label">Username</label>
            </div>
            <div class="error" id="email_error"></div>
        </div>
    </div>
</div>
<div class="row">
    {{-- <div class="col-lg-6">
        <div class="mb-3">
            <div class="form-floating mb-2 mt-2">
                <input type="password" class="form-control" name="staff_password"
                    id="staff_password" placeholder="Enter Password">
                <label for="teammembersName" class="form-label">Password</label>
            </div>

            <div class="error" id="staff_password_error"></div>
        </div>

    </div> --}}
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="form-floating mb-2 mt-2">
                <input type="text" class="form-control" name="staff_mob" id="staff_mob" placeholder="Enter Mobile No" value="{{$staff->mobile ?? ''}}">
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
                    id="staff_role" placeholder="Enter Role" value="{{$staff->role ?? ''}}">
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