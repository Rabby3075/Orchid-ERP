<?php

namespace App\Models\Purchase;

use App\Models\Settings\CompanyInfo;

use App\Models\Purchase\PurchaseType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class purchase extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'products' => 'array'
    ];

    public function purchase_types()
    {
        return $this->belongsToMany(PurchaseType::class,'purchase_type_purchase', 'purchase_id', 'purchase_type_id')->withPivot('clientId','purchaseType');
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
