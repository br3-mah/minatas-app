<div>
    <div class="p-5 min-h-[calc(100vh-53px)] flex flex-col justify-between">
        <div class="text-black dark:text-muted">
            <div class="w-full" style="overflow-y: scroll; overflow-x:hidden; height:full">

                    <div class="py-2 pb-2 w-full "  id="wizard" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
                        <input type="hidden" name="application_id" value="{{ App\Models\Application::currentApplication()->id }}">
                        <input type="hidden" name="borrower_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <!-- Personal Info -->
                        <div id="step1" class="step w-full max-w-6xl mx-auto bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-2xl overflow-hidden">
                            <div class="p-12">
                                <div class="flex justify-between items-center mb-8 py-4">
                                    <h6 class="text-3xl font-bold text-info">Application Basic Info</h6>
                                    <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 1 of 6</div>
                                </div>

                                <div class="bg-white p-8 shadow-sm mb-8">
                                    <!-- Assuming __basic_info component exists -->
                                    @include('livewire.dashboard.__parts.__basic_info')
                                </div>

                                <div class="mt-10 flex justify-end">
                                    <button type="button"
                                        class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]"
                                        onclick="nextStep(1)"
                                    >
                                        Next
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 transform group-hover:translate-x-1 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div wire:ignore id="step2" class="step w-full">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">NRC and/or TPin Upload (KYC)</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 2 of 6</div>
                            </div>
                            @include('livewire.dashboard.__parts.__kyc_uploads')
                            <div class="flex justify-between mt-2">
                                <button type="button" class="btn bg-muted border border-muted text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white flex items-center mr-2" onclick="prevStep(2)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(2)">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <!-- Next of Kin Info -->
                        <div wire:ignore class="step" id="step3">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">Next Of Kin</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 3 of 6</div>
                            </div>
                            @include('livewire.dashboard.__parts.__next-of-kin')
                            <div class="flex justify-between mt-2">
                                <button type="button" class="flex items-center btn bg-muted border border-muted text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(3)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(3)">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- References -->
                        <div wire:ignore class="step" id="step4">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">Related Party</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 4 of 6</div>
                            </div>
                            @include('livewire.dashboard.__parts.__references')
                            <div class="flex justify-between mt-2">
                                <button type="button" class="items-center flex btn bg-muted border border-muted text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(4)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(4)">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Bank Details -->
                        <div wire:ignore class="step" id="step5">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">Your Bank Info</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 5 of 6</div>
                            </div>
                            @include('livewire.dashboard.__parts.__bank-info')
                            <div class="flex justify-between mt-2">
                                <button type="button" class="flex items-center btn bg-muted border border-muted text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(5)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(5)">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Bank Details -->
                        <div wire:ignore class="step" id="step6">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">Support Documents</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 6 of 6</div>
                            </div>
                            @include('livewire.dashboard.__parts.__doc_upload')
                            <div class="flex justify-between mt-2">
                                <button type="button" class="btn bg-muted border border-muted text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white flex items-center" onclick="prevStep(6)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="flex items-center btn bg-purple border border-purple text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(6)">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <!-- Loan Details -->
                        <div class="step p-6 bg-white shadow-md rounded-lg" id="step7">
                            <div class="flex justify-between items-center mb-8 py-4">
                                <h6 class="text-3xl font-bold text-info">My Application Summary</h6>
                                <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 6 of 6</div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="bg-gray-50 p-4 border border-gray-200 rounded-lg">
                                    <p class="text-sm text-gray-600">Loan Amount: <span class="font-bold text-gray-800">K{{ $loan->amount }}</span></p>
                                    <p class="text-sm text-gray-600">Loan Type: <span class="font-bold text-gray-800">{{ $this->get_loan_product($loan->loan_product_id)->name }} Loan</span></p>
                                    <p class="text-sm text-gray-600">Interest Rate: <span class="font-bold text-gray-800">{{ $this->get_loan_product($loan->loan_product_id)->def_loan_interest }} %</span></p>
                                    {{-- <p class="text-sm text-gray-600">Service Charge: <span class="font-bold text-gray-800">10%</span></p> --}}
                                    <p class="text-sm text-gray-600">Tenure: <span class="font-bold text-gray-800">{{ $loan->repayment_plan }} Month(s)</span></p>
                                    <input type="hidden" name="final" value="1">
                                </div>
                        
                                <!-- Right Column -->
                                <div class="bg-gray-50 p-4 border border-gray-200 rounded-lg">
                                    {{-- <p class="text-sm text-gray-600">You Will Receive: <span class="font-bold text-gray-800">K{{ App\Models\Application::receiveAmount($loan->amount, $loan->repayment_plan) }}</span></p> --}}
                                    <p class="text-sm text-gray-600">Payback Amount: <span class="font-bold text-gray-800">K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id) }}</span></p>
                                    <p class="text-sm text-gray-600">Next Payment Amount: <span class="font-bold text-gray-800">K{{ App\Models\Application::paybackInstallment($loan->amount, $loan->repayment_plan, $loan->loan_product_id) }}</span></p>
                                    <p class="text-sm text-gray-600">Next Payment Date: <span class="font-bold text-gray-800">{{ App\Models\Application::paybackNextDate($loan) }}</span></p>
                                    <p class="text-sm text-gray-600">Phone Number: <span class="font-bold text-gray-800">{{ auth()->user()->phone }}</span></p>
                                    <p class="text-sm text-gray-600">Email: <span class="font-bold text-gray-800">{{ auth()->user()->email }}</span></p>
                                </div>
                            </div>
                        
                            <div class="flex justify-between items-center mt-6">
                                <button  onclick="prevStep(7)" id="backicon" type="button" class="bg-muted border border-muted text-white py-2 px-4 flex items-center transition duration-300 hover:bg-muted/80 hover:border-muted/80 dark:text-white dark:border-darkmuted dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button wire:click="completeApplication()" id="submit_click" class="bg-success border border-success text-white py-2 px-4 flex items-center transition duration-300 hover:bg-success/80 hover:border-success/80 relative">
                                    <!-- Loading Indicator -->
                                    <div wire:loading class="absolute inset-0 flex items-center justify-center bg-success bg-opacity-50 z-10 rounded-lg">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 1 1 16 0A8 8 0 0 1 4 12z"></path>
                                        </svg>
                                        <span class="text-white ml-2">Processing...</span>
                                    </div>
                                    <div id="finishicon" class="flex items-center">
                                        Finish
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                        

                    </div>
            </div>
        </div>
    </div>


