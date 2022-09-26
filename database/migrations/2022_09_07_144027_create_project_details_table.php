<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->string('name');
            $table->string('slug');
            $table->string('total_cost');
            $table->string('service_provider_cost');
            $table->integer('timeframe')->comment('days');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending, 1=started, 2=completed, 3=rejected');
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
        Schema::dropIfExists('project_details');
    }
}
