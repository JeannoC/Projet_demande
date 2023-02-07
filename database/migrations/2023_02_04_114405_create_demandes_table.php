<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('type_demande')->default('');
            $table->string('prenom')->default('');
            $table->string('name')->default('');
            $table->string('genre')->default('');
            $table->string('date_naissance')->default('');
            $table->string('lieu_naissance')->default('');

            $table->string('nom_pere')->default('');
            $table->string('nom_mere')->default('');
            $table->string('photo')->default('');
            $table->string('photo_signature')->default('');

            $table->string('email');
            $table->string('telephone')->default('');
            $table->string('actifs')->default('0');
            $table->integer('demande')->default('1');
            $table->integer('prevalitation')->default('0');
            $table->rememberToken();
            $table->timestamps();


            $table->foreignId('users_id')->constrained()->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
