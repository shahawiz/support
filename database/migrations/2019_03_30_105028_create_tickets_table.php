<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->text('content');
            $table->string('slug')->nullable();
            $table->enum('status', ['Pending','Answered','Solved']);
            $table->integer('user_id')->nullable();
            $table->integer('department_id');
            $table->enum('priority', ['Low','Normal','High','Very High']);
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
        Schema::dropIfExists('tickets');

    }
}
