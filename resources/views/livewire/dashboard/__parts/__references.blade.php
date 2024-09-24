<div class="space-y-6">
    <!-- HR Details -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- HR First Name -->
        <div>
            <label for="rpFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->fname : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpFirstName"
                   name="rp_fname">
            <small id="fnHRError" class="text-danger text-xs"></small>
        </div>
        <!-- HR Last Name -->
        <div>
            <label for="rpLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->lname : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpLastName"
                   name="rp_lname">
            <small id="lnHRError" class="text-danger text-xs"></small>
        </div>
        <!-- NRC Number -->
        <div>
            <label for="rpNRC" class="block text-sm font-medium text-gray-700">NRC Number</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->nrc_no : '' }}"
                   data-mask='000 0000 000'
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpNRC"
                   name="rp_nrc_no">
            <small id="contactHRError" class="text-danger text-xs"></small>
        </div>
        <!-- HR Contact Number -->
        <div>
            <label for="rpContactNumber" class="block text-sm font-medium text-gray-700">Contact Phone Number</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->phone : '' }}"
                   data-mask='000 0000 000'
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpContactNumber"
                   name="rp_phone">
            <small id="contactHRError" class="text-danger text-xs"></small>
        </div>
        <!-- Email Address -->
        <div>
            <label for="rpEmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->email : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpEmailAddress"
                   name="rp_email">
            <small id="supFNError" class="text-danger text-xs"></small>
        </div>
        <!-- Occupation (Job Title) -->
        <div>
            <label for="rpOccupation" class="block text-sm font-medium text-gray-700">Occupation (Job Title)</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->occupation : '' }}"
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpOccupation"
                   name="rp_occupation">
            <small id="supLNError" class="text-danger text-xs"></small>
        </div>
        <!-- Relation -->
        <div>
            <label for="rpRelation" class="block text-sm font-medium text-gray-700">Relation</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->relation : '' }}"
                   data-mask='000 0000 000'
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpRelation"
                   name="rp_relation">
            <small id="supContactError" class="text-danger text-xs"></small>
        </div>
        <!-- Gender -->
        <div>
            <label for="rp_gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select id="rp_gender" name="rp_gender" class="form-select block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">--Select One--</option>
                <option value="Male" {{ $util && $util->party && $util->party->first() && $util->party->first()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $util && $util->party && $util->party->first() && $util->party->first()->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <!-- Home Address -->
        <div>
            <label for="rpAddress" class="block text-sm font-medium text-gray-700">Home Address</label>
            <input type="text"
                   value="{{ $util && $util->party && $util->party->first() ? $util->party->first()->address : '' }}"
                   data-mask='000 0000 000'
                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="rpAddress"
                   name="rp_address">
            <small id="rp_addressError" class="text-danger text-xs"></small>
        </div>
    </div>
</div>