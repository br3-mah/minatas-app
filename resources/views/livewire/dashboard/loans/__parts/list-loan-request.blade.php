
<div class="p-4 bg-white container-fluid search-page">
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
    <div class="mb-4 header">
        <h1 class="title">
            <span>My Loan Requests</span>
        </h1>
    </div>

    <div class="search-links tab-pane fade show active" id="all-links" role="tabpanel" aria-labelledby="all-link">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 box-col-12">
            
            @forelse($loan_requests as $loan)
                <div class="info-block">
                    <a class="hover:bg-light-success" href="{{ route('loan-details', ['id' => $loan->id]) }}">K{{ number_format($loan->amount, 2, '.', ',') }}
                    <h6> {{ $loan->loan_product->name ?? 'Personal Loan' }} - {{ $this->get_loan_type($loan->loan_child_type_id)->first()->name }}{{ ' | '. $this->get_loan_category($loan->loan_child_type_id)->first()->name }}</h6>
                    <p> {{ ucwords($loan->loan_product->description) ?? 'Personal Loan' }} {{ $loan->desc ?? '' }} {{ $loan->note ?? '' }} </p>
                    <div class="star-ratings text-dark">
                        <ul class="search-info">
                            <li class="p-2 text-black rounded " style="color: #000;">K{{ number_format($loan->amount, 2, '.', ',') }}</li>
                            @if($loan->status == 0)
                            <li class="p-2 text-white rounded bg-warning">Pending for Processing</li>
                            @elseif($loan->status == 1)
                            <li class="p-2 text-white rounded bg-success">Active & Open (Pending Repayment)</li>                     
                            @elseif($loan->status == 2)
                            <li class="p-2 text-white rounded bg-info">Under Processing</li> 
                            @elseif($loan->status == 3)
                            <li class="p-2 text-white rounded bg-danger">Rejected</li> 
                            @else
                            @endif
                            <li class="p-2 text-black rounded " style="color: #000;">Applied On: {{ $loan->created_at->toFormattedDateString() }}</li>
                        </ul>

                    </div></a>
                </div>
            @empty
            @endforelse
                
            </div>

            {{-- <div class="col-12 m-t-30">
                <nav aria-label="...">
                    <ul class="mt-4 pagination pagination-primary">
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
