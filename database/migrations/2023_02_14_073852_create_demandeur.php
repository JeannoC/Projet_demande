<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandeurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_demande')->default('');
            $table->string('genre')->default('');
            $table->string('date_naissance')->default('');
            $table->string('lieu_naissance')->default('');
            $table->string('nom_pere')->default('');
            $table->string('nom_mere')->default();
            $table->string('profession')->nullable();
            $table->string('adresse')->nullable();
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
        Schema::dropIfExists('demandeurs');
    }
}
