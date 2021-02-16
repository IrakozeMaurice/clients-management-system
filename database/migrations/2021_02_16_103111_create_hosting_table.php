<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name');
            $table->unsignedInteger('disc_space');
            $table->unsignedInteger('bandwidth');
            $table->unsignedInteger('email_accounts');
            $table->unsignedInteger('parked_domains');
            $table->unsignedInteger('subdomain');
            $table->unsignedInteger('ftp_accounts');
            $table->unsignedInteger('price');
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
        Schema::dropIfExists('hosting');
    }
}
