<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceincludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceincludes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('service_id');
            $table->tinyInteger('seller_id');
            $table->string('include_service_title');
            $table->double('include_service_price');
            $table->integer('include_service_quantity');
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
        Schema::dropIfExists('serviceincludes');
    }
}
