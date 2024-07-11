<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title> {{ $site->site_name }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="{{ $site->site_name }}" />
    <meta name="keywords" content="{{ $site->site_name }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $site->site_name }}" />
    <meta property="og:url" content="{{ $site->site_url }}" />
    <meta property="og:site_name" content="{{ $site->site_name }}" />
    <link rel="canonical" href="{{ $site->site_url }}" />
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form class="form w-100">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">{{ $site->site_name }}</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="email" placeholder="Email" id="email"
                                    onchange="checkAdminEmail(this.value)" name="email"
                                    class="form-control bg-transparent" />
                                <!--end::Email-->
                                <span id="emailMessage" style="font-weight: 600"></span>

                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" id="password" name="password"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Password-->
                                <span id="loginMessage" style="font-weight: 600"></span>

                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="button" id="kt_sign_in_submit" onclick="formSubmit()"
                                    class="btn btn-primary submit">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->

                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('admin') }}/assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('admin') }}/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script>
        $(":submit").attr("disabled", true);

        function checkAdminEmail(val) {
            var email = val;
            console.log(email);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: "POST",
                url: "{{ route('validateAdminEmail') }}",
                data: {
                    email: email
                },
                success: function(data) {

                    if (data.success == 0) {
                        $('#emailMessage').html(data.message);
                        $('#emailMessage').css("color", "red");
                        $('#email').css("border", "2px solid red");
                        $(":submit").attr("disabled", true);

                    } else {
                        $('#emailMessage').html('');
                        $(":submit").attr("disabled", false);
                        $('#email').css("border", "1px solid #E1E3EA");

                    }
                }

            });
        }
    </script>
    <script>
        function formSubmit() {
            var email = $('#email').val();
            var password = $('#password').val();
            console.log(email);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: "POST",
                url: "{{ route('loginAction') }}",
                data: {
                    email: email,
                    password: password
                },
                success: function(data) {

                    if (data.success == 0) {
                        $('#loginMessage').html(data.message);
                        $('#loginMessage').css("color", "red");
                        $('#password').css("border", "2px solid red");
                    }else{
                        window.location.href = '{{url('admin/dashboard')}}';
                    }
                }

            });
        }
    </script>
</body>
<!--end::Body-->

</html>
