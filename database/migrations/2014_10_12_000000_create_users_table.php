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
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse')->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('date_de_naissance')->nullable();
            $table->string('lieu_de_naissance')->nullable();
            $table->string('pincode')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('statut')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->integer('is_verified')->default(0);
            $table->string('password');
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
