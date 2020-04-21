<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MessageTableRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id')->after('id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->unsignedBigInteger('repeater_id')->after('sender_id');
            $table->foreign('repeater_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->removeColumn('sender_id');
            $table->dropForeign(['repeater_id']);
            $table->removeColumn('repeater_id');
        });
    }
}
