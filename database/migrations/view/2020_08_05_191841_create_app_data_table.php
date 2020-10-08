<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->nullable();
            $table->string('applicant')->nullable();
            $table->string('course_done')->nullable();
            $table->string('institution')->nullable();
            $table->string('grade')->nullable();
            $table->string('inst_studentno')->nullable();
            $table->string('course_code')->nullable();
            $table->string('status')->nullable();
            $table->string('marks')->nullable();
            $table->string('comments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_data');
    }
}
