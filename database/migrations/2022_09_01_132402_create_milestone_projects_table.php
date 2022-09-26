<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestoneProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('requirement_id');
            $table->bigInteger('service_provider_id');
            $table->string('name');
            $table->bigInteger('cost');
            $table->bigInteger('service_provider_cost');
            $table->integer('timeframe')->comment('days');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status')->comment('0=pending, 1=started, 2=completed, 3=rejected');
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
        Schema::dropIfExists('milestone_projects');
    }
}
