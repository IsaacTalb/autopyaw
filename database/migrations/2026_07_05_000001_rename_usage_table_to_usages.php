<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('usage') && ! Schema::hasTable('usages')) {
            Schema::rename('usage', 'usages');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('usages') && ! Schema::hasTable('usage')) {
            Schema::rename('usages', 'usage');
        }
    }
};
