<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_videos', function (Blueprint $table) {
                    $table->increments('id');
                    $table->unsignedInteger('course_id');
                    $table->string('name');
                    $table->string('file_token');
                    $table->softDeletes();
                    $table->timestamps();

                    $table->foreign('course_id')
                        ->references('id')
                        ->on('courses')
                        ->onDelete('cascade');
                });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_videos');        
    }
}
