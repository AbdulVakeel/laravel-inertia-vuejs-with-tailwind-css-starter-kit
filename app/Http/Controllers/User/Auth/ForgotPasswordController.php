<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
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


    public function showLinkRequestForm()
    {
        return inertia('Auth/ForgotPassword', ['data' => $data]);        
    }
    
    /**
     * sendResetCodeEmail
     *
     * @param  mixed $request
     * @return void
     */
    public function sendResetCodeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $notify[] = ['error', 'Couldn\'t find any account with this information'];
            return back()
                ->with($notify[0][0], $notify[0][1])
                ->withNotify($notify);
        }

        PasswordReset::where('email', $user->email)->delete();
        $code = verificationCodeSend(6);
        $password = new PasswordReset();
        $password->email = $user->email;
        $password->token = $code;
        $password->created_at = \Carbon\Carbon::now();
        $password->save();

      
        notify($user, 'PASSWORD_RESET_CODE', [
            'code' => $code,
        
        ], ['email']);

        $email = $user->email;
        session()->put('pass_res_mail', $email);
        $notify[] = ['success', 'Password reset email sent successfully'];
        return redirect()->route('user.password.code.verify')
            ->with($notify[0][0], $notify[0][1])
            ->withNotify($notify);
    }

    public function findFieldType()
    {
        $input = request()->input('value');

        $fieldType = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $input]);
        return $fieldType;
    }
    
    /**
     * codeVerify
     *
     * @return void
     */
    public function codeVerify()
    {
        $data['email'] = $email = session()->get('pass_res_mail');
        if (!$email) {
            $notify[] = ['error', 'Oops! session expired'];
            return to_route('password.request')->with($notify[0][0], $notify[0][1])->withNotify($notify);
        }

        return inertia ('Auth/CodeVerify', ['data' => $data]);
    }
    
    /**
     * verifyCode
     *
     * @param  mixed $request
     * @return void
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'email' => 'required'
        ]);
        $code =  str_replace(' ', '', $request->code);

        if (PasswordReset::where('token', $code)->where('email', $request->email)->count() != 1) {
            $notify[] = ['error', 'Verification code does not match'];
            return to_route('user.password.code.verify')->with($notify[0][0], $notify[0][1])->withNotify($notify);
        }
        $notify[] = ['success', 'You can change password.'];
        session()->flash('fpass_email', $request->email);
        return to_route('user.password.reset', $code)->with($notify[0][0], $notify[0][1])->withNotify($notify);
    }
}
