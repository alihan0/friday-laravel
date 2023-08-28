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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->integer('customer');
            $table->string('title');
            $table->text('detail');
            $table->integer('offer');
            $table->decimal('price', 9,2);
            $table->string('tech_stack');
            $table->string('start_at');
            $table->string('dead_line');
            $table->string('passing_time');
            $table->string('required_time');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
