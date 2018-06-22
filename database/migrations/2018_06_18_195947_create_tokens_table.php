<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('recipient_id');
            $table->unsignedInteger('gateway_id');
            $table->string('token');
            $table->enum('status', ['QUEUED', 'SENT', 'FAILED'])->default('QUEUED');
            $table->string('gateway_feedback')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('gateway_id')
                ->references('id')
                ->on('gateways')
                ->onDelete('CASCADE');

            $table->foreign('recipient_id')
                ->references('id')
                ->on('recipients')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
