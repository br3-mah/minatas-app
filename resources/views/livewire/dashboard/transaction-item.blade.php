<div class="px-3 page-content">
<div class=" container-fluid">
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
        </style>
        @php
        if (isset($_GET['view'])) {
            // Retrieve the value of the 'view' parameter
            $param = $_GET['view'];
    
            // Use the $view variable as needed
            $view = htmlspecialchars($param);
        }
        @endphp
    
    
        @switch($view)
            @case('payments')
                <div class="mt-3 mb-4 header">
                    <h1 class="title">
                        <span>Loan Repayments</span>
                    </h1>
                </div>
                @include('livewire.dashboard.__parts.payments')
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
</div>  

{{-- !mportant --}}
{{-- @include('livewire.dashboard.__parts.deposits')
@include('livewire.dashboard.__parts.withdrawals')
@include('livewire.dashboard.__parts.investments')
@include('livewire.dashboard.__parts.repayments') --}}