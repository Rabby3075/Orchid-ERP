<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function leeds(){
        return $this->belongsTo(Leeds::class,'leedsId');
    }
}
