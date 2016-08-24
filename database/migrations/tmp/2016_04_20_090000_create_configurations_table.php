<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function($table) {
            $table->increments('id');
            $table->integer('time_interval_id')->unsigned();
            $table->foreign('time_interval_id')
                ->references('id')
                ->on('time_intervals')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
        /*Schema::create('choices', function (Blueprint $t) {
            $t->increments('id_choice');
            $t->string('label');
            $t->boolean('valid');
            $t->integer('id_item')->unsigned();
            $t->foreign('id_item')
                ->references('id_item')
                ->on('items')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
