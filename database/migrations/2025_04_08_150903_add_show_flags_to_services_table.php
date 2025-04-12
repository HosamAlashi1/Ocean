<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('show_on_our_service')->default(false)->after('desc_ar');
            $table->boolean('show_on_recent_work')->default(false)->after('show_on_our_service');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['show_on_our_service', 'show_on_recent_work']);
        });
    }
};
