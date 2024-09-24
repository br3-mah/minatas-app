<div class="space-y-6">
    <!-- Bank Details -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Bank Name -->
        <div>
            <label for="bankName" class="block text-sm font-medium text-gray-700">Your Bank Name</label>
            <select
                id="bankName"
                name="bankName"
                class="form-select mt-1 block w-full rounded-md border-2 border-sky-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                >
                @if ($util && $util->bank && $util->bank->first())
                <option selected value="{{ $util->bank->first()->bankName }}">{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->bankName : '' }}</option>
                @endif
                <option value="">Select a Bank</option>
                <option value="Zambia National Commercial Bank">Zambia National Commercial Bank (Zananco)</option>
                <option value="Standard Chartered Bank Zambia">Standard Chartered Bank Zambia</option>
                <option value="Stanbic Bank Zambia">Stanbic Bank Zambia</option>
                <option value="Barclays Bank Zambia">Barclays Bank Zambia</option>
                <option value="First National Bank Zambia">First National Bank Zambia</option>
                <option value="Cavmont Bank">Cavmont Bank</option>
                <option value="Atlas Mara Bank Zambia">Atlas Mara Bank Zambia</option>
                <option value="Indo Zambia Bank">Indo Zambia Bank</option>
                <option value="Access Bank Zambia">Access Bank Zambia</option>
                <option value="United Bank for Africa Zambia">United Bank for Africa Zambia</option>
                <option value="Citibank Zambia">Citibank Zambia</option>
                <option value="Ecobank Zambia">Ecobank Zambia</option>
                <option value="Bank of China Zambia">Bank of China Zambia</option>
                <option value="Development Bank of Zambia">Development Bank of Zambia</option>
                <option value="Zambia Industrial Commercial Bank">Zambia Industrial Commercial Bank</option>
                <option value="BancABC Zambia">BancABC Zambia</option>
                <option value="Investrust Bank Zambia">Investrust Bank Zambia</option>
                <option value="Natsave Zambia">Natsave Zambia</option>
                <option value="AB Bank Zambia">AB Bank Zambia</option>
                <option value="TBA Bank Zambia">TBA Bank Zambia</option>
                <option value="FNB Zambia">FNB Zambia</option>
                <option value="Nedbank Zambia">Nedbank Zambia</option>
                <option value="AB Bank Zambia">AB Bank Zambia</option>
            </select>
            <small id="bankNameError" class="text-danger text-xs"></small>
        </div>
        
        <!-- Branch Name -->
        <div>
            <label for="branchName" class="block text-sm font-medium text-gray-700">Branch Name</label>
            <input type="text"
                   value="{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->branchName : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-2 border-sky-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                   id="branchName"
                   name="branchName">
            <small id="bankBranchError" class="text-danger text-xs"></small>
        </div>
        <!-- Account Number -->
        <div>
            <label for="accountNumber" class="block text-sm font-medium text-gray-700">Your Account Number (#)</label>
            <input type="text"
                   value="{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->accountNumber : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-2 border-sky-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                   id="accountNumber"
                   name="accountNumber"
                   placeholder="XXXX XXXX XXXX XXXX">
            <small id="bankAccError" class="text-danger text-xs"></small>
        </div>
        <!-- Account Names -->
        <div>
            <label for="accountNames" class="block text-sm font-medium text-gray-700">Account Name</label>
            <input type="text"
                   value="{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->accountNames : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-2 border-sky-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                   id="accountNames"
                   name="accountNames">
            <small id="bankAccNameError" class="text-danger text-xs"></small>
        </div>
    </div>

    {{-- Current Values --}}
    {{-- <div class="max-w-sm mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Bank Information</h2>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Bank Name</label>
            <p class="text-gray-900 font-medium">{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->bankName : '' }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Branch</label>
            <p class="text-gray-900 font-medium">{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->branchName : '' }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Account Number</label>
            <p class="text-gray-900 font-medium">{{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->accountNumber : '' }}</p>
        </div>
        <div class="flex justify-end">
            <p class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600 transition duration-200"> {{ $util && $util->bank && $util->bank->first() ? $util->bank->first()->created_at->toFormattedDateString() : '' }}</p>
        </div>
    </div> --}}
    
</div>