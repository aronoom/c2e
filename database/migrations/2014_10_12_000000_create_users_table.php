<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('login',30)->unique();
            $table->string('password',255);
            $table->string('telephone',13);
            $table->string('adresse',150);
            $table->string('Motif_insrciption',255);
            $table->date('date_inscription');
            $table->date('date_activation')->nullable();
            $table->tinyInteger('nombre_de_connection')->default(1);
            $table->string('taille_ecran',60)->nullable();
            $table->string('nom_appareil',60)->nullable();
            $table->boolean('mode_economique')->default(false);
            $table->boolean('connecter')->default(false);
            $table->string('image', 255);
            $table->tinyInteger('nbr_vue')->default(0);
            $table->boolean('confirmed')->default(false);
            $table->integer('score')->unsigned()->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
