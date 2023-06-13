<nav class="navbar navbar-vertical navbar-expand-lg navbar-darker" style="display:none;">
    <script>
        var navbarStyle = localStorage.getItem("phoenixNavbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <p class="navbar-vertical-label">Dashboard</p>
                <span class="nav-item-wrapper"><a class="nav-link active label-1" href="{{ url('/dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false"><div class="d-flex align-items-center"><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-life-buoy"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span></div></a></span>
                
                <li class="nav-item">
                    <!-- label-->
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#icons" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="icons"><div class="d-flex align-items-center"><div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com --></div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></span><span class="nav-link-text">User Management</span></div></a>
                        <div class="parent-wrapper label-1">
                        <ul class="nav parent collapse show" data-bs-parent="#navbarVerticalCollapse" id="icons" style="">
                            <p class="collapsed-nav-item-title d-none">Icons</p>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user_management/') }}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Staff  Management</span></div>
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="modules/icons/font-awesome.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Customer Management</span></div>
                            </a><!-- more inner pages-->
                            </li>
                        </ul>
                        </div>
                    </span>
                   

                   
                    {{-- @if (getuserdetail('role') != 'distributor')
                        <a class="nav-link dropdown-indicator label-1" href="{{ url('distributor/') }}" role="button">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span
                                        data-feather="shopping-cart"></span></span><span
                                    class="nav-link-text">Distributor</span>
                            </div>
                        </a>
                    @endif

                    <a class="nav-link dropdown-indicator label-1" href="{{ url('vendor/') }}" role="button">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                            </div><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span
                                class="nav-link-text">Vendor</span>
                        </div>
                    </a> --}}
                    <p class="navbar-vertical-label">Modules</p>
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#project-management" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="project-management"><div class="d-flex align-items-center"><div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com --></div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg></span><span class="nav-link-text">Project management</span></div></a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="project-management">
                                <p class="collapsed-nav-item-title d-none">Project management</p>
                                <li class="nav-item"><a class="nav-link" href="../../project-management/create-new.html" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Add  Products </span></div>
                                    </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('category/') }}" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Category</span> </div>
                                    </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('brand/') }}" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Brands</span> </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="nav-item-wrapper">
                            {{-- <a class="nav-link dropdown-indicator label-1" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">   
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                    </div><span class="nav-link-icon"><span data-feather="mail"></span></span><span
                                        class="nav-link-text">Content Management</span>
                                </div>
                            </a> --}}
                            <a class="nav-link dropdown-indicator label-1" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level"><div class="d-flex align-items-center"><div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com --></div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg></span><span class="nav-link-text">Content Management</span></div></a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse"
                                    id="email">
                                    <p class="collapsed-nav-item-title d-none">Email</p>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('cms/about/') }}"
                                            data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">About</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/term/') }}" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Terms & Condition</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/privacy/') }}" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text"> Privacy & Policy</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/refund/') }}" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Refund Policy</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/FAQs/') }}" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">FAQs</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/blogs/') }}" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Blog</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/sliders/') }}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Sliders</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('cms/testimonial/') }}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Testimonial</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </span>
                        <span class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#utilities" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="utilities"><div class="d-flex align-items-center"><div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com --></div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg></span><span class="nav-link-text">Settings</span></div></a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav parent collapse show" data-bs-parent="#navbarVerticalCollapse" id="utilities" style="">
                                    <p class="collapsed-nav-item-title d-none">Settings</p>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('setting/')}}" data-bs-toggle="" aria-expanded="false">
                                             <div class="d-flex align-items-center"><span class="nav-link-text">Settings &amp; Privacy</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../modules/utilities/borders.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text">Borders</span></div>
                                         </a>
                                    </li>    
                                </ul>
                            </div>
                        </span>

                        <p class="navbar-vertical-label">Dashboard</p>
                        <span class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#customization" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="customization"><div class="d-flex align-items-center"><div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com --></div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></span><span class="nav-link-text">Offer</span></div></a>
                        <div class="parent-wrapper label-1">
                          <ul class="nav parent collapse show" data-bs-parent="#navbarVerticalCollapse" id="customization" style="">
                            <p class="collapsed-nav-item-title d-none">Customization</p>
                            <li class="nav-item"><a class="nav-link" href="{{url('offer/')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Offer List</span></div>
                              </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{url('offer/flat/')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Flat Discount</span></div>
                              </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{url('offer/percentage/')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">% Discount</span></div>
                              </a>
                            </li>
                          </ul>
                        </div>
                    </span>

                </li>

                

            </ul>
        </div>
    </div>
    {{-- <div class="navbar-vertical-footer"><button  class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 text-start white-space-nowrap"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span  class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div> --}}
</nav>
<nav class="navbar navbar-top navbar-expand navbar-darker" id="navbarDefault" style="display:none;">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ url('/dashboard') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="../../assets/img/icons/axepert_white.png"
                            alt="phoenix" width="50" />
                        <p class="logo-text ms-2 d-none d-sm-block">Axepert Exhibits</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                    class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                    placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0"
                    aria-label="Close"></button></div>
            <div class="dropdown-menu border font-base start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar list pb-3" style="max-height: 30rem;">
                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Recently Searched </h6><a
                        class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left"
                                    data-fa-transform="shrink-2"></span> Store Macbook</div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left"
                                    data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                        </div>
                    </a>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Products</h6><a
                        class="dropdown-item py-2 d-flex align-items-center"
                        href="../../apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                                src="../../assets/img/products/3.png" alt="" /></div>
                        <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory -
                                    1.6GHz - 128GB Storage</span></p>
                        </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center"
                        href="../../apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="img-fluid" src="../../assets/img/products/3.png"
                                alt="" /></div>
                        <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at
                                    12:30 PM</span></p>
                        </div>
                    </a>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Quick Links</h6><a
                        class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900"
                                    data-fa-transform="shrink-2"></span> Support MacBook House</div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900"
                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                    </a>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Files</h6><a
                        class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900"
                                    data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900"
                                    data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900"
                                    data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                        </div>
                    </a>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Members</h6><a
                        class="dropdown-item py-2 d-flex align-items-center" href="../../pages/pages/members.html">
                        <div class="avatar avatar-l status-online  me-2 text-900">
                            <img class="rounded-circle " src="../../assets/img/team/10.png" alt="" />
                        </div>
                        <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                            <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                        </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../../pages/pages/members.html">
                        <div class="avatar avatar-l  me-2 text-900">
                            <img class="rounded-circle " src="../../assets/img/team/12.png" alt="" />
                        </div>
                        <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">John Smith</h6>
                            <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                        </div>
                    </a>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom py-2 lh-sm">Related Searches</h6><a
                        class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900"
                                    data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900"
                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                    </a>
                </div>
                <div class="text-center">
                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                </div>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><span class="text-700" data-feather="bell"
                        style="height:20px;width:20px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificatons</h5><button
                                    class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as
                                    read</button>
                            </div>
                        </div>
                        <div class="card-body p-0"></div>
                        <div class="scrollbar-overlay">
                            <div class="overflow-auto" style="height: 27rem;">
                                <div class="border-300">
                                    <div class="p-3 border-300 notification-card position-relative read border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle" src="../../assets/img/team/30.png"
                                                        alt="" /></div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1'>💬</span>Mentioned you in a comment.<span
                                                            class="ms-2 text-500 fw-bold fs--2">10m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">10:41 AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                                </div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1'>📅</span>Created an event.<span
                                                            class="ms-2 text-500 fw-bold fs--2">20m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">10:20 AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="p-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle avatar-placeholder"
                                                        src="../../assets/img/team/avatar.png" alt="" />
                                                </div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-500 fw-bold fs--2">1h</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">9:30 AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-300">
                                    <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <img class="rounded-circle" src="../../assets/img/team/57.png" alt="" />
                                                    </div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-500 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">9:11 AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="p-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle" src="../../assets/img/team/59.png"
                                                        alt="" /></div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1'>👤</span>Tagged you in a comment.<span
                                                            class="ms-2 text-500 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">10:58 PM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-300 notification-card position-relative read ">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle" src="../../assets/img/team/58.png"
                                                        alt="" /></div>
                                                <div class="me-3 flex-1">
                                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3"><span
                                                            class='me-1'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-500 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span
                                                            class="fw-bold">10:18 AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"href="../../pages/pages/notifications.html">Notification history</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l "> <img class="rounded-circle " src="../../assets/img/team/57.png" alt="" /></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="../../assets/img/team/57.png" alt="" />
                                </div>
                                <h6 class="mt-2 text-black">{{ getuserdetail('name') }}</h6>
                                <p class="mt-2 text-black">{{ getuserdetail('role') }}</p>
                            </div>
                            {{-- <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                            </div> --}}
                        </div>
                        <div class="overflow-auto scrollbar p-0 border-top" style="height: 5rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3"
                                        href="{{ url('setting/resetpassword') }}"> <span
                                            class="me-2 text-900 "><span><img
                                                    src="https://img.icons8.com/dotty/80/null/re-enter-pincode.png"
                                                    width="20" /></span></span>Change Password</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ url('setting/') }}"> <span
                                            class="me-2 text-900 "><span><img
                                                    src="https://img.icons8.com/carbon-copy/100/null/automatic.png"
                                                    width="20" /></span></span>Settings &amp; Privacy </a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">

                            <div class="px-3 mt-2"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="{{ url('logout') }}"> <span class="me-2"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600">
                                <a class="text-600 me-1" href="#!">Privacy policy</a>&bull;
                                <a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1"
                                    href="#!">Cookies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-top navbar-slim navbar-expand" id="navbarSlim" style="display:none;">

</nav>
<nav class="navbar navbar-top navbar-expand-lg" id="navbarTopNew" style="display:none;">

</nav>
<nav class="navbar navbar-top navbar-slim justify-content-between navbar-expand-lg" id="navbarTopSlimNew"
    style="display:none;">


</nav>
<script>
    var navbarTopShape = localStorage.getItem('phoenixNavbarTopShape');
    var navbarPosition = localStorage.getItem('phoenixNavbarPosition');
    var body = document.querySelector('body');
    var navbarDefault = document.querySelector('#navbarDefault');
    var navbarTopNew = document.querySelector('#navbarTopNew');
    var navbarSlim = document.querySelector('#navbarSlim');
    var navbarTopSlimNew = document.querySelector('#navbarTopSlimNew');

    var documentElement = document.documentElement;
    var navbarVertical = document.querySelector('.navbar-vertical');

    if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault.remove();
        navbarTopNew.remove();
        navbarTopSlimNew.remove();
        navbarSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarVertical.remove();
        navbarTopNew.remove();
        navbarSlim.remove();
        navbarTopSlimNew.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarSlim.remove();
        navbarVertical.remove();
        navbarTopSlimNew.remove();
        navbarTopNew.removeAttribute('style');
        documentElement.classList.add('navbar-horizontal')

    } else {
        body.classList.remove('nav-slim');
        navbarSlim.remove();
        navbarTopNew.remove();
        navbarTopSlimNew.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
    }

    var navbarTopStyle = localStorage.getItem('phoenixNavbarTopStyle');
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
    }

    var navbarVerticalStyle = localStorage.getItem('phoenixNavbarVerticalStyle');
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
    }
</script>
