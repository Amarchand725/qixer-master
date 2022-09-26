<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('requirement_id');
            $table->bigInteger('client_id')->comment('customer id');
            $table->bigInteger('service_provider_id')->comment('seller id');
            $table->string('convert_type')->comment('single project , milestone project');
            $table->integer('total_cost');
            $table->integer('service_provider_cost')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
