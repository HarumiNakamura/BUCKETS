<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords
    {
        reset as traitReset;
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/user/password/successful';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['showSuccessful']);
    }

    public function showResetForm(Request $request, $token = null)
    {

        return view('user.password.reset')->with(

            ['token' => $token, 'email' => $request->email]

        );

    }


    public function reset(Request $request)
    {


        $attributes = [

            'email',
            'passsord',
            'password_confirmation',

        ];

        $this->validate(
            $request,
            $this->rules(),
            $this->validationErrorMessages(),
            $attributes
        );


        return $this->traitReset($request);
    }


    protected function sendResetResponse($response)
    {

        return redirect($this->redirectPath())
                            ->with('status', trans($response))
                            ->with('reset', true);


    }


    public function showSuccessful()
    {

        if(session('reset') !== true){
            abort(500);
        }
        return view('user.password.successful');

    }


}
