@if ($my_loan !== null)
    <h5><b style="color: rgb(90, 80, 99)">Current Loan</b></h5>
    <h2 class="font-bold"><b>K{{ $my_loan->amount }}</b></h2>

    <div class="col-xxl-4 col-xl-12 " style="color: rgb(150, 247, 65)">
        <a title="View more details" @if($my_loan->plp_sent == 0) href="{{ route('loan-details', $my_loan->id) }}" @else href="#" @endif >
            <div class="card"
                @switch($my_loan->status)
                    @case(1)
                        style="background-color: rgb(150, 247, 65)"
                        @break
                    @case(2)
                        style="background-color: rgb(255, 208, 0)"
                        @break
                    @case(3)
                        style="background-color: rgb(180, 28, 28)"
                        @break
                    @case(4)
                        style="background-color: rgb(71, 67, 71)"
                        @break
                    @default
                        style="background-color: rgb(255, 208, 0)"
                @endswitch
            >
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8">
                            <p><b style="color: #792db8">{{ $my_loan->loan_product->name }} Repayment</b></p>
                            <h3> <strong><b>K{{ App\Models\Loans::loan_balance($my_loan->id) }}</b></strong> </h3>
                            <small>
                                @if ($my_loan->status == 1)
                                    @php
                                        if ($my_loan->loan->final_due_date !== null) {
                                            $date_str = $my_loan->loan->final_due_date;
                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                            echo 'Due: ' . $date->format('F j, Y, g:i a');
                                        } else {
                                            $my_loan->due_date;
                                        }
                                    @endphp
                                @else
                                    @if ($my_loan->plp_sent == 1)
                                        <b class="text-dark">
                                            Please consider reducing your principal amount requested.
                                            You can only borrower any of the following amounts.
                                        </b>
                                        <br>
                                        <form action="{{ route('submitAmount') }}" method="POST">
                                            @csrf <!-- CSRF token for Laravel -->
                                            <input type="hidden" name="application_id" value="{{ $my_loan->id }}">
                                            @php
                                                $amount = $my_loan->amount;
                                            @endphp
                                            <div class="d-flex gap-2 py-4">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @php
                                                        $amount *= 0.75; // Reduce amount by 25%
                                                    @endphp
                                                    <button type="submit" class="btn btn-default btn-xs" name="amount" value="{{ number_format($amount, 2) }}">
                                                        {{ number_format($amount, 2) }}
                                                    </button>
                                                @endfor
                                            </div>
                                        </form>
                                    @else
                                        <p>Processing</p>
                                    @endif
                                @endif
                                @php
                                    // Convert the target date/time to a Unix timestamp
                                    // $targetTimestamp = strtotime($date_str);

                                    // // Calculate the difference between the target timestamp and the current timestamp
                                    // $diff = $targetTimestamp - time();

                                    // // Calculate the number of days remaining
                                    // $daysRemaining = floor($diff / (60 * 60 * 24));

                                    // // Calculate the number of hours remaining
                                    // $hoursRemaining = floor(($diff % (60 * 60 * 24)) / (60 * 60));

                                    // // Calculate the number of minutes remaining
                                    // $minutesRemaining = floor(($diff % (60 * 60)) / 60);

                                    // // Calculate the number of seconds remaining
                                    // $secondsRemaining = $diff % 60;

                                    // if ($daysRemaining < 0) {
                                    //     echo "Payback payment is overdue";
                                    // }else {
                                    //     echo "{$daysRemaining} Days  {$hoursRemaining} Hours remaining";
                                    // }
                                    // Output the remaining time in a human-readable format
                                    // echo "{$daysRemaining} Days  {$hoursRemaining} Hours {$minutesRemaining} Minutes {$secondsRemaining} Seconds remaining";
                                @endphp
                            </small>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="card">
                                <button class="btn btn-light text-primary p-4"
                                    style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                    @switch($my_loan->status)
                                        @case(1)
                                            <strong>Repay Now
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </strong>
                                            @break
                                        @case(2)
                                            <strong>
                                                Processing
                                                @if($stage !== null)
                                                    <div class="badge-sm badge-default">
                                                        {{$stage}}
                                                    </div>
                                                @else
                                                    <div class="badge-sm badge-default">
                                                        Incomplete KYC
                                                    </div>
                                                @endif
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </strong>
                                            @break
                                        @case(3)
                                            <strong>
                                                Declined
                                                @if($stage !== null)
                                                    <div class="badge-sm badge-default">
                                                        {{$stage}}
                                                    </div>
                                                @else
                                                    <div class="badge-sm badge-default">
                                                        Incomplete KYC
                                                    </div>
                                                @endif
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </strong>
                                            @break
                                        @case(4)
                                            <strong>Defaulted
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </strong>
                                            @break
                                        @default
                                            <strong>Processing
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </strong>
                                            @break
                                    @endswitch
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@else
    <div class="col-xxl-4 col-xl-12">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="card"
                    style="border-radius:3rem; height:25vh; background-image:  linear-gradient(to right, #653092, #9E59F1); color:#fff">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-6" style="padding-top: 4%;">
                                <span class="pb-2"><strong style=" color: #ffc800">Apply for a Loan</strong></span>

                                <div class="mt-2">
                                    <a href="{{ route('new-loan') }}" style="border-radius:2rem; background-color:#ffc800;color: #ffffff" class="btn">
                                        <strong>Get a Loan</strong> </a>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="pt-6">
                                    <img class="balance" src="{{ asset('public/images/mfs.png') }}" alt="">
                                </div>
                            </div>
                            <style>
                                @media (min-width: 577px) {
                                    .balance {
                                        width: 100px;
                                        position: absolute;
                                        top: 42px;
                                    }
                                }

                                @media (max-width: 577px) {
                                    .balance {
                                        width: 120px;
    position: absolute;
    top: 13%;
    left: 50%;
                                    }
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="card"
                    style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8UW4-kylyJg8bj33K3boAIvJ46HbT362BRwF06jStNxZLf2nkni-UDFofFkcvWrHhDqc&usqp=CAU');
                background-position: center center;
                background-size: cover;
                height:25vh;
                position: relative;
                border-radius: 3rem;">
                    <div
                        style="border-radius: 3rem; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(102, 45, 145, 0.772);">
                    </div>
                    <div class="card-body">
                        <div class="row" style="padding-top: 7%">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="mt-3">
                                    <button style="background-color:#fff; color:black; z-index:1; position:absolute"
                                        class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div style="margin-top:14%;">
                                    <strong class="text-white" style="z-index:1; position:absolute">Refer a
                                        Friend</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
