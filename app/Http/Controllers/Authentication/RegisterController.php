<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\Models\User;

use App\Notifications\verifyEmail;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class RegisterController extends Controller
{


//   public $apiToken;
   public function __construct()
    {
//    $this->apiToken = uniqid(base64_encode(Str::random(40)));
    }
  /** 
   * Register API 
   * 
   * @return \Illuminate\Http\JsonResponse
   */

  public function sendVerificationEmail(Request $request){

      try {
          $email = $request->input('email');
          $enrollment = new Enroll();
          $enrollment->email = $email;
          $enrollment->status = 'pending';
          $code = fake()->randomNumber('5', true);
          $enrollment->email_verification_code = $code;
          if ($enrollment->save()){
              $enroll = [
                  'email' => $email,
                  'code' => $code,
              ];
              $e = new verifyEmail($enroll);
              $enrollment->notify($e);
              return response()->successResponse($enrollment->id, 'Verification code sent to email address!');
          } else {
              return response()->errorResponse([], 'Could not send verification code!');
          }
      }
      catch (QueryException $e) {
          return response()->errorResponse([$e], $e);

      }
      catch (\Exception $e){
          return response()->errorResponse([$e], $e);
      }

  }

  public function verifyCode (Request $request) {
    $id = $request->input('id');
    $code = $request->input('verify');
    $enrollment = Enroll::find($id);
    $email = $enrollment->email;
    if ($enrollment->email_verification_code == $code){
        $enrollment->update([
            'email' => $email,
            'status' => 'accepted'
        ]);
//        $user = new User();
//        $user->firstname = 'Default';
//        $user->lastname = 'Default';
//        $user->phone = fake()->phoneNumber();
//        $user->email = $enrollment->email;
//        $user->active = true;
//        $user->type = 'User';
//        if ($user->save()){
//            return response()->successResponse($user->id, 'Saved!')
//        }
        return response()->successResponse(true, 'EmailVerified!');
    }else{
        return response()->errorResponse(false, 'Could not verify email!');
    }
  }





  public function store(Request $request) 
  {
    $postArray = $request->all(); 
    $enrollment = Enroll::find($postArray['e_id']);
    $user = User::create([
        'firstname'=>$postArray['firstname'],
        'lastname'=>$postArray['lastname'],
        'email' => $enrollment->email,
        'username'=>$postArray['username'],
        'phone'=>$postArray['phone'],
        'password'=> bcrypt($request->input('password')),
        'type'=>'User',
        'active'=>true,
    ]);
    return response()->successResponse([], 'Account created successfully!');
  }
}
