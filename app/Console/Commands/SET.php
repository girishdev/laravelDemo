<?php

namespace App\Console\Commands;

use App\employee_web_history;
use App\employees;
use Illuminate\Console\Command;

class SET extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SET {TableName : Enter the table name you want to set} {--column1= : First Column} {--column2= : Second Column} {--column3= : Third Column}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SET the details';

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
        if($tableName == "empdata"){
            $employee = new employees;
            $employee->emp_id = $this->option('column1');
            $employee->emp_name = $this->option('column2');
            $employee->ip_address = $this->option('column3');
            $employee->save();
            $this->info('Successfully inserted!');

        } elseif ($tableName == 'empwebhistory') {

            $checkEmployee = employees::where('ip_address', '=', $this->option('column1'))->first();
            if($checkEmployee){
                $empwebhistory = new employee_web_history;
                $empwebhistory->ip_address = $this->option('column1');
                $empwebhistory->url = $this->option('column2');
                $empwebhistory->date = date("Y-m-d H:i:s", time());
                $empwebhistory->save();
                $this->info('Successfully inserted!');
            } else {
                $this->error('This IP Address is not present with respective employee');
            }
        } else {
            $this->info('Please enter the proper details');
        }

    }
}
