<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('BoxImg')->nullable();
            $table->string('name')->nullable();
            $table->string('slid1_img')->nullable();
            $table->string('slid1_intro_en')->nullable();
            $table->string('slid1_intro_ar')->nullable();
            $table->string('slid2_img')->nullable();
            $table->string('slid2_intro_en')->nullable();
            $table->string('slid2_intro_ar')->nullable();
            $table->string('slid3_img')->nullable();
            $table->string('slid3_intro_en')->nullable();
            $table->string('slid3_intro_ar')->nullable();
            $table->string('box_intro_en')->nullable();
            $table->string('box_intro_ar')->nullable();
            $table->string('WebsiteStatus')->default(0)->nullable();
            $table->string('CopyRights_en')->nullable();
            $table->string('CopyRights_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
