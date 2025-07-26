<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MigratePasswords extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'auth:migrate-passwords 
                            {--dry-run : Show what would be changed without making changes}
                            {--user= : Migrate specific user only}
                            {--reset-all : Reset all passwords to a default (dangerous!)}';

    /**
     * The console command description.
     */
    protected $description = 'Migrate existing passwords to new salted bcrypt format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔐 Password Migration Tool');
        $this->info('================================');

        if ($this->option('reset-all')) {
            return $this->resetAllPasswords();
        }

        if ($this->option('user')) {
            return $this->migrateSpecificUser($this->option('user'));
        }

        return $this->interactiveMigration();
    }

    private function interactiveMigration()
    {
        $users = User::where('lAdmin', 1)->get();
        
        if ($users->isEmpty()) {
            $this->error('No admin users found in database.');
            return 1;
        }

        $this->info("Found {$users->count()} admin user(s):");
        $this->table(['Username', 'Current Hash Type'], 
            $users->map(function($user) {
                return [
                    $user->cUsername, 
                    $this->detectHashType($user->cPassword)
                ];
            })
        );

        $this->warn('⚠️  IMPORTANT: Existing passwords cannot be migrated automatically');
        $this->warn('   because we don\'t know the plain text passwords.');
        $this->line('');
        $this->info('Options:');
        $this->info('1. Reset specific user password');
        $this->info('2. Reset all passwords to default');
        $this->info('3. Create migration flag (let users reset on next login)');
        $this->line('');

        $choice = $this->choice('What would you like to do?', [
            'Reset specific user',
            'Reset all to default', 
            'Create migration flag',
            'Cancel'
        ], 3);

        switch ($choice) {
            case 'Reset specific user':
                return $this->resetSpecificUser();
            case 'Reset all to default':
                return $this->resetAllPasswords();
            case 'Create migration flag':
                return $this->createMigrationFlag();
            case 'Cancel':
                $this->info('Migration cancelled.');
                return 0;
        }
    }

    private function resetSpecificUser()
    {
        $username = $this->ask('Enter username to reset');
        $user = User::where('cUsername', $username)->where('lAdmin', 1)->first();

        if (!$user) {
            $this->error("Admin user '{$username}' not found.");
            return 1;
        }

        $password = $this->secret('Enter new password for this user');
        $confirmPassword = $this->secret('Confirm new password');

        if ($password !== $confirmPassword) {
            $this->error('Passwords do not match.');
            return 1;
        }

        if (strlen($password) < 3) {
            $this->error('Password must be at least 3 characters.');
            return 1;
        }

        if ($this->option('dry-run')) {
            $this->info("DRY RUN: Would update password for user '{$username}'");
            return 0;
        }

        // Create new salted hash
        $saltedHash = $this->createSaltedHash($password);

        $user->update(['cPassword' => $saltedHash]);

        $this->info("✅ Password updated for user '{$username}' with new salted bcrypt format.");
        return 0;
    }

    private function resetAllPasswords()
    {
        $this->error('⚠️  DANGER ZONE ⚠️');
        $this->warn('This will reset ALL admin passwords to: "admin123"');
        
        if (!$this->confirm('Are you absolutely sure? This cannot be undone!')) {
            $this->info('Operation cancelled.');
            return 0;
        }

        if (!$this->confirm('Type YES to confirm you want to reset all passwords')) {
            $this->info('Operation cancelled.');
            return 0;
        }

        $users = User::where('lAdmin', 1)->get();
        $defaultPassword = 'admin123';

        if ($this->option('dry-run')) {
            $this->info("DRY RUN: Would reset passwords for {$users->count()} users to '{$defaultPassword}'");
            return 0;
        }

        $saltedHash = $this->createSaltedHash($defaultPassword);

        $updated = User::where('lAdmin', 1)->update(['cPassword' => $saltedHash]);

        $this->info("✅ Reset {$updated} admin passwords to '{$defaultPassword}' with salted bcrypt format.");
        $this->warn('🔴 IMPORTANT: Change these passwords immediately after login!');
        
        return 0;
    }

    private function createMigrationFlag()
    {
        $this->info('Creating migration flag system...');
        
        // Add a column to track migration status
        if (!$this->checkMigrationColumn()) {
            $this->createMigrationColumn();
        }

        $users = User::where('lAdmin', 1)->get();
        
        foreach ($users as $user) {
            if ($this->isOldHashFormat($user->cPassword)) {
                $user->update(['password_needs_migration' => true]);
            }
        }

        $this->info('✅ Migration flags created. Users will be prompted to reset password on next login.');
        $this->info('💡 You need to update your login controller to handle this flag.');
        
        return 0;
    }

    private function checkMigrationColumn()
    {
        return DB::getSchemaBuilder()->hasColumn('tb_user', 'password_needs_migration');
    }

    private function createMigrationColumn()
    {
        DB::statement('ALTER TABLE tb_user ADD COLUMN password_needs_migration BOOLEAN DEFAULT FALSE');
        $this->info('✅ Added password_needs_migration column to tb_user table.');
    }

    private function detectHashType($hash)
    {
        if (str_starts_with($hash, '$2y$') || str_starts_with($hash, '$2a$') || str_starts_with($hash, '$2b$')) {
            return 'bcrypt';
        }
        if (strlen($hash) === 32 && ctype_xdigit($hash)) {
            return 'md5';
        }
        if (strlen($hash) === 40 && ctype_xdigit($hash)) {
            return 'sha1';
        }
        return 'unknown';
    }

    private function isOldHashFormat($hash)
    {
        return $this->detectHashType($hash) !== 'bcrypt';
    }

    private function createSaltedHash($plainPassword)
    {
        // Get application salt from config
        $salt = config('app.password_salt', 'default-fallback-salt-change-this');
        
        // Add salt before and after password
        $saltedPassword = $salt . $plainPassword . $salt;
        
        // Hash with bcrypt
        return Hash::make($saltedPassword, [
            'rounds' => config('app.bcrypt_rounds', 12)
        ]);
    }

    private function migrateSpecificUser($username)
    {
        $user = User::where('cUsername', $username)->where('lAdmin', 1)->first();

        if (!$user) {
            $this->error("Admin user '{$username}' not found.");
            return 1;
        }

        $this->info("Current hash for '{$username}': " . $this->detectHashType($user->cPassword));

        if ($this->detectHashType($user->cPassword) === 'bcrypt') {
            $this->warn("User '{$username}' already appears to use bcrypt format.");
            
            if (!$this->confirm('Do you want to reset the password anyway?')) {
                return 0;
            }
        }

        return $this->resetSpecificUser();
    }
}