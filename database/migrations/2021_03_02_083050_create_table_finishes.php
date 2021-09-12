<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFinishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('items_id')->unsigned();
            $table->foreign('items_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('finishes');
    }
}
