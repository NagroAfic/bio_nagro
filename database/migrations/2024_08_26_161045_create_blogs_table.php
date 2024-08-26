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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('description_seo')->nullable();
            $table->string('url_seo')->nullable();
            $table->string('es_title');
            $table->string('en_title');
            $table->longText('es_description');
            $table->longText('en_description');
            $table->text('url_portada');
            $table->boolean('status')->default(1);
            $table->text('embed_video')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
