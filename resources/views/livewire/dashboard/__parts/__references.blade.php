<div class="space-y-6">
    <!-- HR Details -->
    <div class="row g-3 needs-validation custom-input tooltip-valid validation-forms">
        <!-- HR First Name -->
        <div class="col-md-4 position-relative">
            <label for="rpFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->fname : '' }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpFirstName"
                   name="rp_fname">
            <small id="fnHRError" class="text-xs text-danger"></small>
        </div>
        <!-- HR Last Name -->
        <div class="col-md-4 position-relative">
            <label for="rpLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->lname : '' }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpLastName"
                   name="rp_lname">
            <small id="lnHRError" class="text-xs text-danger"></small>
        </div>
        <!-- NRC Number -->
        <div class="col-md-4 position-relative">
            <label for="rpNRC" class="block text-sm font-medium text-gray-700">NRC Number</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->nrc_no : '' }}"
                   data-mask='000 0000 000'
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpNRC"
                   name="rp_nrc_no">
            <small id="contactHRError" class="text-xs text-danger"></small>
        </div>
        <!-- HR Contact Number -->
        <div class="col-md-4 position-relative">
            <label for="rpContactNumber" class="block text-sm font-medium text-gray-700">Contact Phone Number</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->phone : '' }}"
                   data-mask='000 0000 000'
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpContactNumber"
                   name="rp_phone">
            <small id="contactHRError" class="text-xs text-danger"></small>
        </div>
        <!-- Email Address -->
        <div class="col-md-4 position-relative">
            <label for="rpEmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->email : '' }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpEmailAddress"
                   name="rp_email">
            <small id="supFNError" class="text-xs text-danger"></small>
        </div>
        <!-- Occupation (Job Title) -->
        <div class="col-md-4 position-relative">
            <label for="rpOccupation" class="block text-sm font-medium text-gray-700">Occupation (Job Title)</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->occupation : '' }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpOccupation"
                   name="rp_occupation">
            <small id="supLNError" class="text-xs text-danger"></small>
        </div>
        <!-- Relation -->
        <div class="col-md-4 position-relative">
            <label for="rpRelation" class="block text-sm font-medium text-gray-700">Relation</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->relation : '' }}"
                   data-mask='000 0000 000'
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpRelation"
                   name="rp_relation">
            <small id="supContactError" class="text-xs text-danger"></small>
        </div>
        <!-- Gender -->
        <div class="col-md-4 position-relative">
            <label for="rp_gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select id="rp_gender" name="rp_gender" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-select focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">--Select One--</option>
                <option value="Male" {{ $util && $util->party && $util->party->first() && $util->party->first()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $util && $util->party && $util->party->first() && $util->party->first()->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <!-- Home Address -->
        <div class="col-md-4 position-relative">
            <label for="rpAddress" class="block text-sm font-medium text-gray-700">Home Address</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->address : '' }}"
                   data-mask='000 0000 000'
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpAddress"
                   name="rp_address">
            <small id="rp_addressError" class="text-xs text-danger"></small>
        </div>
    </div>
</div>