<?php

namespace App\Traits;

use App\Mail\OTPVerificationCode;
use App\Models\Application;
use App\Models\BankDetails;
use App\Models\Guarantor;
use App\Models\NextOfKing;
use App\Models\References;
use App\Models\RelatedParty;
use App\Models\User;
use App\Models\UserPhoto;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

trait UserTrait{

    public function registerUser($input){
        $password = 'mighty4you';

        if($input['email'] !== null){
            $check = User::where('email', $input['email'])->exists();

            if(!$check){
                try {
                    $user = User::create([
                        'fname' => $input['fname'],
                        'lname' => $input['lname'],
                        'mname' => $input['mname'],
                        'phone' => $input['phone'],
                        'email' => $input['email'],
                        'password' => Hash::make($password),
                        'terms' => 'accepted'
                    ]);
                    $user->assignRole('user');

                    // Get my applications
                    Wallet::create([
                        'email' => $user->email ?? '',
                        'user_id' => $user->id
                    ]);
                    return $user;
                } catch (\Throwable $th) {
                    return 0;
                }
            }else{
                // User already exists
                return User::where('email', $input['email'])->first();
            }
        }else{
            try {
                $user = User::create([
                    'fname' => $input['fname'],
                    'mname' => $input['mname'],
                    'phone2' => $input['phone'],
                    'lname' => $input['lname'],
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                $user->assignRole('user');

                // Get my applications
                Wallet::create([
                    'email' => $user->email ?? '',
                    'user_id' => $user->id
                ]);
                return $user;
            } catch (\Throwable $th) {
                return 0;
            }
        }


    }

    public function isKYCComplete(){
        $loan = Application::where('status', 0)
        ->where('complete', 0)
        ->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        $user = User::where('id', auth()->user()->id)->with('uploads')->get()->toArray();
        if($loan->first() !== null && !empty($user)){
            if(!empty($user[0]['phone']) && !empty($user[0]['nrc_no']) && !empty($user[0]['dob'])){
                $files = collect($user[0]['uploads']);
                if(
                    $files->contains('name', 'nrc_file') &&
                    $files->contains('name', 'tpin_file')
                ){
                    Application::where('status', 0)
                    ->where('complete', 0)
                    ->where('user_id',auth()->user()->id)
                    ->update(['complete' => 1]);
                }
            }
        }
    }
    public function isUserKYCComplete($id){
        $loan = Application::with('loan_product')->orWhere('status', 0)
        ->orWhere('status', 2)->where('complete', 0)->orWhere('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc') // Add this line to order by 'created_at' column in descending order
        ->get();
        $user = User::where('id', $id)->with('uploads')->get()->toArray();
        if($loan->first() !== null && !empty($user)){
            if(!empty($user['phone']) && !empty($user['nrc_no']) && !empty($user['dob'])){
                if(
                    isset($user[0]['uploads'][0]) &&
                    isset($user[0]['uploads'][1]) &&
                    isset($user[0]['uploads'][2])
                ){
                    $loan->complete = 1;
                    $loan->save();
                }
            }
        }
    }

    public function createNOK($data){
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'relation' => $data['nok_relation'],
            'address' => $data['nok_address'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
        return true;
    }

    public function updateNOK($data){
        NextOfKing::where('user_id', '=', $data['user_id'])->delete();
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'address' => $data['nok_relation'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
        return true;
    }

    public function updateUser($data){
        $user = User::where('id', $data['borrower_id'])->first();
        $user->dob = $data['dob'];
        $user->phone = $data['phone'];
        $user->nrc_no = $data['nrc_no'];
        $user->gender = $data['gender'];
        $user->id_type = $data['id_type'];
        $user->address = $data['address'];
        $user->address2 = $data['address'];
        $user->jobTitle = $data['jobTitle'];
        $user->ministry = $data['ministry'];
        $user->employeeNo = $data['employeeNo'];
        $user->department = $data['department'];
        $user->save();
    }

    public function updateKinUser($data){
        $user = User::where('id', $data['borrower_id'])->first();
        $user->noknrc = $data['noknrc'];
        $user->nokfname = $data['nokfname'];
        $user->noklname = $data['noklname'];
        $user->nokphone = $data['nokphone'];
        $user->nokemail = $data['nokemail'];
        $user->nokaddress = $data['nokaddress'];
        $user->nokoccupation = $data['nokoccupation'];
        $user->nokrelation = $data['nokrelation'];
        $user->nokgender = $data['nokgender'];
        $user->save();
    }

    public function createRefs($data){
        References::create($data);
        return true;
    }
    public function createBankDetails($data){
        BankDetails::create($data);
        return true;
    }

    public function set_user_otp(){
        $code = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        User::where('id', auth()->user()->id)->update([
            'opt_code' => $code
        ]);
        return $code;
    }

    public function VerifyOTP(){
        try {
            $auth = auth()->user();
            if($auth->opt_verified == 0){
                $code = $this->set_user_otp();
                // Send SMS
                $data = [
                    'message' => $code.' is your OTP verification code',
                    'otp' => $code,
                    'phone' => '26'.auth()->user()->phone,
                ];

                //Send email or SMS
                Mail::to($auth)->send(new OTPVerificationCode($data));

                // Then redirect the user to go and verify
                return redirect()->route('otp');
            }else{
                return true;
            }
        } catch (\Throwable $th) {
            return true;
        }
    }

    public function send_with_server($data) {
        $message = $data['message'];
        $username = 'gtzm-mightyfin';
        $password = 'Mighty@2';

        $type = '0';
        $dlr = '1';
        $destination = $data['phone'];
        $source = 'Mightyfin';

        // API endpoint
        $apiEndpoint = "http://rslr.connectbind.com:8080/bulksms/bulksms";

        // Build the query parameters
        $queryParams = http_build_query([
            'username' => $username,
            'password' => $password,
            'type' => $type,
            'dlr' => $dlr,
            'destination' => $destination,
            'source' => $source,
            'message' => $message,
        ]);

        // Full API URL with query parameters
        $apiUrl = "{$apiEndpoint}?{$queryParams}";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options for GET request
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle cURL error
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Return the API response
        return $response;
    }


    //---Migration From Admin
    public function createRelatedParties($data)
    {
        RelatedParty::updateOrCreate(
            ['user_id' => $data['borrower_id'] ?? null], // Search criteria
            [
                'fname' => $data['rp_fname'] ?? null,
                'lname' => $data['rp_lname'] ?? null,
                'email' => $data['rp_email'] ?? null,
                'phone' => $data['rp_phone'] ?? null,
                'relation' => $data['rp_relation'] ?? null,
                'occupation' => $data['rp_occupation'] ?? null,
                'nrc_no' => $data['rp_nrc_no'] ?? null,
                'address' => $data['rp_address'] ?? null,
                'gender' => $data['rp_gender'] ?? null,
                'user_id' => $data['borrower_id'] ?? null
            ]
        );
        return true;
    }    

    public function createGuarantors($data){
        Guarantor::create([
            'email' => $data['g_email'] ?? null,
            'fname' => $data['g_fname'] ?? null,
            'lname' => $data['g_lname'] ?? null,
            'phone' => $data['g_phone'] ?? null,
            'relation' => $data['g_relation'] ?? null,
            'address' => $data['g_address'] ?? null,
            'gender' => $data['g_gender'] ?? null,
            'user_id' => $data['borrower_id'] ?? null
        ]);
        return true;
    }

    public function uploadUserPhotos($request = null, $user)
    {
        // Handle Primary Photo Upload
        if ($request->hasFile('primary_image_path')) {
            $primaryPhotoPath = $request->file('primary_image_path')->store('users', 'public');
            UserPhoto::updateOrCreate(
                ['name' => 'primary', 'user_id' => $user->id],
                ['path' => $primaryPhotoPath],
                ['source' => 'web']
            );
        }

        // Handle Secondary Photo Upload
        if ($request->hasFile('secondary_image_path')) {
            $secondaryPhotoPath = $request->file('secondary_image_path')->store('users', 'public');
            UserPhoto::updateOrCreate(
                ['name' => 'secondary', 'user_id' => $user->id],
                ['path' => $secondaryPhotoPath],
                ['source' => 'web']
            );
        }

        // Handle Tertiary Photo Upload
        if ($request->hasFile('tertiary_image_path')) {
            $tertiaryPhotoPath = $request->file('tertiary_image_path')->store('users', 'public');
            UserPhoto::updateOrCreate(
                ['name' => 'tertiary', 'user_id' => $user->id],
                ['path' => $tertiaryPhotoPath],
                ['source' => 'web']
            );
        }
    }

    public function meta(){
        return User::meta();
    }
}

