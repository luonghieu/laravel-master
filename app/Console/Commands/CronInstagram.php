<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CronInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:instagram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron Job Instagram';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('Cron Instagram start');
    }
}
