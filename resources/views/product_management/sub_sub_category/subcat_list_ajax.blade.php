<div class="task-list">
    <div class="card shadow-none h-500">
        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
            <div class="flex-grow-1">
                <h4 class="card-title mb-0">{{$sub_cat_name->title}}<span class="font-size-14 text-muted">({{$count}})</span></h4>
            </div>
        </div>
            <div class="text-center p-3">
                <a href="javascript: void(0);" class="btn btn-primary btn-soft w-100" type="button" data-bs-toggle="modal" data-bs-target="#addsubsubcategory"><span class="fas fa-plus me-2"></span>Add Sub Sub-Category</a>
            </div>
            <div class="row align-items-center justify-content-between g-3 mb-3">
                <div class="col  ">
                    <div class="search-box" style="margin: auto;">
                        <form class="position-relative w-100" data-bs-toggle="search"
                            data-bs-display="static">
                            <input class="form-control search-input search" type="search" placeholder="Search sub category" id="searchcategory" name="searchcategory" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                </div>
            </div>
            <div data-simplebar="init" class="tasklist-content p-3">
                <div class="simplebar-wrapper" style="margin: -16px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
                            <div class="simplebar-content-wrapper"
                                style="height: auto; overflow: hidden scroll; padding-right: 20px; padding-bottom: 0px;">
                                <div class="simplebar-content" style="padding: 16px;" >
                                    <div id="completed-task" class="tasks">
                                        @if(!empty($subsubcategory))
                                        @foreach($subsubcategory as $key => $value ) 
                                        <div class="card task-box bg-border_{{$value->id}}" style="@if($value->flag == 0) border: 1px solid #cec4c4; @elseif($value->flag == 1) border: 1px solid red; @else border:1px solid #cec4c4 @endif">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center" onclick="subsubcat({{$value->flag}})">
                                                            
                                                            <img src="{{ asset('uploads/subsubcatrgory/'. $value->sub_cat_icon)}}" alt="" height="46" width="46" />
                                                            <div class="ms-3">
                                                                <h4 class="mb-0">{{$value->title}}</h4>
                                                                <p class="text-800 fs--1 mb-0">{{$value->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="dropdown">
                                                            <a href="#" class=" font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @if($value->flag == 1)
                                                                <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','sub_sub_catrgory','activate')" style="color:green;">Active</a>
                                                                    @elseif($value->flag == 0)
                                                                    <a class="dropdown-item" data-bs-target="#sub_sub_Categorymodel" data-bs-toggle="modal" onclick="sub_subcategory_edit('{{ $value->id }}','{{$sub_cat_id}}',{{$value->category_id}})" style="color:blue;">Edit</a>
                                                                    <a class="dropdown-item"  data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','sub_sub_catrgory','deactivate')" style="color:red;">Inactive</a>
                                                                   
                                                                    <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','sub_sub_catrgory','delete')" style="color:red;">Remove</a>
                                                                 @endif   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <p class="text-800 fs--1 mb-0">50 products</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1700px;">
                    </div>
                </div>
                <div class="simplebar-track simplebar-horizontal"style="visibility: hidden;">
                    <div class="simplebar-scrollbar"style="transform: translate3d(0px, 0px, 0px); display: none;">
                    </div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="" style="height: 475px; transform: translate3d(0px, 74px, 0px); display: block;">
                    </div>
                </div>
            </div>
    </div>    
</div>
<div class="modal fade" id="addsubsubcategory" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ebecec;">
                <h5 class="modal-title" id="verticallyCenteredModalLabel">Add Sub Sub Category</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                {{-- <h4 class="text-center" style="color:#818787;">Contact Details</h4> --}}
                <form class="row g-3" id="subsubcategoryadd" method="POST">
                    @csrf()
                    <div class="col-md-6">
                        <div class="form-floating mb-2 mt-2">
                            <input class="form-control" id="sub_category_id" type="hidden" name="sub_category_id" value="{{$sub_cat_id}}"/>
                            <input class="form-control"  placeholder="Enter Name" value="{{$sub_cat_name->title}}" readonly/>
                            <label for="name">Sub Category Name </label><span id="cate_name_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-2 mt-2">
                            <input class="form-control" id="category_id" type="hidden" name="category_id" value="{{$cat_id}}"/>
                            <input class="form-control"  placeholder="Enter Name" value="{{$cat_name->title}}" readonly/>
                            <label for="name">Category Name </label><span id="cate_name_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  mb-2 mt-2">
                            <input class="form-control subsubcategory" id="subsubcategory" type="text" name="subsubcategory"
                                placeholder="Enter" >
                            <label for="email">Sub Category</label>
                            <span id="subsubcategory_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  mb-2 mt-2">
                            <input class="form-control subslug" id="subslug" type="text" name="subslug"
                                placeholder="Enter Email" />
                            <label for="email">Slug</label>
                            <span id="subslug_error" class="error"></span>
                        </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating  mb-2 mt-2">
                            <input class="form-control" type="file" name="subcat_image" id="subcat_image"
                                placeholder="Enter Mobile" />
                            <label for="imagelogo">Category Icon</label>
                            <span id="subcat_image_error" class="error"></span>
                        </div>
                    </div>
                    <h4 class="text-center" style="color:#818787; margin-bottom: -8px;">SEO Tags</h4>
                    <div class="col-md-6">
                        <div class="form-floating  mb-2 mt-2">
                            <input class="form-control" type="text" name="subpagetitle" id="subpagetitle"
                                placeholder="Enter Page Title" />
                            <label for="imagelogo">Page Title</label>
                            <span id="subpagetitle_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  mb-2 mt-2">
                            <input class="form-control" type="text" name="submetakey" id="submetakey"
                                placeholder="Enter Mobile" />
                            <label for="imagelogo">Meta Key</label>
                            <span id="submetakey_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="submeta_description" placeholder="Leave a comment here" style="height: 100px"
                                name="submeta_description"></textarea>
                            <label for="companyaddress">Meta Description</label>
                            <span id="submeta_description_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="submetatags" placeholder="Leave a comment here" style="height: 100px"
                                name="submetatags"></textarea>
                            <label for="metatags">Meta Tags</label>
                            <span id="submetatags_error" class="error"></span>
                        </div>
                    </div>
                    <div class="modal-footer"style="background-color: #ebecec;">
                        <input class="btn btn-outline-primary me-1 mb-1 submitbtn" type="submit" name="submit"
                            value="Submit">
                        <button class="btn btn-outline-danger me-1 mb-1" type="button"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sub_sub_Categorymodel" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ebecec;">
                <h5 class="modal-title" id="verticallyCenteredModalLabel">Edit Sub Category</h5><button class="btn p-1"
                    type="button" data-bs-dismiss="modal" aria-label="Close"><span
                        class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center" style="color:#818787;">Contact Details</h4>
                <form class="row g-3" id="sub_sub_Category_edit" method="post">
                    @csrf()
                    <div id="subsubCategoryedit"></div>
                    <div class="modal-footer"style="background-color: #ebecec;">
                        <button class="btn btn-outline-primary me-1 mb-1 dasjkfhjksdfkjsdhf" type="submit"
                            name="submit" id="submit">Submit</button>
                        <button class="btn btn-outline-danger me-1 mb-1" type="button"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/admin/js/subsubcategory.js')}}"></script>
<script>
    
    $(".subsubcategory").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, '-')           
        Text = Text.replace(/[^\w\-]+/g, '')       
        Text = Text.replace(/\-\-+/g, '-')         
        Text = Text.replace(/^-+/, '')             
        Text = Text.replace(/-+$/, ''); 
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-'); 
        $(".subslug").val(Text);  
});
</script>