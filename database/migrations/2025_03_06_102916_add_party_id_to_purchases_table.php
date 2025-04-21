<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    /**
     * Run the migrations.
     *
     * @return void
     */
    return new class extends Migration
    {
        public function up()
        {
            Schema::table('purchases', function (Blueprint $table) {
                $table->foreignId('party_id')->nullable()->constrained('parties')->onDelete('set null');
            });
        }
    
        public function down()
        {
            Schema::table('purchases', function (Blueprint $table) {
                $table->dropForeign(['party_id']);
                $table->dropColumn('party_id');
            });
        }
    };
    

