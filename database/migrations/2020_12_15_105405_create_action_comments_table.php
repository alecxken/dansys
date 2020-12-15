<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('incident_id')->nullable();
            $table->string('incident_status')->nullable();
            $table->string('comments')->nullable();
            $table->string('date')->nullable();
            $table->string('actioned_by')->nullable();
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
        Schema::dropIfExists('action_comments');
    }
}
