<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['name','slug','direction','status','default'];
    
}
