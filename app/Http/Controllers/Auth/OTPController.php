<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->opt_verified == 0){
            return view('auth.otp_verification');
        }else{
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        $user = User::where('id', $request->input('user_id'))->first();
        try {
            if ($user->opt_code == $request->input('otp')) {
                $user->update([
                    'opt_verified' => 1
                ]);
                return response()->json('true');
            } else {
                return response()->json('false');
            }
        } catch (\Throwable $th) {
            return response()->json('false');
        }
    }


    public function requestOTP(){
        try {

            if(auth()->user()->opt_verified == 0){
                // dd(auth()->user()->opt_verified == 0);
                // Generate otp code
                $code = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

                // Save into the database
                User::where('id', auth()->user()->id)->update([
                    'opt_code' => $code
                ]);

                // Send SMS
                $data = [
                    'message'=>$code.' is your OTP verification code',
                    'phone'=> '26'.auth()->user()->phone,
                ];

                $response = $this->send_with_server($data);

                return response()->json([
                    'message' => 'Sent SMS Successfully.',
                ], 200);
            }else{
                return response()->json([
                    'message' => 'User already verified.',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed. Check your phone or email detailes and try again. Technical Info '.$th,
            ], 500);
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
}
