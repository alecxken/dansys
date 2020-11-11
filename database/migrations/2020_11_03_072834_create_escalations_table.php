<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalations', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->string('sos_name')->nullable();
            $table->string('sos_location')->nullable();
            $table->string('sos_phone')->nullable();
             $table->string('sos_availability')->nullable();
              $table->string('sos_actioned_count')->nullable();
               $table->string('status')->nullable();
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
        Schema::dropIfExists('escalations');
    }
}
