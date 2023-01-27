<?php

namespace App\Models\Labour;

use App\Models\Labour\Labourtype;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Labour\Labourname;

class Labourbill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function labour(){
        return $this->belongsTo(Labourname::class,'labourNameId');
    }

}
