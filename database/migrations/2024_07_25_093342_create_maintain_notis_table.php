<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintainNotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintain_notis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_user')->nullable();
            $table->string('maintain_notified_user_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('partner_id')->nullable();
            $table->string('name_area')->nullable();
            $table->string('detail_location')->nullable();
            $table->string('title')->nullable();
            $table->string('detail_title')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->longText('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->longText('name_officer')->nullable();
            $table->longText('officer_id')->nullable();
            $table->string('device_code')->nullable();
            $table->string('device_code_id')->nullable();
            $table->dateTime('datetime_command')->nullable();
            $table->dateTime('datetime_start')->nullable();
            $table->dateTime('datetime_end')->nullable();
            $table->dateTime('datetime_success')->nullable();
            $table->longText('material')->nullable();
            $table->string('repair_costs')->nullable();
            $table->longText('photo_repair_costs')->nullable();
            $table->longText('remark_user')->nullable();
            $table->longText('remark_officer')->nullable();
            $table->longText('remark_admin')->nullable();
            $table->string('rating_maintain')->nullable();
            $table->string('rating_operation')->nullable();
            $table->string('rating_impression')->nullable();
            $table->string('rating_sum')->nullable();
            $table->longText('rating_remark')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maintain_notis');
    }
}
