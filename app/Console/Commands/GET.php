<?php

namespace App\Console\Commands;

use App\employees;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GET extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GET {TableName : Enter the table name you want to set} {column1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GET the details';

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
        $tableName = $this->argument('TableName');
        $ipAddress = trim($this->argument('column1'));
        if($tableName == "empdata"){
            $getEmployee = employees::where('ip_address', '=', $ipAddress)->first();
            if($getEmployee) {
                $getEmployee = $getEmployee->toJson(JSON_PRETTY_PRINT);
                dd($getEmployee);
            }
            $this->info('Resource not found');
        } elseif ($tableName == 'empwebhistory') {

            $getEmployeeWebHistory = employees::with('employeeHistory')->where('ip_address', '=', $ipAddress)->first();
            if($getEmployeeWebHistory){
                $getEmployeeWebHistory = $getEmployeeWebHistory->toJson(JSON_PRETTY_PRINT);
                dd($getEmployeeWebHistory);
            }
            $this->info('Resource not found');

        } else {
            $this->info('Please enter the proper details');
        }
    }
}
