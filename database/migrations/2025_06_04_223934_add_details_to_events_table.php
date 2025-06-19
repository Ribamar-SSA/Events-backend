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
        Schema::table('events', function (Blueprint $table) {
            $table->string('speaker')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('capacity')->nullable();
            $table->boolean('is_public')->default(true);
            $table->string('category')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'speaker',
                'description',
                'event_date',
                'location',
                'capacity',
                'is_public',
                'category',
                'image',
                'user_id'
            ]);
        });
    }
};
