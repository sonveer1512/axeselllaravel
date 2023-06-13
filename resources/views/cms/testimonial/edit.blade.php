<div class="row g-3" >
   
    <div class="col-md-6">
        <div class="form-floating mb-2 mt-2">
            <input class="form-control" id="title" type="text" name="title"
                placeholder="Enter Name" value="{{$testimonial->name}}"/>
            <label for="name" class="name">Name </label>
            <span id="title_error" class="error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="Position" type="text" name="Position"
                placeholder="Enter Email" value="{{$testimonial->designation}}"/>
            <label for="email" class="email">Position</label>
            <span id="subtitle_error" class="error"></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-floating  mb-2 mt-2">
            <input class="form-control" id="image" type="file" name="image"
                placeholder="Enter Mobile" />
            <label for="mobile" class="mobile">Image </label>
            <span id="image_error" class="error"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" id="description" placeholder="Leave a comment here" style="height: 100px"
                name="description">{{$testimonial->description}}</textarea>
            <label for="address">Description</label>
            <span id="description_error" class="error"></span>
        </div>
    </div>
    <input class="form-control" id="id" type="hidden" name="id" value="{{$testimonial->id}}"/>
</div>