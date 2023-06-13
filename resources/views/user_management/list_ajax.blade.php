

<div class="row">
    @if(!@empty($user))
    @foreach ($user as $item)
    <div class="col-md-4">
        <div class=" card rounded-3 mb-5" style="max-width:20rem;">
            <div class="flex-grow-1">
                <img class="card-img-top background-img" src="https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_960_720.jpg" alt="..." />
            </div>
            <div class="d-flex ms-2">
                <div class="dropdown">
                    <a href="#" class=" font-size-16 text-muted" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        @if ($item->flag == 1)
                        <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $item->id }}','vendor','activate')" style="color:green;">Active</a>
                        @else
                        <a class="dropdown-item" data-bs-target="#editstaff" data-bs-toggle="modal" onclick="staff_edit('{{ $item->id }}')">Edit</a>
                        <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal"  onclick="deletepopup('{{ $item->id }}','vendor','deactivate')">Deactivate</a>
                        @endif
                        <a class="dropdown-item" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $item->id }}','vendor','delete')" style="color:red;">Remove</a>

                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-sm-auto mt-10 profile-img rounded-circle bg-white" style="margin:auto">
                <div class="avatar avatar-5xl"><img class="rounded-circle bg-white" src="../../../assets/img/team/15.png" alt=""></div>
            </div> --}}
            <div class="avatar avatar-5xl text-center mb-8">
                @if(!empty($item->vendor_staff_image))
                    <img class="rounded-circle bg-white img-thumbnail  ms-11 mt-10 shadow-sm" src="{{ asset($item->vendor_staff_image) }}" width="100" height="100" alt="" style="margin:auto">
                @else
                    <img class="rounded-circle bg-white img-thumbnail  ms-11 mt-10 shadow-sm" src="https://us.123rf.com/450wm/pandavector/pandavector1901/pandavector190105281/126044187-isolated-object-of-avatar-and-dummy-symbol-collection-of-avatar-and-image-stock-symbol-for-web.jpg?ver=6" width="100" height="100" alt="" style="margin:auto">
                @endif
            </div>
            <div class="card-body">
                <h5 class="mb-0 card-title text-center">{{$item->name}}</h5>
                <p class="text-center">{{$item->role}}</p>
            </div>
            <div class="row text-muted text-center">
                <div class="col-6 border-end border-end-dashed">
                    <p class="text-muted mb-0">Mobile</p>
                    <h6 class="mb-1">{{$item->mobile}}</h6>
                </div>
                <div class="col-6">
                    <p class="text-muted mb-0">Email</p>
                    <h6 class="mb-1">{{$item->email}}</h6>
        
                </div>
                <div class="col-lg-12 mt-4  mb-3 ">
                    <div class="text-center ">
                        <a class="btn btn-phoenix-secondary me-1 mb-1" href="#settings-offcanvas"
                            data-bs-toggle="offcanvas">View Profile</a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    @endforeach
    @endif
</div>
