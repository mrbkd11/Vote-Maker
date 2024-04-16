<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->string('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('vote_id')->references('id')->on('vote')->onDelete('cascade');
            $table->primary(array('user_id', 'vote_id'));
            $table->string('reponse');
            $table->binary('is_locked')->nullable()->default(0);
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
        Schema::dropIfExists('results');
    }
};
