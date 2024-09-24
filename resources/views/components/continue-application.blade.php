  
    <div class="flex flex-wrap justify-center gap-4">
        <div>
            <div class="fixed inset-0 bg-black/80 z-[99999] hidden overflow-y-auto dark:bg-dark/90">
                <div class="flex items-stretch justify-center min-h-screen">
                    <div x-show="open" x-transition x-transition.duration.300 class="relative w-full p-0 overflow-hidden bg-white border shadow-3xl border-black/10 dark:bg-darklight dark:border-darkborder">
                        <div class="flex items-center justify-between px-5 py-3 bg-white border-b border-black/10 dark:bg-darklight dark:border-darkborder">
                            <h5 class="text-lg font-semibold dark:text-white">Your Loan Application</h5>
                            <button type="button" class="text-muted hover:text-black dark:hover:text-white" @click="toggle">
                                <svg class="w-5 h-5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.2929 6.29289L6.29289 24.2929C6.10536 24.4804 6 24.7348 6 25C6 25.2652 6.10536 25.5196 6.29289 25.7071C6.48043 25.8946 6.73478 26 7 26C7.26522 26 7.51957 25.8946 7.70711 25.7071L25.7071 7.70711C25.8946 7.51957 26 7.26522 26 7C26 6.73478 25.8946 6.48043 25.7071 6.29289C25.5196 6.10536 25.2652 6 25 6C24.7348 6 24.4804 6.10536 24.2929 6.29289Z" fill="currentcolor" />
                                    <path d="M7.70711 6.29289C7.51957 6.10536 7.26522 6 7 6C6.73478 6 6.48043 6.10536 6.29289 6.29289C6.10536 6.48043 6 6.73478 6 7C6 7.26522 6.10536 7.51957 6.29289 7.70711L24.2929 25.7071C24.4804 25.8946 24.7348 26 25 26C25.2652 26 25.5196 25.8946 25.7071 25.7071C25.8946 25.5196 26 25.2652 26 25C26 24.7348 25.8946 24.4804 25.7071 24.2929L7.70711 6.29289Z" fill="currentcolor" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 space-y-4 min-h-[calc(100vh-53px)] flex flex-col justify-between">
                            <div class="text-black dark:text-muted">
                                <div class="w-full" style="overflow-y: scroll; overflow-x:hidden; height:63vh">

                                        <form class="py-2 pb-2 w-full " method="post" action="{{ route('continue-loan') }}"  id="wizard" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
                                            <input type="hidden" name="application_id" value="{{ App\Models\Application::currentApplication()->id }}">
                                            <input type="hidden" name="borrower_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <!-- Personal Info -->
                                            <div id="step1" class="step w-full max-w-6xl mx-auto bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-2xl overflow-hidden">
                                                <div class="p-12">
                                                    <div class="flex justify-between items-center mb-8 py-4">
                                                        <h5 class="text-3xl font-bold text-gray-800">Basic Info</h5>
                                                        <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 1 of 6</div>
                                                    </div>
                                                    
                                                    <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
                                                        @include('livewire.dashboard.__parts.__basic_info')
                                                    </div>
                                                    
                                                    <div class="mt-10 flex justify-end">
                                                        <button type="button" 
                                                            class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]"
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

                                            <div id="step2" class="step w-full">
                                                <div class="flex justify-between items-center mb-8 py-4">
                                                    <h5 class="text-3xl font-bold text-gray-800">NRC and/or TPin Upload (KYC)</h5>
                                                    <div class="bg-indigo-100 text-indigo-800 text-base font-medium px-4 py-2 rounded-full shadow-sm">Step 2 of 6</div>
                                                </div>
                                                @include('livewire.dashboard.__parts.__kyc_uploads')
                                                <div class="flex justify-between mt-2">
                                                    <button type="button" class="btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white flex items-center mr-2" onclick="prevStep(2)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="button" class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(2)">
                                                        Next
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            

                                            <!-- Next of Kin Info -->
                                            <div class="step" id="step3">
                                                @include('livewire.dashboard.__parts.__next-of-kin')
                                                <div class="flex justify-between mt-2">
                                                    <button type="button" class="flex items-center btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(3)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="button" class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(3)">
                                                        Next
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <!-- References -->
                                            <div class="step" id="step4">
                                                <h5>References</h5>
                                                <p>Human Resource Details:</p>
                                                <br>
                                                @include('livewire.dashboard.__parts.__references')
                                                <div class="flex justify-between mt-2">
                                                    <button type="button" class="items-center flex btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(4)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="button" class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(4)">
                                                        Next
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Bank Details -->
                                            <div class="step" id="step5">
                                                <h5>Bank Details</h5>
                                                <br>
                                                @include('livewire.dashboard.__parts.__bank-info')
                                                <div class="flex justify-between mt-2">
                                                    <button type="button" class="flex items-center btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white" onclick="prevStep(5)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="button" class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(5)">
                                                        Next
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Bank Details -->
                                            <div class="step" id="step6">
                                                <div style="width: 90%" class="d-block justify-content-start mb-2">
                                                    <h5>Requirements</h5>
                                                    <span class="justify-content-end items-right float-right text-left">
                                                        <p>Click the button below to share preapproval form, if missing</p>
                                                        <button title="Send the preapproval form to employer, manager, or supervisor" type="button" class="btn btn-sm" style="background-color: rgb(54, 15, 94)" onclick="openSendDocModal()">Send Preapproval</button>
                                                    </span>
                                                </div>
                                                <br>
                                                @include('livewire.dashboard.__parts.__doc_upload')
                                                <div class="flex justify-between mt-2">
                                                    <button type="button" class="btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white flex items-center" onclick="prevStep(6)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="button" class="flex items-center btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" onclick="nextStep(6)">
                                                        Next
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>


                                            <!-- Loan Details -->
                                            <div class="step" id="step7">
                                                <h5>Loan Summary Details</h5>
                                                <br>
                                                <div class="col-lg-12 row">
                                                    <div class="form-group col-md-6">
                                                        <p>Loan Amount: <b>K{{ $activeLoan->amount }}</b> </p>
                                                        <p>Loan Type: <b>{{ App\Models\Application::loanProduct($activeLoan->loan_product_id)->name  }} Loan</b> </p>
                                                        <p>Interest rate: <b> {{App\Models\Application::loanProduct($activeLoan->loan_product_id)->def_loan_interest }} %</b> </p>
                                                        <p>Service Charge:  <b>10%</b> </p>
                                                        <p>Tenure: <b>{{ $activeLoan->repayment_plan }} (Months)</b> </p>

                                                        <input type="hidden" name="final" value="1">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <p>You will receive: <b>K {{ App\Models\Application::receiveAmount($activeLoan->amount, $activeLoan->repayment_plan)}}</b> </p>
                                                        <p>Payback Amount: <b>K {{ App\Models\Application::payback($activeLoan->amount, $activeLoan->repayment_plan, $activeLoan->loan_product_id)}}</b> </p>
                                                        <p>Next Payment Amount: <b>K {{ App\Models\Application::paybackInstallment($activeLoan->amount, $activeLoan->repayment_plan, $activeLoan->loan_product_id)}}</b> </p>
                                                        <p>Next Payment Date: <b> {{ App\Models\Application::paybackNextDate($activeLoan) }}</b> </p>
                                                        <p>Phone Number: <b>{{ auth()->user()->phone }}</b> </p>
                                                        <p>Email: <b>{{ auth()->user()->email }}</b> </p>
                                                    </div>
                                                </div>
                                                <div class="flex justify-between mt-2">
                                                    <button id="backicon" type="button" class="btn bg-muted border border-muted rounded-full text-white transition-all duration-300 hover:bg-muted/[0.85] hover:border-muted/[0.85] dark:text-white dark:border-darkmuted dark:hover:text-white flex items-center" onclick="prevStep(7)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                        </svg>
                                                        Back
                                                    </button>
                                                    <button type="submit" id="submit_click" class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                                                        <div id="ploading" style="display:none;">
                                                            <svg width="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="#ffff" stroke="#ffff" stroke-width="2" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin="0"></animate></circle><circle fill="#ffff" stroke="#BB14FF" stroke-width="2" opacity=".8" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin="0.05"></animate></circle><circle fill="#F0E7F9" stroke="#BB14FF" stroke-width="2" opacity=".6" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".1"></animate></circle><circle fill="#BB14FF" stroke="#BB14FF" stroke-width="2" opacity=".4" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".15"></animate></circle><circle fill="#BB14FF" stroke="#BB14FF" stroke-width="2" opacity=".2" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".2"></animate></circle></svg>
                                                            <small>Please wait...</small>
                                                        </div>
                                                        <div id="finishicon">
                                                            Finish
                                                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
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

    function _validate_step1(){
      var jobTitleInput = document.getElementById('jobTitleInput');
      var jobTitleError = document.getElementById('jobTitleError');
      var employeeNo = document.getElementById('employeeNo');
      var employeeNoError = document.getElementById('employeeNoError');
      var dobInput = document.getElementById('dob');
      var dobError = document.getElementById('dobError');
      var phoneInput = document.getElementById('phone');
      var phoneError = document.getElementById('phoneError');
      var nrcInput = document.getElementById('nrc');
      var nrcError = document.getElementById('nrcError');
      var genderInput = document.getElementById('gender');
      var genderError = document.getElementById('genderError');
      var nrc_idInput = document.getElementById('nrc_id');
      var nrcIDError = document.getElementById('nrcIDError');

      var ministry = document.getElementById('ministry');
      var department = document.getElementById('department');

      // In this example, we'll check if the input is not empty
      if (!employeeNo.value) {
          employeeNoError.textContent = 'Employee Number is required';
      }
      if (employeeNo.value.length !== 8) {
        employeeNoError.textContent = 'Employee Number must be 8 characters long';
      }
      if (!jobTitleInput.value) {
          jobTitleError.textContent = 'Job Title is required';
      }
      if (!dobInput.value) {
          dobError.textContent = 'DOB is required';
      }
      if (!phoneInput.value) {
          phoneError.textContent = 'Phone is required';
      }
      if (!nrcInput.value) {
          nrcError.textContent = 'Identification ID is required';
      }

      if (!genderInput.value) {
          genderError.textContent = 'Gender is required';
      }
      if (!nrc_idInput.value) {
          nrcIDError.textContent = 'Identification Type is required';
      }

      if (!employeeNo.value || !jobTitleInput.value || !dobInput.value || !phoneInput.value || !nrcInput.value || !genderInput.value || !nrc_idInput.value) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('jobTitle', jobTitleInput.value);
          formData.append('dob', dobInput.value);
          formData.append('phone', phoneInput.value);
          formData.append('nrc', nrcInput.value);
          formData.append('gender', genderInput.value);
          formData.append('nrc_id', nrc_idInput.value);
          formData.append('employeeNo', employeeNo.value);
          formData.append('ministry', ministry.value);
          formData.append('department', department.value);
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

    function _validate_step2() {
        var fileInput = document.getElementById('fileInput');
        var nrcFileError = document.getElementById('nrcFileError');
        var fileInput2 = document.getElementById('fileInput2');
        var fiileInput2Error = document.getElementById('fiileInput2Error');

        // Safely retrieve the paths from PHP variables
        var nrcExists = @json($nrcPath);
        var tpinExists = @json($tpinPath);

        console.log(nrcExists);
        console.log(tpinExists);
        // Check if the inputs are empty and the files do not exist
        if (fileInput.value === '' && nrcExists === '') {
            nrcFileError.textContent = 'Please upload a copy of your national ID';
            return false;
        }

        // Prepare data to send to the server
        var formData = new FormData();

        // Get the files
        if (fileInput.files.length > 0) {
            formData.append('nrc_file', fileInput.files[0]);
        }
        if (fileInput2.files.length > 0) {
            formData.append('tpin_file', fileInput2.files[0]);
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
      // optionals
      var physicalAddress = document.getElementById('physicalAddress');



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

      if (!nextOfKinLastName.value || !nextOfKinFirstName.value || !nextOfKinPhone.value || !relationshipInput.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('nextOfKinFirstName', nextOfKinFirstName.value);
          formData.append('nextOfKinLastName', nextOfKinLastName.value);
          formData.append('nextOfKinPhone', nextOfKinPhone.value);
          formData.append('relationship', relationshipInput.value);
          formData.append('physicalAddress', physicalAddress.value);
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
      var hrFirstName = document.getElementById('hrFirstName');
      var fnHRError = document.getElementById('fnHRError');
      var hrLastName = document.getElementById('hrLastName');
      var lnHRError = document.getElementById('lnHRError');
      var hrContactNumber = document.getElementById('hrContactNumber');
      var contactHRError = document.getElementById('contactHRError');
      var supervisorFirstName = document.getElementById('supervisorFirstName');
      var supLNError = document.getElementById('supLNError');
      var supervisorLastName = document.getElementById('supervisorLastName');
      var supFNError = document.getElementById('supFNError');
      var supervisorContactNumber = document.getElementById('supervisorContactNumber');
      var supContactError = document.getElementById('supContactError');


      // In this example, we'll check if the input is not empty
      if (!hrFirstName.value) {
        fnHRError.textContent = 'HR First Name required';
      }
      if (!hrLastName.value) {
        lnHRError.textContent = 'HR Last Name required';
      }
      if (!hrContactNumber.value) {
        contactHRError.textContent = 'HR contact is required';
      }

        //   ---- supervisor !mportant
    //   if (!supervisorLastName.value) {
    //     supLNError.textContent = 'Supervisor First Name';
    //   }
    //   if (!supervisorFirstName.value) {
    //     supFNError.textContent = 'Supervisor Last Name';
    //   }
    //   if (!supervisorContactNumber.value) {
    //     supContactError.textContent = 'Supervisor Conact Number';
    //   }
    // || !supervisorLastName.value || !supervisorFirstName.value || !supervisorContactNumber.value
      if (!hrFirstName.value || !hrLastName.value || !hrContactNumber.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('hrFirstName', hrFirstName.value);
          formData.append('hrLastName', hrLastName.value);
          formData.append('hrContactNumber', hrContactNumber.value);
          formData.append('supervisorFirstName', supervisorFirstName.value);
          formData.append('supervisorLastName', supervisorLastName.value);
          formData.append('supervisorContactNumber', supervisorContactNumber.value);
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
        var fileInput6 = document.getElementById('fileInput6');
        var preapprovalError = document.getElementById('preapprovalError');
        var fileInput7 = document.getElementById('fileInput7');
        var letterError = document.getElementById('letterError');

        var payslipExists = "{{ $util && $util->uploads->where('name', 'nrc_file')->first() ? $util->uploads->where('name', 'nrc_file')->first()->path : '' }}";
        var bankExists = "{{ $util && $util->uploads->where('name', 'bankstatement')->first() ? $util->uploads->where('name', 'bankstatement')->first()->path : '' }}";
        var passportExists = "{{ $util && $util->uploads->where('name', 'passport')->first() ? $util->uploads->where('name', 'passport')->first()->path : '' }}";
        var preapprovalExists = "{{ $util && $util->uploads->where('name', 'preapproval')->first() ? $util->uploads->where('name', 'preapproval')->first()->path : '' }}";
        var letterExists = "{{ $util && $util->uploads->where('name', 'letterofintro')->first() ? $util->uploads->where('name', 'letterofintro')->first()->path : '' }}";


        payslipError.textContent = '';
        bankstatementError.textContent = '';
        passportError.textContent = '';
        preapprovalError.textContent = '';

        // we'll check if the input is not empty
        if (!fileInput3.value && payslipExists === '') {
            // alert('1');
            payslipError.textContent = 'Please upload copy of Latest Payslip';
        }

        if (!fileInput4.value && bankExists === '' ) {
            // alert('2');
            bankstatementError.textContent = 'Please upload copy of Bank Statement';
        }
        if (!fileInput5.value && passportExists === '') {
            // alert('3');
            passportError.textContent = 'Please upload a Passport size photo';
        }
        if (!fileInput6.value && preapprovalExists === '') {
            // alert('4');
            preapprovalError.textContent = 'Please upload signed Preapproval form';
        }

            //   !fileInput7.value || letterExists === 'null' --letter of introduction
        if (!fileInput3.value && payslipExists === '' ||
            !fileInput4.value && bankExists === '' ||
            !fileInput5.value && passportExists === '' ||
            !fileInput6.value && preapprovalExists === ''
            ){
            return false;
        } else {
            // Prepare data to send to the server
            var formData = new FormData();

            // Get the files
            formData.append('payslip_file', fileInput3.files[0]);
            formData.append('bankstatement', fileInput4.files[0]);
            formData.append('passport', fileInput5.files[0]);
            formData.append('preapproval', fileInput6.files[0]);
            formData.append('letterofintro', fileInput7.files[0]);

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


  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput6 = document.getElementById('fileInput6');
  const fileList6 = document.getElementById('fileList-6');

  const uploadedFiles6 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput6.addEventListener('change', function () {
    const files = this.files;
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {

            uploadedFiles6.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList6.appendChild(listItem);
        });
    }
  });
  fileList6.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles6.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });


  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput7 = document.getElementById('fileInput7');
  const fileList7 = document.getElementById('fileList-7');

  const uploadedFiles7 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput7.addEventListener('change', function () {
    const files = this.files;
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {

            uploadedFiles7.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList7.appendChild(listItem);
        });
    }
  });
  fileList6.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles6.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });
  </script>
