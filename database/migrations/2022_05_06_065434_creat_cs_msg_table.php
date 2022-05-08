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
        Schema::create('cs_msg', function (Blueprint $table) {
            $table->unsignedInteger("m_id");
            $table->unsignedInteger("c_id");
            $table->text('message');
            $table->time("time");
           
            $table->primary(["m_id","c_id"]);
            $table->foreign("m_id")->references('u_id')->on('merchant')->onDelete('cascade');
            $table->foreign("c_id")->references('u_id')->on('member')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_msg');
    }
};
