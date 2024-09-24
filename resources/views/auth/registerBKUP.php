<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up - Mighty Finance Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/m.jpg') }}">
    <link href="{{ asset('public/theme/css/style.css') }}" rel="stylesheet">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <style>
        body {
            margin: 0;
            overflow: hidden;
            overflow-y: auto;
            font-family: 'Montserrat', sans-serif
        }

        a {
            color: rgb(255, 187, 0);
        }

        .auth-form .btn {
            height: 50px;
            font-weight: 700;
            border-radius: 2.5rem;
            box-shadow: none !important;
        }

        #background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(102, 45, 145, 0.619), rgba(145, 45, 115, 0.906)),
                url('https://media.istockphoto.com/id/1385118964/photo/shot-of-a-young-woman-using-a-digital-tablet-while-working-in-an-organic-store.jpg?s=612x612&w=0&k=20&c=mFc1p5N1FBnIRKSb6P106J2X98jXqV_IXH4eLFrsbO0=');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: left;
        }

        .authincation {
            position: relative;
        }

        .authincation-content {
            margin-top: 0%;
            background-color: #ffffff;
            /* Adjust the transparency level as needed */
            border-radius: 2.5rem;
            overflow: hidden;
            margin-bottom: 0%;
            margin-right: 0%;
        }

        .auth-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
        }


        @media (max-width: 767px) {
            .authincation-content {
                margin: 0px;
                width: 100%;
            }
        }

        .float-alert-bar {
            position: absolute;
            padding: 15px;
            width: 100%;
            background-color: #dc3545;
            /* Choose a background color that suits your design */
            color: #c77878;
            /* Text color */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 99999;
            /* Ensure it appears above other elements */
            display: block;
            /* Hide it by default */
        }

        #policy {
            margin-top: 4%;
            font-size: 12px;
        }

        @media (max-width: 767px) {
            #policy {
                margin-top: 0%;
                font-size: 9px;
            }
        }

        #form-card {
            padding: 4%;
        }

        @media (max-width: 767px) {
            #form-card {
                padding: 0%;
            }
        }

        #form-content {
            padding-top: 4%;
        }

        #leftSide {
            padding-top: 0%;
        }

        #slogan-text {
            font-size: 18px;
        }

        #id-text {
            font-size: 14px;
            margin-bottom: 2%;
        }

        @media (max-width: 767px) {
            #form-content {
                padding-top: 0%;
            }

            #create-text {
                font-size: 14px;
            }

            #leftSide {
                padding-top: 0%;
                margin-bottom: 2%;
            }

            #slogan-text {
                font-size: 14px;
            }

            #id-text {
                font-size: 10px;
            }
        }
    </style>
</head>

<body class="h-100">
    <x-jet-validation-errors class="mb-4 text-xs float-alert-bar" style="color:rgb(255, 255, 255)" />
    <div id="background-container"></div>
    <div class="authincation h-100">
        <div class="container-fluid h-100 ">
            <div class="row justify-content-center align-items-center p-4 h-70">
                <div class="col-md-5 col-sm-12" id="leftSide">
                    <div class="text-center">
                        <div class="logo">
                            <a href="{{ route('welcome') }}">
                                <img width="170" src="{{ asset('/public/web/images/01-ft-logo.png') }}"
                                    alt="">
                            </a>
                        </div>
                        <h4 class="text-white" style="margin-top:2rem" id="slogan-text">Financial Inclusion for All!
                        </h4>
                        <p class="text-white mb-4" id="id-text">Welcome Back!</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 p-0 m-0">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div id="form-card">
                                <div class="auth-form" style="border-radius:1.5rem">
                                    <div class="w-full">
                                        <h2 id="create-text" style="color: #792db8" class="text-center mb-2"> <b>Create
                                                an Account</b> </h2>
                                        <p style="color: #792db8" class="text-center">Already have an account? <a
                                                class="text-warning" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                    <form id="form-content" method="POST" class="text-white"
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div style="display: flex; gap: 0px; width: 100%">
                                            <div class="col-6">
                                                <label class="text-dark mb-1"><strong>First Name</strong></label>
                                                <input name="fname" required type="text" class="form-control"
                                                    placeholder="Your First Name" value="{{ old('fname') }}">
                                            </div>
                                            <div class="col-6">
                                                <label class="text-dark mb-1"><strong>Last Name</strong></label>
                                                <input name="lname" required type="text" class="form-control"
                                                    placeholder="Your Last Name" value="{{ old('lname') }}">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-12">
                                                <label class="text-dark mb-1"><strong>Email</strong></label>
                                                <input name="email" required type="email" class="form-control"
                                                    placeholder="yourname@email.com" value="{{ old('email') }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="text-dark mb-1"><strong>Phone</strong></label>
                                                <input name="phone" required type="phone" class="form-control"
                                                    minlength="10" maxlength="10" placeholder="097"
                                                    value="{{ old('phone') }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="text-dark mb-1"><strong>Password</strong></label>
                                                <div class="input-group">
                                                    <input name="password" required autocomplete="new-password" id="password" type="password" class="form-control">
                                                    <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                          </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-left px-3 mt-4">
                                                <button
                                                    style="background-color:#792db8; box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"
                                                    type="submit" class="btn btn-block text-white text-lg">Create
                                                    Account</button>
                                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                    <div id="policy" class="form-check text-dark">
                                                        <input type="checkbox" name="terms" class="form-check-input"
                                                            id="termsCheckbox" checked>
                                                        <label class="form-check-label font-w400"
                                                            for="termsCheckbox">By creating an account, you agree to
                                                            Mighty Finance Solution
                                                            <a target="_blank" href="{{ route('terms') }}"
                                                                class="underline text-sm text-gray-600 hover:text-gray-900">Terms
                                                                of Service</a>
                                                            and
                                                            <a target="_blank" href="{{ route('pp') }}"
                                                                class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                                                                Policy</a>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                    <script>
                                        // Retrieve values from local storage and set them in the form fields
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const form = document.getElementById('form-content');

                                            // Loop through each input field and set its value from local storage if available
                                            Array.from(form.elements).forEach(function(element) {
                                                if (element.type !== 'submit' && element.name) {
                                                    const storedValue = localStorage.getItem(element.name);
                                                    if (storedValue !== null) {
                                                        element.value = storedValue;
                                                    }
                                                }
                                            });

                                            // Add an event listener to update local storage when input values change
                                            form.addEventListener('input', function(event) {
                                                if (event.target.type !== 'submit' && event.target.name) {
                                                    localStorage.setItem(event.target.name, event.target.value);
                                                }
                                            });
                                        });

                                        //hide or show password
                                        const passwordInput = document.getElementById('password');
                                        const togglePasswordButton = document.getElementById('togglePassword');

                                        togglePasswordButton.addEventListener('click', function () {
                                            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);
                                            // Change the eye icon based on the password visibility
                                            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--**********************************
    Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('public/theme/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('public/theme/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/deznav-init.js') }}"></script>

</body>

</html>
