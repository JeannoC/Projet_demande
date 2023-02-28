<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prenom');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default("");
            $table->string('token')->default("");
            $table->dateTime('token_validated_at')->nullable();
            $table->dateTime('token_confirmated_at')->nullable();
            $table->integer('statuts')->enum(0,1)->default(0);
            $table->text('avatar')->default('avatar.jpg');
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
}
