<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container">
            <div class="card mb-5 mb-xl-8">
                
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent Loan Requests</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Over {{$requests->count()}} loans</span>
                    </h3>
                    
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-category fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </button>
                        
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">

                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                            </div>
                            
                            <div class="separator mb-3 opacity-75"></div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Loan</a>
                            </div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Customer</a>
                            </div>
                            
                            <div class="separator mt-3 opacity-75"></div>
                            
                            <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                    <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="card-body py-3">
                    
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-100px">Loan Type</th>
                                    <th class="min-w-140px">Principal</th>
                                    <th class="min-w-120px">Date</th>
                                    <th class="min-w-120px">Borrower</th>
                                    <th class="min-w-120px">Payback</th>
                                    <th class="min-w-120px">Status</th>
                                    
                                    @if($this->current_configs('loan-approval')->value == 'spooling')
                                    <th class="min-w-150px"></th>
                                    @endif
                                    @if($this->current_configs('loan-approval')->value == 'manual')
                                    <th class="min-w-150px"></th>
                                    @endif
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {{-- @dd($requests) --}}
                                @forelse($requests as $loan)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-13-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary ">
                                                {{ $loan->loan_product->name }} Loan
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                                {{ number_format($loan->amount, 2, '.', ',') }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                Upto {{ $loan->repayment_plan }} Months
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $loan->created_at->toFormattedDateString() }}</a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">last update: {{ $loan->updated_at->toFormattedDateString() }}</span>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id])}}" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                                {{ $loan->user->fname.' '. $loan->user->lname }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ '260'.$loan->phone??' '. $loan->user->phone.', '.$loan->user->gender }}</span>
                                        </td>
                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                            {{ 
                                                number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan), 2, '.', ',')
                                            }}
                                        </td>
                                        <td>
                                            @if($loan->status == 0)
                                                <span class="badge badge-light-warning">Pending</span>
                                            @elseif($loan->status == 1)
                                                <span class="badge badge-light-success">Approved</span>
                                            @elseif($loan->status == 2)
                                                <span class="badge badge-light-primary">Processing</span>
                                            @else
                                                <span class="badge badge-light-danger">Rejected</span>
                                            @endif
                                        </td>
                                        @if($this->current_configs('loan-approval')->value == 'spooling')
                                        <td class="text-success">
                                            @role('admin')
                                                Spooling Mode
                                            @else
                                                @can('review loan')
                                                    @if($loan->status == 0 || $loan->status == 3)
                                                        <button wire:click="setLoanID({{ $loan->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_review_warning" class="btn btn-sm btn-success">Review</button>
                                                    @endif
                                                @endcan
                                            @endrole
                                        </td>
                                        @endif
                                        @if($this->current_configs('loan-approval')->value == 'manual')
                                        <td>
                                            @role('admin')
                                                @if ($loan->is_assigned == 0)
                                                    <button wire:click="setLoanID({{$loan->id}})" class="btn btn-sm btn-success"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Assign
                                                    </button>
                                                @else
                                                    @if($loan->status == 1)
                                                    <button title="Cancel loan before disbursing funds" wire:click="setLoanID({{$loan->id}})" class="btn btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Cancel
                                                    </button>
                                                    @else
                                                    <button wire:click="setLoanID({{$loan->id}})" class="btn btn-xs btn-warning"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Re-assign
                                                    </button>
                                                    @endif
                                                @endif
                                            @else
                                                {{-- @can('review loan') --}}
                                                @if($loan->status == 0 || $loan->status == 3)
                                                    <button wire:click="setLoanID({{ $loan->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_review_warning" class="btn btn-sm btn-success">Review</button>
                                                @endif
                                                {{-- @endcan --}}
                                            @endrole
                                        </td>
                                        @endif
                                        <td class="text-end">
                                            <a href="{{ route('loan-details',['id' => $loan->id]) }}" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                </svg>
                                            </a>
                                            <a  title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-file-ruled-fill" viewBox="0 0 16 16">
                                                    <path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2m2 7H6v2h8zm0 3H6v2h8zm0 3H6v3h6a2 2 0 0 0 2-2zm-9 3v-3H2v1a2 2 0 0 0 2 2zm-3-4h3v-2H2zm0-3h3V7H2z"/>
                                                </svg>
                                            </a>
                                            @can('update user loan')
                                            <a title="Edit Loan" href="{{ route('edit-loan', ['id'=>$loan->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                </svg>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    @include('livewire.dashboard.loans.__modals.assign-loan')
    @include('livewire.dashboard.loans.__modals.review-warning')
</div>