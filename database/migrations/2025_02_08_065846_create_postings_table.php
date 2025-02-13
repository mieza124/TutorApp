<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('tutoringsession_id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
    
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
            $table->foreign('tutoringsession_id')->references('id')->on('tutoringsessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postings');
    }
};
