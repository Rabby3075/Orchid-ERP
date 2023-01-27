<?php

namespace App\Models\Purchase;

use App\Models\Project\ProjectDeal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function project(){
        return $this->belongsTo(ProjectDeal::class,'projectId');
    }
}
