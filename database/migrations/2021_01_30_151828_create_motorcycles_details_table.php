<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcyclesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycles_deatils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('motorcycles_id')->unsigned();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('submodel')->nullable();
            $table->string('year')->nullable();
            $table->string('gear')->nullable();
            $table->string('color')->nullable();
            $table->string('motor')->nullable();
            $table->string('price')->nullable();
            $table->string('img')->nullable();
            $table->string('location')->nullable();
            $table->string('link')->nullable();
            $table->timestamp('clean_at')->nullable();
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
        Schema::dropIfExists('motorcycles_deatils');
    }
}
