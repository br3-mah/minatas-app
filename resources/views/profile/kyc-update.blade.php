<div>
 <style>

/* Form container */
.mt-4 {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    margin: 2rem auto;
}

/* Section styles */
.mb-8 {
    margin-bottom: 1.5rem;
}

h3 {
    color: #2c7a54;
    font-size: 1.25rem;
    margin-bottom: 1rem;
    border-bottom: 2px solid #2c7a54;
    padding-bottom: 0.5rem;
}

/* Grid layout */
.grid {
    display: grid;
    gap: 1rem;
}

.grid-cols-1 { grid-template-columns: 1fr; }
.md\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
.lg\:grid-cols-3 { grid-template-columns: repeat(3, 1fr); }

/* Form elements */
label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #2c7a54;
    margin-bottom: 0.25rem;
}

input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #c3dfd0;
    border-radius: 4px;
    font-size: 0.875rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
select:focus {
    outline: none;
    border-color: #2c7a54;
    box-shadow: 0 0 0 2px rgba(44, 122, 84, 0.2);
}

/* File upload area */
.border-dashed {
    border: 2px dashed #c3dfd0;
    border-radius: 4px;
    padding: 1rem;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s, background-color 0.3s;
}

.border-dashed:hover {
    border-color: #2c7a54;
    background-color: #f0f8f1;
}

.border-dashed svg {
    width: 2rem;
    height: 2rem;
    color: #2c7a54;
    margin-bottom: 0.5rem;
}

.border-dashed .text-indigo-600 {
    color: #2c7a54;
}

/* Submit button */
button[type="submit"] {
    background-color: #2c7a54;
    color: #ffffff;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

button[type="submit"]:hover {
    background-color: #1e5e3f;
    transform: translateY(-2px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .mt-4 {
        padding: 1rem;
    }
    
    .grid {
        gap: 0.75rem;
    }
}

/* Image preview */
.aspect-w-1 {
    position: relative;
    padding-bottom: 100%;
}

.aspect-h-1 img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
}
</style>   
    <form action="{{ route('update-kyc-uploads') }}" method="POST" enctype="multipart/form-data" id="wizardForm" class="mt-4">
      @csrf
      
      <!-- Personal Information -->
      <div class="mb-3">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div>
            <label for="fname" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
            <input type="text" id="fname" name="fname" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your first name" value="{{ auth()->user()->fname }}">
          </div>
          <div>
            <label for="lname" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
            <input type="text" id="lname" name="lname" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your last name" value="{{ auth()->user()->lname }}">
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
            <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your phone number" value="{{ auth()->user()->phone }}">
          </div>
          <div>
            <label for="id_type" class="block text-sm font-medium text-gray-700 mb-1">National ID Type</label>
            <select id="id_type" name="id_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option {{ auth()->user()->id_type == null ? 'selected' : '' }} value="">-- Choose --</option>
              <option {{ auth()->user()->id_type == 'NRC' ? 'selected' : '' }} value="NRC">NRC</option>
              <option {{ auth()->user()->id_type == 'Passport' ? 'selected' : '' }} value="Passport">Passport</option>
              <option {{ auth()->user()->id_type == 'Driver License' ? 'selected' : '' }} value="Driver License">Driver License</option>
            </select>
          </div>
          <div>
            <label for="nrc_no" class="block text-sm font-medium text-gray-700 mb-1">National ID Number</label>
            <input type="text" id="nrc_no" name="nrc_no" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your ID number" value="{{ auth()->user()->nrc_no }}">
          </div>
          <div>
            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Sex</label>
            <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="{{ auth()->user()->gender }}">{{ auth()->user()->gender }}</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div>
            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
            <input type="text" id="dob" name="dob" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="YYYY-MM-DD" value="{{ auth()->user()->dob }}" autocomplete="off">
          </div>
          <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Present Address</label>
            <input type="text" id="address" name="address" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your current address" value="{{ auth()->user()->address }}">
          </div>
          <div>
            <label for="occupation" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
            <input type="text" id="occupation" name="occupation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your job title" value="{{ auth()->user()->occupation ?? auth()->user()->jobTitle }}">
          </div>
        </div>
      </div>
      
      <!-- Document Upload -->
      <div class="mb-2">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Document Upload</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 d-flex">
          <!-- NRC Front -->
          <div class="col-xl-3 col-lg-3">
            <label for="nrc_file" class="block text-sm font-medium text-gray-700 mb-1">NRC Front</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer" onclick="document.getElementById('nrc_file').click()">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <span class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    Upload a file
                  </span>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
            <input id="nrc_file" name="nrc_file" type="file" class="sr-only" required onchange="previewImage(this, 'nrc_front_preview')">
            <div id="nrc_front_preview" class="mt-2 hidden">
              <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md">
                <img src="" alt="NRC Front Preview" class="object-cover">
              </div>
            </div>
          </div>
      
          <!-- NRC Back -->
          <div class="col-xl-3 col-lg-3">
            <label for="nrc_b_file" class="block text-sm font-medium text-gray-700 mb-1">NRC Back</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer" onclick="document.getElementById('nrc_b_file').click()">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <span class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    Upload a file
                  </span>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
            <input id="nrc_b_file" name="nrc_b_file" type="file" class="sr-only" required onchange="previewImage(this, 'nrc_back_preview')">
            <div id="nrc_back_preview" class="mt-2 hidden">
              <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md">
                <img src="" alt="NRC Back Preview" class="object-cover">
              </div>
            </div>
          </div>
      
          <!-- TPIN Document -->
          <div class="col-xl-3 col-lg-3">
            <label for="tpin_file" class="block text-sm font-medium text-gray-700 mb-1">TPIN Document</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer" onclick="document.getElementById('tpin_file').click()">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <span class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    Upload a file
                  </span>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
            <input id="tpin_file" name="tpin_file" type="file" class="sr-only" required onchange="previewImage(this, 'tpin_preview')">
            <div id="tpin_preview" class="mt-2 hidden">
              <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md">
                <img src="" alt="TPIN Document Preview" class="object-cover">
              </div>
            </div>
          </div>
        </div>
        
      <!-- Submit Button -->
      <div class="d-flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300">
          Save Changes
        </button>
      </div>
      </div>
      
      <script>
      function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        const reader = new FileReader();
      
        reader.onloadend = function () {
          preview.querySelector('img').src = reader.result;
          preview.classList.remove('hidden');
        }
      
        if (file) {
          reader.readAsDataURL(file);
        } else {
          preview.classList.add('hidden');
        }
      }
      
      // Add drag and drop functionality
      const dropZones = document.querySelectorAll('.border-dashed');
      dropZones.forEach(zone => {
        zone.addEventListener('dragover', (e) => {
          e.preventDefault();
          zone.classList.add('border-indigo-500');
        });
      
        zone.addEventListener('dragleave', () => {
          zone.classList.remove('border-indigo-500');
        });
      
        zone.addEventListener('drop', (e) => {
          e.preventDefault();
          zone.classList.remove('border-indigo-500');
          const file = e.dataTransfer.files[0];
          const input = zone.nextElementSibling;
          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(file);
          input.files = dataTransfer.files;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        });
      });
      </script>
      
    </form>
  </div>