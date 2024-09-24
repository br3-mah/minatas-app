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
      
      <!-- Existing Photos -->
      @if (!empty(auth()->user()->photos->toArray()))
        <div class="flex flex-row space-x-3 mb-8 gap-3 mt-4">
          @foreach (auth()->user()->photos as $photo)
            <img src="{{ url('public/storage/' . $photo->path) }}" alt="user-img" class="w-1/3 h-32 object-cover rounded-md shadow-md">
          @endforeach
        </div>
      @endif
    <form action="{{ route('update-profile') }}" enctype="multipart/form-data" method="POST" class="space-y-8 mt-4">
      @csrf
      <!-- Image Uploads -->
      <div class="d-flex flex-row space-x-4 mb-8 gap-2">
        <!-- Primary Photo -->
        <div class="flex-1 border-2 border-dashed rounded-lg p-4 flex flex-col items-center justify-center">
          <div id="primary-image-preview-container" class="w-full h-40 bg-gray-100 rounded-md mb-4 flex items-center justify-center">Upload your Primary photo</div>
          <button type="button" class="px-4 py-2 bg-info text-white rounded-md hover:bg-blue-500 transition-colors" onclick="document.getElementById('primary_image').click();">Upload Primary Photo</button>
          <input type="file" id="primary_image" name="primary_image_path" class="hidden" onchange="previewImages(event, 'primary-image-preview-container')">
          @if ($errors->has('primary_image_path'))
            <small class="text-red-500 mt-2">{{ $errors->first('primary_image_path') }}</small>
          @endif
        </div>
  
        <!-- Secondary Photo -->
        <div class="flex-1 border-2 border-dashed rounded-lg p-4 flex flex-col items-center justify-center">
          <div id="secondary-image-preview-container" class="w-full h-40 bg-gray-100 rounded-md mb-4 flex items-center justify-center">Upload your Secondary photo</div>
          <button type="button" class="px-4 py-2 bg-info text-white rounded-md hover:bg-blue-500 transition-colors" onclick="document.getElementById('secondary_image').click();">Upload Secondary Photo</button>
          <input type="file" id="secondary_image" name="secondary_image_path" class="hidden" onchange="previewImages(event, 'secondary-image-preview-container')">
          @if ($errors->has('secondary_image_path'))
            <small class="text-red-500 mt-2">{{ $errors->first('secondary_image_path') }}</small>
          @endif
        </div>
  
        <!-- Tertiary Photo -->
        <div class="flex-1 border-2 border-dashed rounded-lg p-4 flex flex-col items-center justify-center">
          <div id="tertiary-image-preview-container" class="w-full h-40 bg-gray-100 rounded-md mb-4 flex items-center justify-center">Upload your  Tetiary photo</div>
          <button type="button" class="px-4 py-2 bg-info text-white rounded-md hover:bg-blue-500 transition-colors" onclick="document.getElementById('tertiary_image').click();">Upload Tertiary Photo</button>
          <input type="file" id="tertiary_image" name="tertiary_image_path" class="hidden" onchange="previewImages(event, 'tertiary-image-preview-container')">
          @if ($errors->has('tertiary_image_path'))
            <small class="text-red-500 mt-2">{{ $errors->first('tertiary_image_path') }}</small>
          @endif
        </div>
      </div>
      <script>
        function previewImages(event, previewContainerId) {
            const fileInput = event.target;
            const previewContainer = document.getElementById(previewContainerId);

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Set the image preview
                    previewContainer.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-md" alt="Image Preview">`;
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                previewContainer.innerHTML = 'Upload your photo';
            }
        }

      </script>
  
      <!-- Input Fields -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="fname" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
          <input type="text" id="fname" name="fname" class="w-full form-control p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->fname }}" placeholder="Enter your first name">
        </div>
  
        <div>
          <label for="lname" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
          <input type="text" id="lname" name="lname" class="w-full form-control p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->lname }}" placeholder="Enter your last name">
        </div>
  
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <input type="email" id="email" name="email" readonly class="w-full form-control p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none" value="{{ auth()->user()->email }}">
        </div>
  
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
          <input type="text" id="phone" name="phone" class="w-full form-control p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->phone }}">
        </div>
  
        <div>
          <label for="id_type" class="block text-sm font-medium text-gray-700 mb-2">National ID Type</label>
          <select id="id_type" name="id_type" class=" form-control w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option value="">-- Choose --</option>
            <option {{ auth()->user()->id_type == 'NRC' ? 'selected' : '' }} value="NRC">NRC</option>
            <option {{ auth()->user()->id_type == 'Passport' ? 'selected' : '' }} value="Passport">Passport</option>
            <option {{ auth()->user()->id_type == 'Driver License' ? 'selected' : '' }} value="Driver License">Driver License</option>
          </select>
        </div>
  
        <div>
          <label for="nrc_no" class="block text-sm font-medium text-gray-700 mb-2">National ID Number</label>
          <input type="text" id="nrc_no" name="nrc_no" class= form-control w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->nrc_no }}">
        </div>
  
        <div>
          <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
          <select id="gender" name="gender" class=" form-control w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option value="{{ auth()->user()->gender }}">{{ auth()->user()->gender }}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
  
        <div>
          <label for="datepicker" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
          <input type="text" id="datepicker" name="dob" class=" form-control w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->dob }}" autocomplete="off">
        </div>
  
        <div>
          <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Present Address</label>
          <input type="text" id="address" name="address" class="w-full p-3 form-control border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->address }}">
        </div>
  
        <div>
          <label for="occupation" class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
          <input type="text" id="occupation" name="occupation" class="w-full form-control p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ auth()->user()->occupation ?? auth()->user()->jobTitle }}">
        </div>
  
        <div class="md:col-span-2">
          <label for="about" class="block text-sm font-medium text-gray-700 mb-2">About Me</label>
          <textarea id="about" name="about" rows="4" class="w-full p-3 border form-control border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">{{ auth()->user()->about_me }}</textarea>
        </div>
      </div>
  
      <!-- Submit Button -->
      <button type="submit" class="btn bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">
        Save Changes
      </button>
    </form>
  </div>