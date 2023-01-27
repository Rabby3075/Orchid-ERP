<?php

namespace App\Models\PrinterBill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PainterBill extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'decorCart' => 'array',
        'finalCart' => 'array',
    ];
}
