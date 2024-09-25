
<div class="row g-3 needs-validation custom-input tooltip-valid validation-forms">
    <div class="col-md-4 position-relative">
        <label for="nextOfKinFirstName">First Name</label>
        <input type="text"
               value="{{ auth()->user()->nokfname }}"
               class="form-control"
               id="nextOfKinFirstName"
               name="nokfname">
        <small id="nokFNError" class="text-danger"></small>
    </div>
    <div class="col-md-4 position-relative">
        <label for="nextOfKinLastName">Last Name</label>
        <input type="text"
               value="{{ auth()->user()->noklname }}"
               class="form-control"
               id="nextOfKinLastName"
               name="noklname">
        <small id="nokLNError" class="text-danger"></small>
    </div>
</div>

<div class="row g-3 needs-validation custom-input tooltip-valid validation-forms">
    <div class="col-md-4 position-relative">
        <label for="nextOfKinPhone">Contact Phone Number</label>
        <div class="input-group">
            <input
                id="nextOfKinPhone"
                type="text"
                value="{{ auth()->user()->nokphone }}"
                name="nokphone"
                class="form-control"
                data-mask='000 000 000'
                placeholder=""
            />
        </div>
        <small id="nextOfKinPhoneError" class="text-danger"></small>
    </div>
    <div class="col-md-4 position-relative">
        <label for="physicalAddress">Home Address (Optional)</label>
        <input type="text" 
               value="{{ auth()->user()->nokaddress }}"  
               class="form-control" 
               id="physicalAddress" 
               name="nokaddress">
        <small id="addressError" class="text-danger"></small>
    </div>
</div>

<div class="row g-3 needs-validation custom-input tooltip-valid validation-forms">
    <div class="col-md-4 position-relative">
        <label for="nrcInput">NRC Number</label>
        <div class="input-group">
            <input
                id="nrcInput"
                type="text"
                value="{{ auth()->user()->noknrc }}"
                name="noknrc"
                class="form-control"
                data-mask='000 000 000'
                placeholder=""
            />
        </div>
    </div>
    <div  class="col-md-4 position-relative">
        <label for="occupationInput">Occupation</label>
        <input type="text" 
               value="{{ auth()->user()->nokoccupation }}"  
               class="form-control" 
               id="occupationInput" 
               name="nokoccupation">
    </div>
</div>

<div class="row g-3 needs-validation custom-input tooltip-valid validation-forms">
    <div  class="col-md-4 position-relative">
        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
        <select id="nokgender" name="nokgender" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-select focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">--Select One--</option>
            <option value="Male" {{ auth()->user()->nokgender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ auth()->user()->nokgender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        <small id="nokgenderError" class="text-xs text-danger"></small>
        <small id="nextOfKinPhoneError" class="text-danger"></small>
    </div>
    <div class="col-md-4 position-relative">
        <label for="relationship">Relationship with Borrower</label>
        <input type="text" 
               value="{{ auth()->user()->nokrelation }}"  
               class="form-control" 
               id="relationship" 
               name="relation">
        <small id="relationError" class="text-danger"></small>
    </div>
</div>
