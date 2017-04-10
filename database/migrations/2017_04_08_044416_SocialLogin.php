<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocialLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('social_login', function (Blueprint $table) {
            $table->string('provider_id');
            $table->string('user_id');
            $table->string('provider');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary('provider_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_login');
    }
}
