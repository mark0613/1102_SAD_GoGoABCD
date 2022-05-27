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
        Schema::create('comment', function (Blueprint $table) {
            $table->unsignedInteger("u_id");
            $table->unsignedInteger("p_id");
            $table->integer("stars");
            $table->text('content');
            $table->datetime("time");

            $table->primary(["u_id","p_id"]);
            $table->foreign("u_id")->references('u_id')->on('member')->onDelete('cascade');
            $table->foreign("p_id")->references('p_id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
