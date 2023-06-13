
    <div class="task-list">
        <div class="card shadow-none h-500">
            <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                <div class="flex-grow-1">
                    <h4 class="card-title mb-0">Category <span class="font-size-14 text-muted">({{$count}})</span></h4>
                </div> 
            </div>
            <div>
                <div class="text-center p-3">
                    <a href="javascript: void(0);" class="btn btn-primary btn-soft w-100" type="button" data-bs-toggle="modal" data-bs-target="#verticallyCentered"><span class="fas fa-plus me-2"></span>Add  Category</a>
                </div>
                <div class="row align-items-center justify-content-between g-3 mb-3">
                    <div class="col  ">
                        <div class="search-box" style="margin: auto;">
                            <form class="position-relative w-100 " data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search  " type="search" placeholder="Search category" id="searchcategory" name="searchcategory" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>   
                </div>
                <div data-simplebar="init" class="tasklist-content p-3"><div class="simplebar-wrapper" style="margin: -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -20px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow:none; padding-right: 20px; padding-bottom: 0px;"><div class="simplebar-content" style="padding: 16px;">
                    <div id="completed-task" class="tasks">
                        @if(!empty($category))
                        @foreach($category as $key => $value)
                        <div class="categorycard card task-box  bg-border_{{$value->id}} bg-background_{{$value->id}} card_body_cat"  style="@if($value->flag == 0) border: 1px solid #cec4c4; @elseif($value->flag == 1) border: 1px solid red; @else border:1px solid #cec4c4 @endif">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                        <div class="flex-grow-1" onclick="opensubcat({{$value->id}},{{$value->flag}})" >
                                            <div class="d-flex align-items-center " style="cursor: pointer;">
                                                <img src="{{ url('uploads/catrgory/'.$value->cat_icon)}}" alt="" height="46" width="46" />
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
                                                    <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','category','activate')" style="color:green;cursor: pointer;">Active</a>
                                                    @elseif($value->flag == 0)
                                                    <a class="dropdown-item" data-bs-target="#Categorymodel" data-bs-toggle="modal" onclick="category_edit('{{ $value->id }}')" style="color:blue;cursor: pointer;">Edit</a>
                                                    <a class="dropdown-item"  data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','category','deactivate')" style="color:red;cursor: pointer;">Deactivate</a>
                                                    <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $value->id }}','category','delete')" style="color:red;cursor: pointer;">Remove</a>
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
                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 1700px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="" style="height: 475px; transform: translate3d(0px, 74px, 0px); display: block;"></div></div></div>
            </div>
        </div>
    </div>
<script>
    $("#searchcategory").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".categorycard").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>