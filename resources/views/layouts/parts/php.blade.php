@php
    // Global Variables
    $meta = App\Models\User::meta();
    $nrcPath = $meta && $meta->uploads->where('name', 'nrc_file')->first() ? $meta->uploads->where('name', 'nrc_file')->first()->path : '';
    $tpinPath = $meta && $meta->uploads->where('name', 'tpin_file')->first() ? $meta->uploads->where('name', 'tpin_file')->first()->path : '';
    $nrcBPath = $meta && $meta->uploads->where('name', 'nrc_b_file')->first() ? $meta->uploads->where('name', 'nrc_b_file')->first()->path : '';
    $payslipPath = $meta && $meta->uploads->where('name', 'payslip_file')->first() ? $meta->uploads->where('name', 'payslip_file')->first()->path : '';
    $bankstatementPath = $meta && $meta->uploads->where('name', 'bankstatement')->first() ? $meta->uploads->where('name', 'bankstatement')->first()->path : '';
    $passportPath = $meta && $meta->uploads->where('name', 'passport')->first() ? $meta->uploads->where('name', 'passport')->first()->path : '';
    $preapprovalPath = $meta && $meta->uploads->where('name', 'preapproval')->first() ? $meta->uploads->where('name', 'preapproval')->first()->path : '';


    $activeLoan = App\Models\Application::currentApplication();
    $status = $activeLoan->continue;
    $kyc = $activeLoan->complete;
    $route = request()->route()->getName();
    // Debugging
    // dd($nrcPath, $tpinPath, $payslipPath, $bankstatementPath, $passportPath, $preapprovalPath);
@endphp
