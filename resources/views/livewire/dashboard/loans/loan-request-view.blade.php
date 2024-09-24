<div class="w-full">
    @if(!empty($loan_requests->toArray()))
        @include('livewire.dashboard.loans.__parts.list-loan-request')
    @else
        <div class="container flex items-center justify-center min-h-screen mt-4">
            <div class="text-center">
                <img class="w-[100px] mx-auto" width="300" src="{{ asset('public/minatas/img/no-loan.png')}}" alt="">
                @role('user')
                <div class="my-4">
                    <a href="{{ route('form') }}" class="px-4 py-2 font-bold text-white bg-success rounded hover:bg-info">
                        <strong>Loan Application</strong>
                    </a>
                </div>
        
                <div class="mt-3">
                    <p class="text-gray-600">Need help or have questions? <a href="{{ route('contact') }}" class="text-blue-500 hover:text-info">Contact us</a>.</p>
                </div>
                @endrole
            </div>
        </div>
    @endif
</div>