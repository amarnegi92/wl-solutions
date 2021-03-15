<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->boolean('ship_type');
            $table->integer('ctn_qty');
            $table->string('received_date', 20)->nullable();
            $table->text('description');
            $table->string('batch_number', 30);
            $table->string('volume', 30)->nullable();
            $table->string('weight', 10)->nullable();
            $table->string('eta', 10);
            $table->string('container_number', 10)->nullable();
            $table->integer('ship_status');
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
        Schema::dropIfExists('transports');
    }
}
