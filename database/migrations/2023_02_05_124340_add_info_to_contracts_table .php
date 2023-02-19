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
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('place');
            $table->string('name', 100);
            $table->string('guid', 6);
            $table->text('type_of_investment');
            $table->text('country');
            $table->text('city');
            $table->string('contract_type', 200);
            $table->string('currency', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('place');
            $table->dropColumn('name');
            $table->dropColumn('guid');
            $table->dropColumn('type_of_investment');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('contract_type');
            $table->dropColumn('currency');
        });
    }
};
