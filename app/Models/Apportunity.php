<?php

namespace App\Models;

use App\User;
use App\Models\Lookups\Country;
use App\Models\Lookups\Category;
use Illuminate\Database\Eloquent\Model;

class Apportunity extends Model
{


    protected $casts = [
        'deadline' => 'datetime'
    ];
    public function details()
    {
        return $this->hasOne(ApportunityDetails::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
