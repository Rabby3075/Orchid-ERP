<?php

namespace App\Models\PrinterBill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pb_Cart extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'cartInfo' => 'array',
    ];
}
