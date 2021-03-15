<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arrived extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('arrived', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('conf_date');
            $table->string('customer_code');
            $table->tinyInteger('status');
            $table->longText('description');
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
        Schema::dropIfExists('arrived');
    }
}
