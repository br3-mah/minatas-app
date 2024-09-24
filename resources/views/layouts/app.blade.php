<!DOCTYPE html>
@include('layouts.parts.php')
<html lang="en" dir="ltr" x-data="{ direction: 'ltr' }" x-bind:dir="direction">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="SRBThemes" />
    <!-- Site Tiltle -->
    <title>My Capex App </title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="public/app/img/fav.png">
    <!-- Style Css -->
    <link rel="stylesheet" href="public/app/assets/css/style.css">
    @livewireStyles
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">

    <!-- Start Layout -->
    <div class="bg-[#f9fbfd] dark:bg-dark text-black">
        <!-- Start detached bg -->
        <div class="bg-[url('../images/bg-main.png')] bg-black min-h-[220px] sm:min-h-[250px] bg-bottom fixed hidden w-full -z-50 detached-img"></div>
        <!-- End detached bg -->

        <!-- Start Menu Sidebar Olverlay -->
        <div x-cloak class="fixed inset-0 bg-black/60 dark:bg-dark/90 z-[999] lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
        <!-- End Menu Sidebar Olverlay -->

        <!-- Start Main Content -->
        <div class="flex mx-auto main-container">
            <!-- Start Sidebar -->
            <nav class="sidebar fixed z-[9999] flex-none w-[240px] ltr:border-r rtl:border-l dark:bg-darkborder border-black/10 transition-all duration-300 overflow-hidden">
                <div class="h-full bg-white dark:bg-darklight">
                    <div class="p-4">
                        <a href="index.php" class="w-full main-logo">
                            <img src="public/app/img/logo-2.png" class="mx-auto dark-logo h-7 logo dark:hidden" alt="logo" />
                            <img src="public/app/img/logo-2.png" class="hidden mx-auto light-logo h-7 logo dark:block" alt="logo" />
                            <img src="public/app/img/logo-2.png" class="hidden mx-auto logo-icon h-7" alt="">
                        </a>
                    </div>
                    <div class="h-[calc(100vh-60px)]  overflow-y-auto overflow-x-hidden px-5 pb-4 space-y-16 detached-menu">
                        <ul class="relative flex flex-col gap-1 " x-data="{ activeMenu: 'dashboard' }">
                            <h2 class="my-2 text-sm text-black/50 dark:text-white/30"><span>Dashboard</span></h2>
                            <li class="menu nav-item">
                                <a href="{{ route('dashboard') }}" class="items-center justify-between text-black nav-link group active" :class="{'active' : activeMenu === 'dashboard'}" @click="activeMenu === 'dashboard' ? activeMenu = null : activeMenu = 'dashboard'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM15.8329 7.33748C16.0697 7.17128 16.3916 7.19926 16.5962 7.40381C16.8002 7.60784 16.8267 7.92955 16.6587 8.16418C14.479 11.2095 13.2796 12.8417 13.0607 13.0607C12.4749 13.6464 11.5251 13.6464 10.9393 13.0607C10.3536 12.4749 10.3536 11.5251 10.9393 10.9393C11.3126 10.5661 12.9438 9.36549 15.8329 7.33748ZM17.5 11C18.0523 11 18.5 11.4477 18.5 12C18.5 12.5523 18.0523 13 17.5 13C16.9477 13 16.5 12.5523 16.5 12C16.5 11.4477 16.9477 11 17.5 11ZM6.5 11C7.05228 11 7.5 11.4477 7.5 12C7.5 12.5523 7.05228 13 6.5 13C5.94772 13 5.5 12.5523 5.5 12C5.5 11.4477 5.94772 11 6.5 11ZM8.81802 7.40381C9.20854 7.79433 9.20854 8.4275 8.81802 8.81802C8.4275 9.20854 7.79433 9.20854 7.40381 8.81802C7.01328 8.4275 7.01328 7.79433 7.40381 7.40381C7.79433 7.01328 8.4275 7.01328 8.81802 7.40381ZM12 5.5C12.5523 5.5 13 5.94772 13 6.5C13 7.05228 12.5523 7.5 12 7.5C11.4477 7.5 11 7.05228 11 6.5C11 5.94772 11.4477 5.5 12 5.5Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Home</span>
                                    </div>
                                </a>
                            </li>
                            <h2 class="my-2 text-sm text-black/50 dark:text-white/30"><span>My Loans</span></h2>
                            <li class="menu nav-item">
                                <a href="{{ route('view-loan-requests') }}" class="items-center justify-between text-black nav-link group" :class="{'active' : activeMenu === 'apps'}" @click="activeMenu === 'apps' ? activeMenu = null : activeMenu = 'apps'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M7.5 11.5C5.01472 11.5 3 9.48528 3 7C3 4.51472 5.01472 2.5 7.5 2.5C9.98528 2.5 12 4.51472 12 7C12 9.48528 9.98528 11.5 7.5 11.5ZM7.5 21.5C5.01472 21.5 3 19.4853 3 17C3 14.5147 5.01472 12.5 7.5 12.5C9.98528 12.5 12 14.5147 12 17C12 19.4853 9.98528 21.5 7.5 21.5ZM17.5 11.5C15.0147 11.5 13 9.48528 13 7C13 4.51472 15.0147 2.5 17.5 2.5C19.9853 2.5 22 4.51472 22 7C22 9.48528 19.9853 11.5 17.5 11.5ZM17.5 21.5C15.0147 21.5 13 19.4853 13 17C13 14.5147 15.0147 12.5 17.5 12.5C19.9853 12.5 22 14.5147 22 17C22 19.4853 19.9853 21.5 17.5 21.5ZM7.5 9.5C8.88071 9.5 10 8.38071 10 7C10 5.61929 8.88071 4.5 7.5 4.5C6.11929 4.5 5 5.61929 5 7C5 8.38071 6.11929 9.5 7.5 9.5ZM7.5 19.5C8.88071 19.5 10 18.3807 10 17C10 15.6193 8.88071 14.5 7.5 14.5C6.11929 14.5 5 15.6193 5 17C5 18.3807 6.11929 19.5 7.5 19.5ZM17.5 9.5C18.8807 9.5 20 8.38071 20 7C20 5.61929 18.8807 4.5 17.5 4.5C16.1193 4.5 15 5.61929 15 7C15 8.38071 16.1193 9.5 17.5 9.5ZM17.5 19.5C18.8807 19.5 20 18.3807 20 17C20 15.6193 18.8807 14.5 17.5 14.5C16.1193 14.5 15 15.6193 15 17C15 18.3807 16.1193 19.5 17.5 19.5Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">All Applications</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu nav-item">
                                <a href="{{ route('history') }}" class="nav-link group" :class="{'active' : activeMenu === 'chart'}">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M9 2.4578V4.58152C6.06817 5.76829 4 8.64262 4 12C4 16.4183 7.58172 20 12 20C15.3574 20 18.2317 17.9318 19.4185 15H21.5422C20.2679 19.0571 16.4776 22 12 22C6.47715 22 2 17.5228 2 12C2 7.52236 4.94289 3.73207 9 2.4578ZM12 2C17.5228 2 22 6.47715 22 12C22 12.3375 21.9833 12.6711 21.9506 13H11V2.04938C11.3289 2.01672 11.6625 2 12 2ZM13 4.06189V11H19.9381C19.4869 7.38128 16.6187 4.51314 13 4.06189Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Loans History</span>
                                    </div>
                                </a>
                            </li>
                            <h2 class="my-2 text-sm text-black/50 dark:text-white/30"><span>My Transactions</span></h2>
                            {{-- <li class="menu nav-item">
                                <a href="{{ route('transactions') }}" class="items-center justify-between text-black nav-link group" :class="{'active' : activeMenu === 'forms'}" @click="activeMenu === 'forms' ? activeMenu = null : activeMenu = 'forms'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Transactions</span>
                                    </div>
                                </a>
                            </li> --}}
                            <li class="menu nav-item">
                                <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="items-center justify-between text-black nav-link group" :class="{'active' : activeMenu === 'forms'}" @click="activeMenu === 'forms' ? activeMenu = null : activeMenu = 'forms'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Repayments</span>
                                    </div>
                                </a>
                            </li>
                            {{-- <li class="menu nav-item">
                                <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="items-center justify-between text-black nav-link group" :class="{'active' : activeMenu === 'forms'}" @click="activeMenu === 'forms' ? activeMenu = null : activeMenu = 'forms'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Bill Payments</span>
                                    </div>
                                </a>
                            </li> --}}
                            {{-- <li class="menu nav-item">
                                <a href="javaScript:;" class="items-center justify-between text-black nav-link group" :class="{'active' : activeMenu === 'forms'}" @click="activeMenu === 'forms' ? activeMenu = null : activeMenu = 'forms'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Savings & Investment</span>
                                    </div>
                                </a>
                            </li> --}}


                        </ul>
                        {{-- <div class="relative p-4 pt-0 text-center rounded-md bg-purple help-box">
                            <div class="relative -top-6">
                                <span class="text-black mx-auto border border-black/10 shadow-[0_0.75rem_1.5rem_rgba(18,38,63,.03)]  bg-white flex items-center justify-center h-12 w-12 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 15H13V17H11V15ZM13 13.3551V14H11V12.5C11 11.9477 11.4477 11.5 12 11.5C12.8284 11.5 13.5 10.8284 13.5 10C13.5 9.17157 12.8284 8.5 12 8.5C11.2723 8.5 10.6656 9.01823 10.5288 9.70577L8.56731 9.31346C8.88637 7.70919 10.302 6.5 12 6.5C13.933 6.5 15.5 8.067 15.5 10C15.5 11.5855 14.4457 12.9248 13 13.3551Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </div>
                            <h4 class="text-xl text-white">Help Center</h4>
                            <p class="mt-4 text-white/70">Looks like there might be a new theme soon.</p>
                            <div class="mt-5">
                                <a href="javascript:;" class="btn-white">Go to help</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </nav>
            <!-- End sidebar -->

            <!-- Start Content Area -->
            <div class="flex-1 main-content">
                <!-- Start Topbar -->
                <div class="bg-white dark:bg-darklight dark:border-darkborder flex gap-4 lg:z-10 items-center justify-between px-4 h-[60px] border-b border-black/10 detached-topbar relative">
                    <div class="flex items-center flex-1 gap-2 sm:gap-4">
                        <button type="button" class="text-black dark:text-white/80" @click="$store.app.toggleSidebar()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        {{-- <form class="flex-1 hidden min-[420px]:block">
                            <div class="relative max-w-[180px] md:max-w-[350px]">
                                <input type="text" id="search" class="border-black/10 dark:text-white/80 dark:placeholder:text-white/30 dark:border-darkborder dark:bg-dark dark:focus:border-white/30 focus:border-black/30 placeholder:text-black/50 border text-black text-sm rounded block w-full ltr:pl-3 rtl:pr-3 ltr:pr-7 rtl:pl-7 h-10 bg-[#f9fbfd] focus:ring-0 focus:outline-0" placeholder="Search..." required="">
                                <button type="button" class="absolute inset-y-0 flex items-center text-black ltr:right-0 rtl:left-0 ltr:pr-2 rtl:pl-2 dark:text-white/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                        </form> --}}
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="h-5" x-data="{ fullScreen: false }">
                            <button class="text-black dark:text-white/80" x-cloak x-bind:class="{ 'hidden': fullScreen, 'block': !fullScreen }" x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path d="M16 3H22V9H20V5H16V3ZM2 3H8V5H4V9H2V3ZM20 19V15H22V21H16V19H20ZM4 19H8V21H2V15H4V19Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <button class="text-black dark:text-white/80" x-cloak x-bind:class="{ 'block': fullScreen, 'hidden': !fullScreen }" x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path d="M18 7H22V9H16V3H18V7ZM8 9H2V7H6V3H8V9ZM18 17V21H16V15H22V17H18ZM8 15V21H6V17H2V15H8Z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <a href="javascript:;" class="text-black" x-cloak x-show="$store.app.mode === 'light'" @click="$store.app.toggleMode('dark')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path d="M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z" fill="currentColor"></path>
                                </svg>
                            </a>
                            <a href="javascript:;" class="text-black dark:text-white/80" x-cloak x-show="$store.app.mode === 'dark'" @click="$store.app.toggleMode('light')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z" fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="h-5 notification" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="relative text-black dark:text-white/80" @click="toggle()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto">
                                    <path d="M5 18H19V11.0314C19 7.14806 15.866 4 12 4C8.13401 4 5 7.14806 5 11.0314V18ZM12 2C16.9706 2 21 6.04348 21 11.0314V20H3V11.0314C3 6.04348 7.02944 2 12 2ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z" fill="currentColor"></path>
                                </svg>
                                <span class="absolute w-2 h-2 border border-white rounded-full -top-px ltr:right-px rtl:left-px bg-purple"></span>
                            </button>
                            <div class="noti-area" x-cloak x-show="open" x-transition x-transition.duration.300ms>
                                <h4 class="text-black dark:text-white/80 px-2 py-2.5 border-b border-black/10 flex items-center gap-2">Notification <span class="inline-block bg-purple/10 text-purple text-[10px] p-1 leading-none rounded">{{ auth()->user()->unreadNotifications->count() }}</span></h4>
                                <ul class="overflow-y-auto max-h-56">
                                    @forelse (auth()->user()->unreadNotifications as $note)
                                    <li>
                                        <div class="flex gap-2 cursor-pointer group" x-show="showElement" x-data="{ showElement: true }" x-transition x-transition.duration.300ms>
                                            <div class="flex-none overflow-hidden rounded-full h-9 w-9">
                                                <img src="public/app/assets/images/avatar-1.png" class="object-cover" alt="avatar" />
                                            </div>
                                            <div class="relative flex-1">
                                                <h5 class="mb-1">{{ $note->data['name'] }}</h5>
                                                <p class="whitespace-nowrap overflow-hidden text-ellipsis w-[185px] text-black dark:text-white ltr:pr-4 rtl:pl-4">{{ $note->data['msg'] }}</p>
                                                <p class="text-xs text-black/40 dark:text-darkmuted">{{ $note->created_at->toFormattedDateString() }}</p>
                                                <a href="{{ route('notifications') }}" x-on:click="showElement = false" class="absolute hidden transition-all duration-300 rotate-0 ltr:right-0 rtl:left-0 top-1 dark:text-white/80 group-hover:block hover:opacity-80 hover:rotate-180">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5">
                                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @empty

                                    <li>
                                        <div class="flex gap-2 cursor-pointer group" x-show="showElement" x-data="{ showElement: true }" x-transition x-transition.duration.300ms>
                                            <div class="relative flex-1">
                                                <p class="whitespace-nowrap overflow-hidden text-ellipsis w-[185px] text-black dark:text-white ltr:pr-4 rtl:pl-4">No Notifications Available.</p>

                                            </div>
                                        </div>
                                    </li>
                                    @endforelse
                                </ul>
                                <div class="px-2 py-2.5 border-t border-black/10 dark:border-darkborder">
                                    <a href="{{ route('notifications') }}" class="text-black duration-300 dark:text-white dark:hover:text-purple hover:text-purple">Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 inline-block relative -top-[1px] rtl:rotate-180">
                                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z" fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="profile" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="flex items-center gap-1.5 xl:gap-0 dark:text-white/80" @click="toggle()">
                                @if (!empty(auth()->user()->photos->toArray()))
                                    @if (auth()->user()->photos[0]->source == 'admin')
                                        <img class="rounded-full h-7 w-7 ltr:xl:mr-2 rtl:xl:ml-2" src="{{ url('public/storage/' . auth()->user()->photos[0]->path) }}" alt="{{ auth()->user()->fname[0] }}" />
                                    @else
                                        <img class="rounded-full h-7 w-7 ltr:xl:mr-2 rtl:xl:ml-2" src="{{ 'https://app.capexfinancialservices.org/' . auth()->user()->photos[0]->path }}" alt="{{ auth()->user()->fname[0] }}" />
                                    @endif
                                @else
                                    <img class="rounded-full h-7 w-7 ltr:xl:mr-2 rtl:xl:ml-2" src="public/app/img/user.avif" alt="{{ auth()->user()->fname[0] }}" />
                                @endif
                                <span class="hidden fw-medium xl:block dark:text-white/80">{{ auth()->user()->fname.' '.auth()->user()->lname[0] }}.</span>
                                <svg class="w-4 h-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.70711 11.2929C6.51957 11.1054 6.26522 11 6 11C5.73478 11 5.48043 11.1054 5.29289 11.2929C5.10536 11.4804 5 11.7348 5 12C5 12.2652 5.10536 12.5196 5.29289 12.7071L15.2929 22.7071C15.6834 23.0976 16.3166 23.0976 16.7071 22.7071L26.7071 12.7071C26.8946 12.5196 27 12.2652 27 12C27 11.7348 26.8946 11.4804 26.7071 11.2929C26.5196 11.1054 26.2652 11 26 11C25.7348 11 25.4804 11.1054 25.2929 11.2929L16 20.5858L6.70711 11.2929Z" fill="currentColor" />
                                </svg>
                            </button>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms>
                                <li>
                                    <a href="{{ route('my-profile', ['view' => 'profile']) }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                            <path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" fill="currentColor"></path>
                                        </svg>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                            <path d="M6.17071 18C6.58254 16.8348 7.69378 16 9 16C10.3062 16 11.4175 16.8348 11.8293 18H22V20H11.8293C11.4175 21.1652 10.3062 22 9 22C7.69378 22 6.58254 21.1652 6.17071 20H2V18H6.17071ZM12.1707 11C12.5825 9.83481 13.6938 9 15 9C16.3062 9 17.4175 9.83481 17.8293 11H22V13H17.8293C17.4175 14.1652 16.3062 15 15 15C13.6938 15 12.5825 14.1652 12.1707 13H2V11H12.1707ZM6.17071 4C6.58254 2.83481 7.69378 2 9 2C10.3062 2 11.4175 2.83481 11.8293 4H22V6H11.8293C11.4175 7.16519 10.3062 8 9 8C7.69378 8 6.58254 7.16519 6.17071 6H2V4H6.17071ZM9 6C9.55228 6 10 5.55228 10 5C10 4.44772 9.55228 4 9 4C8.44772 4 8 4.44772 8 5C8 5.55228 8.44772 6 9 6ZM15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13ZM9 20C9.55228 20 10 19.5523 10 19C10 18.4477 9.55228 18 9 18C8.44772 18 8 18.4477 8 19C8 19.5523 8.44772 20 9 20Z" fill="currentColor"></path>
                                        </svg>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('kyc-update', ['view' => 'kyc'])  }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                            <path d="M5.45455 15L1 18.5V3C1 2.44772 1.44772 2 2 2H17C17.5523 2 18 2.44772 18 3V15H5.45455ZM4.76282 13H16V4H3V14.3851L4.76282 13ZM8 17H18.2372L20 18.3851V8H21C21.5523 8 22 8.44772 22 9V22.5L17.5455 19H9C8.44772 19 8 18.5523 8 18V17Z" fill="currentColor"></path>
                                        </svg>
                                        KYC Update
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                            <path d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z" fill="currentColor"></path>
                                        </svg>
                                        Repayments
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                            <path d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z" fill="currentColor"></path>
                                        </svg>
                                        Support
                                    </a>
                                </li> --}}
                                <li class="block h-px my-1 bg-black/5 dark:bg-darkborder"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" x-data class="inline-block">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-2 text-black transition-all duration-300 dark:text-white hover:text-purple">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path>
                                            </svg>
                                            Sign Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Start Content -->
                {{  $slot  }}

                @if($status == 1)
                    @include('components.continue-application')
                    @include('components.email-docs')
                @endif
                <!-- End Content -->
            </div>
            @stack('modals')

            @livewireScripts
            <!-- End Content Area -->
        </div>
    </div>
    <!-- End Layout -->
    <!-- All javascirpt -->
    <!-- Alpine js -->
    <script src="public/app/assets/js/alpine-collaspe.min.js"></script>
    <script src="public/app/assets/js/alpine-persist.min.js"></script>
    <script src="public/app/assets/js/alpine.min.js" defer></script>

    <!-- Chart Js -->
    {{-- <script src="public/app/assets/js/apexcharts.js"></script> --}}
    {{-- <script src="public/app/assets/js/appexchart-app.js"></script> --}}

    <!-- Custom js -->
    <script src="public/app/assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Get the current URL
        var currentUrl = window.location.href;

        // Extract the route name from the URL
        var route = currentUrl.split('/').pop();

        // Input Masks
        $("#phone").on("keypress", function(e) {
            if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                return false; // Block non-numeric input
            }
        });$("#phone").on("input", function() {
            let phoneValue = $(this).val().replace(/\D/g, ''); // Remove non-digits

            if (phoneValue.length > 10) {
                phoneValue = phoneValue.slice(0, 10); // Limit to 10 digits
            }

            // Format the phone number
            if (phoneValue.length > 3 && phoneValue.length <= 6) {
                phoneValue = phoneValue.slice(0, 3) + '-' + phoneValue.slice(3);
            } else if (phoneValue.length > 6) {
                phoneValue = phoneValue.slice(0, 3) + '-' + phoneValue.slice(3, 6) + '-' + phoneValue.slice(6);
            }

            $(this).val(phoneValue);

            if (phoneValue.replace(/\D/g, '').length < 10) {
                $(this).css("border-color", "red");
            } else {
                $(this).css("border-color", "");
            }
        });
        $("#phone").on("keypress", function(e) {
            if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                return false; // Block non-numeric input
            }
        });
    </script>
</body>

</html>
