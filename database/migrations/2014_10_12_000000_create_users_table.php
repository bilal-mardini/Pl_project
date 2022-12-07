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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId("role_id")->constrained("roles");
            $table->string('password');
            $table->string('image_url')->nullable();
            $table->string('experince_title')->nullable();
            $table->string('experince_desc')->nullable();
            $table->string('phone')->nullable();
            $table->string('adress')->nullable();
            $table->string('available_time')->nullable();
            $table->bigInteger('consualting_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
