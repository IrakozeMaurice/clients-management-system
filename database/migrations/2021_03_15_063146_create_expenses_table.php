<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{

    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('expense_category_id');
            $table->string('name');
            $table->unsignedInteger('amount');
            $table->text('description');

            $table->foreign('expense_category_id')->references('id')->on('expense_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
