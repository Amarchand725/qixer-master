<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_deliveries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_detial_id');
            $table->string('attachment')->nullable();
            $table->text('describe')->nullable();
            $table->date('date');
            $table->boolean('is_client_read')->default(0);
            $table->boolean('is_seller_read')->default(1);
            $table->integer('status')->default(0)->comment('0=pending, 1=accept, 3=rejected');
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
        Schema::dropIfExists('project_deliveries');
    }
}
