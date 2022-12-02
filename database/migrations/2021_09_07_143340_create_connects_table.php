<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('connects', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->longText('facebook_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->longText('youtube_link')->nullable();
            $table->longText('whatsapp_link')->nullable();
            $table->longText('linkedin_link')->nullable();

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
        Schema::dropIfExists('connects');
    }
}
