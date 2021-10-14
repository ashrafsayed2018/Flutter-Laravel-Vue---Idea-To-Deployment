<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApportunityDetails extends Model
{
    public function apportunity()
    {
        return $this->belongsTo(Apportunity::class);
    }
}
