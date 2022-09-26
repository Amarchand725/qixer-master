<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $table = 'requirements';
    protected $fillable = ['requirement_name', 'client_id', 'project_manager_id', 'contact_mobile', 'contact_email', 'details',
        'notes', 'attachments', 'deliveries', 'budget', 'contract', 'priority', 'slug'];
    protected $casts = [
        'attachments' => 'array',
        'deliveries' => 'array',
        'contract' => 'array'
    ];

    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }

    public function project_manager(){
        return $this->belongsTo(Admin::class, 'project_manager_id');
    }

    public function hasProject()
    {
        return $this->hasOne(Project::class, 'requirement_id', 'id');
    }

    public function hasMilestoneProject()
    {
        return $this->hasOne(MilestoneProject::class, 'requirement_id', 'id');
    }
    public function haveMilestoneProjects()
    {
        return $this->hasMany(MilestoneProject::class, 'requirement_id', 'id');
    }
}
