<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // This method will show login page for customer
    public function index()
    {
        return view('login');
    }

    // This method will authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            } else {
                return redirect()->route('account.login')->with('error', 'Oops! It looks like your email or password isn’t quite right.');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will show register page for customer
    public function register(Request $request)
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();

            // Call the method to send the welcome email
            $this->sendWelcomeEmail($user);

            return redirect()->route('account.login')->with('success', 'Awesome! Your account has been successfully created. Get ready to explore!');
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Send welcome email to the user.
     *
     * @param User $user
     */
    protected function sendWelcomeEmail(User $user)
    {
        $subject = "Thank You for Registering";
        $message = "Dear ".$user->name . ",";
        Mail::to($user->email)->send(new WelcomeEmail($message, $subject));
    }
}
