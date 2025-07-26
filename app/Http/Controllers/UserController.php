<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('lAdmin', 1)->get();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cUsername' => 'required|unique:tb_user,cUsername',
            'cPassword' => 'required|min:3',
        ]);

        // Create salted hash
        $saltedHash = $this->createSaltedHash($request->cPassword);

        User::create([
            'cUsername' => $request->cUsername,
            'cPassword' => $saltedHash,
            'lAdmin' => 1,
        ]);

        return back()->with('success', 'Admin user created.');
    }

    public function update(Request $request, $cUsername)
    {
        $user = User::where('cUsername', $cUsername)->firstOrFail();
        
        // Create salted hash for password update
        $saltedHash = $this->createSaltedHash($request->cPassword);
        
        $user->update([
            'cPassword' => $saltedHash,
        ]);

        return back()->with('success', 'Password updated.');
    }

    public function destroy($cUsername)
    {
        User::where('cUsername', $cUsername)->delete();
        return back()->with('success', 'User deleted.');
    }

    private function createSaltedHash($plainPassword)
    {
        // Get application salt from config
        $salt = config('app.password_salt', 'default-fallback-salt-change-this');
        
        // Add salt before and after password (double salting)
        $saltedPassword = $salt . $plainPassword . $salt;
        
        // Hash salted password with bcrypt using higher cost for security
        $bcryptHash = Hash::make($saltedPassword, [
            'rounds' => config('app.bcrypt_rounds', 12)
        ]);
        
        return $bcryptHash;
    }
}