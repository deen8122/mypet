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
        DB::unprepared(file_get_contents('database/sql/items.sql'));

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("TRUNCATE TABLE orders ");
    }
};
