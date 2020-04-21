<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationForColorAndThemeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->after('id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('theme_id')->after('color_id');
            $table->foreign('theme_id')->references('id')->on('themes');
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
            $table->dropForeign(['color_id']);
            $table->removeColumn('color_id');
            $table->dropForeign(['theme_id']);
            $table->removeColumn('theme_id');
        });
    }
}
