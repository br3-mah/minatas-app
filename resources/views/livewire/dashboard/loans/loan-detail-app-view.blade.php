
<div>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
<div class="text-gray-800 bg-gray-100 dark:bg-gray-900 dark:text-gray-200">
    <div class="max-w-4xl p-4 mx-auto">
        <nav class="mb-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">All Applications</p>
            <h1 class="text-2xl font-bold">Loan Application Details</h1>
        </nav>
        
        <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-4">
                        <img src="/api/placeholder/80/80" alt="Loan Type Icon" class="w-20 h-20 rounded-full">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $loan_product->name }}</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $this->get_loan_category($loan->loan_child_type_id)->first()->name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $this->get_loan_type($loan->loan_type_id)->first()->name }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">{{ $loan->created_at->toFormattedDateString() }}</p>
                        <p class="text-sm">{{ $loan->user->fname.' '.$loan->user->lname }}</p>
                        <p class="text-sm">{{ $loan->user->address }}</p>
                        <p class="text-sm">{{ $loan->user->phone }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-6 p-4 mb-6 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Amount</p>
                        <p class="text-2xl font-bold">K {{ $loan->amount }}</p>
                        <p class="mt-2 text-sm">Date Applied: <span class="font-semibold">{{ $loan->created_at->toFormattedDateString() }}</span></p>
                        <p class="text-sm">Status: 
                            <span class="font-semibold 
                                {{ $loan->status == 0 ? 'text-yellow-500' : '' }}
                                {{ $loan->status == 1 ? 'text-green-500' : '' }}
                                {{ $loan->status == 2 ? 'text-blue-500' : '' }}
                                {{ $loan->status == 3 ? 'text-red-500' : '' }}
                            ">
                                @if ($loan->status == 0)
                                    {{ $loan->complete == 0 ? 'Incomplete KYC' : 'Processing' }}
                                @elseif ($loan->status == 1)
                                    Accepted
                                @elseif ($loan->status == 2)
                                    Processing
                                @elseif ($loan->status == 3)
                                    Loan Request Rejected
                                @endif
                            </span>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Repayment</p>
                        <p class="text-2xl font-bold">K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id) }}</p>
                        <p class="mt-2 text-sm">Interest: <span class="font-semibold">{{ $this->get_loan_product($loan->loan_product_id)->def_loan_interest }}%</span></p>
                        <p class="text-sm">Duration: <span class="font-semibold">{{ $loan->repayment_plan }} Month(s)</span></p>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-4">
                    @if ($loan->status != 2 && $loan->status != 1)
                        <a href="{{ route('form') }}" class="px-4 py-2 text-purple-600 transition-colors bg-purple-100 rounded-md hover:bg-purple-200">
                            Update Loan Application
                        </a>
                    @endif
                    
                    @if ($loan->status == 1)
                        <a href="{{ route('transaction.item', ['view'=>'payments']) }}" class="px-4 py-2 text-red-600 transition-colors bg-red-100 rounded-md hover:bg-red-200">
                            Make Repayment
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>