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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained(
                table: 'users', 
                indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories', 
                indexName: 'posts_category_id'
            ); 
            // ini dia nyari dulu table category, padahal tablenya belum di bikin, mungkin ade blm selesai nontonnya, engga pa sandika pake versi lama jadi gaakan error, iya dia pkae sqlite, iya kalo pake sqlite pasti bisa, nih contoh
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
