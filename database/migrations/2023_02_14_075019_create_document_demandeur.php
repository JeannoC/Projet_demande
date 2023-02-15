<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDemandeur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_demandeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('path')->nullable();
            $table->string('filename')->nullable();
            $table->string('name')->nullable();
            $table->string('type_document')->enum('photo','signature','autre')->nullable();
            $table->foreignId('demandeurs_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_demandeurs');
    }
}
