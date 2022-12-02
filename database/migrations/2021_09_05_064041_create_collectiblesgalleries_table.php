<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectiblesgalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectiblesgalleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('measurement')->nullable();
            $table->string('medium')->nullable();
            $table->string('client')->nullable();
            $table->string('client_link')->nullable();
            $table->string('year')->nullable();
            $table->string('description')->nullable();
            $table->string('gallery_type')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('gallery_thumbnail_image')->nullable();
            $table->longText('gallery_youtube_link')->nullable();
            $table->string('gallery_youtube_thumbnail')->nullable();

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
        Schema::dropIfExists('collectiblesgalleries');
    }
}
