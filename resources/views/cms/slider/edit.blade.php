<div class="row g-3" >
    @csrf()
    <div class="col-md-6">
        <div class="form-floating mb-2 mt-2">
            <input class="form-control" id="title" type="text" name="title"
                placeholder="Enter Name" value="{{$banner->title}}"/>
            <label for="name" class="name">Title </label>
            <span id="title_error" class="error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="subtitle" type="text" name="subtitle"
                placeholder="Enter Email" value="{{$banner->subtitle}}"/>
            <label for="email" class="email">Sub Title</label>
            <span id="subtitle_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="image" type="file" name="image"
                placeholder="Enter Mobile" />
            <label for="mobile" class="mobile">Image </label>
            <span id="image_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="url" type="text" name="url"
                placeholder="Enter Mobile" value="{{$banner->url}}"/>
            <label for="mobile" class="mobile">Url </label>
            <span id="url_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="description" placeholder="Leave a comment here" style="height: 100px"
                name="description">{{$banner->description}}</textarea>
            <label for="address">Description</label>
            <span id="description_error" class="error"></span>
        </div>
    </div>
    <input class="form-control" id="id" type="hidden" name="id" value="{{$banner->id}}"/>
   
</div>