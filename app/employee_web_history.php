<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_web_history extends Model
{
    public $table = "employee_web_histories";
    public $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['ip_address', 'url'];


}
