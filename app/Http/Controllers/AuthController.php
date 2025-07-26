<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cUsername' => 'required',
            'cPassword' => 'required',
        ]);

        $user = User::where('cUsername', $request->cUsername)
                    ->where('lAdmin', 1)
                    ->first();

        if ($user && $this->verifySaltedPassword($request->cPassword, $user->cPassword)) {
            session(['admin_user' => $user->cUsername]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login_failed' => 'Invalid credentials or not an admin.']);
    }

    public function logout()
    {
        Session::forget('admin_user');
        return redirect()->route('login');
    }

    private function verifySaltedPassword($plainPassword, $storedHash)
    {
        // Apply same salting process as creation
        $salt = config('app.password_salt', 'default-fallback-salt-change-this');
        $saltedPassword = $salt . $plainPassword . $salt;
        
        // Verify the salted password directly against bcrypt hash
        return Hash::check($saltedPassword, $storedHash);
    }
}