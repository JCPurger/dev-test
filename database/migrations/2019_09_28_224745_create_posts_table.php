<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->increments('id');
            $table->string('slug')->unique();
            $table->boolean('status')->default(1);
            $table->string('title');
            $table->string('image');
            $table->mediumText('text');
            $table->unsignedBigInteger('user_id');
            $table->timestampsTz();
            $table->softDeletesTz();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
