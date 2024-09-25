<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 col-12"> 
                  <h2>My Home</h2>
                  <p class="mb-0 text-title-gray">"Welcome back! Continue your journey."</p>
                </div>
                <div class="col-sm-6 col-12">
                  {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Ecommerce</li>
                  </ol> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-2">
            
            <div class="row">
              
              <div class="col-xxl-3 col-xl-4 order-xl-2 order-xxl-0 col-sm-6 box-col-6">
                <div class="overflow-hidden card target-card"> 
                  <div class="p-0 pb-4 card-body"> 
                    <div class="main-img"><img class="img-fluid img-banner" src="public/minatas/assets/images/dashboard-2/4.png" alt=""/>
                      <ul class="animate-img">
                        <li class="right-1"> <img class="img-fluid" src="public/minatas/assets/images/dashboard-2/animate/1.png" alt=""/></li>
                        <li class="right-2"> <img class="img-fluid" src="public/minatas/assets/images/dashboard-2/animate/2.png" alt=""/></li>
                        <li class="right-3"> <img class="img-fluid" src="public/minatas/assets/images/dashboard-2/animate/3.png" alt=""/></li>
                        <li class="right-4"> <img class="img-fluid" src="public/minatas/assets/images/dashboard-2/animate/4.png" alt=""/></li>
                        <li class="right-5"> <img class="img-fluid" src="public/minatas/assets/images/dashboard-2/animate/5.png" alt=""/></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-xxl-3 col-xl-4 col-sm-6 box-col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="items-slider">
                      <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                          @forelse ($this->get_all_loan_products() as $prod)
                            <div class="swiper-slide">
                              <div class="slider-box bg-light-secondary">
                                <div class="items-center justify-center header-top">
                                  <div class="badge badge-secondary rated-product-badge">Hot</div>
                                  <img class="img-fluid" width="150" src="public/minatas/icon/box.png" alt=""/>
                                  <div class="i fa-regular fa-heart"></div>
                                </div>
                              </div>
                              <div class="text-center slider-content">
                                <h4 class="text-secondary">{{ $prod->name }}</h4>
                                <p class="mb-0">{{ $prod->description }}</p>
                                <p>K2000&nbsp;to&nbsp;K4000</p>
                                
                              </div>
                            </div>
                          @empty
                          @endforelse
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class=" card-body file-manager col-xxl-4 col-xl-4 col-sm-12 box-col-6">
                <h4 class="mb-2">Quick Access</h4>
                <ul class="flex-row quick-file d-flex"> 
                  <li>
                    <a href="{{ route('view-loan-requests') }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/loans.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">My Loans</h6>
                  </li>
                  <li>
                    <a href="{{ route('history') }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/loan.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">History</h6>
                  </li>
                  <li>
                    <a href="{{ route('kyc-update', ['view' => 'kyc'])  }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/kyc.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">KYC</h6>
                  </li>
                  <li>
                    <a href="{{ route('transaction.item', ['view'=>'payments']) }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/repay.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">Repayments</h6>
                  </li>
                  <li> 
                    <a href="{{ route('notifications') }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/notification.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">Notifications</h6>
                  </li>
                  <li>
                    <a href="{{ route('support', ['view' => 'issue'])  }}">
                      <div class="quick-box">
                        <img width="50" src="public/minatas/icon/support.png" alt="">
                      </div>
                    </a>
                    <h6 class="mb-2">Support</h6>
                  </li>
                </ul>
              </div>
              
              @if ($my_loan)
                  @if ($my_loan->complete == 1)
                      @if ($my_loan->status == 1)
                        @include('livewire.dashboard.__parts._dashboard-repayment')
                      @elseif($my_loan->status == 0)
                          @include('livewire.dashboard.__parts._dashboard-pending')
                      @elseif($my_loan->status == 2)
                          @include('livewire.dashboard.__parts._dashboard-processing')
                      @elseif($my_loan->status == 3)
                          @include('livewire.dashboard.__parts._dashboard-rejected')
                      @endif
                  @else
                      @include('livewire.dashboard.__parts._dashboard-resume')
                  @endif
              @else
                  @if ($my_loan->status == 1)
                      @include('livewire.dashboard.__parts._dashboard-open')
                  @else
                      @include('livewire.dashboard.__parts._dashboard-new')
                  @endif
              @endif
              
              

              <div class="col-xxl-12 col-xl-12 box-col-12">
                <div class="card">
                  <div class="pb-2 card-header card-no-border">
                    <h3>Recent Loan Requests</h3>
                  </div>
                  <div class="pt-0 card-body recent-order">
                    
                    <main class="kanban-drag">
                      @foreach ($this->all_applications()->take(5) as $application)
                      <div class="kanban-item is-moving">
                        <a class="kanban-box" href="javascript:void(0)"><span class="date">LN{{ $application->uuid }}</span>
                          @switch($application->status)
                              @case(0)
                              <span class="badge badge-warning f-right">Pending for Proccessing & Review</span>
                              @break
                              @case(1)
                              <span class="badge badge-primary f-right">Open & Active (Pending Payback)</span>
                              @break
                              @case(2)
                              <span class="badge badge-info f-right">Currently Under Processing & Review</span>
                              @break
                              @case(3)
                              <span class="badge badge-danger f-right">Rejected Loan Request</span>
                              @break
                              @case(4)
                              <span class="text-black badge badge-light text-dark f-right">Incomplete KYC Update</span>
                              @break
                              @default
                                  <span class="px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full dark:bg-gray-500/10">Hold</span>
                          @endswitch
                          <h6>{{ $application->loan_product->name }} of K{{ number_format($application->amount, 2) }}</h6>
                          <div class="d-flex align-items-start"><img class="img-20 me-1 rounded-circle" src="public/minatas/assets/images/user/6.jpg" alt="" data-original-title="" title="">
                            <div class="flex-grow-1">
                              <p class="mb-0">Date Applied: {{ $application->created_at->toFormattedDateString() }} . <span>{{ $application->created_at->diffForHumans() }}</span> </p>
                              <p class="mb-0">
                              </p>
                            </div>
                          </div>
                        </a> 
                      </div>
                      @endforeach
                    </main>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

{{-- 

        <div class="table-responsive theme-scrollbar">
          <table class="table mt-0 display table-bordernone" id="recent-order" style="width:100%">
            <thead>
                <th>Date Applied</th>
                <th>Loan Details</th>
                <th>Amount Borrowing</th>
                <th>Est. Repayment</th>
                <th>Status</th>
            </thead>
            <tbody>
              @foreach ($this->all_applications()->take(5) as $application)
                <td class="f-w-600">{{ $application->created_at->toFormattedDateString() }}</td>
                <td>
                  <div class="gap-3 d-flex align-items-center">
                    <div class="flex-shrink-0 comman-round">
                    </div>
                    <div class="flex-grow-1">
                      <a href="product-page.html">
                        <h6>{{ $application->loan_product->name }}</h6>
                      </a>
                      <p>LN{{ $application->id }}</p>
                      <p>{{ $application->id }}</p>
                    </div>
                  </div>
                </td>
                
                <td class="font-primary f-w-600">K{{ number_format($application->amount, 2) }}</td>
                
                <td>
                  <span>Pending</span>
                </td>
                
                <td class="">
                  <h6>3.6<span>(45 votes)</span></h6>
                </td>
                @endforeach
            </tbody>
          </table>
        </div> --}}