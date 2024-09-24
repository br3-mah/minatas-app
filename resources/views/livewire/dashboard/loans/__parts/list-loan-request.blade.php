
<div class="container-fluid search-page bg-white p-4">
    <style>
        .header {
            background-color:#308e87; /* Greenish gradient */
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
        .text-dark {
            color: #000;
        }

    </style>
    <div class="header mb-4">
        <h1 class="title">
            <span>My Loan Requests</span>
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
                    <div class="star-ratings text-dark">
                        <ul class="search-info">
                            <li class=" text-black p-2 rounded" style="color: #000;">K{{ number_format($loan->amount, 2, '.', ',') }}</li>
                            @if($loan->status == 0)
                            <li class="bg-warning p-2 rounded text-white">Pending for Processing</li>
                            @elseif($loan->status == 1)
                            <li class="bg-success p-2 rounded text-white">Active & Open (Pending Repayment)</li>                     
                            @elseif($loan->status == 2)
                            <li class="bg-info p-2 rounded text-white">Under Processing</li> 
                            @elseif($loan->status == 3)
                            <li class="bg-danger p-2 rounded text-white">Rejected</li> 
                            @else
                            @endif
                            <li class=" text-black p-2 rounded" style="color: #000;">Applied On: {{ $loan->created_at->toFormattedDateString() }}</li>
                        </ul>

                    </div>
                </div>
            @empty
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
</div>
