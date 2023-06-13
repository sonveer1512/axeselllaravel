<div class="row g-3" >
    
    <div class="col-md-6">
        <div class="form-floating mb-2 mt-2">
            <input class="form-control brand_name" id="brand_name" type="text" name="brand_name"
                placeholder="Enter Name" value="{{$brand->name}}"/>
            <label for="name">Brand Name </label>
            <span id="brand_name_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control brand_slug" id="brand_slug" type="text" name="brand_slug" placeholder="Enter Email"  value="{{$brand->slug}}"/>
            <label for="email">Slug</label>
            <span id="brand_slug_error" class="error"></span>
        </div>
        <script>
            convert_To_url();
        </script>
    </div>
    <div class="col-md-12">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="file" name="brand_image" id="brand_image" placeholder="Enter Mobile" value="{{$brand->icon}}"/>
            <label for="imagelogo">Brand Icon</label>
            <span id="brand_image_error" class="error"></span>
        </div>
    </div>
    <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">SEO Tags</h4>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="brand_pagetitle" id="brand_pagetitle"
                placeholder="Enter Page Title"  value="{{$brand->metatitle}}"/>
            <label for="imagelogo">Page Title</label>
            <span id="brand_pagetitle_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="brand_metakey" id="brand_metakey"
                placeholder="Enter Mobile"  value="{{$brand->metakey}}"/>
            <label for="imagelogo">Meta Key</label>
            <span id="brand_metakey_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="brand_meta_description" placeholder="Leave a comment here" style="height: 100px"
                name="brand_meta_description">{{$brand->description}}</textarea>
            <label for="companyaddress">Meta Description</label>
            <span id="brand_meta_description_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="brand_metatags" placeholder="Leave a comment here" style="height: 100px"
                name="brand_metatags">{{$brand->metatags}}</textarea>
            <label for="metatags">Meta Tags</label>
            <span id="brand_metatags_error" class="error"></span>
        </div>
    </div>
    <input class="form-control" type="hidden" name="id" id="id" value="{{$brand->id}}"/>
    
</div>