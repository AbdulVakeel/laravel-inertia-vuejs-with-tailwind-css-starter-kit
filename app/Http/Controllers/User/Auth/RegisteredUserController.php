<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
       /***********************************
     * Start THIS IS A Register  Controller *
     ***********************************/
    

    public function UserRegistrationForm()
    {


        if (auth()->check()) {
            return redirect()->route('home');
        }



      
        $countries =  getCountries();

        return inertia('Auth/Register', [
            'countries' => $countries,
        ]);
    }

    
    /**
     * validator
     *
     * @param  mixed $data
     * @return void
     */
    
    protected function validator(array $data)
    {
     
        $passwordValidation = Password::min(6);
        $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();

        $validate = Validator::make($data, [
            'email' => 'required|string|email|unique:users',
            'password' => ['required', 'confirmed', $passwordValidation],
            'username' => 'required|unique:users|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'country' => 'required',
        ]);
        return $validate;
    }
    
    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    
    public function register(Request $request)
    {

    
        $this->validator($request->all())->validate();

        $request->session()->regenerateToken();

        if (preg_match("/[^a-z0-9_]/", trim($request->username))) {
            return back()->with('error', 'No special character, space or capital letters in username.');
        }

        $exist = User::where('mobile', $request->mobile)->first();
        
        if ($exist) {
            return back()->with('error', 'The mobile number already exists Our System');
        }

        event(new Registered($user = $this->create($request->all())));



        Auth::login($user);

        return to_route('user.dashboard');
    }
    
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */

     
    protected function create(array $data)
    {

        //User Create
        $user = new User();
        $user->email = strtolower(trim($data['email']));

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->password = Hash::make($data['password']);
        $user->username = trim($data['username']);
        $user->country = $data['country'];
        $user->mobile = $data['mobile'];
        $user->status = 1;
        $user->save();

        return $user;
    }
    
    /**
     * checkUser
     *
     * @param  mixed $request
     * @return void
     */

     
    public function checkUser(Request $request)
    {
        $exist['data'] = false;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = User::where('email', $request->email)->exists();
            $exist['type'] = 'email';
        }
        if ($request->mobile) {
            $exist['data'] = User::where('mobile', $request->mobile)->exists();
            $exist['type'] = 'mobile';
        }
        if ($request->username) {
            $exist['data'] = User::where('username', $request->username)->exists();
            $exist['type'] = 'username';
        }
        return response($exist);
    }
    
    /**
     * registered
     *
     * @return void
     */

     
    public function registered()
    {

        return to_route('user.dashboard');
    }

    
       /***********************************
     * End THIS IS A Register  Controller *
     ***********************************/
}
