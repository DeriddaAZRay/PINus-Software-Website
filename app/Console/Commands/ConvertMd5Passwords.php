<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ConvertMd5Passwords extends Command
{
    protected $signature = 'convert:md5-passwords';
    protected $description = 'Convert MD5 passwords to bcrypt';

    public function handle()
    {
        $users = User::all();
        $converted = 0;

        foreach ($users as $user) {
            // Skip if already bcrypt-hashed (starts with $2y$)
            if (!str_starts_with($user->cPassword, '$2y$')) {
                $user->cPassword = Hash::make($user->cPassword);
                $user->save();
                $converted++;
            }
        }

        $this->info("✅ $converted password(s) converted to bcrypt.");
        return 0;
    }
}
