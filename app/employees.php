<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employees extends Model
{
    use SoftDeletes;

    public $table = "employees";
    public $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['emp_id','emp_name', 'ip_address'];

    public function employeeHistory() {
        return $this->hasOne('App\employee_web_history', 'ip_address', 'ip_address');
    }

}
