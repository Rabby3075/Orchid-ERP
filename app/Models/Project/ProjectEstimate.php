<?php

namespace App\Models\Project;

use App\Models\CRM\Leeds;
use App\Models\Settings\BusinessBranch;
use App\Models\Project\ProjectDeal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEstimate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Leeds::class,'clientId');
    }
    public function branch()
    {
        return $this->belongsTo(BusinessBranch::class,'branchId');
    }
    public function project()
    {
        return $this->belongsTo(ProjectDeal::class,'projectId');
    }
}
