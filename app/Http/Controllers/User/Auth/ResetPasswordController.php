<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{
 

  
  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('visitor');
  }
  
  /**
   * showResetForm
   *
   * @param  mixed $request
   * @param  mixed $token
   * @return void
   */
  public function showResetForm(Request $request, $token = null)
  {
    $data['email'] = $email = session('fpass_email');
    $data['token'] = $token = session()->has('token') ? session('token') : $token;
    if (PasswordReset::where('token', $token)->where('email', $email)->count() != 1) {
      $notify[] = ['error', 'Invalid token'];
      return to_route('password.request')->with($notify[0][0], $notify[0][1])->withNotify($notify);
    }

    return inertia('Auth/PasswordReset', ['data'=> $data]);

  }
  
  /**
   * reset
   *
   * @param  mixed $request
   * @return void
   */
  public function reset(Request $request)
  {
    session()->put('fpass_email', $request->email);
    $request->validate($this->rules());
    $reset = PasswordReset::where('token', $request->token)->orderBy('created_at', 'desc')->first();
    if (!$reset) {
      $notify[] = ['error', 'Invalid verification code'];
      return to_route('user.login')->with($notify[0][0], $notify[0][1])->withNotify($notify);
    }

    $user = User::where('email', $reset->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    $notify[] = ['success', 'Password changed successfully'];
    return to_route('login')->with($notify[0][0], $notify[0][1])->withNotify($notify);
  }



  /**
   *the password validation reset  rules.
   *
   * @return array
   */
  protected function rules()
  {
    $passwordValidation = Password::min(6);
      $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
    return [
      'token' => 'required',
      'email' => 'required|email',
      'password' => ['required', 'confirmed', $passwordValidation],
    ];
  }
}
