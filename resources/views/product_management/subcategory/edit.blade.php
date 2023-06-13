<div class="row g-3" >
    <div class="col-md-4">
        <div class="form-floating mb-2 mt-2">
            
            <select class="form-select" aria-label="Default select example" id="cate_id" name="cate_id">
                @if(!empty($cat_name))
                @foreach($cat_name as $value)
                <option value="{{$value->id}}" @if($value->id == $cat_id) {{'selected'}} @endif>{{$value->title}}</option>
                @endforeach
                @endif
              </select>
              <label for="email"> Category</label>
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control name" id="sub_category" type="text" name="sub_category"
                placeholder="Enter Email" value="{{$subcat->title}}"/>
            <label for="email">Sub Category</label>
            <span id="sub_category_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control slug" id="slug" type="text" name="slug"
                placeholder="Enter Email" value="{{$subcat->slug}}"/>
            <label for="email">Slug</label>
            <span id="slug_error" class="error"></span>
        </div>
        <script>
            titleconvertTourl();
        </script>
    </div>
   
    <div class="col-md-12">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="file" name="cat_image" id="cat_image"
                placeholder="Enter Mobile" />
            <label for="imagelogo">Category Icon</label>
            <span id="cat_image_error" class="error"></span>
        </div>
    </div>
    <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">SEO Tags</h4>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="pagetitle" id="pagetitle"
                placeholder="Enter Page Title" value="{{$subcat->metatitle}}"/>
            <label for="imagelogo">Page Title</label>
            <span id="pagetitle_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="metakey" id="metakey"
                placeholder="Enter Mobile" value="{{$subcat->metakey}}"/>
            <label for="imagelogo">Meta Key</label>
            <span id="metakey_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="meta_description" placeholder="Leave a comment here" style="height: 100px"
                name="meta_description">{{$subcat->description}}</textarea>
            <label for="companyaddress">Meta Description</label>
            <span id="meta_description_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="metatags" placeholder="Leave a comment here" style="height: 100px"
                name="metatags">{{$subcat->metatags}}</textarea>
            <label for="metatags">Meta Tags</label>
            <span id="metatags_error" class="error"></span>
        </div>
    </div>
    
    <input class="form-control" type="hidden" name="id" id="id" value="{{ $subcat->id }}" />
    
</div>


