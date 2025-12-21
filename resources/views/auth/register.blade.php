<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
    <title>Admin Register Page</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="{{ asset('Packer_Panda-03.svg') }}" width="100" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up To Become Merchant</h3>
                                        <p>
                                            Already have an account?
                                            <a href="{{ route('login') }}">Sign In Here</a>
                                        </p>
                                    </div>

                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="col-sm-12">
                                                <label for="inputLastName" class="form-label">Full Name</label>
                                                <input type="text" name="name" :value="old('name')"
                                                    class="form-control" id="inputLastName" placeholder="Full Name"
                                                    required>
                                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>

                                                <input type="email" name="email" :value="old('email')"
                                                    class="form-control" id="inputEmailAddress" placeholder="Your Email"
                                                    required>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" id="inputChoosePassword"
                                                        class="form-control border-end-0" placeholder="Enter Password"
                                                        required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword2" class="form-label">Confirm
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password2">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control border-end-0" id="inputChoosePassword2"
                                                        placeholder="Enter Password" required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12 ">
                                                <div class="d-grid mt-3">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class='bx bx-user'></i>Sign up
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });

        $("#show_hide_password2 a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password2 input').attr("type") == "text") {
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass("bx-hide");
                $('#show_hide_password2 i').removeClass("bx-show");
            } else if ($('#show_hide_password2 input').attr("type") == "password") {
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass("bx-hide");
                $('#show_hide_password2 i').addClass("bx-show");
            }
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
