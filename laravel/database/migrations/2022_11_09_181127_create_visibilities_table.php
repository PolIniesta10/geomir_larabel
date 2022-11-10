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
        Schema::create('visibilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('visibility_id')
                  ->nullable();
            $table->foreign('visibility_id')
                  ->references('id')->on('visibilities')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visibilities');
    }
};
