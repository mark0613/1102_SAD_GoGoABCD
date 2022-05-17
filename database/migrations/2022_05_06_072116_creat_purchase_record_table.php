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
        Schema::create('purchase_record', function (Blueprint $table) {
            $table->increments("r_id");
            $table->unsignedInteger("u_id");
            $table->unsignedInteger("p_id");
            $table->time("time");
            $table->integer("quantity")->default(0);
            
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
        Schema::dropIfExists('purchase_record');
    }
};
