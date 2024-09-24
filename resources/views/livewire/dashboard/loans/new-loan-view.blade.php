<style>
    .main-content .wizard-form .progressbar-list::before {
        content: " ";
        background-color: rgb(155, 155, 155);
        border: 10px solid #fff;
        border-radius: 50%;
        display: block;
        width: 30px;
        height: 30px;
        margin: 9px auto;
        box-shadow: 1px 1px 3px #792db8;
        transition: all;
    }

    .main-content .wizard-form .progressbar-list::after {
        content: "";
        background-color: rgb(155, 155, 155);
        padding: 0px 0px;
        position: absolute;
        top: 14px;
        left: -50%;
        width: 100%;
        height: 2px;
        margin: 9px auto;
        z-index: -1;
        transition: all 0.8s;
    }

    .main-content .wizard-form .progressbar-list.active::after {
        background-color: #792db8;
    }

    .main-content .wizard-form .progressbar-list:first-child::after {
        content: none;
    }

    .main-content .wizard-form .progressbar-list.active::before {
        font-family: "Font Awesome 5 free";
        content: "\f00c";
        font-size: 11px;
        font-weight: 600;
        color: #fff;
        padding: 6px;
        background-color: #792db8;
        border: 1px solid #792db8;
        box-shadow: 0 0 0 7.5px rgb(176 60 70 / 11%);
    }

    .progressbar-list {
        color: #792db8;
    }

    .active {
        color: #000;
    }

    /* card */
    .card img {
        width: 40px;
    }

    .card {

        cursor: pointer;
        border-radius: 1rem;
        background: #792db8;
    }

    .active-card {
        color: #792db8;
        font-weight: bold;
        border: 3px solid #792db8;
    }

    .form-check-input:focus {
        box-shadow: none;
    }

    .bg-color-info {
        background-color: #792db8 !important;
    }

    .border-color {
        border-color: #792db8;
    }

    .btn {
        padding: 16px 30px;
        border-radius: 2.5rem !important;
    }

    .back-to-wizard {
        transform: translate(-50%, -139%) !important;
    }

    .bg-success-color {
        background-color: #87D185;
    }

    .bg-success-color:focus {
        box-shadow: 0 0 0 0.25rem rgb(55 197 20 / 25%);
    }

    .selected-card {
        background-color: #ffc00e;
        /* Light red background color */
        border: 1px solid #ffc00e;
        /* Red border color */
    }

    /* Input Field Style */
    /* General styling for all inputs */
    input {

        padding: 10px;
        border: 2px solid #792db8;
        /* Border color */
        border-radius: 5px;
        /* Rounded corners */
        font-size: 24px;
        /* Increased font size */
        font-family: 'Arial', sans-serif;
    }

    /* Styling for text-type inputs */
    input[name='amount'] {
        text-align: right;
    }

    /* Hover effect */
    input:hover {
        border-color: #792db8;
        /* Border color on hover */
    }

    /* Focus effect */
    input:focus {
        outline: none;
        border-color: #792db8;
        /* Border color when focused */
        box-shadow: 0 0 10px rgba(185, 60, 231, 0.8);
        /* Box shadow when focused */
    }


    /* ranger */
    @import url("https://fonts.googleapis.com/css2?family=Creepster&family=montserrat:wght@700&display=swap");

    /* .container {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    .range-slider {
        position: relative;
        width: 80vmin;
        height: 20vmin;
    }

    .range-slider_input {
        width: 100%;
        position: absolute;
        top: 50%;
        z-index: 3;
        transform: translateY(-50%);
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 4px;
        opacity: 0;
        margin: 0;
    }

    .range-slider_input::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 100px;
        height: 100px;
        cursor: pointer;
        border-radius: 50%;
        opacity: 0;
    }

    .range-slider_input::-moz-range-thumb {
        width: 14vmin;
        height: 14vmin;
        cursor: pointer;
        border-radius: 50%;
        opacity: 0;
    }

    .range-slider_thumb {
        width: 14vmin;
        height: 14vmin;
        border: 0.6vmin solid #792db8;
        border-radius: 50%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        font-size: 4vmin;
        color: #792db8;
        z-index: 2;
    }

    .range-slider_line {
        height: 0.5vmin;
        width: 100%;
        background-color: #e1e1e1;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        position: absolute;
        z-index: 1;
    }

    .range-slider_line-fill {
        position: absolute;
        height: 0.5vmin;
        width: 0;
        background-color: #792db8;
    }

    .disabled-card {
        opacity: 0.5;
        /* Adjust the opacity as needed */
        pointer-events: none;
        /* Disable pointer events */
        cursor: not-allowed;
        /* Set the cursor to "not-allowed" */
    }


    #preloader2 {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background-color: #fff;
        z-index: 999999999;
    }

    #preloader2 i {
        display: block;
        width: 16px;
        height: 16px;
        background: black;
        border-radius: 16px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -8px 0 0 -8px;
        opacity: 1;
        -webkit-transform: translate3d(60px, 0, 0);
        overflow: hidden;
        text-indent: -9999px;
        border: 1px solid white;
    }

    #preloader2 i:nth-child(1) {
        background: #613de6;
        -webkit-animation: googleDotA 1.75s ease-in-out infinite;
    }

    #preloader2 i:nth-child(2) {
        background: #36b37e;
        -webkit-animation: googleDotB 1.75s ease-in-out infinite;
    }

    #preloader2 i:nth-child(3) {
        background: #ffab00;
        -webkit-animation: googleDotC 1.75s ease-in-out infinite;
    }

    @-webkit-keyframes googleDotA {
        0% {
            opacity: 0;
            transform: translate3d(60px, 0, 0);
            -webkit-transform: translate3d(60px, 0, 0);
        }

        30% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        70% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        100% {
            opacity: 0;
            transform: translate3d(-300px, 0, 0);
            -webkit-transform: translate3d(-300px, 0, 0);
        }
    }

    @-webkit-keyframes googleDotB {
        0% {
            opacity: 0;
            transform: translate3d(180px, 0, 0);
            -webkit-transform: translate3d(180px, 0, 0);
        }

        35% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        77% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        100% {
            opacity: 0;
            transform: translate3d(-180px, 0, 0);
            -webkit-transform: translate3d(-180px, 0, 0);
        }
    }

    @-webkit-keyframes googleDotC {
        0% {
            opacity: 0;
            transform: translate3d(300px, 0, 0);
            -webkit-transform: translate3d(300px, 0, 0);
        }

        40% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        80% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
        }

        100% {
            opacity: 0;
            transform: translate3d(-60px, 0, 0);
            -webkit-transform: translate3d(-60px, 0, 0);
        }
    }

    /* Media Queries */
    .textMedia {
        font-size: 100%;
    }

    #stepOneMedia,
    #stepTwoMedia,
    #stepThreeMedia,
    #stepFourMedia {
        padding: 4%;
    }

    @media (max-width: 768px) {

        #stepOneMedia,
        #stepTwoMedia,
        #stepThreeMedia,
        #stepFourMedia {
            padding: 7%;
        }

        .textMedia {
            font-size: 60%;
        }
    }

    //
    .loan-container {
        background-color: #6c757d;
        /* bg-secondary */
        border-radius: 1rem;
        padding: 1rem;
    }

    .title-icon-container {
        background-color: #fff;
        /* bg-white */
        border-radius: 50%;
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        align-items: center;
        justify-content: center;
        margin: -50px auto 0;
        /* Cut the top middle */
        position: relative;
        z-index: 1;
    }

    .title-icon-container svg {
        width: 60px;
        height: 60px;
        fill: #007bff;
        /* bg-primary */
    }

    .requirement-item {
        margin-bottom: 1rem;
    }

    .requirement-item svg {
        width: 24px;
        height: 24px;
        fill: #fff;
        margin-right: 8px;
    }

    .radio-buttons {
        width: 100%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .custom-radio input {
        display: none;
    }

    .radio-buttons .custom-radio {
        margin: 0px !important;
    }

    .radio-btn {
        position: relative;

        width: auto;
        height: auto;
        margin: 0px;
        border: 4px solid transparent;
        border-radius: 1.2rem;
        cursor: pointer;
    }


    .radio-btn .content {
        padding: 13px;
        display: flex;
        flex-direction: column;
        justify-content: initial;
        align-items: initial;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .radio-btn .profile-img {
        width: 80px;
        height: 80px;
        margin: 20px 0;
        border-radius: 50%;
        overflow: hidden;
    }

    .radio-btn .profile-img img {
        width: 100%;
        height: 100%;
        user-select: none;
    }

    .radio-btn h2 {
        color: #ffffff;
        margin-bottom: 0px;
        font-size: 14px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .radio-btn .skill {
        display: inline-block;
        margin-bottom: 4px;
        color: #ffffff;
        font-size: 14px;
        text-transform: capitalize;
    }

    .radio-btn .check-icon {
        width: 17px;
        height: 17px;
        background-color: #1b1d28;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: absolute;
        right: 15%;
    }

    span.btn.btn-secondary {
        border-radius: 0.7rem !important;
    }

    .radio-btn .check-icon .icon {
        display: inline-block;
        position: relative;
        width: 9px;
        height: 5px;
        margin-top: -2px;
        transform: rotate(-40deg);
    }

    .radio-btn .check-icon .icon::before {
        content: "";
        width: 2px;
        height: 100%;
        background-color: #ffffff;
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 10px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.231);
        transform: scaleY(0);
        transform-origin: top;
        transition: all 0.2s ease-in-out;
    }

    .radio-btn .check-icon .icon::after {
        content: "";
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 10px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.231);
        transform: scaleX(0);
        transform-origin: left;
        transition: all 0.2s ease-in-out;
        transition-delay: 0.1s;
    }



    .custom-radio input:checked+.radio-btn .check-icon {
        background-color: #fabe15;
    }



    .custom-radio input:checked+.radio-btn .check-icon .icon::before,
    .custom-radio input:checked+.radio-btn .check-icon .icon::after {
        transform: scale(1);
    }

    .radio-buttons .add-profile {
        width: 150px;
        height: 150px;
        margin: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .radio-btn img {

        user-select: none;
        max-width: 20%;
    }

    body {
        background: #F6F3F8 !important;
    }



    .range {
        display: flex;
        width: 100%x;
    }

    .range__slider {
        width: 100%;
    }

    .range__value {
        width: 35%;
        margin-left: 45px;
        text-align: center;
        border-left: #e6e4e4 1px solid;
    }






    .range__slider label {
        margin-bottom: 10px;
    }

    .range__slider [type="range"] {
        width: 100%;
        -webkit-appearance: none;
        height: 10px;
        border-radius: 6px;
        background: #f1f1f1;
        outline: none;
        padding: 0;
        margin: 0;
    }

    /* custom thumb */



    .range__slider [type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        height: 25px;
        width: 25px;
        background-color: #f9ca24;
        border-radius: 50%;
        border: none;
        transition: .2s ease-in-out;
        -webkit-transition: background .2s ease-in-out;
    }

    .range__slider [type="range"]::-moz-range-thumb {
        height: 20px;
        width: 20px;
        background-color: #f9ca24;
        border-radius: 50%;
        border: none;
        transition: .2s ease-in-out;
        -webkit-transition: background .2s ease-in-out;
    }

    .range__slider [type="range"]::-webkit-slider-thumb:hover {
        box-shadow: 0 0 0 10px rgba(255, 85, 0, .1)
    }

    .range__slider [type="range"]:active::-webkit-slider-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:focus::-webkit-slider-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]::-moz-range-thumb:hover {
        box-shadow: 0 0 0 10px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:active::-moz-range-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:focus::-moz-range-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .duration-input input[type="number"] {
        border: none;
        border-radius: 0;
        background-color: #ded6e1;
        color: #792db8;
        font-weight: bold;
    }

    .input-group> :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: 15px;
        border-radius: 1rem;
        height: 3.6rem;
    }

    .duration-input input[type="number"]:focus {
        border: 1px solid #ccc;
    }


    .border-dotted-yellow {
        border: dashed 2px #FFD700;
        border-radius: 1.5rem;
        padding: 17px;
        margin-top: -1rem;
        background: white;

    }

    .border-dotted-yellow p {
        margin-bottom: 0;
        font-weight: bolder;
        /* Remove default margin */
    }

    .border-dotted-yellow .col {
        padding: 10px;
        /* Padding for columns */
    }
</style>
<div class="content-body">
    <div class="">
        {{-- <h2 class="mx-4">Get a Loan</h2> --}}
        <!-- section -->
        <section>
            <div class="">
                <form action="{{ route('apply-loan') }}" method="POST" enctype="multipart/form-data" class="main-content" novalidate>
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-8">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center mt-3 d-none mb-0" id="alertBox"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Please fill up all the neccessary fields
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row justify-content-center" id="cardSection">
                        <div class="col-lg-9 col-md-9" id="stepOneMedia">
                            <h3 class="fw-bold pt-2">Ready, get set, <strong class="text-primary">go!</strong> </h3>
                            <div>
                                {{-- Duration --}}
                                <p class="small pb-0">Before we start, there are a few things you have to know!
                                    Make sure you have the following made available.</p>
                                <small class="text-danger" id="loanProdValidText"></small>
                                <div style="border-radius:1rem; padding: 1rem; margin-top: 2rem;"
                                    class="bg-secondary m-20 col-12">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="loan-container">
                                                    <div class="title-icon-container">
                                                        <img src="{{ asset('public/mfs/images/svg/4.svg') }}"
                                                            alt="">
                                                    </div>

                                                </div>
                                                <div class="loan-container" style="margin-top: 1rem 0px 2rem 0;">

                                                    <div class="text-white requirement-item">
                                                        <img src="{{ asset('public/mfs/images/svg/2.svg') }}"
                                                            alt="">
                                                        National Identity Card
                                                    </div>
                                                    <div class="text-white requirement-item">
                                                        <img src="{{ asset('public/mfs/images/svg/1.svg') }}"
                                                            alt="">
                                                        Preapproval Form & Latest Payslip
                                                    </div>
                                                    <div class="text-white requirement-item">
                                                        <img src="{{ asset('public/mfs/images/svg/3.svg') }}"
                                                            alt="">
                                                        3 Bank Statements
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <button type="button" class="btn btn-primary float-end next mt-4">Continue</button>
                        </div>
                    </div>

                    <div class="row justify-content-center form-business">
                        <div class="col-lg-9 col-md-9" id="stepThreeMedia">
                            <h3 class="fw-bold pt-2">Lets get <strong class="text-primary">Started!</strong> </h3>
                            <div>
                                {{-- Duration --}}
                                <p class="small pb-0">Fill in the form to get instant access.</p>
                                <small class="text-danger" id="loanProdValidText"></small>

                                <div id="loan_products" class="row row-cols-2 row-cols-lg-2 g-4">

                                    @forelse ($products as $item)
                                    <div class="col">
                                        <label onclick="selectCard(this)" class="card h-70 py-2 custom-radio {{ $item->status == 0 ? 'disabled-card' : '' }}">
                                            <input type="radio" name="loan_type" value="{{ $item->id }}" class="d-none"
                                                checker()/>
                                            <div class="radio-btn">
                                                <div class="content">
                                                    <div class="mb-2 text-xs" style="width: 5px; height: 5px;">
                                                        {{-- {!! $item->icon !!} --}}
                                                    </div>
                                                    <h2>{{ ucwords($item->description) }}</h2>
                                                    <p class="skill">{{ $item->description }} {{ $item->status == 1 ? '(Available)' : '(coming soon)' }} </p>
                                                    <span class="check-icon">
                                                        <span class="icon"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @empty
                                    @endforelse

                                    {{-- <div class="col">
                                        <label class="card h-70 py-2 custom-radio disabled-card">
                                            <input type="radio" name="loan_type" value="1" class="d-none"
                                                checker() />
                                            <div class="radio-btn">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <img width="50px"
                                                            src="{{ asset('public/web/images/1.svg') }}" />
                                                    </div>
                                                    <h2>Business Loan</h2>
                                                    <p class="skill">SME (coming soon)</p>
                                                    <span class="check-icon">
                                                        <span class="icon"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </div> --}}

                                </div>

                            </div>


                            {{-- Principal --}}
                            <div class="bg-secondary card-body finalcontinue" style="border-radius: 1rem">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12">
                                        <div class="text-center">
                                            <div class="card-body">
                                                <div class="slider">
                                                    <h4 class="text-white">Loan Amount</h4>
                                                    <div v class="range" style="margin-bottom: -60px;"
                                                        id="pricipal-slide">
                                                        <div class="form-group range__slider">
                                                            <input value="1"
                                                                oninput="this.nextElementSibling.value = this.value"
                                                                onchange="updateOutputValue(this.value)" step="50" type="range"
                                                                style="width:100%;"
                                                                id="slidatious" title="Slide for amount">

                                                            <input name="amount" id="update_side" step="50" value="10000"
                                                                onchange="updateRangeValue(this.value)"
                                                                style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8; display: block; font-size: 20px;font-weight: bold;color: #fff;text-align: center;width: 100%; border: 1px #eaff0000 solid;"
                                                                class="output form-control" type="number">
                                                            <output></output>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 id="pricipal" class="text-white"></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 finalcontinue">
                                <div class="row justify-content-center">
                                    <div class="">
                                        <div class="col-12 col-md-12">
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-12">
                                                        <h4 class="text-center text-secondary mt-2 mb-1"
                                                            style="position: relative;">Duration
                                                            {{-- <button
                                                                class="lazy-felix lazy-felix-download-btn"
                                                                data-name="Duration"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="lazyfelix-icon" width="27"
                                                                    height="25" viewBox="0 0 27 25"
                                                                    fill="none">
                                                                    <path
                                                                        d="M13.4518 13.0377C11.4186 12.7365 6.4864 16.878 5.39453 21.7726V22.0362C5.48795 24.1899 7.75902 24.9194 10.9292 24.0316C13.0111 23.1639 14.1728 23.1375 16.125 24.0316C17.9698 25.1612 20.41 23.7051 20.643 22.0362C20.3191 18.4517 16.3154 13.1956 13.4518 13.0377Z"
                                                                        fill="#7A7A7A" fill-opacity="0.7"></path>
                                                                    <ellipse cx="4.85476" cy="11.946"
                                                                        rx="2.97265" ry="4.24369"
                                                                        transform="rotate(-21.5283 4.85476 11.946)"
                                                                        fill="#7A7A7A" fill-opacity="0.7"></ellipse>
                                                                    <ellipse cx="22.0599" cy="13.5489"
                                                                        rx="2.97265" ry="4.24369"
                                                                        transform="rotate(22.9527 22.0599 13.5489)"
                                                                        fill="#7A7A7A" fill-opacity="0.7"></ellipse>
                                                                    <ellipse cx="10.1354" cy="5.66514"
                                                                        rx="2.92739" ry="4.7215"
                                                                        transform="rotate(-9.76985 10.1354 5.66514)"
                                                                        fill="#7A7A7A" fill-opacity="0.7"></ellipse>
                                                                    <ellipse cx="17.552" cy="5.95842"
                                                                        rx="2.92739" ry="4.7215"
                                                                        transform="rotate(14.6303 17.552 5.95842)"
                                                                        fill="#7A7A7A" fill-opacity="0.7"></ellipse>
                                                                </svg></button> --}}
                                                            </h4>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="input-group duration-input">
                                                            <span class="btn btn-secondary"
                                                                onclick="decreaseDuration()">-</span>
                                                            <input type="number" name="duration" id="durationInput"
                                                                class="form-control text-center bg-purple"
                                                                value="1">
                                                            <span class=" btn btn-secondary"
                                                                onclick="increaseDuration()">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <p id="durationAlert" class="text-danger text-center"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 finalcontinue">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12">
                                        <!-- Your previous code for the duration input -->

                                        <!-- Div with dotted yellow border -->
                                        <div class="border-dotted-yellow">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-center  text-secondary font-weight-bold">
                                                        Total Repayment
                                                    </p>
                                                    <p id="payback_value" class="text-center text-secondary">K51000.00</p>
                                                </div>
                                                <div class="col">
                                                    <p class="text-center  text-secondary font-weight-bold">Monthly
                                                        Repayment</p>
                                                    <p id="monthly_repay" class="text-center text-secondary">K51000.00</p>
                                                </div>
                                                <div class="col">
                                                    <p class="text-center  text-secondary font-weight-bold">Next
                                                        Repayment Date</p>
                                                    <p id="nxt_repay_date" class="text-center text-secondary">02/05/2024</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /cards -->
                            <!-- NEXT BUTTON-->
                            <button type="button"
                                class="btn btn-dark mt-4 text-white float-start back mt-0 rounded-3">Go
                                Back</button>
                            <button onclick="showLoader()" type="submit"
                                class="finalcontinue btn btn-primary float-end next mt-4 confirm">Continue</button>

                            <!-- /NEXT BUTTON-->
                        </div>
                        <!-- /col -->
                    </div>
                    <br>
                    <div class="is_loading" id="preloader"><i>.</i><i>.</i><i>.</i></div>
                    <br>

                </form>
                <!-- /main content -->
            </div>
            <!-- /container -->
        </section>
        <!-- /section -->

    </div>
</div>
<!-- pickdate -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="{{ asset('public/js/zan/dist/zangdar.min.js')}}"></script> --}}
<script type="text/javascript">
    $('.is_loading').hide();
    $('.finalcontinue').hide();
    var prod_data;
    $(document).ready(function() {
        var stepCount = 0;
        var principal = 0;
        var rate = 0;
        var duration = document.getElementById('slider_input');
        var principalVal = document.getElementById('amountInput');
        var principalText = document.getElementById('principalText');
        var loanProdValidText = document.getElementById('loanProdValidText');

        var selectedLoanProduct = null;
        duration = 1;

        $(".form-business").hide();
        $("#successMessage").hide();

        $('input[name="loan_type"]').change(function() {
            selectedLoanProduct = $('input[name="loan_type"]:checked').val();
        });

        $(".next").on({
            click: function() {
                stepCount++;
                $("#progressBar").find(".active").next().addClass("active");
                $("#alertBox").addClass("d-none");
                $(this).parents(".row").fadeOut("slow", function() {
                    $(this).next(".row").fadeIn("slow");
                });
            }
        });
        // back button
        $(".back").on({
            click: function() {
                $("#progressBar .active").last().removeClass("active");
                $(this).parents(".row").fadeOut("slow", function() {
                    $(this).prev(".row").fadeIn("slow");
                });
            }
        });
        //finish button
        $(".submit-button").on({
            click: function() {
                $("#wizardRow").fadeOut(300);
                $(this).parents(".row").children("#successForm").fadeOut(300);
                $(this).parents(".row").children("#successMessage").fadeIn(3000);
            }
        });

        //Active card on click function
        $(".card").on({
            click: function() {
                $(this).toggleClass("active-card");
                $(this).parent(".col").siblings().children(".card").removeClass("active-card");
            }
        });

        //back to wizard
        $(".back-to-wizard").on({
            click: function() {
                location.reload(true);
            }
        });
    });

    const slider_input = document.getElementById('slider_input'),
        slider_thumb = document.getElementById('slider_thumb'),
        slider_line = document.getElementById('slider_line');

    function showSliderValue() {
        slider_thumb.innerHTML = slider_input.value;
        const bulletPosition = (slider_input.value / slider_input.max),
            space = slider_input.offsetWidth - slider_thumb.offsetWidth;

        slider_thumb.style.left = (bulletPosition * space) + 'px';
        slider_line.style.width = slider_input.value + '%';
    }

    showSliderValue();
    window.addEventListener("resize", showSliderValue);
    slider_input.addEventListener('input', showSliderValue, false);


    function selectCard(selectedLabel) {

        $('.finalcontinue').show();
        // Get the value of the selected radio button
        var selectedRadioButton = selectedLabel.querySelector('input[type="radio"]');
        var selectedLoanProductID = selectedRadioButton.value;

        // Make an AJAX request to the server to get details
        fetch(`api/get-loan-product-details/${selectedLoanProductID}`)
            .then(response => response.json())
            .then(data => {
                // console.log(data); // Display the details in the console
                // Update the UI with the retrieved details
                updateUI(data);
            })
            .catch(error => {
                console.error('Error fetching loan product details:', error);
            });

        // Remove the 'selected-card' class from all labels
        var labels = document.querySelectorAll('.card');
        labels.forEach(function (label) {
            label.classList.remove('selected-card');
        });

        // Add the 'selected-card' class to the clicked label
        selectedLabel.classList.add('selected-card');
    }

    function updateUI(data) {
        // update sliders
        $('#slidatious').attr('max', data.max_principal_amount);
        $('#slidatious').attr('min', data.min_principal_amount);
        $('#update_side').attr('max', data.max_principal_amount);
        $('#update_side').attr('min', data.min_principal_amount);

        $('#durationInput').attr('max', data.max_loan_duration);
        $('#durationInput').attr('min', data.min_loan_duration);

        // Calculate CRB - Loan Formulae
        principal = $('#slidatious').val();
        rate = data.def_loan_interest / 100;
        duration = $('#durationInput').val();

        var my_returns = (parseInt(principal) * rate) * parseInt(duration) + parseInt(principal);
        // Update a display element with the current value
        $('#payback_value').text(my_returns.toFixed(2));
        $('#monthly_repay').text(my_returns.toFixed(2) / duration);

        // Get the current date
        var currentDate = new Date();
        // Add 30 days to the current date
        var futureDate = new Date(currentDate.getTime() + (30 * 24 * 60 * 60 * 1000));
        $('#nxt_repay_date').text(futureDate);

        if(data.services_fees !== undefined){
            data.services_fees.forEach(element => {
                $('#service_charge').text(data.services_fees.service_charge
                .name + ' ' + data.services_fees.service_charge
                .value);
            });
        }

        prod_data = data;
    }

    function decreaseDuration() {
        if(rate !== null){
            var currentValue = $('#durationInput').val();
            var numericValue = parseInt(currentValue);
            if (numericValue > 1) {
                var newValue = numericValue - 1;
                $('#durationInput').val(newValue);
                var my_returns = (parseInt(principal) * rate) * parseInt(newValue) + parseInt(principal);
                $('#payback_value').text(my_returns.toFixed(2));
                $('#monthly_repay').text(my_returns.toFixed(2) / newValue);
            }
        }else{
            alert('Please choose a loan type');
        }
    }

    function increaseDuration() {
        if (rate !== null) {
            var currentValue = $('#durationInput').val();
            var numericValue = parseInt(currentValue);
            var newValue = numericValue + 1;

            // Check if the new value exceeds the max limit
            if (newValue <= 60) {
                $('#durationInput').val(parseInt(newValue));
                var my_returns = (parseInt(principal) * rate) * parseInt(newValue) + parseInt(principal);
                $('#payback_value').text(my_returns.toFixed(2));
                $('#monthly_repay').text((my_returns.toFixed(2) / newValue).toFixed(2));
            } else {
                alert('The maximum duration is 60.');
            }
        } else {
            alert('Please choose a loan type');
        }
    }

    function showLoader(){
        $('.is_loading').show();
    }

    // Event listener for range input changes
    function updateOutputValue(value) {
        var duration = $('#durationInput').val();
        var my_returns = (parseInt(value) * rate) * parseInt(duration) + parseInt(value);
        $('#payback_value').text(my_returns.toFixed(2));
        $('#monthly_repay').text(my_returns.toFixed(2) / duration);
        // checker(); // Call your checker function
    }

    // Event listener for number input changes
    function updateRangeValue(value) {
        var duration = $('#durationInput').val();
        var my_returns = (parseInt(value) * rate) * parseInt(duration) + parseInt(value);
        $('#payback_value').text(my_returns.toFixed(2));
        $('#monthly_repay').text(my_returns.toFixed(2) / duration);
        // checker(); // Call your checker function
    }
    // Get all elements with the specified class
    var svgContainers = document.querySelectorAll('.svg-container');

    // Loop through each container
    svgContainers.forEach(function(svgContainer) {
        // Find the first child which should be the SVG element
        var svgElement = svgContainer.firstElementChild;

        // Set the desired width and height
        var newWidth = 40; // Replace with your desired width
        var newHeight = 40; // Replace with your desired height

        // Check if the SVG element exists
        if (svgElement) {
            // Traverse the SVG's child elements to set width and height attributes
            Array.from(svgElement.children).forEach(function(child) {
                child.setAttribute('width', newWidth);
                child.setAttribute('height', newHeight);
            });

            // Set the width and height attributes of the SVG itself
            svgElement.setAttribute('width', newWidth);
            svgElement.setAttribute('height', newHeight);
        }
    });
</script>
</div>
