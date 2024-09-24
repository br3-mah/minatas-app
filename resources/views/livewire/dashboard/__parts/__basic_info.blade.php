{{-- This is the components.__basic_info --}}
<div wire:ignore.self class="space-y-6">
    <div class="flex flex-wrap gap-4 mb-4">
        <div class="flex w-full justify-between gap-4">
            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="loanType" class="form-label">Type of Loan</label>
                
                <select name="loan_type_id" id="loanType" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                    @if ($loan)
                    <option selected value="{{ $type->first()->id }}">{{ $type->first()->name }}</option>
                    @endif
                    <option>Choose...</option>
                    @foreach ($loan_types as $lt)
                        <option value="{{ $lt->id }}">{{ $lt->name }}</option>
                    @endforeach
                </select>
                <small id="loanTypeError" class="text-danger text-xs"></small>
            </div>

            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="loanCategory" class="form-label">Loan Category</label>
                <select name="loan_child_type_id" id="loanCategory" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" disabled>
                    @if ($loan)
                    <option selected value="{{ $category->first()->id }}">{{ $category->first()->name }}</option>
                    @endif
                    <option>Choose...</option>
                </select>
                <small id="loanCategoryError" class="text-danger text-xs"></small>
            </div>

            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="loanPackage" class="form-label">Choose a Package</label>
                <select name="loan_product_id" id="loanPackage" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" disabled>
                    @if ($loan)
                    <option selected value="{{ $loan->loan_product->id }}">{{ $loan->loan_product->name }}</option>
                    @endif
                    <option>Choose...</option>
                </select>
                <small id="loanPackageError" class="text-danger text-xs"></small>
            </div>
        </div>
        <div class="flex w-full justify-between gap-4">
            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="amount" class="form-label">How much do you want to Borrow?</label>
                <select name="amount" id="amount"  class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                    @if ($loan)
                        <option value="{{ $loan->amount ?? '' }}">K {{ $loan->amount ?? '' }}</option>
                    @endif
                    <option>Choose...</option>
                </select>
                <small id="amountError" class="text-danger text-xs"></small>
            </div>

            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="duration" class="form-label">Loan Duration</label>
                <select name="duration" id="duration" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                    @if ($loan)
                        <option value="{{ $loan->repayment_plan ?? '' }}">{{ $loan->repayment_plan ?? '' }} Month(s)</option>
                    @endif
                    <option>Choose...</option>
                </select>
                <small id="durationError" class="text-danger text-xs"></small>
            </div>
            <div class="flex-1 min-w-[calc(50%-1rem)]">
                <label for="dob" class="block text-sm font-medium text-blue-700">Date of Birth</label>
                <input type="date" value="{{ auth()->user()->dob ?? '' }}" id="dob" name="dob" class="form-input mt-1 block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                <small id="dobError" class="text-danger text-xs"></small>
            </div>
        </div>
        <script>
            // Function to format the date as YYYY-MM-DD
            function formatDate(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                return `${year}-${month}-${day}`;
            }

            // Calculate the date 16 years ago
            var currentDate = new Date();
            var dobDate = new Date(currentDate.getFullYear() - 16, currentDate.getMonth(), currentDate.getDate());

            // Set the default value for the date input
            var dobInput = document.getElementById('dob');
            dobInput.value = formatDate(dobDate);
        </script>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="phone" class="block text-sm font-medium text-blue-700">Contact Phone Number</label>
            <div class="relative mt-1">
                <input id="phone" value="{{ auth()->user()->phone }}" type="text" data-mask='0000 000 000' name="phone" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" placeholder="0977 --- ---">
            </div>
            <small id="phoneError" class="text-danger text-xs"></small>
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="jobTitle" class="block text-sm font-medium text-blue-700">Job Title</label>
            <input value="{{ auth()->user()->occupation ?? auth()->user()->jobTitle }}" type="text" id="jobTitleInput" name="jobTitle" class="form-input mt-1 block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" placeholder="e.g., Teacher">
            <small id="jobTitleError" class="text-danger text-xs"></small>
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="employeeNo" class="block text-sm font-medium text-blue-700">Employee Number</label>
            <input value="{{ auth()->user()->employeeNo }}" type="text" id="employeeNo" name="employeeNo" class="form-input mt-1 block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" placeholder="Employee No." maxlength="8">
            <small id="employeeNoError" class="text-danger text-xs"></small>
        </div>
    </div>
    
    <div class="flex flex-wrap gap-4 mb-4">
        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="id_type" class="block text-sm font-medium text-blue-700">Identification Card Type</label>
            <div class="flex space-x-2 mt-1">
                <select id="id_type" name="id_type" class="form-select block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                    <option value="">Choose ...</option>
                    <option {{ auth()->user()->id_type == 'NRC' ? 'selected' : ''}} value="NRC">NRC</option>
                    <option {{ auth()->user()->id_type == 'Passport' ? 'selected' : ''}} value="Passport">Passport</option>
                    <option {{ auth()->user()->id_type == 'Driver Liecense' ? 'selected' : ''}} value="Driver Liecense">Driver Liecense</option>
                </select>
                <input value="{{auth()->user()->nrc_no ?? auth()->user()->nrc}}" type="text" placeholder="ID Number" class="form-input block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" id="nrc" name="nrc">
            </div>
            <small id="nrcError" class="text-danger text-xs"></small>
            <small id="nrcIDError" class="text-danger text-xs"></small>
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="ministry" class="block text-sm font-medium text-blue-700">Ministry</label>
            <input value="{{ auth()->user()->ministry }}" placeholder="e.g., Ministry of Health" type="text" id="ministry" name="ministry" class="form-input mt-1 block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="department" class="block text-sm font-medium text-blue-700">Department</label>
            <input value="{{ auth()->user()->department }}" type="text" id="department" name="department" class="form-input mt-1 block w-full rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm" placeholder="Department">
        </div>
    </div>

    <div class="flex flex-wrap gap-4">
        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="address" class="block text-sm font-medium text-blue-700">Physical Address</label>
            <textarea id="address" name="address" cols="10" rows="2" class="form-input mt-1 block w-full text-left rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm">{{ auth()->user()->address }}</textarea>
            <small id="addressError" class="text-danger text-xs"></small>
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="gender" class="block text-sm font-medium text-blue-700">Gender</label>
            <select id="gender" name="gender" class="form-select block w-full mt-1 rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                <option value="">--Select One--</option>
                <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            <small id="genderError" class="text-danger text-xs"></small>
        </div>

        <div class="flex-1 min-w-[calc(50%-1rem)]">
            <label for="yearsOfWork" class="block text-sm font-medium text-blue-700">Years of Working</label>
            <select id="yearsOfWork" name="yearsOfWork" class="form-select block w-full mt-1 rounded-md border-blue-500 border-2 shadow-sm focus:border-blue-700 focus:ring-blue-700 sm:text-sm">
                <option value="1" {{ auth()->user()->employeeNo == 1 ? 'selected' : '' }}>1 Year</option>
                <option value="2" {{ auth()->user()->employeeNo == 2 ? 'selected' : '' }}>2 Years</option>
                <option value="3" {{ auth()->user()->employeeNo == 3 ? 'selected' : '' }}>3 Years</option>
                <option value="4" {{ auth()->user()->employeeNo == 4 ? 'selected' : '' }}>4 Years</option>
                <option value="5" {{ auth()->user()->employeeNo == 5 ? 'selected' : '' }}>5+ Years</option>
            </select>
            <small id="yearsOfWorkError" class="text-danger text-xs"></small>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const loanTypeSelect = document.getElementById('loanType');
    const loanCategorySelect = document.getElementById('loanCategory');
    const loanPackageSelect = document.getElementById('loanPackage');
    const loanAmountSelect = document.getElementById('amount');
    const loanDurationSelect = document.getElementById('duration');

    loanTypeSelect.addEventListener('change', function () {
        const loanTypeId = this.value;

        if (loanTypeId) {
            fetch(`api/get-loan-categories/${loanTypeId}`)
                .then(response => response.json())
                .then(data => {
                    loanCategorySelect.innerHTML = '<option>Choose...</option>';
                    loanCategorySelect.disabled = false;

                    data.forEach(category => {
                        loanCategorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
                    });
                });
        } else {
            loanCategorySelect.innerHTML = '<option>Choose...</option>';
            loanCategorySelect.disabled = true;
        }

        loanPackageSelect.innerHTML = '<option>Choose...</option>';
        loanPackageSelect.disabled = true;
        loanAmountSelect.innerHTML = '<option>Choose...</option>';
        loanAmountSelect.disabled = true;
        loanDurationSelect.innerHTML = '<option>Choose...</option>';
        loanDurationSelect.disabled = true;
    });

    loanCategorySelect.addEventListener('change', function () {
        const loanCategoryId = this.value;

        if (loanCategoryId) {
            fetch(`api/get-loan-packages/${loanCategoryId}`)
                .then(response => response.json())
                .then(data => {
                    loanPackageSelect.innerHTML = '<option>Choose...</option>';
                    loanPackageSelect.disabled = false;

                    data.forEach(package => {
                        loanPackageSelect.innerHTML += `<option value="${package.id}">${package.name}</option>`;
                    });
                });
        } else {
            loanPackageSelect.innerHTML = '<option>Choose...</option>';
            loanPackageSelect.disabled = true;
        }

        loanAmountSelect.innerHTML = '<option>Choose...</option>';
        loanAmountSelect.disabled = true;
        loanDurationSelect.innerHTML = '<option>Choose...</option>';
        loanDurationSelect.disabled = true;
    });

    loanPackageSelect.addEventListener('change', function () {
        const loanPackageId = this.value;

        if (loanPackageId) {
            fetch(`api/get-loan-package-item/${loanPackageId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate loan amounts
                    loanAmountSelect.innerHTML = '<option>Choose...</option>';
                    loanAmountSelect.disabled = false;

                    data.amounts.forEach(amount => {
                        loanAmountSelect.innerHTML += `<option value="${amount}">${amount}</option>`;
                    });

                    // Populate loan durations
                    loanDurationSelect.innerHTML = '<option>Choose...</option>';
                    loanDurationSelect.disabled = false;

                    data.durations.forEach(duration => {
                        loanDurationSelect.innerHTML += `<option value="${duration}">${duration} months</option>`;
                    });
                });
        } else {
            loanAmountSelect.innerHTML = '<option>Choose...</option>';
            loanAmountSelect.disabled = true;
            loanDurationSelect.innerHTML = '<option>Choose...</option>';
            loanDurationSelect.disabled = true;
        }
    });
});
</script>
