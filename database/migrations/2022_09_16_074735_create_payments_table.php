<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id');
            $table->bigInteger('project_id');
            $table->bigInteger('project_details_id');
            $table->string('transaction_id')->nullable();
            $table->string('amount');
            $table->string('payment_gateway')->nullable();
            $table->string('type')->nullable();
            $table->string('username')->nullable();
            $table->string('status')->nullable()->comment('Transaction status (failed or success)');
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
        Schema::dropIfExists('payments');
    }
}
