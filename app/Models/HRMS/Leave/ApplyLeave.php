<?php

namespace App\Models\HRMS\Leave;

use App\Models\User;
use App\Models\HRMS\Leave\LeaveType;
use App\Models\HRMS\Leave\LeavePurpose;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'Employee');
    }
    public function type(){
        return $this->belongsTo(LeaveType::class,'LeaveType');
    }
    public function purpose(){
        return $this->belongsTo(LeavePurpose::class,'LeavePurpose');
    }
}
