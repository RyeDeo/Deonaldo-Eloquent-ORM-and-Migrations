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
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->after('id');
            $table->unsignedBigInteger('user_id')->after('post_id');
            $table->unsignedBigInteger('parent_comment_id')->nullable()->after('user_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['parent_comment_id']);
            $table->dropColumn(['post_id', 'user_id', 'parent_comment_id']);
        });
    }
};
