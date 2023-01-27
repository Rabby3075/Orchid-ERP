<?php

namespace App\Models\Payment;

use App\Models\Account\AccountChart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function method(){
        return $this->belongsTo(AccountChart::class,'payment_method');
    }
}
