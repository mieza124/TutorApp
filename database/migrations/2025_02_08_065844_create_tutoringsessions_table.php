<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoringsessionsTable extends Migration
{
    public function up()
    {
        Schema::create('tutoringsessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('tutor_id');
            $table->string('schedule');
            $table->integer('registered');
            $table->integer('availability');
            $table->enum('mode', ['Physical', 'Online']);
            $table->decimal('fees', 8, 2);
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutoringsessions');
    }
}
