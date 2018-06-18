<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('recipient_id');
            $table->unsignedInteger('gateway_id');
            $table->string('code');
            $table->enum('status', ['QUEUED', 'SENT', 'FAILED']);
            $table->string('gateway_feedback');
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('interactions');
    }
}
