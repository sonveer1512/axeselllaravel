@include('include/header')
<style>
    .radio {
        font-size: inherit;
        margin: 0;
        position: absolute;
        right: calc(var(--card-padding) + var(--radio-border-width));
        top: calc(var(--card-padding) + var(--radio-border-width));
    }
    .error{
        color: red;
        font-size: 16px;
    }
</style>

<body>
    
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            <div class="row vh-100 flex-cente g-0">
                <div class="col-lg-6 position-relative d-none d-lg-block">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/bg/30.png);"></div>
                   
                </div>
                <div class="col-lg-6">
                    <div class="row flex-center h-100 g-0 px-4 px-sm-0">
                        <div class="col col-sm-6 col-lg-7 col-xl-6"><a
                                class="d-flex flex-center text-decoration-none mb-4" href="">
                                <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img
                                        src="../../../assets/img/icons/axepert_black.png" alt="phoenix" width="78" /></div>
                            </a>
                            <form id="login" method="post">
                                @csrf()
                                <div class="text-center mb-7">
                                    <p class="text-700">Get access to your account</p>
                                </div>
                                <div class="position-relative">
                                    <hr class="bg-200 mt-5 mb-4" />
                                    <div class="divider-content-center">Welcome Back</div>
                                </div>
                                <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label>
                                    <div class="form-icon-container"><input class="form-control form-icon-input" id="email" type="email" name="email"  placeholder="Enter Your Email" /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                                            <span id="email_error" class="error"></span>
                                    </div>
                                </div>
                                <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
                                    <div class="form-icon-container"><input class="form-control form-icon-input" type="password" name="password" placeholder="Enter Your Password" /><span class="fas fa-key text-900 fs--1 form-icon"></span>
                                            <span id="password_error" class="error"></span>
                                    </div>
                                </div>
                                <div class="row flex-between-center mb-7">
                                    <div class="col-auto"><a class="fs--1 fw-semi-bold" href="../simple/forgot-password.html">Forgot Password?</a></div>
                                </div>
                                <button class="btn btn-primary w-100 mb-3 submitbtn" name="submit" type="submit">Sign In</button>
                            </form>

                            {{-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('include/footer')
</body>

<script>
    $(document).on('submit', '#login', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        if (error == false) {
            $.ajax({
                url: "{{ url('login') }} ",
                type: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".submitbtn").css('display', 'none');
                },
                success: function(result) {
                    if (result.code == 200) {
                        showsuccess(result.message);
                        window.location.href = "{{ url('/dashboard') }}";
                    } else if (result.code == 201) {
                        showerror(result.message);
                    } else if (result.code == 401) {
                        $.each(result.message, function(prefix, val) {
                            $('#' + prefix + '_error').text(val[0]);
                        });
                    } else if (result.code == 400) {
                        showerror(result.message);
                    } 
                },
                error: function(xhr) {
                    $(".submitbtn").css('display', 'block');
                },
                complete: function() {
                    $(".submitbtn").css('display', 'block');
                },
            })
        }
    })
</script>

</html>
