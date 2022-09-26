<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDelivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasProjectDetail()
    {
        return $this->hasOne(ProjectDetails::class, 'id', 'project_detail_id');
    }
}
