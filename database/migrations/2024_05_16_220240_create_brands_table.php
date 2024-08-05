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
            $table->string("es_title");
            $table->string("es_description");
            $table->string("en_title")->nullable();
            $table->string("en_description")->nullable();
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
