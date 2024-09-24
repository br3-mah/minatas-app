<div class="content-body">

    @include('livewire.dashboard.__parts.dash-alerts')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="card home-chart" style="background-image: linear-gradient(to right, #792db8, #912d73); color:#fff">

                  <div class="card-body">
                    <h4 class="card-title home-chart text-white">Your Balance</h4>
                    <div class="home-chart-height">
                      <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                          <div class="my-2">
                            <h1 class="text-white" style="font-weight: 900;">{{ $this->getUserWallet(auth()->user()->id)->balance }} ZMW</h1>
                          </div>
                        </div>
                      </div>
                      <div id="chartx"></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="wallet-widget card">
                    <h5>Withdrawals</h5>
                    <h2><span class="text-primary">{{ $this->getUserWallet(auth()->user()->id)->withdraw }}</span> <sub>ZMW</sub></h2>
                    {{-- <p>= 0.00 ZMW</p> --}}
                </div>
            </div>
            {{-- <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="wallet-widget card">
                    <h5>Available Balance</h5>
                    <h2><span class="text-success">{{ $current_funds ?? '0.00' }}</span> <sub>ZMW</sub></h2>
                    <p>= {{ $current_funds ?? '0.00' }} ZMW</p>
                </div>
            </div> --}}
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="wallet-widget card">
                    <h5>Deposites</h5>
                    <h2><span class="text-warning">{{ $this->getUserWallet(auth()->user()->id)->deposit }}</span> <sub>ZMW</sub></h2>
                    {{-- <p>= 0.00 ZMW</p> --}}
                </div>
            </div>
            {{-- <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="wallet-widget card">
                    <h5>Locked Balance</h5>
                    <h2><span class="text-danger">0.00</span> <sub>ZMW</sub></h2>
                    <p>= 0.00 ZMW</p>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row">

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Activities </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped responsive-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Hash</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($history as $hist)
                                    <tr>
                                        <td>{{ $hist->id }}</td>
                                        <td class="coin-name">
                                            <i class="cc ZMW"></i>
                                            <span>{{ $hist->desc }}</span>
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            Jan 01
                                        </td>
                                        <td>
                                            #1236598745565
                                        </td>
                                        <td>
                                            Pending
                                        </td>
                                    </tr>

                                    @empty
                                    <div class="recent-info">
                                        <h6>No recent transactions</h6>
                                    </div>
                                    @endempty
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div> --}}
    </div>

    <div class="modal" wire:ignore id="loanWalletFundsModal" tabindex="-1" role="dialog" aria-labelledby="loanWalletFundsModalLabel" aria-hidden="true">

        <div class="card">
            <div class="card-body">
                <div class="bg-primary card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2 text-white" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                    </svg>
                    &nbsp;
                    <h5 style="color:#fff" class="modal-title">Update Wallet Funds </h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>

                <form method="POST" wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" wire:model.defer="amount" value="{{ old('amount') }}" type="text" placeholder="Amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-square light" onclick="closeCustomModal()">Close</button>
                        <button id="update-loan-wallet-toastr-success-bottom-left" type="submit" class="btn btn-primary btn-square">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        function openCustomModal() {
            // Trigger the modal manually
            $('#loanWalletFundsModal').modal('show');
        }
        function closeCustomModal() {
            // Trigger the modal manually
            $('#loanWalletFundsModal').modal('hide');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
