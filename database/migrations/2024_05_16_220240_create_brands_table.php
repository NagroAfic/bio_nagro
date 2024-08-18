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
        /**
         * TABLE FOR BRANDS
         */
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->text('description_seo')->nullable();
            $table->string('url_seo')->nullable();
            $table->string("es_title");
            $table->longText("es_description");
            $table->string("en_title")->nullable();
            $table->longText("en_description")->nullable();
            $table->text("url_image");
            $table->boolean("status")->default(1);
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
        Schema::dropIfExists('brands');
    }
};
