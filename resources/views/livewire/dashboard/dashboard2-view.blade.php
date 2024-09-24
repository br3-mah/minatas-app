<div x-data="modals" class="h-[calc(100vh-60px)]  relative overflow-y-auto overflow-x-hidden p-4 space-y-4 detached-content">
    <!-- Start Breadcrumb -->
    <div>
        <nav class="w-full">
            <ul class="space-y-2 detached-breadcrumb">
                <li class="text-xs dark:text-white/80">Hi {{ auth()->user()->fname }} Welcome  </li>
                <li class="text-xl font-semibold text-black dark:text-white">Dashboard</li>
            </ul>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
        @if ($my_loan)
            {{-- Have application  --}}
            @if ($my_loan->complete == 1)
                @if ($my_loan->status == 1)
                    @include('livewire.dashboard.__parts._dashboard-repayment')
                @elseif($my_loan->status == 3)
                    @include('livewire.dashboard.__parts._dashboard-pending')
                @endif
            @else
                @include('livewire.dashboard.__parts._dashboard-resume')
            @endif
        @else
            {{-- Dont have application  --}}
            @if ($my_loan->status == 1)
                @include('livewire.dashboard.__parts._dashboard-open')
            @else
                @include('livewire.dashboard.__parts._dashboard-new')
            @endif
        @endif

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <a href="{{ route('kyc-update', ['view' => 'kyc'])  }}" class="relative p-4 text-center text-white border rounded-2xl border-purple bg-purple" x-show="showElement" x-data="{ showElement: true }">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 mx-auto">
                        <path d="M4.00098 20V14C4.00098 9.58172 7.5827 6 12.001 6C16.4193 6 20.001 9.58172 20.001 14V20H21.001V22H3.00098V20H4.00098ZM6.00098 20H18.001V14C18.001 10.6863 15.3147 8 12.001 8C8.68727 8 6.00098 10.6863 6.00098 14V20ZM11.001 2H13.001V5H11.001V2ZM19.7792 4.80761L21.1934 6.22183L19.0721 8.34315L17.6578 6.92893L19.7792 4.80761ZM2.80859 6.22183L4.22281 4.80761L6.34413 6.92893L4.92991 8.34315L2.80859 6.22183ZM7.00098 14C7.00098 11.2386 9.23956 9 12.001 9V11C10.3441 11 9.00098 12.3431 9.00098 14H7.00098Z" fill="currentColor"></path>
                    </svg>
                </span>
                <p class="mt-3 text-lg">KYC</p>
                <p class="mt-2">Update and complete KYC.</p>
            </a>
            <a href="{{ route('history')  }}" class="relative p-4 text-center text-white border rounded-2xl border-success bg-success" x-show="showElement" x-data="{ showElement: true }">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 mx-auto">
                        <path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z" fill="currentColor"></path>
                    </svg>
                </span>
                <p class="mt-3 text-lg">Loan History</p>
                <p class="mt-2">My loan application history.</p>
            </a>
            <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="relative p-4 text-center text-white border rounded-2xl border-warning bg-warning" x-show="showElement" x-data="{ showElement: true }">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 mx-auto">
                        <path d="M12.865 3.00017L22.3912 19.5002C22.6674 19.9785 22.5035 20.5901 22.0252 20.8662C21.8732 20.954 21.7008 21.0002 21.5252 21.0002H2.47266C1.92037 21.0002 1.47266 20.5525 1.47266 20.0002C1.47266 19.8246 1.51886 19.6522 1.60663 19.5002L11.1329 3.00017C11.4091 2.52187 12.0206 2.358 12.4989 2.63414C12.651 2.72191 12.7772 2.84815 12.865 3.00017ZM4.20471 19.0002H19.7932L11.9989 5.50017L4.20471 19.0002ZM10.9989 16.0002H12.9989V18.0002H10.9989V16.0002ZM10.9989 9.00017H12.9989V14.0002H10.9989V9.00017Z" fill="currentColor"></path>
                    </svg>
                </span>
                <p class="mt-3 text-lg">Make Repayments</p>
                <p class="mt-2">View repayment transactions.</p>
            </a>
            <a href="{{ route('support', ['view'=>'issue']) }}" class="relative p-4 text-center text-white border rounded-2xl bg-info/50" x-show="showElement" x-data="{ showElement: true }">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 mx-auto">
                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 7H13V9H11V7ZM11 11H13V17H11V11Z" fill="currentColor"></path>
                    </svg>
                </span>
                <p class="mt-3 text-lg">Support</p>
                <p class="mt-2">Report an issue.</p>
            </a>
        </div>
    </div>


    <!-- Start All Card -->
    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    
            <!-- Recent Loan Applications -->
            <div class="gap-6 bg-white rounded-lg dark:bg-darklight border-black/10 dark:border-darkborder">
                <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">My Recent Loan Applications</h2>
                <div class="flex flex-col gap-4">
                    @if (!empty($this->all_applications()->toArray()))
                        @foreach ($this->all_applications()->take(5) as $application)
                            <div class="p-4 bg-gray-100 rounded-lg dark:bg-gray-800">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Loan #{{ $application->id }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $application->loan_product->name }}</p>
                                    </div>
                                    <span class="text-sm font-bold text-blue-600 dark:text-blue-400">K{{ number_format($application->amount, 2) }}</span>
                                </div>
                                <div class="mt-2">
                                    @switch($application->status)
                                        @case(0)
                                            <span class="px-2 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-full dark:bg-yellow-500/10">Pending</span>
                                            @break
                                        @case(1)
                                            <span class="px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full dark:bg-green-500/10">Open</span>
                                            @break
                                        @case(2)
                                            <span class="px-2 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-full dark:bg-yellow-500/10">Pending (Processing)</span>
                                            @break
                                        @case(3)
                                            <span class="px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded-full dark:bg-red-500/10">Rejected</span>
                                            @break
                                        @case(4)
                                            <span class="px-2 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded-full dark:bg-blue-500/10">Incomplete KYC</span>
                                            @break
                                        @default
                                            <span class="px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full dark:bg-gray-500/10">Hold</span>
                                    @endswitch
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600 dark:text-gray-400">You have no loan applications.</p>
                    @endif
                </div>
            </div>
    
            <!-- Recent Loan Repayments -->
            <div class="gap-6 p-5 bg-white rounded-lg dark:bg-darklight border-black/10 dark:border-darkborder">
                <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">My Recent Loan Repayments</h2>
                <div class="flex flex-col gap-4">
                    @if (!empty($this->all_transactions()->toArray()))
                        @foreach ($this->all_transactions()->take(5) as $repayment)
                            <div class="p-4 bg-gray-100 rounded-lg dark:bg-gray-800">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Loan #{{ $repayment->id }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Principal: K{{ number_format($repayment->amount, 2) }}</p>
                                    </div>
                                    <span class="text-sm font-bold text-green-600 dark:text-green-400">{{ $repayment->created_at->toFormattedDateString() }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="py-20 my-10 text-gray-600 dark:text-gray-400">You have no recent loan repayments.</p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    

    
    @include('components.continue-application')
</div>
