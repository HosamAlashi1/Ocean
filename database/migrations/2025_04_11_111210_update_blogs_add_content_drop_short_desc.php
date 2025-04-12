<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['short_desc_en', 'short_desc_ar','is_default']);
            $table->longText('content_en')->after('title_en');
            $table->longText('content_ar')->after('title_ar');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('short_desc_en')->after('title_en');
            $table->longText('short_desc_ar')->after('title_ar');
            $table->dropColumn(['content_en', 'content_ar']);
        });
    }
};
