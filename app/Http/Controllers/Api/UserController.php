<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\Application;
use App\Models\User;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use PasswordValidationRules, FileTrait;

    public function updateProfile(Request $req){
        $input = $req->toArray();
        $user = User::where('id', $input['user_id'])->first();

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            try {
                $user->forceFill([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'id_type' => $input['id_type'],
                    'nrc_no' => $input['id_num'],
                    'nrc' => $input['id_num'],
                    'address' => $input['address'],
                    'occupation' => $input['occupation'],
                    'jobTitle' => $input['occupation'],
                    'dob' => $input['dob'],
                    'gender' => $input['gender'],
                ])->save();

                return response()->json([
                    'message' => 'Successful updated your profile information.',
                    'user' => $user
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Failed.'.$th->getMessage(),
                ]);
            }
        }
    }

    public function updatePassword(Request $req){

        try {
            $input = $req->toArray();
            $user = User::where('id', $input['user_id'])->first();
            Validator::make($input, [
                'current_password' => ['required', 'string']
                // 'password' => $this->passwordRules(),
            ])->after(function ($validator) use ($user, $input) {
                if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                    $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
                }
            })->validateWithBag('updatePassword');

            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();

            return response()->json([
                'message' => 'Successfully updated your profile.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'validation_message' => $th->getMessage()
            ]);
        }
    }

    public function uploadFiles(Request $request){

        try {
            DB::beginTransaction();
            $this->uploadCommonFilesRequest($request);
            DB::commit();
            return response()->json([
                'message' => 'Successfully uploaded.',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'message' => 'Failed updated your documents.',
            ]);
        }
    }



    public function uploadNRCs(Request $request){

        try {
            DB::beginTransaction();

            if ($request->file('nrc_scan') !== null) {
                $nrc_scan = $request->file('nrc_scan')->store('nrc_scan', 'public');

                // Update the record if it exists
                $affectedRows = DB::table('nrc_photos')  // Assuming 'nrc_photos' is the table name
                    ->where('user_id', $request->input('user_id'))
                    ->update(['nrc_scanned' => $nrc_scan]);

                // If no records were updated (affectedRows is 0), create a new record
                if ($affectedRows === 0) {
                    DB::table('nrc_photos')->insert([
                        'user_id' => $request->input('user_id'),
                        'nrc_scanned' => $nrc_scan
                    ]);
                }
            }

            if ($request->file('nrc_front') !== null) {
                $nrc_front = $request->file('nrc_front')->store('nrc_front', 'public');

                // Update the record if it exists
                $affectedRows = DB::table('nrc_photos')  // Assuming 'nrc_photos' is the table name
                    ->where('user_id', $request->input('user_id'))
                    ->update(['nrc_front' => $nrc_front]);

                // If no records were updated (affectedRows is 0), create a new record
                if ($affectedRows === 0) {
                    DB::table('nrc_photos')->insert([
                        'user_id' => $request->input('user_id'),
                        'nrc_front' => $nrc_front
                    ]);
                }
            }

            if ($request->file('nrc_back') !== null) {
                $nrc_back = $request->file('nrc_back')->store('nrc_back', 'public');

                // Update the record if it exists
                $affectedRows = DB::table('nrc_photos')  // Assuming 'nrc_photos' is the table name
                    ->where('user_id', $request->input('user_id'))
                    ->update(['nrc_back' => $nrc_back]);

                // If no records were updated (affectedRows is 0), create a new record
                if ($affectedRows === 0) {
                    DB::table('nrc_photos')->insert([
                        'user_id' => $request->input('user_id'),
                        'nrc_back' => $nrc_back
                    ]);
                }
            }

            if ($request->file('selfie_photo') !== null) {
                $selfie_photo = $request->file('selfie_photo')->store('selfie_photo', 'public');

                // Update the record if it exists
                $affectedRows = DB::table('nrc_photos')  // Assuming 'nrc_photos' is the table name
                    ->where('user_id', $request->input('user_id'))
                    ->update(['selfie_photo' => $selfie_photo]);

                // If no records were updated (affectedRows is 0), create a new record
                if ($affectedRows === 0) {
                    DB::table('nrc_photos')->insert([
                        'user_id' => $request->input('user_id'),
                        'selfie_photo' => $selfie_photo
                    ]);
                }
            }

            $this->uploadCommonFiles($request);
            DB::commit();
            return response()->json([
                'message' => 'Successfully updated your profile.',
            ]);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
