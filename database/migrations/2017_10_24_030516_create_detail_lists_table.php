<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->integer('list_id')->unsigned();
            $table->timestamps();

            $table->foreign('list_id')
                   ->references('id')
                   ->on('list_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_lists');
    }
}
