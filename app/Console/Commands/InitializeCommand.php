<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitializeCommand extends Command
{
    protected $signature = 'app:init';
    protected $description = 'Run initial setup commands';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->call('create:letters');
        $this->call('create:numbers');
        $this->call('create:modes');
        $this->call('create:user');

        $this->info('Initialization completed successfully!');
    }
}
