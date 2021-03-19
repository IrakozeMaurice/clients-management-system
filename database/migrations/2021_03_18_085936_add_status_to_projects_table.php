<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToProjectsTable extends Migration
{

    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status', ['todo', 'ongoing', 'completed'])->default('todo');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
