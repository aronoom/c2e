<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoriels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('description',300);
            $table->string('introduction',20000);
            $table->boolean('valider')->default(false);
            $table->integer('nbr_vue')->unsigned()->default(1);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('restrict');
            $table->integer('niveau_id')->unsigned();
            $table->foreign('niveau_id')
                        ->references('id')
                        ->on('niveaus');
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
        Schema::table('tutoriels', function(Blueprint $table) {
            $table->dropForeign('tutoriels_user_id_foreign');
        });
        Schema::drop('tutoriels');
    }
}
