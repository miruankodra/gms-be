<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PasswordRecovery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    protected $email = 'meruankodra1@gmail.com';

    public function sendRecoveryEmail(Request $request){
        $email = $request->input('email');
        $user = User::where('email', '=', $email)->first();
        if($user){
            $code = fake()->randomNumber('5', true);
            DB::insert('insert into password_resets (email, token, created_at) values (?, ?, ?)', [$user->email, $code, Carbon::now()]);
            $data = [
                'fullname' => $user->fullname,
                'email' => $user->email,
                'code' => $code,
            ];
            $recovery = new PasswordRecovery($data);
            $user->notify($recovery);
            return response()->successResponse([], 'A verification code has been sent to your email!');
        } else {
            return response()->errorResponse([], 'You dont have a registered account!');
        }
    }

    public function verifyCode(Request $request) {
        $requestCode = $request->input('code');

        $result = DB::select('select token from password_resets where email = :email ORDER BY created_at DESC LIMIT 1', ['email' => $this->email]);
        $code = $result[0]->token;
        if ($requestCode == $code){
            return response()->successResponse([], 'Code verified!');
        } else {
            return response()->errorResponse([], 'Verification code does not match! Try Again!');
        }
    }

    public function resetPassword(Request $request) {
        $password = $request->input('password');
        $user = User::where('email', '=', $this->email)->first();

        $user->password = bcrypt($password);

        if ($user->save()) {
            return response()->successResponse([], 'Pasword changed successfully!');
        } else {
            return response()->errorResponse([], 'Could not change password! Something went wrong!');
        }
    }
}
