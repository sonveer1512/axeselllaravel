<div class="row g-3" >
    
    <div class="col-md-6">
        <div class="form-floating mb-2 mt-2">
            <input class="form-control name" id="name" type="text" name="name"
                placeholder="Enter Name" value="{{$category->title}}" />
            <label for="name">Name </label>
            <script>
                titleconvertTourl();
                
            </script>
            <span id="catname_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control slug" id="slug" type="text" name="slug" placeholder="Enter Email" value="{{$category->slug}}"/>
            <label for="email">Slug</label>
            <span id="slug_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="file" name="cat_image" id="cat_image" placeholder="Enter Mobile" value="{{$category->cat_image}}"/>
            <label for="imagelogo">Category Icon</label>
            <span id="cat_image_error" class="error"></span>
        </div>
    </div>
    <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">SEO Tags</h4>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="pagetitle" id="pagetitle"
                placeholder="Enter Page Title" value="{{$category->metatitle}}"/>
            <label for="imagelogo">Page Title</label>
            <span id="pagetitle_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" type="text" name="metakey" id="metakey"
                placeholder="Enter Mobile" value="{{$category->metakey}}"/>
            <label for="imagelogo">Meta Key</label>
            <span id="metakey_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="meta_description" placeholder="Leave a comment here" style="height: 100px"
                name="meta_description">{{$category->description}}</textarea>
            <label for="companyaddress">Meta Description</label>
            <span id="meta_description_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="metatags" placeholder="Leave a comment here" style="height: 100px"
                name="metatags">{{$category->metatags}}</textarea>
            <label for="metatags">Meta Tags</label>
            <span id="metatags_error" class="error"></span>
        </div>
    </div>
    <input class="form-control" type="hidden" name="id" id="id"  value="{{$category->id}}"/>
   
</div>
<script>
    
    $("#name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, '-')           
        Text = Text.replace(/[^\w\-]+/g, '')       
        Text = Text.replace(/\-\-+/g, '-')         
        Text = Text.replace(/^-+/, '')             
        Text = Text.replace(/-+$/, ''); 
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-'); 
       
        $("#slug").val(Text);  
    });

</script>