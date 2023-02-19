<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_contract_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('hours_amount', 8, 2);
            $table->decimal('paycheck', 8, 2)->nullable();
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('user_contract_id')->references('id')->on('user_contracts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_entries');
    }
};
