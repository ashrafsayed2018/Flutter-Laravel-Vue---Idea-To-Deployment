<?php

use App\Models\Apportunity;
use App\Models\ApportunityDetails;
use Illuminate\Database\Seeder;

class ApportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apportunity::class, 300)->create()->each(function ($apportunity) {

            $apportunity->details()->save(factory(ApportunityDetails::class)->make());
        });
    }
}
