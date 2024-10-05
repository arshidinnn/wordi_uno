<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateRootUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates a user with root role';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $firstname = $this->ask('Enter first name');
        $lastname = $this->ask('Enter last name');
        $email = $this->ask('Enter email');
        $username = $this->ask('Enter username');
        $password = $this->secret('Enter password');

        $user = User::query()->create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => 'root',
        ]);

        if ($user) {
            $this->info('Root user created successfully!');
        } else {
            $this->error('Failed to create root user.');
        }
    }
}
