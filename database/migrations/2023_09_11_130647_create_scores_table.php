<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('scores')) {
            Schema::create('scores', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('round_id');
                $table->unsignedBigInteger('team_id');
                $table->unsignedBigInteger('task_id');
                $table->decimal('score', 5, 2);
                $table->foreign('round_id')->references('id')->on('rounds');
                $table->foreign('team_id')->references('id')->on('teams');
                $table->foreign('task_id')->references('id')->on('tasks');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
