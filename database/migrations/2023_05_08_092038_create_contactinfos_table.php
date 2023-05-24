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
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->id();
            $table->string('mobilenum');
            $table->string('phonenum');
            $table->string('websitepg');
            $table->string('facebookpg');
            $table->string('instagrampg');
            $table->string('youtubepg');
            $table->string('twitterpg');
            $table->string('telegrampg');
            $table->string('tiktokpg');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactinfos');
    }
};


