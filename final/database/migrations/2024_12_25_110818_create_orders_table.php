<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('food_category');
            $table->text('food_items'); 
            $table->text('quantities')->nullable(); 
            $table->decimal('rate', 8, 2);
            
            $table->decimal('total_price', 10, 2);
            
            $table->unsignedBigInteger('created_by')->nullable(); 
            $table->unsignedBigInteger('updated_by')->nullable(); 
            
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
