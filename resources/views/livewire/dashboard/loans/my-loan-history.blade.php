
<div class="container-fluid search-page bg-white p-4">
    <style>
        .header {
            background-color:#308e87; /* Base color with transparency *//* Greenish gradient */
            border-radius: 15px; /* Rounded corners */
            padding: 20px;
            backdrop-filter: blur(10px); /* Blurring effect */
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .title {
            font-size: 2rem; /* Adjust as needed */
            color: #db9326; /* Text color */
            display: flex;
            gap: 0.5rem; /* Spacing between elements */
        }
    </style>
    <div class="header mb-4">
        <h1 class="title">
            <span>My Loan History</span>
        </h1>
    </div>

    <div class="search-links tab-pane fade show active" id="all-links" role="tabpanel" aria-labelledby="all-link">
        <div class="row">
            <div class="col-xxl-8 col-xl-6 box-col-12">
            
            @forelse($loan_requests as $loan)
                <div class="info-block">
                    <a href="{{ route('loan-details', ['id' => $loan->id]) }}">K{{ number_format($loan->amount, 2, '.', ',') }}</a>
                    <h6> {{ $loan->loan_product->name ?? 'Personal Loan' }} - {{ $this->get_loan_type($loan->loan_child_type_id)->first()->name }}{{ ' | '. $this->get_loan_category($loan->loan_child_type_id)->first()->name }}</h6>
                    <p> {{ ucwords($loan->loan_product->description) ?? 'Personal Loan' }} {{ $loan->desc ?? '' }} {{ $loan->note ?? '' }} </p>
                    <div class="star-ratings">
                        <ul class="search-info">
                            <li>K{{ number_format($loan->amount, 2, '.', ',') }}</li>
                            @if($loan->status == 0)
                            <li class="bg-warning p-3 rounded"> Pending for Processing</li>
                            @elseif($loan->status == 1)
                            <li class="bg-success p-3 rounded"> Active & Open (Pending Repayment)</li>                     
                            @elseif($loan->status == 2)
                            <li class="bg-info p-3 rounded"> Under Processing</li> 
                            @elseif($loan->status == 3)
                            <li class="bg-danger p-3 rounded">Rejected</li> 
                            @else
                            @endif
                            <li>Applied On: {{ $loan->created_at->toFormattedDateString() }}</li>
                        </ul>
                    </div>
                </div>
            @empty
                <div class="container flex items-center justify-center min-h-screen mt-4">
                    <div class="text-center">
                        <img class="w-[100px] mx-auto" width="300" src="{{ asset('public/minatas/img/no-loan.png')}}" alt="">
                        @role('user')
                        <div class="my-4">
                            <a href="{{ route('form') }}" class="px-4 py-2 font-bold text-white bg-success rounded hover:bg-info">
                                <strong>Loan Application</strong>
                            </a>
                        </div>
                        @endrole
                    </div>
                </div>
            @endforelse
                
            </div>

            {{-- <div class="col-12 m-t-30">
                <nav aria-label="...">
                    <ul class="pagination pagination-primary mt-4">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">2<span class="sr-only">(current)</span></a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>
    </div>












    <!-- Header Section -->
    {{-- <div style="background-color: rgb(2, 3, 129)" class="p-5 flex items-center justify-between text-white">
        <h1 class="text-3xl font-bold flex gap-4" style="color: #db9326">
            <span>My Loan History</span>
        </h1>
    </div> --}}

    <!-- Content Section -->
    {{-- <div class="flex flex-col gap-6 p-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Recent Successful Loans</h2>
        <p class="text-gray-700 dark:text-gray-300">
            Stay up-to-date with your loan applications, current statuses, and deadlines. Manage and track each of your loans with ease.
        </p>
        <!-- Loan List -->
        <div class="space-y-4">
            @forelse($loan_requests as $loan)
            <a href="{{ route('loan-details', ['id' => $loan->id]) }}" class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <div class="flex items-center gap-4">
                    <img src="public/app/img/loan.jpg" alt="Loan Product" class="w-14 h-14 rounded-full object-cover shadow-md">
                    <div class="w-full">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $loan->loan_product->name ?? 'Personal Loan' }}
                            </h3>
                            <span class="text-xl font-bold text-purple-600 dark:text-purple-400">
                                K{{ number_format($loan->amount, 2, '.', ',') }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            {{ $this->get_loan_type($loan->loan_child_type_id)->first()->name }}
                            <br>
                            {{ $this->get_loan_category($loan->loan_child_type_id)->first()->name }}
                        </p>
                        <ul class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400">
                            <li>Applied On: {{ $loan->created_at->toFormattedDateString() }}</li>
                            <li>Due Date: {{ $loan->due_date ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    @if($loan->status == 0)
                    <span class="inline-flex items-center rounded shadow-md shadow-warning/50 text-xs justify-center px-1.5 py-0.5 bg-warning text-white">Pending</span>
                    @elseif($loan->status == 1)
                    <span class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">Approved</span>
                    @elseif($loan->status == 2)
                    <span class="inline-flex items-center rounded shadow-md shadow-warning/20 text-xs justify-center px-1.5 py-0.5 bg-warning text-white">Processing</span>
                    @else
                    <span class="inline-flex items-center rounded shadow-md shadow-danger/50 text-xs justify-center px-1.5 py-0.5 bg-danger text-white">Rejected</span>
                    @endif
                    <a href="{{ route('loan-details', ['id' => $loan->id]) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        View Details
                    </a>
                </div>
            </a>
            @empty
            <!-- Empty State -->
            <div class="flex items-center gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <img src="assets/images/no-loan.png" alt="No Loan Applications" class="w-14 h-14 object-cover rounded-full">
                <div class="flex flex-col">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">No Loan Applications Yet</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Start applying for loans now and secure your financial future.</p>
                </div>
                <button class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-500">Apply Now</button>
            </div>
            @endforelse
        </div>
    </div> --}}
</div>
