<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebTable extends Migration
{

    public function up()
    {
        Schema::create('web', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name');
            $table->unsignedInteger('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('web');
    }
}
