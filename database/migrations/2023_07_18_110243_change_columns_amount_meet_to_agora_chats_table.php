<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsAmountMeetToAgoraChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agora_chats', function (Blueprint $table) {
            $table->renameColumn('amount_meet', 'than_2_people_timemeet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agora_chats', function (Blueprint $table) {
            //
        });
    }
}
