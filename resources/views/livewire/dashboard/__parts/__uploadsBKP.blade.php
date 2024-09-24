
<div class="col-xxl-12 col-xl-12 col-lg-12">
    <div class="text-success" id="sendDocResponseText">Pre-approval forms share successfully</div>
    <div class="text-danger" id="sendDocResponseText2">Could not send, Please try again</div>
</div>

<div class="row col-md-12 col-lg-12">
    <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
        @php
            $payslip = $meta != null ? $meta->uploads->where('name', 'payslip_file')->first() : null;
        @endphp
        <input type="file" value="{{ $payslip != null ? $payslip->path : '' }}" class="file-input visually-hidden" id="fileInput3" accept=".pdf, .doc, .docx" name="payslip_file">
        <label for="fileInput3" class="file-input-label">
            <span>Upload Latest Payslip</span>
        </label>
        <div class="pt-2">
            <ul class="file-list-2" id="fileList-3"></ul>
            @if ($payslip != null)
                <p class="file-list">You uploaded a Payslip Copy on {{ $payslip->created_at->toFormattedDateString() }}</p>
            @endif
        </div>
        <small id="payslipError" class="text-danger"></small>
    </div>

    <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
        @php
            $bankstatement = $meta != null ? $meta->uploads->where('name', 'bankstatement')->first() : null;
        @endphp
        <input type="file" value="{{ $bankstatement != null ? $bankstatement->path : '' }}" class="file-input visually-hidden" id="fileInput4" accept=".pdf, .doc, .docx" name="bankstatement">
        <label for="fileInput4" class="file-input-label">
            <span>3 months Bank statement</span>
        </label>
        <div class="pt-2">
            <ul class="file-list-3" id="fileList-4"></ul>
            @if ($bankstatement != null)
                <p class="file-list">You uploaded a Bank Statement Copy on {{ $bankstatement->created_at->toFormattedDateString() }}</p>
            @endif
        </div>
        <small id="bankstatementError" class="text-danger"></small>
    </div>

    <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
        @php
            $passport = $meta != null ? $meta->uploads->where('name', 'passport')->first() : null;
        @endphp
        <input type="file" value="{{ $passport != null ? $passport->path : '' }}" class="file-input visually-hidden" id="fileInput5" accept=".pdf, .doc, .docx" name="passport">
        <label for="fileInput5" class="file-input-label">
            <span>Passport size photo</span>
        </label>
        <div class="pt-2">
            <ul class="file-list-4" id="fileList-5"></ul>
            @if ($passport != null)
                <p class="file-list">You uploaded a Passport Size photo on {{ $passport->created_at->toFormattedDateString() }}</p>
            @endif
        </div>
        <small id="passportError" class="text-danger"></small>
    </div>

    <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
        @php
            $preapproval = $meta != null ? $meta->uploads->where('name', 'preapproval')->first() : null;
        @endphp
        <input type="file" value="{{ $preapproval != null ? $preapproval->path : '' }}" class="file-input visually-hidden" id="fileInput6" accept=".pdf, .doc, .docx" name="preapproval">
        <label for="fileInput6" class="file-input-label">
            <span>Pre approval Document</span>
        </label>
        <div class="pt-2">
            <ul class="file-list-5" id="fileList-6"></ul>
            @if ($preapproval != null)
                <p class="file-list">You uploaded a Pre-approval form Copy on {{ $preapproval->created_at->toFormattedDateString() }}</p>
            @endif
        </div>
        <small id="preapprovalError" class="text-danger"></small>
    </div>

    <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
        @php
            $letterofintro = $meta != null ? $meta->uploads->where('name', 'letterofintro')->first() : null;
        @endphp
        <input type="file" value="{{ $letterofintro != null ? $letterofintro->path : '' }}" class="file-input visually-hidden" id="fileInput7" accept=".pdf, .doc, .docx" name="letterofintro">
        <label for="fileInput7" class="file-input-label">
            <span>Letter of Introduction <span class="badge badge-danger bg-danger">Optional</span></span>
        </label>
        <div class="pt-2">
            <ul class="file-list-5" id="fileList-7"></ul>
            @if ($letterofintro != null)
                <p class="file-list">You uploaded a Letter of Introduction Copy on {{ $letterofintro->created_at->toFormattedDateString() }}</p>
            @endif
        </div>
        <small id="letterError" class="text-danger"></small>
    </div>
</div>