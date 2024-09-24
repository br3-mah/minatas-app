<style>
    /* Add some basic styles for file previews */
    .file-preview-item {
        margin-bottom: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .file-preview-item img {
        border-radius: 4px;
    }
    </style>
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- NRC File Upload -->
        <div class="border border-gray-300 rounded-md p-4">
            <input
                type="file"
                class="sr-only"
                id="fileInput"
                accept=".png, .jpg, .avif, .jpeg, .webp"
                name="nrc_file"
                value="{{ $util && $util->uploads->where('name', 'nrc_file')->first() ? $util->uploads->where('name', 'nrc_file')->first()->path : '' }}"
            >
            <label for="fileInput" class="block text-lg font-medium text-gray-700 mb-2">
                Upload Image of your ID Card <b>Front View</b>
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-gray-400 transition-colors duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            (NRC / Other Card Front)
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">
                        PDF, DOC, DOCX up to 10MB
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <ul class="file-list" id="fileList"></ul>
                @if ($nrcPath)
                    <p class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">
                        You uploaded a ID Card on
                        {{ $util->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() }}

                    </p>
                @else
                <p>Empty NRC</p>
                @endif
            </div>
            <small id="nrcFileError" class="text-danger text-xs"></small>
        </div>















        <!-- TPIN File Upload -->
        <div class="border border-gray-300 rounded-md p-4">
            <input
                type="file"
                class="sr-only"
                id="fileInput2"
                accept=".png, .jpg, .avif, .jpeg, .webp"
                name="nrc_b_file"
                value="{{ $util && $util->uploads->where('name', 'nrc_b_file')->first() ? $util->uploads->where('name', 'nrc_b_file')->first()->path : '' }}"
            >
            <label for="fileInput2" class="block text-lg font-medium text-gray-700 mb-2">
                Upload Image of your ID Card <b>Back View</b>
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-gray-400 transition-colors duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            (NRC / Other Card Back)
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">
                        PDF, DOC, DOCX up to 10MB
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <ul class="file-list-2" id="fileList-2"></ul>
                @if ($nrcBPath)
                    <p class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">
                        You uploaded your ID Card (Back) on
                        {{ $util->uploads->where('name', 'nrc_b_file')->first()->created_at->toFormattedDateString() }}
                    </p>
                @else
                <p>Empty NRC</p>
                @endif
            </div>
            <small id="fileInput2Error" class="text-danger text-xs"></small>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle the preview for NRC File Upload
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const fileList = event.target.files;
            const fileListContainer = document.getElementById('fileList');

            fileListContainer.innerHTML = ''; // Clear previous previews

            for (const file of fileList) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const listItem = document.createElement('li');
                    listItem.className = 'file-preview-item';
                    listItem.innerHTML = `
                        <img src="${e.target.result}" alt="${file.name}" class="w-32 h-32 object-cover">
                        <p class="text-xs text-gray-500">${file.name}</p>
                    `;
                    fileListContainer.appendChild(listItem);
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle the preview for TPIN File Upload
        document.getElementById('fileInput2').addEventListener('change', function(event) {
            const fileList = event.target.files;
            const fileListContainer = document.getElementById('fileList-2');

            fileListContainer.innerHTML = ''; // Clear previous previews

            for (const file of fileList) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const listItem = document.createElement('li');
                    listItem.className = 'file-preview-item';
                    listItem.innerHTML = `
                        <img src="${e.target.result}" alt="${file.name}" class="w-32 h-32 object-cover">
                        <p class="text-xs text-gray-500">${file.name}</p>
                    `;
                    fileListContainer.appendChild(listItem);
                };
                reader.readAsDataURL(file);
            }
        });
    });
    </script>

