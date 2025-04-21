<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('trial_days')->default(30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_settings');
    }
}
