<div class="space-y-6">

    <!-- File Upload Section -->
    <div class="items-center justify-center gap-2 row">
        <!-- Latest Payslip -->
        <div class="p-4 rounded-md shadow col-xl-3 col-3">
            @php
                $payslip = $util != null ? $util->uploads->where('name', 'payslip_file')->first() : null;
            @endphp
            <label for="fileInput3" class="block mb-2 text-sm font-medium text-gray-700">
                Upload Latest Payslip (Optional) &nbsp;&nbsp;<span class="text-right text-info">Click here</span>
            </label>
            <div id="clickable" class="flex justify-center px-6 pt-5 pb-6 mt-1 transition-colors duration-200 rounded-md cursor-pointer">
                <input type="file" value="{{ $payslip != null ? $payslip->path : '' }}" class="sr-only" id="fileInput3" accept=".pdf, .doc, .docx" name="payslip_file">
                <div class="space-y-1 text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span>Upload a file</span>
                    </div>
                    <p class="text-xs text-gray-500">
                        PDF, DOC, DOCX up to 10MB
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <ul class="file-list-2" id="fileList-3"></ul>
                @if ($payslip != null)
                    <p class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">You uploaded a Payslip Copy on {{ $payslip->created_at->toFormattedDateString() }}</p>
                @endif
            </div>
            <small id="payslipError" class="text-xs text-danger"></small>
        </div>

        <!-- 3 months Bank statement -->
        <div class="p-4 rounded-md shadow col-xl-3 col-3">
            @php
                $bankstatement = $util != null ? $util->uploads->where('name', 'bankstatement')->first() : null;
            @endphp
            <input type="file" value="{{ $bankstatement != null ? $bankstatement->path : '' }}" class="sr-only" id="fileInput4" accept=".pdf, .doc, .docx" name="bankstatement">
            <label for="fileInput4" class="block mb-2 text-sm font-medium text-gray-700">
                3 months Bank statement (Optional) &nbsp;&nbsp;<span class="text-right text-info">Click here</span>
            </label>
            <div id="clickable2" class="flex justify-center px-6 pt-5 pb-6 mt-1 transition-colors duration-200 rounded-md cursor-pointer ">
                <div class="space-y-1 text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span>Upload a file</span>
                    </div>
                    <p class="text-xs text-gray-500">
                        PDF, DOC, DOCX up to 10MB
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <ul class="file-list-3" id="fileList-4"></ul>
                @if ($bankstatement != null)
                    <p class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">You uploaded a Bank Statement Copy on {{ $bankstatement->created_at->toFormattedDateString() }}</p>
                @endif
            </div>
            <small id="bankstatementError" class="text-xs text-danger"></small>
        </div>

        <!-- Passport size photo -->
        <div class="p-4 rounded-md shadow col-xl-3 col-3">
            @php
                $passport = $util != null ? $util->uploads->where('name', 'passport')->first() : null;
            @endphp
            <label for="fileInput5" class="block mb-2 text-sm font-medium text-gray-700">
                Passport size photo &nbsp;&nbsp;<span class="text-right text-info">Click here</span>
            </label>
            <div id="clickable3" class="flex justify-center px-6 pt-5 pb-6 mt-1 transition-colors duration-200 rounded-md cursor-pointer ">
                <div class="space-y-1 text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span>Upload a file</span>
                    </div>
                    <p class="text-xs text-gray-500">
                        PDF, DOC, DOCX up to 10MB
                    </p>            
                    <input type="file" value="{{ $passport != null ? $passport->path : '' }}" class="sr-only " id="fileInput5" accept=".png, .jpg, .jpeg, .webp, .avif" name="passport">

                </div>
            </div>
            <div class="mt-2">
                <ul class="file-list-4" id="fileList-5"></ul>
                @if ($passport != null)
                    <p class="inline-flex items-center rounded shadow-md shadow-success/50 text-xs justify-center px-1.5 py-0.5 bg-success text-white">You uploaded a Passport Size photo on {{ $passport->created_at->toFormattedDateString() }}</p>
                @endif
            </div>
            <small id="passportError" class="text-xs text-danger"></small>
        </div>
        
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Preview for Bank Statement and Payslip
    function previewFile(inputId, fileListId) {
        const input = document.getElementById(inputId);
        const fileList = document.getElementById(fileListId);

        input.addEventListener('change', function () {
            fileList.innerHTML = ''; // Clear previous list
            const file = input.files[0];

            if (file) {
                const listItem = document.createElement('li');
                listItem.textContent = file.name;
                fileList.appendChild(listItem);
            }
        });
    }

    // Preview for Passport Size Photo (Image Preview)
    function previewImage(inputId, fileListId) {
        const input = document.getElementById(inputId);
        const fileList = document.getElementById(fileListId);

        input.addEventListener('change', function () {
            fileList.innerHTML = ''; // Clear previous list
            const file = input.files[0];

            if (file && file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.classList.add('w-full', 'h-auto', 'rounded-md', 'shadow-md');
                fileList.appendChild(img);
            } else {
                const listItem = document.createElement('li');
                listItem.textContent = file.name;
                fileList.appendChild(listItem);
            }
        });
    }

    // Function to make an area clickable and open file input
    function makeClickable(clickableId, inputId) {
        const clickableArea = document.getElementById(clickableId);
        const input = document.getElementById(inputId);

        if (clickableArea && input) {
            clickableArea.addEventListener('click', function() {
                input.click();
            });
        }
    }

    // Initialize previews
    previewFile('fileInput3', 'fileList-3'); // Payslip
    previewFile('fileInput4', 'fileList-4'); // Bank Statement
    previewImage('fileInput5', 'fileList-5'); // Passport Size Photo

    // Make areas clickable
    makeClickable('clickable', 'fileInput3'); // Payslip
    makeClickable('clickable2', 'fileInput4'); // Bank Statement
    makeClickable('clickable3', 'fileInput5'); // Passport Size Photo
});
</script>