<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingTable extends Migration
{
    public function up()
    {
        Schema::create('hosting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name');
            $table->string('disc_space');
            $table->string('bandwidth');
            $table->unsignedInteger('email_accounts');
            $table->unsignedInteger('parked_domains');
            $table->unsignedInteger('subdomain');
            $table->unsignedInteger('ftp_accounts');
            $table->unsignedInteger('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hosting');
    }
}
