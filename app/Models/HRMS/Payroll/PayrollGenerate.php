<?php

namespace App\Models\HRMS\Payroll;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollGenerate extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'employee');
    }
}
