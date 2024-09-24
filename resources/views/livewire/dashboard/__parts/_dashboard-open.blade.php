<div class="grid grid-cols-1 gap-4">
    <div style="background: #d7b3ff;" class="p-10 shadow-lg rounded-2xl">
        <div class="relative flex px-10 mt-10">
            <div class="flex items-center justify-between gap-5">
                <div class="relative">
                    <img src="public/app/img/welcome.jpg" width="300" class="" alt="">
                    {{-- <span class="absolute w-5 h-5 rounded-full bg-success bottom-2 ltr:right-4 rtl:left-4"></span> --}}
                </div>
            </div>
            <div class="items-start justify-between p-4 md:flex-row gap-7">
                <div class="mt-4 shrink-0">
                    <div>
                        <h5 class="text-4xl font-bold text-white">Welcome to </h5>
                        {{-- <p class="text-muted dark:text-darkmuted">Manage your loan</p> --}}
                    </div>
                </div>
                <div class="px-8 ml-4">
                    <h3 class="text-4xl font-bold text-white">Capex</h3>
                    <h3 class="text-4xl font-bold text-white">manage your Loans</h3>
                    <p class="max-w-4xl mt-2 text-base text-white dark:text-darkmuted">
                        Here you can feel free and enjoy the amazing life with Capex
                    </p>
                    <a href="{{ route('form') }}" class="shadow-lg inline-flex mt-6 px-4 align-middle bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                        <p class="w-12 h-12 py-3 align-middle ltr:rounded-l rtl:rounded-r bg-opacity-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 mx-auto">
                                <path d="M4.00098 20V14C4.00098 9.58172 7.5827 6 12.001 6C16.4193 6 20.001 9.58172 20.001 14V20H21.001V22H3.00098V20H4.00098ZM6.00098 20H18.001V14C18.001 10.6863 15.3147 8 12.001 8C8.68727 8 6.00098 10.6863 6.00098 14V20ZM11.001 2H13.001V5H11.001V2ZM19.7792 4.80761L21.1934 6.22183L19.0721 8.34315L17.6578 6.92893L19.7792 4.80761ZM2.80859 6.22183L4.22281 4.80761L6.34413 6.92893L4.92991 8.34315L2.80859 6.22183ZM7.00098 14C7.00098 11.2386 9.23956 9 12.001 9V11C10.3441 11 9.00098 12.3431 9.00098 14H7.00098Z" fill="currentColor"></path>
                            </svg>
                        </p>
                        <span class="px-2.5 font-bold text-lg leading-[2.8]">Payback Loan Application (Active Loan)</span>
                    </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>