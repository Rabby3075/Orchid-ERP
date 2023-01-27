<?php

namespace App\Models\CRM;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leeds extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'assignedTo');
    }

}
