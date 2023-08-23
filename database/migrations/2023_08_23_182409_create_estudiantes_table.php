<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apelllidomaterno');
            $table->string('correo')->unique();

            //Creacion de llaves foraneas
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('id_carrera')
                ->nullable() //que acepte valores nulos
                ->constrained('carreras')
                ->cascadeOnUpdate() //actualizar en cascada (osea, que tambien se refleje aqui cuando se actualice el usuario)
                ->nullOnDelete(); //cuando se elimine el registro se cambie el id a nulo
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
