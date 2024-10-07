<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Add this method to specify that we will use 'name' instead of 'email'
    public function username()
    {
        return 'name'; // Use 'name' as the username field
    }

    // Optionally, override the credentials method to customize login behavior
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    // Optional: You can validate the login credentials here
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'name' => 'required|string', // Validate name
            'password' => 'required|string', // Validate password
        ]);
    }
}
