<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ig_id');
            $table->integer('tag_id')->unsigned()->nullable();
            $table->string('code');
            $table->integer('likes');
            $table->string('thumbnail_src');
            $table->string('display_src');
            $table->timestamp('date');
            $table->boolean('is_video');
            $table->integer('owner_id');
            $table->string('username');
            $table->string('location')->nullable();
            $table->longText('caption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
