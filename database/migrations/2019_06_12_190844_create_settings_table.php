<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name',255)->default('Help Desk');
            $table->string('site_url',255);
            $table->string('site_logo',255)->default('logo.png');
            $table->string('site_email',255)->default('support@yourdomain.com');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('copyrights')->nullable();
            $table->enum('maintenance', ['on','off'])->default('off');
            $table->string('facebook',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('linkedin',255)->nullable();
            #Ticket Setting
            $table->enum('ticketCreate_email', ['yes','no'])->default('no');
            $table->enum('ticketReply_email', ['yes','no'])->default('no');
            $table->enum('ticket_editClient', ['yes','no'])->default('no');
            $table->enum('ticket_editStaff', ['yes','no'])->default('no');
            # Some Features
            $table->enum('dark_mode',['on','off'])->default('off');

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
        Schema::dropIfExists('settings');
    }
}
