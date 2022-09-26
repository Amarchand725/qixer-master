<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    // protected $fillable = ['name', 'client_id', 'project_manager_id', 'timeline', 'payment_details', 'slug', 'status'];

    protected $guarded = [];

    /*public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id')->where('status', 1)->where('is_service_on', 1);
    }*/

    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function hasSeller()
    {
        return $this->belongsTo(User::class, 'service_provider_id', 'id');
    }

    public function project_manager(){
        return $this->belongsTo(Admin::class, 'project_manager_id');
    }

    public function hasRequirement()
    {
        return $this->hasOne(Requirement::class, 'id', 'requirement_id');
    }
    public function hasProjectDetail()
    {
        return $this->hasOne(ProjectDetails::class, 'project_id');
    }
    public function hasCurrentMilestone()
    {
        return $this->hasOne(ProjectDetails::class, 'project_id')->where('status', 0)->orWhere('status', 1);
    }
    public function haveProjectDetails()
    {
        return $this->hasMany(ProjectDetails::class, 'project_id');
    }
    public function hasPayment()
    {
        return $this->hasOne(Payment::class, 'project_id', 'id');
    }
}
