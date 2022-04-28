<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcyclesLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycles_links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('read_at')->nullable();;
            $table->integer('motorcycles_id')->unsigned();
            $table->string('link')->nullable();
            $table->string('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motorcycles_links');
    }
}
