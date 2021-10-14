<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApportunityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apportunity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apportunity_id');
            $table->mediumText('benefits');
            $table->mediumText('application_process');
            $table->mediumText('further_queries')->nullable();
            $table->mediumText('eligibilities');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('official_links')->nullable();
            $table->json('eligible_regions')->nullable();
            $table->timestamps();
        });

        Schema::table('apportunity_details', function (Blueprint $table) {
            $table->foreign('apportunity_id')->references('id')->on('apportunities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apportunity_details');
    }
}
