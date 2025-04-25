<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('advices', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->unsignedBigInteger('category_id');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->integer('likes_count')->default(0);
        $table->integer('comments_count')->default(0);
        $table->integer('reports_count')->default(0);  
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advices');
        $table->dropColumn('reports_count');
    }
};
