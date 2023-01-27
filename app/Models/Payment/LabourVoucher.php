<?php

namespace App\Models\Payment;

use App\Models\Account\AccountChart;
use App\Models\Labour\Labourname;
use App\Models\Labour\Labourtype;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabourVoucher extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function method(){
        return $this->belongsTo(AccountChart::class,'payment_method');
    }

    public function labour(){
        return $this->belongsTo(Labourname::class,'labourNameId');
    }
    public function type(){
        return $this->belongsTo(Labourtype::class,'labourTypeId');
    }
}
