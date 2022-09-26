<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $fillable = [
        'type',
        'name',
        'date_of_birth',
        'reg_year',
        'email',
        'username',
        'password',
        'phone',
        'image',
        'profile_background',
        'service_city',
        'service_area',
        'user_type',
        'user_status',
        'terms_condition',
        'address',
        'state',
        'about',
        'post_code',
        'country_id',
        'email_verified',
        'email_verify_token',
        'fb_url',
        'tw_url',
        'go_url',
        'li_url',
        'yo_url',
        'in_url',
        'dr_url',
        'twi_url',
        'pi_url',
        'dr-url',
        'country_code',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_type' => 'integer',
        'email_verified' => 'integer',
    ];
    

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function city(){
        return $this->belongsTo(ServiceCity::class,'service_city','id');
    }

    public function area(){
        return $this->belongsTo(ServiceArea::class,'service_area','id');
    }

    public function blog(){
        return Blog::where(['user_id' => $this->attributes['id'],'created_by' => 'user'])->get();
    }
    public function media(){
        return MediaUpload::where(['user_id' => $this->attributes['id'],'type' => 'user'])->get();
    }

    public function sellerVerify(){
        return $this->hasOne(SellerVerify::class,'seller_id','id');
    }

    public function haveRequirements()
    {
        return $this->hasMany(Requirement::class, 'client_id', 'id');
    }
}
