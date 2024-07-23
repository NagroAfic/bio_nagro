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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->text('es_title');
            $table->longText('es_description');
            $table->text('en_title')->nullable();
            $table->longText('en_description')->nullable();
            $table->boolean('has_quotation')->default(1);
            $table->double('price')->nullable();
            $table->boolean('status')->default(1);
            $table->longText('embed_video')->nullable();
            $table->text('url_image');
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
        Schema::dropIfExists('products');
    }
};