{{-- Script --}}
<script>
    let currentStep = 1;
    showStep(1);

    function showStep(step) {
      const steps = document.querySelectorAll('.step');
      steps.forEach((stepElem) => stepElem.style.display = 'none');

      const currentStep = document.getElementById('step' + step);
      currentStep.style.display = 'block';
    }

    function nextStep(step) {
      switch (step) {
        case 1:
          if (_validate_step1()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 2:
          if (_validate_step2()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 3:
          if (_validate_step3()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 4:
          if (_validate_step4()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 5:
          if (_validate_step5()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 6:

          if (_validate_step6()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;

        default:

          currentStep += 1;
          showStep(currentStep);
          break;
      }
    }

    function prevStep(step) {
        currentStep -= 1;
        showStep(currentStep);
    }

    document.getElementById('submit_click').addEventListener('click', function() {// Disable the button
        document.getElementById('submit_click').classList.remove('btn-primary');
        document.getElementById('submit_click').classList.add('text-dark');

        // Show loading animation and hide finish icon
        document.getElementById('ploading').style.display = 'inline-block';

        document.getElementById('finishicon').style.display = 'none';
        document.getElementById('backicon').style.display = 'none';

        // You can add additional logic here, such as form submission or other actions.

        // For demonstration purposes, let's simulate a delay (e.g., 3 seconds) before resetting the button state.
        setTimeout(function() {
            // Hide loading animation and show finish icon
            document.getElementById('ploading').style.display = 'none';
            document.getElementById('finishicon').style.display = 'inline-block';
            document.getElementById('backicon').style.display = 'inline-block';
        }, 10000);
    });

    function _validate_step1() {
        var isValid = true;

        function validateInput(inputElement, errorElement, errorMessage) {
            if (!inputElement.value || inputElement.value === "Choose...") {
                errorElement.textContent = errorMessage;
                inputElement.style.borderColor = 'red';
                isValid = false;
            } else {
                errorElement.textContent = '';
                inputElement.style.borderColor = '';
            }
        }

        var loan_type = document.getElementById('loanType');
        var loanTypeError = document.getElementById('loanTypeError');
        validateInput(loan_type, loanTypeError, 'First Choose a Loan Type');

        var loan_category = document.getElementById('loanCategory');
        var loanCategoryError = document.getElementById('loanCategoryError');
        validateInput(loan_category, loanCategoryError, 'Choose a Loan Category');

        var loan_package = document.getElementById('loanPackage');
        var loanPackageError = document.getElementById('loanPackageError');
        validateInput(loan_package, loanPackageError, 'Choose a Loan Package');

        var address = document.getElementById('address');
        var addressError = document.getElementById('addressError');
        validateInput(address, addressError, 'Address is required');

        var amount = document.getElementById('amount');
        var amountError = document.getElementById('amountError');
        validateInput(amount, amountError, 'Amount is required');

        var duration = document.getElementById('duration');
        var durationError = document.getElementById('durationError');
        validateInput(duration, durationError, 'Duration is required');

        var jobTitleInput = document.getElementById('jobTitleInput');
        var jobTitleError = document.getElementById('jobTitleError');
        validateInput(jobTitleInput, jobTitleError, 'Job Title is required');

        var employeeNo = document.getElementById('employeeNo');
        var employeeNoError = document.getElementById('employeeNoError');
        validateInput(employeeNo, employeeNoError, 'Employee Number is required');
        if (employeeNo.value.length !== 8) {
            employeeNoError.textContent = 'Employee Number must be 8 characters long';
            employeeNo.style.borderColor = 'red';
            isValid = false;
        }

        var dobInput = document.getElementById('dob');
        var dobError = document.getElementById('dobError');
        validateInput(dobInput, dobError, 'DOB is required');

        var phoneInput = document.getElementById('phone');
        var phoneError = document.getElementById('phoneError');
        validateInput(phoneInput, phoneError, 'Phone is required');

        var nrcInput = document.getElementById('nrc');
        var nrcError = document.getElementById('nrcError');
        validateInput(nrcInput, nrcError, 'Identification ID is required');

        var genderInput = document.getElementById('gender');
        var genderError = document.getElementById('genderError');
        validateInput(genderInput, genderError, 'Gender is required');

        var nrc_idInput = document.getElementById('id_type');
        var nrcIDError = document.getElementById('nrcIDError');
        validateInput(nrc_idInput, nrcIDError, 'Identification Type is required');

        //No Validation - Optional inputs
        var ministry = document.getElementById('ministry');
        var department = document.getElementById('department');

        if (!isValid) {
            return false;
        } else {
            var formData = new FormData();
            formData.append('jobTitle', jobTitleInput.value);
            formData.append('dob', dobInput.value);
            formData.append('phone', phoneInput.value);
            formData.append('nrc', nrcInput.value);
            formData.append('gender', genderInput.value);
            formData.append('id_type', nrc_idInput.value);
            formData.append('employeeNo', employeeNo.value);
            formData.append('ministry', ministry.value);
            formData.append('department', department.value);
            //-- Loan Info
            formData.append('loan_type', loan_type.value);
            formData.append('loan_category', loan_category.value);
            formData.append('loan_package', loan_package.value);
            formData.append('amount', amount.value);
            formData.append('duration', duration.value);
            formData.append('address', address.value);
            formData.append('borrower_id', '{{ auth()->user()->id }}');

            fetch("{{ route('continue-loan') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data successfully updated or created:', data);
            })
            .catch(error => {
                console.error('Error updating or creating data:', error);
            });
            return true;
        }
    }


    function _validate_step2() {
        var fileInput = document.getElementById('fileInput');
        var nrcFileError = document.getElementById('nrcFileError');
        var fileInput2 = document.getElementById('fileInput2');
        var fiileInput2Error = document.getElementById('fiileInput2Error');

        // Safely retrieve the paths from PHP variables
        var nrcExists = @json($nrcPath);
        var nrcBExists = @json($nrcBPath);
        var tpinExists = @json($tpinPath);

        // Check if the inputs are empty and the files do not exist
        if (fileInput.value === '' && nrcExists === '') {
            nrcFileError.textContent = 'Please upload an Image with this side of your ID Card';
            return false;
        }

        // Prepare data to send to the server
        var formData = new FormData();

        // Get the files
        if (fileInput.files.length > 0) {
            formData.append('nrc_file', fileInput.files[0]);
        }
        if (fileInput2.files.length > 0) {
            formData.append('nrc_b_file', fileInput2.files[0]);
        }

        // Perform Fetch API request to the Laravel backend
        fetch("{{ route('continue-loan') }}", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the success response from the server
            console.log('Data successfully updated or created:', data);
        })
        .catch(error => {
            // Handle the error response from the server
            console.error('Error updating or creating data:', error);
        });

        return true;
    }


    function _validate_step3(){
      // Required
      var nextOfKinFirstName = document.getElementById('nextOfKinFirstName');
      var nokFNError = document.getElementById('nokFNError');
      var nextOfKinLastName = document.getElementById('nextOfKinLastName');
      var nokLNError = document.getElementById('nokLNError');
      var nextOfKinPhone = document.getElementById('nextOfKinPhone');
      var nextOfKinPhoneError = document.getElementById('nextOfKinPhoneError');
      var relationshipInput = document.getElementById('relationship');
      var relationError = document.getElementById('relationError');
      var nokgender = document.getElementById('nokgender');
      var nokgenderError = document.getElementById('nokgenderError');
      // optionals
      var physicalAddress = document.getElementById('physicalAddress');

      var nrcInput = document.getElementById('nrcInput');
      var occupationInput = document.getElementById('occupationInput');



      // In this example, we'll check if the input is not empty
      if (!nextOfKinFirstName.value) {
        nokFNError.textContent = 'First Name required';
      }
      if (!nextOfKinLastName.value) {
        nokLNError.textContent = 'First Name required';
      }
      if (!nextOfKinPhone.value) {
        nextOfKinPhoneError.textContent = 'Phone number required';
      }
      if (!relationshipInput.value) {
        relationError.textContent = 'Your relation is required';
      }
      if (!nokgender.value) {
        nokgenderError.textContent = 'Gender is required';
      }

      if (!nokgender.value ||!nextOfKinLastName.value || !nextOfKinFirstName.value || !nextOfKinPhone.value || !relationshipInput.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('nokfname', nextOfKinFirstName.value);
          formData.append('noklname', nextOfKinLastName.value);
          formData.append('nokphone', nextOfKinPhone.value);
          formData.append('nokrelation', relationshipInput.value);
          formData.append('noknrc', nrcInput.value);
          formData.append('nokgender', nokgender.value);
          formData.append('nokoccupation', occupationInput.value);
          formData.append('nokaddress', physicalAddress.value);
          formData.append('borrower_id', '{{ auth()->user()->id }}');

          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }

    }

    function _validate_step4(){
      var rpFirstName = document.getElementById('rpFirstName');
      var fnHRError = document.getElementById('fnHRError');
      var rpLastName = document.getElementById('rpLastName');
      var lnHRError = document.getElementById('lnHRError');
      var rpContactNumber = document.getElementById('rpContactNumber');
      var contactHRError = document.getElementById('contactHRError');
      var rpEmailAddress = document.getElementById('rpEmailAddress');
      var supLNError = document.getElementById('supLNError');
      var rpOccupation = document.getElementById('rpOccupation');
      var supFNError = document.getElementById('supFNError');
      var rpRelation = document.getElementById('rpRelation');
      var supContactError = document.getElementById('supContactError');
      var rpAddress = document.getElementById('rpAddress');
      var rpGender = document.getElementById('rp_gender');
      var rpNRC = document.getElementById('rpNRC');


      // In this example, we'll check if the input is not empty
      if (!rpFirstName.value) {
        fnHRError.textContent = 'Related Party First Name required';
      }
      if (!rpLastName.value) {
        lnHRError.textContent = 'Related Party Last Name required';
      }
      if (!rpContactNumber.value) {
        contactHRError.textContent = 'Related Party contact is required';
      }

        //   ---- supervisor !mportant
    //   if (!rpOccupation.value) {
    //     supLNError.textContent = 'Supervisor First Name';
    //   }
    //   if (!rpEmailAddress.value) {
    //     supFNError.textContent = 'Supervisor Last Name';
    //   }
    //   if (!rpRelation.value) {
    //     supContactError.textContent = 'Supervisor Conact Number';
    //   }
    // || !rpOccupation.value || !rpEmailAddress.value || !rpRelation.value
      if (!rpFirstName.value || !rpLastName.value || !rpContactNumber.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('rp_fname', rpFirstName.value);
          formData.append('rp_lname', rpLastName.value);
          formData.append('rp_phone', rpContactNumber.value);
          formData.append('rp_email', rpEmailAddress.value);
          formData.append('rp_occupation', rpOccupation.value);
          formData.append('rp_relation', rpRelation.value);
          formData.append('rp_nrc_no', rpNRC.value);
          formData.append('rp_address', rpAddress.value);
          formData.append('rp_gender', rpGender.value);
          formData.append('application_id', '{{ $activeLoan->id }}');
          formData.append('borrower_id', '{{ auth()->user()->id }}');

          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }
    }

    function _validate_step5(){
      var bankName = document.getElementById('bankName');
      var bankNameError = document.getElementById('bankNameError');
      var branchName = document.getElementById('branchName');
      var bankBranchError = document.getElementById('bankBranchError');
      var accountNumber = document.getElementById('accountNumber');
      var bankAccError = document.getElementById('bankAccError');
      var accountNames = document.getElementById('accountNames');
      var bankAccNameError = document.getElementById('bankAccNameError');

      // In this example, we'll check if the input is not empty
      if (!bankName.value) {
        bankNameError.textContent = 'Bank Name required';
      }
      if (!branchName.value) {
        bankBranchError.textContent = 'Branch Name required';
      }
      if (!accountNumber.value) {
        bankAccError.textContent = 'Account Number is required';
      }
      if (!accountNames.value) {
        bankAccNameError.textContent = 'Account Name required';
      }

      if (!bankName.value || !branchName.value || !accountNumber.value || !accountNames.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('bankName', bankName.value);
          formData.append('branchName', branchName.value);
          formData.append('accountNames', accountNames.value);
          formData.append('accountNumber', accountNumber.value);
          formData.append('user_id', '{{ auth()->user()->id }}');

          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }
    }

    function _validate_step6(){
        var fileInput3 = document.getElementById('fileInput3');
        var payslipError = document.getElementById('payslipError');
        var fileInput4 = document.getElementById('fileInput4');
        var bankstatementError = document.getElementById('bankstatementError');
        var fileInput5 = document.getElementById('fileInput5');
        var passportError = document.getElementById('passportError');

        var payslipExists = "{{ $util && $util->uploads->where('name', 'nrc_file')->first() ? $util->uploads->where('name', 'nrc_file')->first()->path : '' }}";
        var bankExists = "{{ $util && $util->uploads->where('name', 'bankstatement')->first() ? $util->uploads->where('name', 'bankstatement')->first()->path : '' }}";
        var passportExists = "{{ $util && $util->uploads->where('name', 'passport')->first() ? $util->uploads->where('name', 'passport')->first()->path : '' }}";
        var preapprovalExists = "{{ $util && $util->uploads->where('name', 'preapproval')->first() ? $util->uploads->where('name', 'preapproval')->first()->path : '' }}";
        var letterExists = "{{ $util && $util->uploads->where('name', 'letterofintro')->first() ? $util->uploads->where('name', 'letterofintro')->first()->path : '' }}";


        payslipError.textContent = '';
        bankstatementError.textContent = '';
        passportError.textContent = '';

        // we'll check if the input is not empty
        if (!fileInput3.value && payslipExists === '') {
            // alert('1');
            payslipError.textContent = 'Please upload copy of Latest Payslip';
        }

        // if (!fileInput4.value && bankExists === '' ) {
        //     // alert('2');
        //     bankstatementError.textContent = 'Please upload copy of Bank Statement';
        // }
        if (!fileInput5.value && passportExists === '') {
            // alert('3');
            passportError.textContent = 'Please upload a Passport size photo';
        }

        if (!fileInput3.value && payslipExists === '' ||
            // !fileInput4.value && bankExists === '' ||
            !fileInput5.value && passportExists === ''
            ){
            return false;
        } else {
            // Prepare data to send to the server
            var formData = new FormData();

            // Get the files
            formData.append('payslip_file', fileInput3.files[0]);
            formData.append('bankstatement', fileInput4.files[0]);
            formData.append('passport', fileInput5.files[0]);

            // Perform Fetch API request to the Laravel backend
            fetch("{{ route('continue-loan') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the success response from the server
                console.log('Data successfully updated or created:', data);
            })
            .catch(error => {
                // Handle the error response from the server
                // console.error('Error updating or creating data:', error);
            });
            return true;
        }

    }

    // NRC
    // JavaScript to handle file selection and removal
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');

    const uploadedFiles = [];
    // const uploadedFilesJson = [];

    // JavaScript to handle file selection and removal
    fileInput.addEventListener('change', function () {
        const files = this.files;
        // Initialize an array to store uploaded file names
        if (files.length > 0) {
            // Add the uploaded files to the uploadedFiles array
            Array.from(files).forEach(file => {
                uploadedFiles.push(file);

                const listItem = document.createElement('li');
                listItem.className = 'file-item grid pb-1';
                listItem.innerHTML = `
                    <span class="grid-file-item">${file.name}</span>
                    <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
                `;
                fileList.appendChild(listItem);
            });
        }
    });

    fileList.addEventListener('click', function (e) {
        // console.log(e.target.classList.value);
        if (e.target.classList.value == 'grid-file-item-btn') {
            const fileName = e.target.getAttribute('data-name');
            const fileItem = e.target.parentElement;
            fileItem.remove();
            // Remove the file name from the uploadedFiles array
            const fileIndex = uploadedFiles.indexOf(fileName);
            if (fileIndex !== -1) {
                uploadedFiles.splice(fileIndex, 1);
            }
            // Update the hidden input with the updated uploaded files
            myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
            // You can perform additional actions here (e.g., remove the file from the server).
        }
    });


  //Tpin File Upload
  // JavaScript to handle file selection and removal
  const fileInput2 = document.getElementById('fileInput2');
  const fileList2 = document.getElementById('fileList-2');

  const uploadedFiles2 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput2.addEventListener('change', function () {
  const files = this.files;
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {

          uploadedFiles2.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList2.appendChild(listItem);
      });
  }
  });

  fileList2.addEventListener('click', function (e) {
    // console.log(e.target.classList.value);
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles2.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });


  // 3 months bank statement
  // JavaScript to handle file selection and removal
  const fileInput3 = document.getElementById('fileInput3');
  const fileList3 = document.getElementById('fileList-3');

  const uploadedFiles3 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput3.addEventListener('change', function () {
  const files = this.files;
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {

          uploadedFiles3.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList3.appendChild(listItem);
      });
  }
  });
  fileList3.addEventListener('click', function (e) {
  if (e.target.classList.value == 'grid-file-item-btn') {
      const fileName = e.target.getAttribute('data-name');
      const fileItem = e.target.parentElement;
      fileItem.remove();
      // Remove the file name from the uploadedFiles array
      const fileIndex = uploadedFiles.indexOf(fileName);
      if (fileIndex !== -1) {
          uploadedFiles3.splice(fileIndex, 1);
      }
      // Update the hidden input with the updated uploaded files
      myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
      // You can perform additional actions here (e.g., remove the file from the server).
  }
  });


  // Passport
  // JavaScript to handle file selection and removal
  const fileInput4 = document.getElementById('fileInput4');
  const fileList4 = document.getElementById('fileList-4');

  const uploadedFiles4 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput4.addEventListener('change', function () {
  const files = this.files;
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {

          uploadedFiles4.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList4.appendChild(listItem);
      });
  }
  });
  fileList4.addEventListener('click', function (e) {
  if (e.target.classList.value == 'grid-file-item-btn') {
      const fileName = e.target.getAttribute('data-name');
      const fileItem = e.target.parentElement;
      fileItem.remove();
      // Remove the file name from the uploadedFiles array
      const fileIndex = uploadedFiles.indexOf(fileName);
      if (fileIndex !== -1) {
          uploadedFiles4.splice(fileIndex, 1);
      }
      // Update the hidden input with the updated uploaded files
      myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
      // You can perform additional actions here (e.g., remove the file from the server).
  }
  });

  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput5 = document.getElementById('fileInput5');
  const fileList5 = document.getElementById('fileList-5');

  const uploadedFiles5 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput5.addEventListener('change', function () {
    const files = this.files;
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {

            uploadedFiles5.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList5.appendChild(listItem);
        });
    }
  });
  fileList5.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles5.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });

  </script>

</div>
