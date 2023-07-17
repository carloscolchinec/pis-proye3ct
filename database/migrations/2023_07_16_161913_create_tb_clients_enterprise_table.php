<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbClientsEnterpriseTable extends Migration
{
    public function up()
    {
        Schema::create('tb_clients_enterprise', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enterprise_user_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->string('telefono');
            $table->string('correo_electronico')->unique();
            $table->string('direccion');
            $table->date('fecha_nacimiento');

            $table->timestamps();

            $table->foreign('enterprise_user_id')->references('enterprise_id')->on('tb_enterprise_users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_clients_enterprise');
    }
}
