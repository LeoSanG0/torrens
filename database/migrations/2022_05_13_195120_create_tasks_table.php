<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->enum('status', ['Aceptada', 'En curso', 'En revisión', 'Finalizada', 'Rechazada']);
            $table->bigInteger('owner')->unsigned();
            $table->bigInteger('assigned_to')->unsigned();
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
