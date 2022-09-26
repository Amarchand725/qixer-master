<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('requirement_name');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('contact_email')->nullable();
            $table->longText('details')->nullable();
            $table->longText('notes')->nullable();
            $table->json('attachments')->nullable();
            $table->json('deliveries')->nullable();
            $table->string('budget')->nullable();
            $table->json('contract')->nullable();
            $table->string('priority')->nullable();
            $table->boolean('status')->default(0)->comment('0=pending, 1=converted project');
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
        Schema::dropIfExists('requirements');
    }
}
