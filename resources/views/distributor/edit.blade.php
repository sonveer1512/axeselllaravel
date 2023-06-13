<div class="row g-3">
    <div class="col-md-4">
        <div class="form-floating mb-2 mt-2">
            <input class="form-control" id="name" type="text" name="name"  placeholder="Enter Name" value="{{$distributor->name}}"/>
            <label for="name">Name </label>
            <span id="name_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="email" type="Email" name="email"  placeholder="Enter Email" value="{{$distributor->email}}"/>
            <label for="email">Email Address</label>
            <span id="email_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="mobile" type="text" name="mobile"  placeholder="Enter Mobile" value="{{$distributor->mobile_no}}"/>
            <label for="mobile">Mobile </label>
            <span id="mobile_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="address" placeholder="Leave a comment here" style="height: 100px" name="address" >{{$distributor->contact_address}}</textarea>
            <label for="address">Address</label>
            <span id="address_error" class="error"></span>
        </div>
    </div>
    <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">Company Details</h4>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control"  type="file" name="logo" id="logo" placeholder="Enter Mobile" />
             <label for="logo">Logo </label>
             <span id="logo_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control"  type="text" name="companyname" id="companyname" placeholder="Enter Mobile" value="{{$distributor->comp_name}}" />
            <label for="companyname">Company Name </label>
            <span id="companyname_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="cgst" type="text" name="cgst"   placeholder="Enter GST" value="{{$distributor->comp_gst}}" />
            <label for="cgst">Company GST</label>
            <span id="cgst_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="companyaddress" placeholder="Leave a comment here" style="height: 100px" name="companyaddress" >{{$distributor->comp_address}}</textarea>
            <label for="companyaddress">Company Address</label>
            <span id="companyaddress_error" class="error"></span>
        </div>
    </div>
    <input type="hidden" class="form-control" id="id" name="id" value="{{$distributor->id}}">
    {{-- <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">Login Details</h4>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="loginemail" type="email" name="loginemail"   placeholder="Enter GST" />
            <label for="loginemail">Email Address</label>
            <span id="loginemail_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="password" type="password" name="loginpassword"   placeholder="Enter GST" />
            <label for="loginemail">Password</label>
            <span id="password_error" class="error"></span>
        </div>
    </div> --}}
</div>