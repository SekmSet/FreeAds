<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sexe')->nullable()->after('password');
            $table->date('date_naissance')->nullable()->after('sexe');
            $table->string('telephone')->nullable()->after('email');
            $table->string('pseudo')->nullable()->after('name');

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
            $table->dropColumn('sexe');
            $table->dropColumn('date_naissance');
            $table->dropColumn('telephone');
            $table->dropColumn('pseudo');
        });
    }
}
