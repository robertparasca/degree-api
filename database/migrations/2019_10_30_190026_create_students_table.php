<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact_email')->unique();
            $table->string('grupa_i');
            $table->string('nr_matricol');
            $table->string('nume_si_prenume');
            $table->string('tara');
            $table->string('initiale_tata');
            $table->string('obsan_anterior');
            $table->boolean('taxa');
            $table->string('orfanfacii');
            $table->integer('an_admitere');
            $table->integer('an_inmatr');
            $table->string('domeniu_studii');
            $table->float('medie_adm');
            $table->integer('an_curent');
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
        Schema::dropIfExists('students');
    }
}
