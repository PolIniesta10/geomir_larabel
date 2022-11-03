<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigInteger('id', 20);
            $table->varchar('body', 255);
            $table->bigInteger('file_id', 20);
            $table->float('latitude');
            $table->float('longitude');
            $table->bigInteger('visibility_id', 20);
            $table->bigInteger('author_id', 20);
            $table->foreign('author_id')->references('id')->on('users');
            $table->timestamp();
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
};
