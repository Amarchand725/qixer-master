<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('recognition')->nullable();
            $table->string('references')->nullable();
            $table->string('reference_mobile_no')->nullable();
            $table->string('education')->nullable();
            $table->text('certifications')->nullable();
            $table->string('skills')->nullable();
            $table->string('experience')->nullable()->comment('Years of professional experience');
            $table->string('apps_developed')->nullable();
            $table->text('linkedin_profile_link')->nullable();
            $table->text('github_profile_link')->nullable();
            $table->string('time_availability')->nullable();
            $table->text('projects_like_to_work')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('resume')->nullable();
            $table->string('short_bio')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
