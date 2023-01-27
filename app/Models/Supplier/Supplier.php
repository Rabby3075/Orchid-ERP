<?php

namespace App\Models\Supplier;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class,'productId');
    }
    public function group(){
        return $this->belongsTo(SupplierGroup::class,'supplierGroupId');
    }
}
