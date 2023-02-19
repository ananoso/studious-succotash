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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('company_name')->nullable();
            $table->string('pesel', 11)->nullable()->unique();
            $table->string('nip', 9)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('surname');
            $table->dropColumn('company_name');
            $table->dropColumn('pesel');
            $table->dropColumn('nip');
        });
    }
};
