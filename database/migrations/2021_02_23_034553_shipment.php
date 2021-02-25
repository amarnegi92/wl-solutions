<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('batch_number'); //duplicate or comma seprated
            $table->string('order_number'); //
            $table->string('arrived_id'); //
            $table->string('date');
            $table->tinyInteger('ship_type')->comment('1 = Airways, 2 = Seaways');
            $table->tinyInteger('status')->comment('1 = Airways, 2 = Seaways');
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
        Schema::dropIfExists('shipments');
    }
}
