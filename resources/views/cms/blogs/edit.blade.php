<div class="row row g-3">
        <div class="col-md-6">
            <div class="form-floating mb-2 mt-2">
                <input class="form-control brand_name" id="title" type="text" name="title" value="{{$blogedit->heading}}">
                <label for="name">Title</label><span id="title_error" class="error"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating  mb-2 mt-2">
                <input class="form-control brand_slug" id="slug" type="text" name="slug"
                    placeholder="Enter Email" value="{{$blogedit->slug}}"/>
                <label for="email">Slug</label>
                <span id="slug_error" class="error"></span>
            </div>
           <script>convert_To_url();</script>
        </div>
        <div class="col-md-12">
            <div class="form-floating  mb-2 mt-2">
                <input class="form-control brand_slug" type="file" name="image" id="image"
                    placeholder="Enter Mobile" />
                <label for="blog_image">Blog Image</label>
                <span id="image_error" class="error"></span>
            </div>
        </div>
        <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">SEO Tags</h4>
        <div class="col-md-6">
            <div class="form-floating  mb-2 mt-2">
                <input class="form-control" type="text" name="pagetitle" id="pagetitle"
                    placeholder="Enter Page Title" value="{{$blogedit->page_title}}"/>
                <label for="imagelogo">Page Title</label>
                <span id="pagetitle_error" class="error"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating  mb-2 mt-2">
                <input class="form-control" type="text" name="metakey" id="metakey"
                    placeholder="Enter Mobile" value="{{$blogedit->meta_key}}"/>
                <label for="imagelogo">Meta Key</label>
                <span id="metakey_error" class="error"></span>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" id="meta_description" placeholder="Leave a comment here" style="height: 100px"
                    name="meta_description">{{$blogedit->meta_desc}}</textarea>
                <label for="companyaddress">Meta Description</label>
                <span id="meta_description_error" class="error"></span>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" id="metatags" placeholder="Leave a comment here" style="height: 100px" name="metatags">{{$blogedit->meta_tags}}</textarea>
                <label for="metatags">Meta Tags</label>
                <span id="metatags_error" class="error"></span>
            </div>
        </div>
        <input class="form-control" type="hidden" name="id" id="id" value="{{$blogedit->id}}">
</div>