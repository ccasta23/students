<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_student', function (Blueprint $table) {
            $table->id();
            $table->integer('grade_id');
            //Forma 1 de crear llave foránea en BD (Columna y foránea al tiempo)
            $table->foreignId('student_id')->references('id')->on('students');
            $table->float('grade_student');
            $table->timestamps();

            //Forma 2 de crear llave foránea en BD (Arriba se creó la columna y aquí la foránea)
            $table->foreign('grade_id')->references('id')->on('grades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_student');
    }
};
