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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255)->unique();
            $table->string('introduction',255);
            $table->string('image',255);
            $table->text('body');
            $table->timestamps();
            $table->boolean('status')->default(0);

            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')
            //     ->references('id')->on('users')->onDelete('set null');
            //
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')
            //     ->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
