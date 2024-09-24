//Scope
let apply_btn,
    duration,
    time_frame,
    slider_amount,
    update_side_amount,
    result_amount,
    result_duration,
    slider_duration,
    loan_id,
    loantype,
    activeLoanType, // Variable to store the active loan type
    //amount
    max_loan_amount,
    min_loan_amount,
    step_loan_amount,
    //duration
    max_loan_duration,
    min_loan_duration,
    total_repayment,
    monthly_repayment,
    result_payment,
    input_duration;

//API Handler
class LoanService {
    constructor(baseUrl, apiEndpoint) {
        this.apiUrl = `${baseUrl}${apiEndpoint}`;
    }

    handleErrors(response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response;
    }

    async fetchLoanProducts() {
        try {
            const response = await fetch(this.apiUrl);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Error fetching data:", error.message);
            throw error;
        }
    }
}

/* LAUNCH CALCULATOR BEHAVIOR */
document.addEventListener("DOMContentLoaded", async function () {
    // UI VARIABLES
    apply_btn = document.querySelector("#apply");
    duration = document.getElementById("duration");
    time_frame = document.getElementById("time_frame");
    slider_amount = document.getElementById("slidatious");
    update_side_amount = document.getElementById("update_side");
    result_amount = document.getElementById("amountatious");
    result_duration = document.getElementById("result_duration");
    slider_duration = document.getElementById("loan_duration");
    input_duration = document.getElementById("time_duration");
    total_repayment = document.getElementById("total_repayment");
    monthly_repayment = document.getElementById("monthly_repayment");
    result_payment = document.getElementById("result_payment");

    let loan_products = document.getElementById("loan_products");

    // BASE URL
    const baseUrl =
        window.location.protocol +
        "//" +
        window.location.hostname +
        (window.location.port ? ":" + window.location.port : "") +
        window.location.pathname;

    // INITIAL UI BEHAVIOR
    
    apply_btn.disabled = true;
    apply_btn.innerHTML = "INPUT DETAILS ABOVE";


    // Function to fetch loan products
    const loanApiEndpoint = "api/get-loan-products";

    const loanService = new LoanService(baseUrl, loanApiEndpoint);
    try {
        const loanProducts = await loanService.fetchLoanProducts();

        let radioGroupHtml = "";

        let foundActiveProduct = false;

        if (loanProducts.length === 0) {
            // Handle the case when no loan products are available
            const noProductsSVG = encodeURIComponent(`
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="8" y1="8" x2="16" y2="16" />
                <line x1="8" y1="16" x2="16" y2="8" />
            </svg>
        `);

            radioGroupHtml = `
            <div class="col-12">
                <label class="custom-radio" style="opacity: 0.5;">
                    <input disabled type="radio" name="loan_type" value="no_product" onclick="checker()">
                    <div class="radio-btn">
                        <div class="content">
                            <div class="mb-2">
                                <!-- Use the data URI in the img tag -->
                                <img width="50" src="data:image/svg+xml,${noProductsSVG}" />
                            </div>
                            <h2>No Products Available</h2>
                            <p class="skill">We're sorry, but there are no loan products available at the moment.</p>

                        </div>
                    </div>
                </label>
            </div>`;
        } else {
            localStorage.setItem("loanProducts", JSON.stringify(loanProducts));

            loanProducts.forEach((product) => {
                const isActiveProduct = product.status === 1;
                const isChecked = isActiveProduct && !foundActiveProduct;

                // Use different SVG for checked and unchecked radio buttons
                const productIconSVG = isChecked
                    ? encodeURIComponent(product.icon_alt)
                    : encodeURIComponent(product.icon);

                radioGroupHtml += `
                    <div class="col-6">
                        <label class="custom-radio" style="opacity: ${
                            isActiveProduct ? "1" : "0.5"
                        };">
                            <input ${
                                isActiveProduct ? "enabled" : "disabled"
                            } type="radio" data-name="${product.name}"
                                   name="loan_type" value="${product.id}"
                                   onclick="checker()" ${
                                       isActiveProduct ? "checked" : ""
                                   }>
                            <!-- Add product details dynamically here --><div class="radio-btn">
                            <div class="content">
                                <div class="mb-2">
                                    <img width="50px" src="data:image/svg+xml,${productIconSVG}" />
                                </div>
                                <h2>${product.name}</h2>
                                <p class="skill">${
                                    product.description
                                } ${isActiveProduct ? "(Available)" : "<br>(Coming Soon)"}</p>
                                <span class="check-icon">
                                    <span class="icon"></span>
                                </span>
                            </div>
                        </div>
                        </label>
                    </div>`;

                if (isActiveProduct && !foundActiveProduct) {
                    foundActiveProduct = true;
                    activeLoanType = product.id;
                    max_loan_amount = product.max_principal_amount;
                    min_loan_amount = product.min_principal_amount;
                    max_loan_duration = product.max_loan_duration;
                    min_loan_duration = product.min_loan_duration;
                }
            });
        }

        loan_products.innerHTML = radioGroupHtml;
    } catch (error) {
        // Handle errors if needed
    }

    window.checker = function checker() {
        loantype = document.querySelector('input[name="loan_type"]:checked');

        if (loantype) {
            // Check if a loan type is selected
            loan_id = loantype.value;
            //loantype.setAttribute('src', 'test.img')

            // Check if the selected loan type is the active one
            if (loan_id) {
                apply_btn.disabled = false;
                apply_btn.innerHTML = "APPLY NOW";

                // Assign other UI variables based on the selected loan type
                populate(loan_id, slider_amount, slider_duration);
            } else {
                apply_btn.disabled = true;
                apply_btn.innerHTML = "FINISH ENTERING DETAILS!";
            }
        } else {
            // Handle the case when no loan type is selected
            apply_btn.disabled = true;
            apply_btn.innerHTML = "SELECT A LOAN TYPE";
        }
    };

    checker();

    // Function to populate UI based on selected loan type
    // Function to update the slider background
    function updateSliderBackground(sliderElement) {
        const tempSliderValue = sliderElement.value;
        const min = parseInt(sliderElement.min, 10),
            max = parseInt(sliderElement.max, 10);
        const position = ((tempSliderValue - min) / (max - min)) * 100;

        sliderElement.style.background = `linear-gradient(to right, #792db8 0%, #792db8 ${position}%, #c6c7c9 ${position}%, #c6c7c9 100%)`;
    }

    function updateDuration(event) {
        const value = parseInt(event.target.value, 10);
        duration.value = value;
        time_frame.innerHTML = value === 1 ? " Month" : " Months";
        if (loan_id === 2) {
            // Your business loan specific logic here
        }
        result_duration.innerHTML = value;
    }

    function updateAmount(event) {
        const value = parseInt(event.target.value, 10);
        update_side_amount.value = value;
        result_amount.innerHTML = value;
    }

    function updatePaymentDetails() {
        // Calculate total repayment and monthly repayment based on loan amount and duration
        // Update the UI elements accordingly
        const loanAmount = parseInt(update_side_amount.value);
        const loanDuration = parseInt(duration.value);

        // Your calculation logic here

        total_repayment.innerHTML = "Calculated total repayment";
        monthly_repayment.innerHTML = "Calculated monthly repayment";
        result_payment.innerHTML = "Calculated next repayment date";
    }

    function populate(id, principal, duration) {
        // Function to populate UI elements based on the selected loan type
        if (id === activeLoanType) {
            // Your specific logic to populate UI elements based on the loan type
            // For example, setting slider range, default values, etc.
            // This is just a placeholder, replace with your actual logic
            principal.min = min_loan_amount;
            principal.max = max_loan_amount;
            principal.value = min_loan_amount;

            duration.min = min_loan_duration;
            duration.max = max_loan_duration;
            duration.value = min_loan_duration;

            updateSliderBackground(principal);
        }
    }

    //Event Listeners

    slider_amount.addEventListener("input", updateAmount);
    slider_amount.addEventListener("input", updatePaymentDetails);
    slider_amount.addEventListener("mousemove", updateSliderBackground);
    slider_duration.addEventListener("input", updateDuration);
    input_duration.addEventListener("input", updateDuration);
    input_duration.addEventListener("change", updateDuration);
    input_duration.addEventListener("mousemove", updateDuration);

    //Initial
    //checker();
});
