<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasProject()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function hasDeliveries()
    {
        return $this->hasMany(ProjectDelivery::class, 'project_detial_id', 'id');
    }

    public function hasPayment()
    {
        return $this->hasOne(Payment::class, 'project_details_id', 'id');
    }
}