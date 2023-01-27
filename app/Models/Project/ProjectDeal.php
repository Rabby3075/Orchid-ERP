<?php

namespace App\Models\Project;

use App\Models\CRM\Leeds;
use App\Models\Project\ProjectCategory;
use App\Models\Settings\BusinessBranch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDeal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function type(){
        return $this->belongsTo(ProjectCategory::class,'category');
    }
    public function client(){
        return $this->belongsTo(Leeds::class,'clientId');
    }

    public function branch(){
        return $this->belongsTo(BusinessBranch::class,'branchId');
    }

}
