<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apportunity extends Model
{

    public function details()
    {
        return $this->hasOne(ApportunityDetails::class);
    }
}
