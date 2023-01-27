<?php

namespace App\Models\Purchase;

use App\Models\Purchase\purchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PurchaseType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function purchases()
    {
        return $this->belongsToMany(purchase::class,'purchase_type_purchase', 'purchase_type_id','purchase_id')->withPivot('clientId','purchaseType');
    }
}
