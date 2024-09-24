<div class="page-content">

<style>

</style>
    <div>
        @php
        if (isset($_GET['view'])) {
            // Retrieve the value of the 'view' parameter
            $param = $_GET['view'];

            // Use the $view variable as needed
            $view = htmlspecialchars($param);
        }
        @endphp
        <div class="container-fluid">
            <div class="">
                <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                        <div class="page-title text-3xl items-center p-5 glass-effect" style="display: flex; gap: 3%; color: #db9326;">
                            @switch($view)
                                @case('payments')
                                    <h4>Payments</h4>
                                    @break
                                @case('deposits')
                                    <h4>Deposits</h4>
                                    @break
                                @case('investments')
                                    <h4>Investments</h4>
                                    @break
                                @case('repayments')
                                    <h4>Repayments History</h4>
                                    @break
                                @case('withdrawals')
                                    <h4>Withdrawals</h4>
                                    @break
                                @default
                                    <h4>Payments</h4>
                                @break
                            @endswitch
                        </div>


                        <div class="col-xxl-12 col-xl-12">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 px-4">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div id="updateProfile" class="">
                                @include('livewire.dashboard.__parts.payments')
                            </div>
                            <div id="twoFactor" class="">
                                @include('livewire.dashboard.__parts.deposits')
                            </div>
                            <div id="browserSession" class="">
                                @include('livewire.dashboard.__parts.withdrawals')
                            </div>
                            <div id="docUploads" class="">
                                @include('livewire.dashboard.__parts.investments')
                            </div>
                            <div id="payback" class="">
                                @include('livewire.dashboard.__parts.repayments')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('twoFactor').style.display = "none";
            document.getElementById('browserSession').style.display = "none";
            var view = '{{$view}}';
            switch (view) {
                case 'payments':
                    profileTab();
                    break;
                case 'investments':
                    docUplaodsTab()
                    break;
                case 'deposits':
                    securityTab();
                    break;
                case 'withdrawals':
                    activityTab();
                    break;
                case 'repayments':
                    paybackTab();
                    break;
                default:
                    transferTab();
                    break;
            }

            function profileTab() {
                document.getElementById('updateProfile').style.display = "block";
                document.getElementById('twoFactor').style.display = "none";
                document.getElementById('browserSession').style.display = "none";
                document.getElementById('docUploads').style.display = "none";
                document.getElementById('payback').style.display = "none";
                document.getElementById('transfers').style.display = "none";
            }

            function activityTab() {
                document.getElementById('updateProfile').style.display = "none";
                document.getElementById('twoFactor').style.display = "none";
                document.getElementById('browserSession').style.display = "block";
                document.getElementById('docUploads').style.display = "none";
                document.getElementById('payback').style.display = "none";
                document.getElementById('transfers').style.display = "none";
            }

            function securityTab() {
                document.getElementById('updateProfile').style.display = "none";
                document.getElementById('twoFactor').style.display = "block";
                document.getElementById('browserSession').style.display = "none";
                document.getElementById('docUploads').style.display = "none";
                document.getElementById('transfers').style.display = "none";
                document.getElementById('payback').style.display = "none";
            }

            function docUplaodsTab() {
                document.getElementById('updateProfile').style.display = "none";
                document.getElementById('twoFactor').style.display = "none";
                document.getElementById('browserSession').style.display = "none";
                document.getElementById('docUploads').style.display = "block";
                document.getElementById('transfers').style.display = "none";
                document.getElementById('payback').style.display = "none";
            }

            function paybackTab() {
                document.getElementById('updateProfile').style.display = "none";
                document.getElementById('twoFactor').style.display = "none";
                document.getElementById('browserSession').style.display = "none";
                document.getElementById('docUploads').style.display = "none";
                document.getElementById('transfers').style.display = "none";
                document.getElementById('payback').style.display = "block";
            }

            function transferTab() {
                document.getElementById('updateProfile').style.display = "none";
                document.getElementById('twoFactor').style.display = "none";
                document.getElementById('browserSession').style.display = "none";
                document.getElementById('docUploads').style.display = "none";
                document.getElementById('payback').style.display = "none";
                document.getElementById('transfers').style.display = "block";
            }
        </script>
        <script src="{{ asset('public/mfs/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('public/mfs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </div>
</div>
