<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_en');
            $table->string('title_ar');
            $table->longText('short_desc_en');
            $table->longText('short_desc_ar');
            $table->longText('desc_en');
            $table->longText('desc_ar');
            $table->string('by');
            $table->enum('is_default', array('0', '1'))->default('0')->comment('0: hide, 1: display');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
