<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShopInstallCommand extends Command
{

    protected $signature = 'shop:install';

    protected $description = 'Install our shop';

    public function handle(): int
    {
        $this->call('storage:link');
        $this->call('migrate');
        return self::SUCCESS;
    }
}
