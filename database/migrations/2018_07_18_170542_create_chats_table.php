<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('atendimento_id')->unsigned()->index();
            $table->string('postado_por');
            $table->text('mensagem');
            $table->boolean('lido')->default(false);
            $table->timestamps();
            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chats');
    }
}
