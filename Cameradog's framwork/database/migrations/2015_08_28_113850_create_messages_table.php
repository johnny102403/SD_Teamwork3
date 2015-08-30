<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('all_message', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
		    $table->string('name');
		    $table->text('content');
        $table->timestamp('time');
        $table->timestamps();

        $table->foreign('user_id')
              ->references('id')
              ->on('all_account');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('all_message');
    }
}
