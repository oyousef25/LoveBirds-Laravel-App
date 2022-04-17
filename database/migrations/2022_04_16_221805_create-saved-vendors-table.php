<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_title')->default("N/A");
            $table->string('vendor_description')->default("N/A");
            $table->decimal('vendor_rating')->default(0.00);
            $table->string('vendor_website')->default("N/A");
            $table->string('vendor_location')->default("N/A");
            $table->string('vendor_phone')->default("N/A");
            $table->string('vendor_image')->default("https://oyousef.scweb.ca/lovebirds/images/default.png");
            $table->bigInteger('user_id')->default(1);
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
        Schema::dropIfExists('saved_vendors');
    }
}
