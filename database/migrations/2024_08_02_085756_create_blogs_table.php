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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id'); // Adding user_id column
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('tags')->nullable();
            $table->tinyInteger('is_publish')->default(0)->comment('0:no,1:yes');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not,1:yes');
            $table->string('author');
            $table->date('publish_date');
            $table->tinyInteger('status')->default(0)->comment('0:active,1:Inactive');
            $table->timestamps();
            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Setting up foreign key for user_id


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
