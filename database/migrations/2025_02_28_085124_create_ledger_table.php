<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->enum('transaction_type', ['sale', 'purchase', 'payment', 'credit']);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
    
          
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ledger');
    }
    
}
