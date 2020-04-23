<?php

namespace App\Console\Commands;

use App\employees;
use Illuminate\Console\Command;

class UNSETS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UNSET {TableName : Enter the table name you want to set} {column1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'UNSET the details';

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
            $unsetEmployee = employees::where('ip_address', '=', $ipAddress)->delete();
            if(!$unsetEmployee){
                $this->info('Resource not found');
            } else {
                $this->info('Deleted Successfully!');
            }
        } elseif ($tableName == 'empwebhistory') {

            $unsetEmployeeWebHistory = employees::with('employeeHistory')->where('ip_address', '=', $ipAddress)->delete();
            // dd($unsetEmployeeWebHistory);
            if(!$unsetEmployeeWebHistory){
                $this->info('Resource not found');
            } else {
                $this->info('Deleted Successfully!');
            }

        } else {
            $this->info('Please enter the proper details');
        }
    }
}
