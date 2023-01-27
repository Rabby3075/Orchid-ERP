<?php

namespace App\Models\Labour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labourname extends Model
{
    use HasFactory;

    protected $fillable = ['filenames'];

    public function setFilenamesAttribute($value){
        $this->attributes['filenames'] = json_encode($value);
    }
}
