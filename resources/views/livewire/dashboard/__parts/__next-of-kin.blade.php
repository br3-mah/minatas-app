
<div class="flex flex-wrap gap-4 mb-4">
    <div class="form-group flex-1">
        <label for="nextOfKinFirstName">First Name</label>
        <input type="text"
               value="{{ auth()->user()->nokfname }}"
               class="form-input"
               id="nextOfKinFirstName"
               name="nokfname">
        <small id="nokFNError" class="text-danger"></small>
    </div>
    <div class="form-group flex-1">
        <label for="nextOfKinLastName">Last Name</label>
        <input type="text"
               value="{{ auth()->user()->noklname }}"
               class="form-input"
               id="nextOfKinLastName"
               name="noklname">
        <small id="nokLNError" class="text-danger"></small>
    </div>
</div>

<div class="flex flex-wrap gap-4 mb-4">
    <div class="form-group flex-1">
        <label for="nextOfKinPhone">Contact Phone Number</label>
        <div class="input-group">
            <input
                id="nextOfKinPhone"
                type="text"
                value="{{ auth()->user()->nokphone }}"
                name="nokphone"
                class="form-input"
                data-mask='000 000 000'
                placeholder=""
            />
        </div>
        <small id="nextOfKinPhoneError" class="text-danger"></small>
    </div>
    <div class="form-group flex-1">
        <label for="physicalAddress">Home Address (Optional)</label>
        <input type="text" 
               value="{{ auth()->user()->nokaddress }}"  
               class="form-input" 
               id="physicalAddress" 
               name="nokaddress">
        <small id="addressError" class="text-danger"></small>
    </div>
</div>

<div class="flex flex-wrap gap-4 mb-4">
    <div class="form-group flex-1">
        <label for="nrcInput">NRC Number</label>
        <div class="input-group">
            <input
                id="nrcInput"
                type="text"
                value="{{ auth()->user()->noknrc }}"
                name="noknrc"
                class="form-input"
                data-mask='000 000 000'
                placeholder=""
            />
        </div>
    </div>
    <div class="form-group flex-1">
        <label for="occupationInput">Occupation</label>
        <input type="text" 
               value="{{ auth()->user()->nokoccupation }}"  
               class="form-input" 
               id="occupationInput" 
               name="nokoccupation">
    </div>
</div>

<div class="flex flex-wrap gap-4 mb-4">
    <div class="form-group flex-1">
        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
        <select id="nokgender" name="nokgender" class="form-select block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">--Select One--</option>
            <option value="Male" {{ auth()->user()->nokgender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ auth()->user()->nokgender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        <small id="nokgenderError" class="text-danger text-xs"></small>
        <small id="nextOfKinPhoneError" class="text-danger"></small>
    </div>
    <div class="form-group flex-1">
        <label for="relationship">Relationship with Borrower</label>
        <input type="text" 
               value="{{ auth()->user()->nokrelation }}"  
               class="form-input" 
               id="relationship" 
               name="relation">
        <small id="relationError" class="text-danger"></small>
    </div>
</div>
