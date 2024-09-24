<?php

namespace App\Traits;
use App\Models\UserFile;
use Illuminate\Support\File;
trait FileTrait{

    public function uploadCommonFiles($request){
        // dd($request);
        if ($request->hasFile('preapproval')) {
            $preapproval = $request->file('preapproval')->store('preapproval', 'public');
            UserFile::updateOrCreate(
                ['name' => 'preapproval', 'user_id' => auth()->user()->id],
                ['path' => $preapproval],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('passport')) {
            $passport = $request->file('passport')->store('passport', 'public');
            UserFile::updateOrCreate(
                ['name' => 'passport', 'user_id' => auth()->user()->id],
                ['path' => $passport],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('bankstatement')) {
            $bankstatement = $request->file('bankstatement')->store('bankstatement', 'public');
            UserFile::updateOrCreate(
                ['name' => 'bankstatement', 'user_id' => auth()->user()->id],
                ['path' => $bankstatement],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('payslip_file')) {
            $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'payslip_file', 'user_id' => auth()->user()->id],
                ['path' => $payslip_file],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('nrc_file')) {
            $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'nrc_file', 'user_id' => auth()->user()->id],
                ['path' => $nrc_file],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('nrc_b_file')) {
            $nrc_b_file = $request->file('nrc_b_file')->store('nrc_b_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'nrc_b_file', 'user_id' => auth()->user()->id],
                ['path' => $nrc_b_file],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('tpin_file')) {
            $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'tpin_file', 'user_id' => auth()->user()->id],
                ['path' => $tpin_file],
                ['source' => 'web']
            );
        }
        if ($request->hasFile('letterofintro')) {
            $loi_file = $request->file('letterofintro')->store('letterofintro', 'public');
            UserFile::updateOrCreate(
                ['name' => 'letterofintro', 'user_id' => auth()->user()->id],
                ['path' => $loi_file],
                ['source' => 'web']
            );
        }


    }


    // request
    public function uploadCommonFilesRequest($request){
        // dd($request);
        if ($request->hasFile('preapproval')) {
            $preapproval = $request->file('preapproval')->store('preapproval', 'public');
            UserFile::updateOrCreate(
                ['name' => 'preapproval', 'user_id' => $request->user_id],
                ['path' => $preapproval]
            );
        }
        if ($request->hasFile('passport')) {
            $passport = $request->file('passport')->store('passport', 'public');
            UserFile::updateOrCreate(
                ['name' => 'passport', 'user_id' => $request->user_id],
                ['path' => $passport]
            );
        }
        if ($request->hasFile('bankstatement')) {
            $bankstatement = $request->file('bankstatement')->store('bankstatement', 'public');
            UserFile::updateOrCreate(
                ['name' => 'bankstatement', 'user_id' => $request->user_id],
                ['path' => $bankstatement]
            );
        }
        if ($request->hasFile('payslip_file')) {
            $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'payslip_file', 'user_id' => $request->user_id],
                ['path' => $payslip_file]
            );
        }
        if ($request->hasFile('nrc_file')) {
            $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'nrc_file', 'user_id' => $request->user_id],
                ['path' => $nrc_file]
            );
        }
        if ($request->hasFile('tpin_file')) {
            $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');
            UserFile::updateOrCreate(
                ['name' => 'tpin_file', 'user_id' => $request->user_id],
                ['path' => $tpin_file]
            );
        }
        if ($request->hasFile('letterofintro')) {
            $loi_file = $request->file('letterofintro')->store('letterofintro', 'public');
            UserFile::updateOrCreate(
                ['name' => 'letterofintro', 'user_id' => $request->user_id],
                ['path' => $loi_file]
            );
        }
    }
}
