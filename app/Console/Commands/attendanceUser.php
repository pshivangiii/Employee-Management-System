<?php

namespace App\Console\Commands;

use App\EmployeeDetails;
use Illuminate\Console\Command;

class attendanceUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'attendance';

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
        $this->info( "Please Regularise Your Attendance");
    }
}
