<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="">
                <div style="background-color:rgb(2,3,129)" class="p-5 flex card-header">
                    <h1 class="card-title flex gap-4" style=" color:#db9326">
                        <span class="text-3xl font-bold">Make Payments</span>
                    </h1>
                </div>
                
                <div class="card-body p-4">
                    <div class="flex flex-1 g-4 space-x-2 w-full">

                      <div class="w-1/4 border rounded-lg p-2">
                        <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="text-decoration-none">
                          <div class="card h-100">
                            <div class="card-body d-flex align-items-center">
                                <span>
                                    <h5 class="card-title mb-0 text-lg font-bold text-center text-primary">Payments</h5>
                                </span>
                                <span class="me-3">
                                    <img width="170" class="rounded-lg" src="public/app/img/mone.jpg" alt="">
                                </span>
                            </div>
                          </div>
                        </a>
                      </div>

                      <div class="w-1/2 border rounded-lg p-2">
                        <a href="{{ route('transaction.item', ['view'=>'withdrawals']) }}" class="text-decoration-none">
                          <div class="card h-100">
                            <div class="card-body d-flex align-items-center">
                                <span>
                                  <h5 class="card-title mb-0 text-lg font-bold text-center text-primary">Withdraws</h5>
                                </span>
                                <span class="me-3">
                                    <img width="170" class="rounded-lg" src="public/app/img/withdraw.avif" alt="">
                                </span>
                            </div>
                          </div>
                        </a>
                      </div>

                      <div class="w-1/2 border rounded-lg p-2">
                        <a href="{{ route('transaction.item', ['view'=>'transfers']) }}" class="text-decoration-none">
                          <div class="card h-100">
                            <div class="card-body d-flex align-items-center">
                                <span>
                                  <h5 class="card-title mb-0 text-lg font-bold text-center text-primary">Transfers</h5>
                                </span>
                                <span class="me-3">
                                    <img width="170" class="rounded-lg" src="public/app/img/bank.jpg" alt="">
                                </span>
                            </div>
                          </div>
                        </a>
                      </div>

                      <div class="w-1/2 border rounded-lg p-2">
                        <a href="{{ route('transaction.item', ['view'=>'investments']) }}" class="text-decoration-none">
                          <div class="card h-100">
                            <div class="card-body d-flex align-items-center">
                                <span>
                                  <h5 class="card-title mb-0 text-lg font-bold text-center text-primary">Investments</h5>
                                </span>
                                <span class="me-3">
                                    <img width="170" class="rounded-lg" src="public/app/img/investment.jpg" alt="">
                                </span>
                            </div>
                          </div>
                        </a>
                      </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
